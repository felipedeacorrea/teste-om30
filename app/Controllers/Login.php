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
