 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Permission
{
   function initialize() {
       $ci =& get_instance();
       $ci->load->helper('language');

       $usuario = $ci->session->get_userdata('');
       
       $public_notalowed = ['Admin'];
       $user_notalowed = ['AdminMaster'];
   

       //Rules
 
   }
}