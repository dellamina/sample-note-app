<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Notes extends MY_Controller {

	public function index() {
		
        if( $this->form_validation->run( 'addnote' ) == false ) {
            
            $data[ 'notes' ] = $this->note_model->readall( $this->session->userdata( 'id' ) );
            $data[ 'folder' ] = $this->note_model->readfolder( $this->session->userdata( 'id' ) );
            $this->load->view( 'notes/notes' , $data );
            
		} else {
            
            $data[ 'userid' ] = $this->session->userdata( 'id' );
            $data[ 'title' ] = $this->input->post( 'title' );
            $data[ 'text' ] = $this->input->post( 'text' );
            $data[ 'folder' ] = $this->input->post( 'folder' );
            $result = $this->note_model->create( $data );
            
            if ( $result ){
                $this->session->set_flashdata( 'messanger' , 'Success!' ) ;
                redirect( base_url() . 'note/' . $result );
            } else {
                $this->session->set_flashdata( 'messanger' , 'Fatal error!' );
                $this->load->view( 'notes/notes' );
            }
            
		}
	}
    
    public function view( $id ) {
        
        $data[ 'note' ] = $this->note_model->readone( $id, $this->session->userdata( 'id' ) );
        if ( $data[ 'note' ] ){
            
            if($this->form_validation->run( 'addnote' ) == true) {
                
                $note[ 'id' ] = $id;
                $note[ 'userid' ] = $this->session->userdata( 'id' );
                $note[ 'title' ] = $this->input->post( 'title' );
                $note[ 'text' ] = $this->input->post( 'text' );
                $note[ 'folder' ] = $this->input->post( 'folder' );
                $this->note_model->update( $note );
                $this->session->set_flashdata( 'messanger' , 'Note updated!' );
                //to show flash data only once I need to make a redirect and not a render :(
                redirect( base_url() . 'note/' . $id );
                
            }
            $data[ 'folder' ] = $this->note_model->readfolder( $this->session->userdata( 'id' ) );
            $this->load->view( 'notes/detail', $data );
            
        } else {
            $this->session->set_flashdata( 'messanger' , "Oops! Not found" );
            redirect( base_url() . 'notes' );
        }
        
	}
    
    public function delete( $id ) {
        
        $result = $this->note_model->delete( $id, $this->session->userdata( 'id' ) );
        if ( ! $result ){
            $this->session->set_flashdata( 'messanger' , 'Fatal error!' );
            redirect( base_url() . 'notes' );
        }
        $this->session->set_flashdata( 'messanger' , 'Note deleted!' ) ;
        redirect( base_url() . 'notes' );
    }
    
}
