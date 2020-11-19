<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public $tabela =  "usuarios";

    public function __construct() {

        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    function validate($usuario,$senha){
        $this->db->where('usuario',$usuario);
        $this->db->where('senha',$senha);
        $result = $this->db->get('usuarios',1);

        if($result->num_rows() > 0){
            $data  = $result->row_array();
            
        }

        return $result;
      }


}