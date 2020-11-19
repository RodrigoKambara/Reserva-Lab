<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Disciplinas_model extends CI_Model {

    public $tabela = "disciplinas";

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function disciplinas(){
    	$sql = "SELECT * FROM disciplinas";
    	$result = $this->db->query($sql);
		$result = $result->result() ;
		return $result; 
    }


}