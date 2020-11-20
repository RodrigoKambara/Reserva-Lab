<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Reservas_model extends CI_Model {

	public $tabela = "reservas";

	public function __construct() {

		parent::__construct();
		$this->db = $this->load->database('default', true);
	}


	public function reservas($filtros = []){
        
        $sqlFiltro = '';
		$sqlFiltro .= isset($filtros['dia'])? " WHERE date(inicio) = '".$filtros['dia']."' ":'';
		$sqlFiltro .= isset($filtros['recorrentes'])? " WHERE diaRecorrente !=  0 ":'';
		$sqlFiltro .= isset($filtros['simples'])? " WHERE diaRecorrente =  0 ":'';
		$sqlFiltro .= isset($filtros['professor'])? " WHERE r.professorId = '".$filtros['professor']."' ":'';

		$sql = "SELECT b.nome as bloco, lab.nome as laboratorio,  pf.nome as professor, tr.nome as turma, dc.nome as disciplina, r.inicio, r.fim, r.diaRecorrente FROM reservas r 
		left join turmas tr on tr.turmaId = r.turmaId
		left join disciplinas dc on dc.disciplinaId = r.disciplinaId
		left join professores pf on pf.professorId = r.professorId
		left join laboratorios lab on lab.laboratorioid = r.laboratorioId
		left join blocos b on b.blocoId = lab.blocoId 
		$sqlFiltro
		";
		$result = $this->db->query($sql);

		$result = $result->result() ;

		return $result; 
	}

	public function registrar($dados){
		$this->db->insert('reservas', $dados);
	}


}