<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
    	$this->load->model('Reservas_model', 'reservas');
    	$this->load->model('Disciplinas_model', 'disciplinas');
    	$this->load->model('Turmas_model', 'turmas');
    	$this->load->model('Laboratorios_model', 'laboratorios');

	}

	public function index()
	{
		$dados['reservas'] = $this->reservas->reservas();
		 
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reservas', $dados);
		$this->load->view('home/common/footer');
	}

	public function reservasCalendario()
	{
		$dados['reservas'] = $this->reservas->reservas();
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reserva_calendario', $dados);
		$this->load->view('home/common/footer');
	}

	public function reservasCalendarioDia($dia)
	{
		 
		$dados['reservas'] = $this->reservas->reservas($dia);
		$dados['disciplinas'] = $this->disciplinas->disciplinas($dia);
		$dados['turmas'] = $this->turmas->turmas($dia);
		$dados['laboratorios'] = $this->laboratorios->laboratorios($dia);

		$dados['dia'] = $dia; 

		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reserva_calendario_dia', $dados);
		$this->load->view('home/common/footer');
	}

	public function reservasCalendarioDiaSalvar(){
		  $professorId = 1;
		  $dados['inicio']    = $this->input->post('inicio',TRUE); 
		  $dados['fim']  =  date($dados['inicio'] , strtotime('+2 hours'));
		  $dados['disciplinaId']    = (int)$this->input->post('disciplinaId',TRUE);
		  $dados['turmaId']    = (int)$this->input->post('turmaId',TRUE);
		  $dados['laboratorioId']    =(int) $this->input->post('laboratorioId',TRUE);

		  $this->reservas->registrar($dados);
		  redirect(site_url('home'), 'refresh');


	}

 
}
