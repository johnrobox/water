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
    
    public function selectData($id, $fields) {
        $this->db->select($fields);
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() == 0) {
            $result['select'] = false;
        } else {
            $result = array(
                'select' => true,
                'data' => $query->row()
            );
        }
        return $result;
    }
    
    public function updateById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows()) ? true : false;
    }
    
}
