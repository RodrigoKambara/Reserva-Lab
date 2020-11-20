 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Permission
{
   function initialize() {
       $ci =& get_instance();
       $ci->load->helper('language');

       $usuario = $ci->session->get_userdata('');

       $public_notalowed = ['home','reservas','dashboard','reservascalendario','laboratorios'];

     
       
        if(!isset($usuario['usuarioId']) && in_array(strtolower($ci->router->class), $public_notalowed) ){
        redirect(site_url('/login'), 'refresh');
        die;
       }
 
   }
}