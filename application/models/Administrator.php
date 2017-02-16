<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'admin';
    }
    
    public function login($data) {
        $check = $this->db->get_where($this->table, $data);
        if ($check->num_rows() > 0) {
            $row = $check->row();
            $result = array(
                'valid' => true,
                'data' => $row
            );
        } else {
            $result['valid'] = false;
        }
        return $result;
    }
    
    public function getAll() {  
        
        $query = $this->db->query(
                'SELECT '
                . $this->table.'.`id`, '
                . $this->table.'.`admin_firstname`, '
                . $this->table.'.`admin_lastname`, '
                . $this->table.'.`admin_email`, '
                . $this->table.'.`admin_gender`, '
                . $this->table.'.`admin_birthdate`, '
                . $this->table.'.`admin_image`, '
                . '`admin_logs`.`admin_role`, '
                . '`admin_logs`.`admin_status`, '
                . '`admin_logs`.`admin_last_login`, '
                . '`admin_logs`.`admin_last_logout` '
                . 'FROM '
                . $this->table
                . ' JOIN '
                . 'admin_logs '
                . 'WHERE '
                . $this->table.'.`id` = `admin_logs`.`admin_id`');
        return $query->result();
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
    
    public function updateById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows()) ? true : false;
    }
    
    public function selectById($id, $fields) {
        $this->db->select($fields);
        $this->db->where('id', $id);
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = array(
                'select' => true,
                'data' => $query->row()
            );
        } else {
            $result['select'] = false;
        }
        return $result;
    }
    
    public function getOldProfile($id) {
        $this->db->where('id', $id);
        $this->db->select(array('admin_image'));
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            $result = array(
                'had_profile' => true,
                'image_profile' => $query->row()
            );
        } else {
            $result['had_profile'] = false;
        }
        return $result;
    }
    
    public function updateProfile($id, $image) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array('admin_image' => $image));
        return ($this->db->affected_rows()) ? true : false;
    }
        
}
