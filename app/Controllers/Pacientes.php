<?php

namespace App\Controllers;

use App\Libraries\Cimsg;
use App\Models\PacientesEnderecoModel;
use App\Models\PacientesModel;


class Pacientes extends BaseController
{
    private $uf;
    private $cimsg;
    private $requiredFields = [
        'nome_paciente',
        'nome_mae',
        'cpf',
        'cns',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf'
    ];
    private $pacientes_model;
    private $pacientes_endereco_model;

    function __construct()
    {
        // BIBLIOTECA PARA TRATAR AS MENSAGENS AJAX
        $this->cimsg = new Cimsg();

        // LISTA RAPIDA DE ESTADOS/UF
        $this->uf = [
            0 => "Selecione a UF",
            "AC" => "Acre",
            "AL" => "Alagoas",
            "AP" => "Amapá",
            "AM" => "Amazonas",
            "BA" => "Bahia",
            "CE" => "Ceará",
            "DF" => "Distrito Federal",
            "ES" => "Espírito Santo",
            "GO" => "Goiás",
            "MA" => "Maranhão",
            "MT" => "Mato Grosso",
            "MS" => "Mato Grosso do Sul",
            "MG" => "Minas Gerais",
            "PA" => "Pará",
            "PB" => "Paraíba",
            "PR" => "Paraná",
            "PE" => "Pernambuco",
            "PI" => "Piauí",
            "RJ" => "Rio de Janeiro",
            "RN" => "Rio Grande do Norte",
            "RS" => "Rio Grande do Sul",
            "RO" => "Rondônia",
            "RR" => "Roraima",
            "SC" => "Santa Catarina",
            "SP" => "São Paulo",
            "SE" => "Sergipe",
            "TO" => "Tocantins"];

        // CARREGANDO MODELS
        $this->pacientes_model = new PacientesModel();
        $this->pacientes_endereco_model = new PacientesEnderecoModel();
    }

    // METODO RESPONSAVEL POR LISTAR TODOS OS PACIENTES
    public function index()
    {
        $dados = $this->pacientes_model->getPacientes();

        $this->data['title'] = 'Pacientes';
        $this->data['description'] = 'Lista de pacientes';
        $this->data['dados'] = $dados ?? null;

        echo view('templates/principal/header');
        echo view('/administrador/pacientes/index', $this->data);
        echo view('templates/principal/footer');
    }

    // METODO RESPONSAVEL POR RENDERIZAR O FORMULARIO DE CADASTRO DE PACIENTES
    public function novo()
    {
        $this->data['title'] = 'Novo paciente';
        $this->data['description'] = 'Lista de pacientes';
        $this->data['uf'] = $this->uf;

        echo view('templates/principal/header');
        echo view('/administrador/pacientes/novo', $this->data);
        echo view('templates/principal/footer');
    }

    // METODO RESPONSAVEL POR RENDERIZAR O FORMULARIO DE EDIÇÃ0 DE PACIENTES
    public function editar($id)
    {

        $dados = $this->pacientes_model->getPacientes(_decrypt($id));

        $this->data['title'] = 'Editar paciente: ' . _decrypt($id);
        $this->data['description'] = 'Lista de pacientes';
        $this->data['uf'] = $this->uf;
        $this->data['dados'] = $dados;

        echo view('templates/principal/header');
        echo view('/administrador/pacientes/editar', $this->data);
        echo view('templates/principal/footer');
    }

    // METODO RESPONSAVEL POR SALVAR OS DADOS DO PACIENTE
    public function salvar($id = null)
    {
        // RECUPERA OS DADOS DO FORMULARIO
        $listPost = $this->request->getPost();

        // VALIDA CAMPOS OBRIGATORIOS */
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

        //VALIDANDO CPF
        if(!_validaCPF($listPost['cpf'])){
            echo $this->cimsg->error("10000 - CPF com formato invalido", 'Puts... deu erro!')->duration(4);
            die();
        }

        //VALIDANDO CNS

        // RECUPERA OS ARQUIVOS DO FORMULARIO
        $files = $this->request->getFile('foto_perfil');
        $diretorioUpload = 'uploads/pacientes/' . $listPost['cpf'];
        if ($files->isValid() && !$files->hasMoved()) {
            $files->move($diretorioUpload);
            $fotoPerfil = $diretorioUpload . "/" . $files->getName();
        };

        // CRIANDO ARRAY DE DADOS PARA SALVAR NO BD - pacientes
        $postPaciente = [];
        $postPaciente['nome_paciente'] = $listPost['nome_paciente'];
        $postPaciente['nome_mae'] = $listPost['nome_mae'];
        $postPaciente['cpf'] = $listPost['cpf'];
        $postPaciente['cns'] = $listPost['cns'];
        $postPaciente['data_nascimento'] = $listPost['data_nascimento'];
        $postPaciente['foto_perfil'] = $fotoPerfil ?? ' ';
        $postPaciente['status'] = 1;

        if(!empty($id)){
            $postPaciente['id_paciente'] = _decrypt($id);
        }

        // REALIZANDO POST NO BANCO - pacientes
        if(!$idPaciente = $this->pacientes_model->salvar($postPaciente)){
            echo $this->cimsg->error("10002 - Erro ao salvar", 'Puts... deu erro!')->duration(4);
            die();
        }

        // CRIANDO ARRAY DE DADOS PARA SALVAR NO BD - paciente_endereco
        $postEndereco = [];
        $postEndereco['cep'] = $listPost['cep'];
        $postEndereco['logradouro'] = $listPost['logradouro'];
        $postEndereco['numero'] = $listPost['numero'];
        $postEndereco['complemento'] = $listPost['complemento'];
        $postEndereco['bairro'] = $listPost['bairro'];
        $postEndereco['cidade'] = $listPost['cidade'];
        $postEndereco['uf'] = $listPost['uf'];
        $postEndereco['id_paciente'] = $idPaciente;

        if(!empty($id)){
            $postPaciente['id_paciente_endereco'] = $listPost['id_paciente_endereco'];
        }

        // REALIZANDO POST NO BANCO - paciente_endereco
        if(!$idEndereco = $this->pacientes_endereco_model->save($postEndereco)){
            echo $this->cimsg->error("10001 - Erro ao salvar", 'Puts... deu erro!')->duration(4);
            die();
        };

        echo $this->cimsg->success('Paciente cadastrado com sucesso!', 'Uhuuu... Sucesso')->action('redirectUri', 'pacientes')->duration(4);
        die();
    }
}
