<?php


class CustomerRequest extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = "customer_requests";
    }
    
    public function getAll() {
        $query = $this->db->query(
                'SELECT '
                . $this->table.'.`id`, '
                . $this->table.'.`request`, '
                . $this->table.'.`date_send`, '
                . '`customers`.`customer_firstname`, '
                . '`customers`.`customer_middlename`, '
                . '`customers`.`customer_lastname`, '
                . '`customers`.`customer_address` '
                . 'FROM '
                . $this->table
                . ' JOIN '
                . 'customers '
                . 'WHERE '
                . $this->table.'.`customer_id` = `customers`.`id`');
        return $query;
    }
    
    public function deleteById($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return ($this->db->affected_rows()) ? true : false;
    }
    
}