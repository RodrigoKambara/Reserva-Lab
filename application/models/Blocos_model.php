<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blocos_model extends CI_Model {

    public $tabela = "blocos";

    public function __construct() {

        parent::__construct();
        $this->db = $this->load->database('default', true);
    }


    public function blocos(){
        $sql = "SELECT * FROM blocos";
        $result = $this->db->query($sql);

        $result = $result->result() ;

        return $result; 
    }


}