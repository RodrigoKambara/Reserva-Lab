<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct()
	{
        parent::__construct();
        $this->load->model('Usuarios_model', 'usuarios');

	}

	public function index()
	{
		$dados = [];
		$this->load->view('home/login', $dados);
	}

    public function login(){

        $usuario    = $this->input->post('usuario',TRUE);
        $senha = md5($this->input->post('senha',TRUE));

        $validate = $this->usuarios->validate($usuario,$senha);

        
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();

            $sesdata = array(
                'usuarioId'  => $data['usuarioId'],
                'professorId'  => $data['professorId'],
                'email'     => $data['email'],
                'nome'     => $data['usuario']
            );


            $this->session->set_userdata($sesdata);


            redirect(site_url('/home'), 'refresh');

        }else{

            $dados['message'] = 'Dados Incorretos.';
        }

        $this->load->view('home/login',$dados);
    }

    public function logout(){
        $this->session->userdata = [];
        redirect('/');
    }
 
}
