<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerBillingModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function pay($customerId, $amount, $readingId, $cash){
        date_default_timezone_set("Asia/Manila");
        $balance = $amount - $cash;
        $forPay =  array(
            'customer_reading_id' => $readingId,
            'paid_amount' => $cash,
            'paid_date' => date('Y-m-d h:i:s')
        );
        $this->db->insert('customer_billing', $forPay);
        
        $this->db->where('customer_id', $customerId);
        $this->db->update('balance', array('balance_amount' => $balance));
    }
    
    public function payBalance($id, $amount) {
        $this->db->select('balance_amount');
        $getBalance = $this->db->get_where('balance', array('id' => $id));
        if ($getBalance->num_rows() > 0) {
            $currentBalanceAmount = $getBalance->row();
            $balanceAmount = $currentBalanceAmount->balance_amount;
            $nowBalance = $balanceAmount - $amount;
            $this->db->where('id', $id);
            $this->db->update('balance', array('balance_amount' => $nowBalance));
        }
    }
}
