<?php

class CustomerNoticeModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function notice(){
        $query = $this->db->get('notice');
        $notice = $query->row();
        $data = array(
            'id' => $notice->id,
            'note' => $notice->note
        );
        return $data;
    }
    
    public function updateNotice($id, $notice) {
        $this->db->where('id', $id);
        $this->db->update('notice', array('note' => $notice));
    }
}