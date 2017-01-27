<?php

class CustomerReading extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'customer_readings';
    }
    
    public function insertData($data) {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows()) ? true : false;
    }
    
    
}
