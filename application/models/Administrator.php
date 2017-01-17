<?php

class Administrator extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function checkLoginData($loginData) {
        $check = $this->db->get_where('admin', $loginData);
        if  ($check->num_rows() > 0) {
            $data = array(
                'valid' => 'true',
                'data' => $check->row()
            );
        } else {
            $data = array('valid' => 'false');
        }
        return $data;
    }
    
    public function login($loginData) {
        $check = $this->db->get_where('admin', $loginData);
        
        if ($check->num_rows() > 0) {
            
            $row = $check->row();
            $loginToken = $this->random->generateRandomString(50);
            date_default_timezone_set("Asia/Manila");
            $session = array(
                'AdminId' => $row->id,
                'AdminFirstname' => $row->admin_firstname,
                'AdminLastname' => $row->admin_lastname,
                'AdminEmail' => $row->admin_email,
                'AdminToken' => $loginToken
            );
            $this->db->where('admin_id', $row->id);
            $this->db->update('admin_logs', array('admin_last_login' => date('Y-m-d h:i:s'), 'admin_token' => $loginToken));
            $response = array('valid' => true, 'data' => $session);
        } else {
            $response = array('valid' => false);
        }
        return $response;
        
    }
}
