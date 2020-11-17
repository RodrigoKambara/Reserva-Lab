<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laboratorios_model extends CI_Model {

    public $tabela = "laboratorios";

    public function __construct() {

        parent::__construct();
        $this->db = $this->load->database('default', true);
    }


    public function laboratorios(){
    	$sql = "SELECT * FROM laboratorios";
    	$result = $this->db->query($sql);

		$result = $result->result() ;

		return $result; 
    }


}