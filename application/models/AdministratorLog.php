<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorLog extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'admin_logs';
    }
    
    public function insertLog($data) {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() != 0) ? true : false;
    }
    
    public function update($id, $data) {
        $this->db->where('admin_id', $id);
        $this->db->update($this->table, $data);
        $result = ($this->db->affected_rows() != 0) ? true : false;
        return $result;   
    }
}