<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorios extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
    	$this->load->model('Laboratorios_model', 'laboratorios');
	}

	public function index()
	{
		$dados['laboratorios'] = $this->laboratorios->laboratorios();
		 
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/laboratorios', $dados);
		$this->load->view('home/common/footer');
	}

 
}
