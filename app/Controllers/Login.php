<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\HTTP\Request;

class Login extends BaseController
{
    private $usuarios_model;

    function __construct()
    {
        $this->usuarios_model = new UsuariosModel();
    }

    // METODO RESPONSAVEL POR RENDERIZAR A TELA DE LOGIN
    public function index()
    {


//        $listPost = [];
//        $listPost['usuario'] = 'master';
//        $listPost['senha'] = md5('master');
//        $listPost['status'] = 1;
//
//        $this->usuarios_model->save($listPost);


        $data['title'] = ['modulo' => 'LOGIN', 'icone' => 'fa fa-list'];
        echo view('templates/login/header');
        echo view('/administrador/login/index', $data);
        echo view('templates/login/footer');
    }

    // METODO RESPONSAVEL PELA AUTENTICAÇÃO
    public function autenticar()
    {
        $dados = $this->request->getvar();

        $login = $this->usuarios_model->find();

        $session = session();

        if(!empty($login))
        {
            // Alerta de succeso de autenticação
            $session->setFlashdata('alert', 'success_autentication');

            // Insere variáveis na sessão
            $session->set('id_usuario', $login[0]['id_usuario']);
            $session->set('nome', $login[0]['usuario']);

            // Guarda o último acesso do usuário
            $ultimo_acesso = date('Y-m-d H:i:s');
            $request = \Config\Services::request();
            $ultimo_ip = $request->getIPAddress();
            $this->usuarios_model->set('ultimo_acesso', $ultimo_acesso)->set('ultimo_ip', $ultimo_ip)->where('id_usuario', $session->get('id_usuario'))->update();

            // Redireciona para a Dashboard do sistema
            return redirect()->to('/home');
        }
        else
        {
            // Informa que os dados estão errados
            $session->setFlashdata('alert', 'error_autentication');

            // Retorna para o login
            return redirect()->to('/login');
        }
    }

    // METODO RESPONSAVEL POR DESLOGAR
    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/login');
    }
}
