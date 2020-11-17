<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
    	$this->load->model('Reservas_model', 'reservas');
	}

	public function index()
	{
		$dados['reservas'] = $this->reservas->reservas();
		 
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reservas', $dados);
		$this->load->view('home/common/footer');
	}

 
}
