<?php



class SystemSetting extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = "system_settings";
    }
    
    public function getPerCubic() {
        $this->db->where('id', 1);
        $result = $this->db->get($this->table);
        return $result->row();
    }
           
    public function udpateSetting($value, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array('value' => $value));
        return ($this->db->affected_rows()) ? true : false;
    }
    
}