<?php

namespace App\Controllers;

class Usuarios extends BaseController
{

    protected $format = 'json';

    private $table = "Usuarios";
    private $uniqueFields = ['email']; //deve ser um array
    private $requiredFields = ['nome', 'email', 'status', 'perfil', 'password', 'password']; //deve ser um array

    public function index()
    {
        $return = $this->database->getReference($this->table)->getSnapshot();

        $dados = $return->getValue();

        $this->data['title'] = 'Usuarios';
        $this->data['description'] = 'Lista de usuarios';
        $this->data['dados'] = $dados;

        echo view('templates/principal/header');
        echo view('usuarios/index', $this->data);
        echo view('templates/principal/footer');
    }

    public function novo()
    {
        $this->data['title'] = 'Novo Usuario';
        $this->data['description'] = 'Lista de usuarios';

        echo view('templates/principal/header');
        echo view('usuarios/novo', $this->data);
        echo view('templates/principal/footer');
    }

    public function editar($id = null)
    {
        $return = $this->database->getReference($this->table . "/" . $id)->getSnapshot();

        $dados = $return->getValue();

        $this->data['title'] = 'Editar Usuario';
        $this->data['description'] = '-----------';
        $this->data['edit'] = $dados;

        echo view('templates/principal/header');
        echo view('usuarios/editar', $this->data);
        echo view('templates/principal/footer');
    }

    public function salvar($key = null)
    {
        $listPost = $this->request->getPost();

        /* VALIDA CAMPOS OBRIGATORIOS */
        if (!empty($this->requiredFields)) {
            $retorno = "Campos obrigatorios: <br>";
            foreach ($this->requiredFields as $field) {
                if (!isset($listPost[$field]) || empty($listPost[$field])) {
                    $retorno .= "- Campo: " . $field . "<br>";
                }
            }

            if ($retorno != "Campos obrigatorios: <br>") {
                echo $this->cimsg->error($retorno, 'Puts... deu erro!')->duration(4);
                die();
            }
        }

        if (!$key) {
            /* CHEGA CADASTRO JÁ REALIZADO */
            if (!empty($this->uniqueFields)) {
                $retorno = "Já temos cadastro com os dados abaixo: <br>";
                foreach ($this->uniqueFields as $field) {
                    if ($this->filter($this->table, $field, $listPost[$field])) {
                        $retorno .= "- Campo: " . $field . "<br>";
                    }
                }

                if ($retorno != "Já temos cadastro com os dados abaixo: <br>") {
                    echo $this->cimsg->error($retorno, 'Puts... deu erro!')->duration(4);
                    die();
                }
            }

            if ($listPost['password'] != $listPost['password2']) {
                echo $this->cimsg->error("As senhas precisam ser iguais!", 'Puts... deu erro!')->duration(4);
                die();
            }

            $listPost['dataCadastro'] = date('d/m/Y H:i:s');

            $userProperties = [
                'email' => $listPost['email'],
                'emailVerified' => false,
                'password' => $listPost['password'],
                'displayName' => $listPost['nome'],
                'disabled' => false,
            ];

            $createdUser = $this->auth->createUser($userProperties);

            if (empty($createdUser)) {
                echo $this->cimsg->error('Erro ao criar o usuario', 'Puts... deu erro!')->duration(4);
                die();
            }

            $idUsuario = $createdUser->uid;

            $listPost['id'] = $idUsuario;

            $retorno = $this->save($this->table, $listPost, $idUsuario);

        } else {
            $listPost['dataAtualizacao'] = date('d/m/Y H:i:s');

            $retorno = $this->saveEdit($this->table, $listPost, $key);
        }

        if ($retorno) {
            echo $this->cimsg->success('Salvo com sucesso!', 'Uhuuu... Sucesso')->action('redirectUri', 'usuarios');
        } else {
            echo $this->cimsg->error('Não foi possível salvar o conteúdo', 'Puts... deu erro!');
        }
    }

    public function save($table, $listPost, $key)
    {
        $return = $this->database->getReference($table . "/" . $key)->set($listPost);
        return $return->getKey();
    }

    public function newKey($table)
    {
        return $this->database->getReference($table)->push()->getKey();
    }

    public function excluir()
    {
        $listPost = $this->request->getPost();

        $return = $this->database->getReference($this->table . "/" . $listPost['id'])->remove();

        if ($return) {
            echo $this->cimsg->success('Excluido com sucesso!', 'Uhuuu... Sucesso')->action('reload', true)->duration(2);
        } else {
            echo $this->cimsg->error('Erro ao excluir!', 'Puts... deu erro!');
        }
    }

    public function filter($table, $key, $value)
    {
        $database = $this->factory->createDatabase();

        $return = $database->getReference($table)
            ->orderByChild($key)
            ->equalTo($value)
            ->getSnapshot();

        return $return->getValue();
    }
}
