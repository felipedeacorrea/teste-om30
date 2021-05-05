<?php
namespace App\Controllers;

class Pacientes extends BaseController
{
	public function index()
	{
        $this->data['title'] = 'Pacientes';
        $this->data['description'] = 'Lista de pacientes';

		echo view('templates/principal/header');
		echo view('/administrador/pacientes/index', $this->data);
		echo view('templates/principal/footer');
	}
}
