<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'admin';
    }
    
    public function getAll() {  
        $data = $this->db->get($this->table);
        return $data->result();
    }
    
    public function addAdmin($data) {
        $this->db->insert($this->table, $data);
        $result = ($this->db->affected_rows() != 0) ? $this->db->insert_id() : 0;
        return $result;      
    }
    
    public function getById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
        
}
