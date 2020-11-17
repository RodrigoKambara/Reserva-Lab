<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dados = [];
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/home', $dados);
		$this->load->view('home/common/footer');
	}

 
}
