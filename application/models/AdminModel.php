<?php

class AdminModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function checkAuthentication() {
        if ( $this->session->has_userdata('AdminId') &&
             $this->session->has_userdata('AdminFirstname') &&
             $this->session->has_userdata('AdminLastname') &&
             $this->session->has_userdata('AdminEmail') &&
             $this->session->has_userdata('AdminToken')
            ) {
        $response['valid'] = true;    
        } else {
        $response['valid'] = false;   
        }
        return $response;
    } 
    
    public function addAdmin($array){
        $this->db->insert('admin', $array);
        $id = $this->getId($array['admin_email'], $array['admin_password']);
        $log = array(
            'admin_id' => $id,
            'admin_role' => 1,
            'admin_status' => 1,
            'admin_date_created' => date('Y-m-d h:i:s'),
            'admin_date_modified' => date('Y-m-d h:i:s')
        );
        $this->db->insert('admin_logs', $log);
        return true;
    }
    
    public function getId($email, $password) {
        $query = $this->db->query("SELECT id FROM admin WHERE admin_email = '$email' AND admin_password = '$password'");
        $row = $query->row();
        return $row->id;
    }
    
    public function countAdmin() {
        return $this->db->count_all("admin");
    }
    
    public function allAdmin($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("admin");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}
