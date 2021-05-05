<?php
namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

        $pedidos = $this->database->getReference("Pedidos")->getSnapshot();

        $arrPedidos = $pedidos->getValue();


        $this->data['title'] = 'Dashboard';
        $this->data['description'] = 'Dashboard AppClicar';
        $this->data['dados'] = [
            'listPedidos' => $arrPedidos ?? null
        ];

		echo view('templates/principal/header');
		echo view('home/index', $this->data);
		echo view('templates/principal/footer');
	}
}
