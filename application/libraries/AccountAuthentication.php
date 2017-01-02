<?php

class AccountAuthentication {
    
    public function __construct() {
        
    }
    
    public function adminLogin() {
//       $response = ( $this->session->has_userdata('AdminId') &&
//             $this->session->has_userdata('AdminFirstname') &&
//             $this->session->has_userdata('AdminLastname') &&
//             $this->session->has_userdata('AdminEmail') &&
//             $this->session->has_userdata('AdminToken')
//            ) ? true : false;     
        $response = ($this->session->has_userdata('AdminId'));
        return true;
    }
    
}
?>
