<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Admin
 * 
 * @package   
 * @author ornament
 * @copyright Vivekanand
 * @version 2016
 * @access public
 */
class Admin extends CI_Controller {
       /**
        * Admin::__construct()
        * 
        * @return
        */
       public function __construct() {
               parent::__construct();
               $this->load->model('Auth_model');
        }
       /**
        * Admin::index()
        * 
        * @return
        */
       public function index(){
        $this->sign_in();
       }
	
       /**
        * Admin::login()
        * 
        * @return
        */
       public function login(){
           $this->form_validation->set_rules('username','Username','required');
           $this->form_validation->set_rules('password','Password','required');
            
            if ($this->form_validation->run() == FALSE){
		      echo'<div class="alert alert-dismissable alert-danger"><small>'. validation_errors().'</small></div>';
            }else{
                $name = $this->input->post('username');
                $password = $this->input->post('password');
                if($this->Auth_model->auth($name, $password)){
                }else{
                    echo'<div class="alert alert-dismissable alert-danger"><small>Please Check Username or Password</small></div>';
                }
            }
        }
        
       /**
        * Admin::logout()
        * 
        * @return
        */
       public function logout(){
            $this->session->sess_destroy();
            delete_cookie();
            redirect('admin/' ,'refresh');
            exit;
        }
       /**
        * Admin::sign_in()
        * 
        * @return
        */
        public function sign_in(){
            $this->load->view('admin/view_login');   
        }
       /**
        * Admin::sign_up()
        * 
        * @return
        */
        public function sign_up()
        {
            $this->load->view('view_register');  
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
