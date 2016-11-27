<?php

class CustomerReadingModel extends CI_Model {
    
    public function reading($data) {
        $response['inserted'] = ($this->db->insert('customer_reading',$data)) ? true : false;
        return $response;
    }
    
    public function edit($id, $amount) {
        $this->db->where('id', $id);
        $query = $this->db->update('customer_reading', array('customer_reading_amount' => $amount));
        $response['valid'] = ($query)? true : false;
        return $response;
    }
    
}
