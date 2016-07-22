<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ) ;

class Utente_model extends CI_Model {
	
	//Login
	function login( $username ) {
		
		$this->db->select( 'password, id, username' ) ;
		$this->db->from( 'users' ) ;
		$this->db->where( 'username', $username ) ;
		$query = $this->db->get() ;
			
		if( $query->num_rows() == 1 ) {
			return  $query->row_array();
		}
		else {
			return false;
		}
		
	}
	
}