<?php

class Notice extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'notices';
    }
    
    public function getAll() {
        $query = $this->db->query(
                'SELECT '
                . $this->table.'.`id`, '
                . $this->table.'.`note`, '
                . $this->table.'.`modified_by`, '
                . $this->table.'.`date_created`, '
                . $this->table.'.`date_modified`, '
                . $this->table.'.`status`, '
                . '`admin`.`admin_firstname`, '
                . '`admin`.`admin_lastname` '
                . 'FROM '
                . $this->table
                . ' JOIN '
                . 'admin '
                . 'WHERE '
                . $this->table.'.`created_by` = `admin`.`id`');
        return $query->result();
    }
    
    public function insertData($data) {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows()) ? true : false;
    }
    
    public function deleteById($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return ($this->db->affected_rows()) ? true : false;
    }
    
    public function changeStatusById($id, $data){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows()) ? true : false;
    }
    
    public function getInfoById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
    public function updateData($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows()) ? true : false;
    }
    
}