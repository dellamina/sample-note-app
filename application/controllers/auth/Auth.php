<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login() {
		
        if($this->form_validation->run('login') == false) {
            
            $this->load->view( 'login' );
            
		}
		else {
            
            redirect( base_url().'notes' );
            
		}
        
	}
    
	function logout() {
        
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect( base_url().'login' );
        
	}
    
    function check_database($password) {
		
		$result = $this->utente_model->login( $this->input->post('username') );
        
		if($result) {
			
			if ( password_verify( $password , $result[ 'password' ] ) ){
				$this->session->set_userdata( 'logged_in', 'yes' );
				$this->session->set_userdata( 'id', $result[ 'id' ] );
				$this->session->set_userdata( 'username', $result[ 'username' ] );
				
				return true;
			}
			else {
				$this->form_validation->set_message('check_database', 'Password error');
				return false;
			}
			
		}
		else {
			$this->form_validation->set_message('check_database', 'Username not found');
			return false;
		}
        
	}
    
}
