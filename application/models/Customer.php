<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Model {
	
	public function __construct() {
		$this->table = 'customers';
	}

	
	public function addCustomer($customer) {
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
	
	public function getInfo($customer_id) {
            $this->db->where('id', $customer_id);
            $query = $this->db->get($this->table);
            return $query->row();
	}
        
        public function getAll($condition = null) {
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
            FROM customers JOIN customer_logs ON customers.id = customer_logs.customer_id ". $condition);
            return $query->result();
        }
        
        public function findPreviousNextById($id, $states, $operator) {
            $query = $this->db->query("select * from ".$this->table." where id = (select $states(id) from ".$this->table." where id ".$operator." ".$id.")");
            $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
            $result['customer'] = $query->result();
            return $result;
        }

        public function getFirstLastId($states){
            $query = $this->db->query("SELECT id FROM ".$this->table." WHERE id=(SELECT ".$states."(id) FROM ".$this->table.")");
            $row = $query->row();
            return (isset($row)) ? $row->id : false;
        }

	public function getSingleData($customer_id) {
		$this->db->where('id', $customer_id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function updateCustomerById($id, $data) {
            $this->db->where("id", $id);
            $this->db->update($this->table, $data);
            return ($this->db->affected_rows()) ? true : false;
	}
        
        public function checkMeterNoExist($id, $meter_number) {
            $sql = "SELECT id FROM customers WHERE id != ? AND customer_meter_no = ?";
            $query = $this->db->query($sql, array($id, $meter_number));
            return ($query->num_rows()) ? true :  false;
        }
	
	public function changeCustomerStatus($id, $status) {
            $this->db->where('customer_id', $id);
            $this->db->update('customer_logs', array('customer_status' => $status));
            return ($this->db->affected_rows()) ? true : false;
	}
	
}