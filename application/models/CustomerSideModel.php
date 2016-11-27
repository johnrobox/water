<?php

class CustomerSideModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function update($contact, $email, $birthdate) {
        $data = array(
            'customer_contact' => $contact,
            'customer_email' => $email,
            'customer_birthdate' => $birthdate
        );
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('customers', $data);
    }
    
    public function getMyInfo() {
        $this->db->select('customer_email, customer_contact, customer_birthdate ');
        $this->db->where('id', $this->session->userdata('id'));
        $query = $this->db->get('customers');
        $info = $query->row();
        $result = array(
            'email' => $info->customer_email,
            'contact' => $info->customer_contact,
            'birthdate' => $info->customer_birthdate
        );
        return $result;
    }
    
    public function sendRequest($request) {
        $data = array(
            'customer_id' => $this->session->userdata('id'),
            'request' => $request,
            'date_send' => date('Y-m-d h:i:s')
        );
        $this->db->insert('customer_request', $data);
        return true;
    }
    
    public function notice() {
        $query = $this->db->get('notice');
        if ($query->num_rows() > 0) {
            $notice = $query->row();
            return $notice->note;
        } else {
            return '';
        }
    }
    
    public function paymentAndBilling() {
        $this->db->where('customer_id', $this->session->userdata('id'));
        $query = $this->db->get('customer_reading');
        $report = array();
        $i = 0;
        //$query = $this->db->query('SELECT * FROM customer_reading WHERE customer_id = '.$this->session->userdata("id").' ORDER BY id DESC');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $id = $row->id;
                $readingAmount = $row->customer_reading_amount;
                $billing = $this->billing($id);
                
                if ($billing['paid']) {
                    $balance = $billing['amount'] - $readingAmount; 

                    if ($i == 0) {
                        $current = $balance;
                    } else {
                        $current = $current + $balance;
                    }

                    if ($current > 0) {
                        $type = 'deposit';
                    } else {
                        $type = 'balance';
                    }


                    $report[$i] = array(
                        'readingDate' => $row->customer_reading_date,
                        'readingAmount' => $readingAmount,
                        'payAmount' => $billing['amount'],
                        'payDate' => $billing['date'],
                        'balance' => array(
                            'type' => $type,
                            'balanceAmount' => $current
                        )
                    );
                    $i++;
                }
            }
        }
        return $report;
    }
    
    public function billing($id) {
        $this->db->where('customer_reading_id', $id);
        $query = $this->db->get('customer_billing');
        if ($query->num_rows() > 0) {
            $billing = $query->row();
            $paidAmount = $billing->paid_amount;
            $paidDate = $billing->paid_date;
            $response = array(
                'paid' => true,
                'amount' => $paidAmount,
                'date' => $paidDate
            );
        } else {
            $response['paid'] = false;
        }
        return $response;
    }
    
    public function authorize($meterNo) {
        $this->db->where('customer_meter_no', $meterNo);
        $query = $this->db->get('customers');
        $result = array();
        if ($query->num_rows() > 0) {
            foreach($query->result() as $row):
                $result['id'] = $row->id;
                $result['name'] = $row->customer_firstname.' '.$row->customer_middlename.' '.$row->customer_lastname;
                $result['meter'] = $row->customer_meter_no;
                $result['address'] = $row->customer_address;
                $result['contact'] = $row->customer_contact;
                $result['email'] = $row->customer_email;
                $result['valid'] = true;
            endforeach;
        } else {
            $result['valid'] =  false;
        }
        return $result;
    }
    
    public function getLatestReading() {
        $customerId = $this->session->userdata('id');
        $query = $this->db->query('SELECT * FROM customer_reading WHERE customer_id = '.$customerId.' ORDER BY id DESC LIMIT 1');
        return $query;
    }
}
