<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Turmas_model extends CI_Model {

    public $tabela = "turmas";

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function turmas(){
    	$sql = "SELECT * FROM turmas";
    	$result = $this->db->query($sql);
		$result = $result->result() ;
		return $result; 
    }


}