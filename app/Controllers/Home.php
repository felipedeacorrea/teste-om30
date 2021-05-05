<?php
namespace App\Controllers;

class Home extends BaseController
{
    // METODO RESPONSAVEL POR RENDERIZAR A HOME/DASHBOARD
	public function index()
	{
        $this->data['title'] = 'Dashboard';
        $this->data['description'] = 'Dashboard AppClicar';

		echo view('templates/principal/header');
		echo view('/administrador/home/index', $this->data);
		echo view('templates/principal/footer');
	}
}
