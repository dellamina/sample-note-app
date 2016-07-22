<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {

	public function index(){
		 redirect( base_url() . 'notes' );
	}
    
    public function error(){
        $this->session->set_flashdata( 'messanger' , "Oops! Not found" );
        redirect( base_url() . 'notes' );
    }
    
    //TODO credits
    
    //TODO public home for the project
        
}
