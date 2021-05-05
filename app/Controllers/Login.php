<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\PessoasModel;
use CodeIgniter\HTTP\Request;
use Kreait\Firebase\Factory;

class Login extends BaseController
{
    private $table = "Usuarios";

    function __construct()
    {
        $this->usuarios_model = new UsuariosModel();
    }

    public function index()
    {
        $data['title'] = ['modulo' => 'LOGIN', 'icone' => 'fa fa-list'];
        echo view('templates/login/header');
        echo view('login/index', $data);
        echo view('templates/login/footer');
    }

    public function recuperar_senha()
    {
        $data['title'] = ['modulo' => 'LOGIN', 'icone' => 'fa fa-list'];
        echo view('templates/login/header');
        echo view('login/recuperar_senha', $data);
        echo view('templates/login/footer');
    }

    public function autenticar()
    {
        $dados = $this->request->getvar();

        $usuario = $dados['usuario'];
        $senha = $dados['senha'];

        if (empty($dados)) {
            echo $this->cimsg->error('Insira o e-mail e a senha', 'Erro no login!')->duration(4);
            die();
        }

        $session = session();

        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($usuario, $senha);

            $dados = $signInResult->data();

            $nome = $dados['displayName'];

            // Alerta de succeso de autenticação
            $session->setFlashdata('alert', 'success_autentication');

            // Insere variáveis na sessão
            $session->set('nome', $nome ?? 'Sem nome');
            $session->set('id_usuario', 1);
            $session->set('id_pessoa', 1);
            $session->set('id_grupo_permissao', 1);
            $session->set('token', $signInResult->idToken());

            // Redireciona para a Dashboard do sistema
            return redirect()->to('/home');
        } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword | \Kreait\Firebase\Exception\InvalidArgumentException | \Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
            // Informa que os dados estão errados
            $session->setFlashdata('alert', 'error_autentication');

            // Retorna para o login
            return redirect()->to('/login');
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

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/login');
    }
}
