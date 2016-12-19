<?php

class CustomerModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function countCustomer() {
        return $this->db->count_all("customers");
    }
    
    public function allCustomer() {
        $query = $this->db->query("SELECT 
            customers.id,
            customers.customer_firstname,
            customers.customer_middlename,
            customers.customer_lastname,
            customers.customer_email,
            customers.customer_meter_no,
            customers.customer_address,
            customers.customer_contact,
            customers.customer_birthdate,
            customer_logs.customer_status
            FROM customers JOIN customer_logs ON customers.id = customer_logs.customer_id");
        return $query->result();

        
    }
    
    public function changeStatus($data) {
        $this->db->where('customer_id', $data['id']);
        $change = $this->db->update('customer_logs', array('customer_status' => $data['status']));
        $response['valid'] = ($change)? true : false;
        return $response;
    }
    
    public function add($customer) {
        $this->db->insert('customers', $customer);
        $check = $this->db->get_where('customers', array('customer_meter_no' => $customer['customer_meter_no']));
        $row = $check->row();
        date_default_timezone_set("Asia/Manila");
        $log = array(
            'customer_id' => $row->id,
            'customer_status' => 1,
            'customer_date_created' => date('Y-m-d h:i:s')
        );
        $balance = array(
            'customer_id' => $row->id,
            'balance_amount' => 0
        );
        $this->db->insert('customer_logs', $log);
        $this->db->insert('balance', $balance);
        return true;
    }
    
    public function update($id,$data){
        $this->db->where('id',$id);
        $result = $this->db->update('customers', $data);
        $response['valid'] = ($result)? true : false;
        return $response;
    }
    
}