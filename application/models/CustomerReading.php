<?php

class CustomerReading extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'customer_readings';
    }
    
    public function insertData($data) {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows()) {
            $result = array(
                'inserted' => true,
                'inserted_id' => $this->db->insert_id()
            );
        } else {
            $result = array('inserted' => false);
        }
        return $result;
    }
    
    public function selectByCustomerId($customer_id) {
        $this->db->where('customer_id', $customer_id);
        $query = $this->db->get($this->table);
        return $query->result();
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
    
    public function selectOverdue($date, $id = null) {
        $this->db->select("customer_id, customer_reading_amount, customer_reading_date");
        $this->db->where('customer_reading_month_cover', $date);
        $this->db->where('customer_billing_flag', 0);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
}
