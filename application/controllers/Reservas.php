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
    	$this->load->model('Blocos_model', 'blocos');
	}

	public function index()
	{
		$dados['reservas'] = $this->reservas->reservas();
		 
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reservas', $dados);
		$this->load->view('home/common/footer');
	}

	public function minhasReservas()
	{

		$filtros['professor'] = $this->session->get_userdata()['professorId'];

		$dados['reservas'] = $this->reservas->reservas($filtros);
		 
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/minhas_reservas', $dados);
		$this->load->view('home/common/footer');
	}


	public function reservasSimples()
	{

		$filtros['simples'] = true;
		$dados['reservas'] = $this->reservas->reservas($filtros);

		$dados['disciplinas'] = $this->disciplinas->disciplinas();
		$dados['turmas'] = $this->turmas->turmas();
		$dados['laboratorios'] = $this->laboratorios->laboratorios();
		$dados['blocos'] = $this->blocos->blocos();

		$dados['dia'] = date('Y-m-d'); 
		 
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reservas_simples', $dados);
		$this->load->view('home/common/footer');
	}

	public function reservasCalendario()
	{
		$dados['usuario'] = $this->session->get_userdata('');
		$dados['reservas'] = $this->reservas->reservas();
		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reserva_calendario', $dados);
		$this->load->view('home/common/footer');
	}

	public function reservasCalendarioDia($dia)
	{
		 
		$filtros['dia'] = $dia;
		$dados['reservas'] = $this->reservas->reservas($filtros);
		$dados['disciplinas'] = $this->disciplinas->disciplinas();
		$dados['turmas'] = $this->turmas->turmas();
		$dados['blocos'] = $this->blocos->blocos();
		$dados['laboratorios'] = $this->laboratorios->laboratorios();

		$dados['dia'] = $dia; 

		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reserva_calendario_dia', $dados);
		$this->load->view('home/common/footer');
	}

	public function reservasCalendarioDiaSalvar(){
		  $dados['professorId'] = $this->session->get_userdata()['professorId'];

		  $time = new DateTime($this->input->post('inicio',TRUE));
		  $time->add(new DateInterval('PT' . 100 . 'M'));

		  $fim = $time->format('Y-m-d H:i');
 
		  $dados['inicio']    = $this->input->post('inicio',TRUE); 
		  $dados['fim']  =  $fim;
		  $dados['blocoId']    = $this->input->post('blocoId',TRUE); 
		  $dados['disciplinaId']    = (int)$this->input->post('disciplinaId',TRUE);
		  $dados['turmaId']    = (int)$this->input->post('turmaId',TRUE);
		  $dados['laboratorioId']    =(int) $this->input->post('laboratorioId',TRUE);
 
		  $this->reservas->registrar($dados);

		  if (isset($_SERVER['HTTP_REFERER']))
		  {
		  	redirect($_SERVER['HTTP_REFERER'], 'refresh');
		  }else{
		  	redirect(site_url('home'), 'refresh');
		  }

	}


	public function reservasRecorrentes()
	{

		$dia = date('Y-m-d');

		$filtros['recorrentes'] = true;
		 
		$dados['reservas'] = $this->reservas->reservas($filtros);
		$dados['disciplinas'] = $this->disciplinas->disciplinas();
		$dados['turmas'] = $this->turmas->turmas();
		$dados['blocos'] = $this->blocos->blocos();
		$dados['laboratorios'] = $this->laboratorios->laboratorios();
 
		$dados['dia'] = $dia; 

		$this->load->view('home/common/header');
		$this->load->view('home/common/menu');
		$this->load->view('home/reservas_recorrentes', $dados);
		$this->load->view('home/common/footer');
	}


	public function reservasRecorrentesSalvar(){
		  $dados['professorId'] = $this->session->get_userdata()['professorId'];

		  $time = new DateTime($this->input->post('inicio',TRUE));
		  $time->add(new DateInterval('PT' . 100 . 'M'));

		  $fim = $time->format('Y-m-d H:i');
 
		  $dados['inicio']    = $this->input->post('inicio',TRUE); 
		  $dados['fim']  =  $fim;

		  $dados['diaRecorrente']    = $this->input->post('diaRecorrente',TRUE); 
		  $dados['blocoId']    = $this->input->post('blocoId',TRUE); 
		  $dados['disciplinaId']    = (int)$this->input->post('disciplinaId',TRUE);
		  $dados['turmaId']    = (int)$this->input->post('turmaId',TRUE);
		  $dados['laboratorioId']    =(int) $this->input->post('laboratorioId',TRUE);

		   

		  $this->reservas->registrar($dados);

		  if (isset($_SERVER['HTTP_REFERER']))
		  {
		  	redirect($_SERVER['HTTP_REFERER'], 'refresh');
		  }else{
		  	redirect(site_url('home'), 'refresh');
		  }

	}

 
}
