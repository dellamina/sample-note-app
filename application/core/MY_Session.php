<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ) ;

class MY_Session extends CI_Session {

	public function __construct() {
		parent::__construct();
	}

	function sess_destroy() {

		parent::sess_destroy();
		
		$this->messanger->set( 'Your session has expired!' ) ;
		
		redirect( base_url().'login' );
		
	}

}