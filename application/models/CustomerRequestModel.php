<?php

class CustomerRequestModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllRequest(){
        $query = $this->db->query('SELECT `customer_request`.`id`, `customer_request`.`request`, `customer_request`.`date_send`, `customers`.`customer_firstname`, `customers`.`customer_middlename`, `customers`.`customer_lastname`, `customers`.`customer_address` FROM customer_request JOIN customers WHERE `customer_request`.`customer_id` = `customers`.`id`');
        return $query;
    }
    
    public function deleteRequest($id) {
        $this->db->where('id', $id);
        $this->db->delete('customer_request');
    }
}
