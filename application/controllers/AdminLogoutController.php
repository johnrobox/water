<?php

class AdminLogoutController extends CI_Controller {
    
    public function index(){
        $adminUser = array(
            'AdminId' => '',
            'AdminFirstname' => '',
            'AdminLastname' => '',
            'AdminEmail' => '',
            'AdminToken' => ''
        );
        $this->session->unset_userdata($adminUser);
        $this->session->sess_destroy();
        redirect(base_url().'index.php/admin');
        exit();
    }
}
