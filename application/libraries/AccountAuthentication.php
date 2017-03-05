<?php

class AccountAuthentication {
    
    public function __construct() {
        $this->ses =& get_instance();
        $this->base = base_url().'index.php/admin/';
    }
    
    public function checkLogin() {    
        if ( !$this->ses->session->has_userdata('AdminId') ||
             !$this->ses->session->has_userdata('AdminFirstname') ||
             !$this->ses->session->has_userdata('AdminLastname') ||
             !$this->ses->session->has_userdata('AdminEmail') ||
             !$this->ses->session->has_userdata('AdminToken')
            ) {
            $this->forceLogout();
            redirect(base_url().'admin');
        }  
    }
    
    public function checkAuth(){
        if ( $this->ses->session->has_userdata('AdminId') &&
             $this->ses->session->has_userdata('AdminFirstname') &&
             $this->ses->session->has_userdata('AdminLastname') &&
             $this->ses->session->has_userdata('AdminEmail') &&
             $this->ses->session->has_userdata('AdminToken')
            ) {
            redirect($this->base.'DashboardController/index');
        } 
    }
    
    public function forceLogout(){
        $adminUser = array(
            'AdminId' => '',
            'AdminFirstname' => '',
            'AdminLastname' => '',
            'AdminEmail' => '',
            'AdminToken' => ''
        );
        $this->ses->session->unset_userdata($adminUser);
        $this->ses->session->sess_destroy();
    }   
}

?>
