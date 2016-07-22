<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
        'login' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required|callback_check_database'
                )
        ),
        'addnote' => array(
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'required|min_length[3]|max_length[64]'
                ),
                array(
                        'field' => 'folder',
                        'label' => 'Folder',
                        'rules' => 'required|min_length[3]|max_length[64]'
                ),
                array(
                        'field' => 'text',
                        'label' => 'Text',
                        'rules' => 'required|min_length[5]|max_length[256]'
                )
        )
);