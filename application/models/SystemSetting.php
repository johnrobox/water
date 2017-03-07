<?php

class SystemSetting extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = "system_settings";
        $this->per_cubic_id = 1;
        $this->minimum_id = 2;
    }
    
    public function udpateSetting($value, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array('value' => $value));
        return ($this->db->affected_rows()) ? true : false;
    }
    
    public function getPerCubic() {
        return $this->getData($this->per_cubic_id);
    }
    
    public function getMinimumAmount() {
        return $this->getData($this->minimum_id);
    }
    
    private function getData($id) {
        $this->db->where('id', $id);
        $result = $this->db->get($this->table);
        $data = $result->row();
        return $data->value;
    }
    
}