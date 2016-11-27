<?php

class Customer extends CI_Model {
	
	public function __construct() {
		$this->table = 'customers';
	}

	public function getInfo($customer_id) {
		$this->db->where('id', $customer_id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function getSingleData($customer_id) {
		$this->db->where('id', $customer_id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function updateCustomerById($id, $data) {
		$sql = "SELECT id FROM customers WHERE id != ? AND customer_meter_no = ?";
		$query = $this->db->query($sql, array($id, $data['customer_meter_no']));
		if ($query->num_rows() == 0){
			$this->db->where("id", $id);
			$this->db->update("customers", $data);
			$result['updated'] = true;
		} else {
			$result = array(
				'udpated' => false,
				'error' => 'Meter number is already exist.'
				);
		}
		return $result;
	}
	
	public function changeCustomerStatus() {

	}
	
}