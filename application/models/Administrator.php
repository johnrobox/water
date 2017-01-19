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
    
    public function loginLog($id, $login_time, $token) {
        $this->db->where('admin_id', $id);
        $this->db->update('admin_logs', array('admin_last_login' => $login_time, 'admin_token' => $token));
        $result = ($this->db->affected_rows() > 0) ? true : false;
        return $result;
    }
    
}
