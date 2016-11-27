<?php

class CustomerOverdueModel extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->overDueDayNumber = 6;
    }
    
    public function getCustomerWithOverDue($id = 0){
        date_default_timezone_set("Asia/Manila");
        $result = array();
        if ($id == 0) {
            $allCustomer = $this->getCustomer();
        } else {
            $allCustomer = $this->getOwnCustomer($id);
        }
        $customerWith = 0;
        foreach($allCustomer->result() as $customer) {
            $customerId = $customer->id;
            
            $customerName = $customer->customer_firstname.' '.$customer->customer_middlename.' '.$customer->customer_lastname;
            $customerMeterNo = $customer->customer_meter_no;
            $getReading = $this->getReading($customerId);
            
            $numberOfReading = $getReading->num_rows();
            $numberOfBilling = 0;
            if ($getReading->num_rows() > 0) {
                $overDues = 0;
                $attemp = 0;
                foreach($getReading->result() as $reading) {
                    $readingId = $reading->id;
                    $checkBilling = $this->checkBilling($readingId);
                    if ($checkBilling->num_rows() == 0){
                        $readingDATE = explode('-', $reading->customer_reading_date);
                        if (($readingDATE[0] < date('m')) && ($readingDATE[1] == date('Y')) && (date('d') >= $this->overDueDayNumber)) {
                            $result[$customerWith]['id'] = $customerId;
                            $result[$customerWith]['name'] = $customerName;
                            $result[$customerWith]['meterno'] = $customerMeterNo;
                            $result[$customerWith]['overdue'][$overDues]['customer_reading_id'] = $reading->id;
                            $result[$customerWith]['overdue'][$overDues]['customer_reading_date'] = $reading->customer_reading_date;
                            $result[$customerWith]['overdue'][$overDues]['customer_reading_amount'] = $reading->customer_reading_amount;
                            $overDues++;
                            $numberOfBilling = $overDues;
                            $attemp = 1;
                        }
                    }
                }
                if ($attemp == 1) {
                    $numberOfBilling++;
                }
            } 
            $attemp = 0;
            
            if ($numberOfBilling == $numberOfReading) {
                $customerWith++;
            }
        }
        
        return $result;
    }
    
    public function getOwnCustomer($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('customers');
        return $query;
    }
    
    public function getCustomer() {
        $query = $this->db->get('customers');
        return $query;
    }
    
    public function getReading($id) {
        $this->db->where('customer_id', $id);
        $query = $this->db->get('customer_reading');
        return $query;
    }
    
    public function checkBilling($readingId) {
        $this->db->select('id');
        $this->db->where('customer_reading_id', $readingId);
        $query = $this->db->get('customer_billing');
        return $query;
    }
    
}
