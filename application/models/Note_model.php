<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ) ;

class Note_model extends CI_Model {
	
    //CRUD Create
	function create( $data ) {
	
        $this->db->insert( 'notes', $data );
        return $this->db->insert_id();
        
	}
    
    //CRUD Read - one
	public function readone( $id, $userid ) {
		
		$query = $this->db->get_where( 'notes', array( 'id' => $id , 'userid' => $userid ) );
		return $query->row_array();
		
	}
    
    //CRUD Read - all
	public function readall( $userid ) {
		
		$query = $this->db->get_where( 'notes', array( 'userid' => $userid ) );
		return $query->result_array();
		
	}
    
    //CRUD Update
    public function update( $note ){
        
        $this->db->set( $note );
        $this->db->where( 'id', $note['id'] );
        return $this->db->update( 'notes' );
        
    }
    
    //CRUD Delete
    public function delete( $id, $userid ){
        
        $this->db->where( array( 'id' => $id, 'userid' => $userid ) );
		return $this->db->delete( 'notes' ) ;
        
    }
    
    public function readfolder( $userid ) {
		
        $this->db->select( 'folder' ) ;
        $this->db->distinct();
		$query = $this->db->get_where( 'notes', array( 'userid' => $userid ) );
		return $query->result_array();
		
	}
    
    
	
	
}