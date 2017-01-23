<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BillingController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerModel');
        $this->load->model('CustomerBillingModel');
        $this->load->library('alert');
        $this->auth->checkLogin();
    }
    
    public function index() {
        $data['page_number'] = 5;
        $data['page_title'] = 'Admin - billing';

        // Session the month you like
        if (!$this->session->has_userdata('setBillingMonth') && !$this->session->has_userdata('setBillingYear')) {
            $toSet = array(
                'setBillingMonthValue' => date('m'),
                'setBillingMonth' => date('F'),
                'setBillingYear' => date('Y')
            );
            $this->session->set_userdata($toSet);
        }

        $data["results"] = $this->CustomerModel->allCustomer();

        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/billing/index');
        $this->load->view('admin/default/footer');       
    }
    
    
    public function calculateBilling($id = 0){
        $customerId = $this->input->post('customer');
        $amount = $this->input->post('amount');
        $readingId = $this->input->post('readingId');
        $cash = $this->input->post('money');
        $this->CustomerBillingModel->pay($customerId, $amount, $readingId, $cash);
        if ($id == 0) {
            redirect(base_url().'index.php/AdminBillingController');
        } else {
            redirect(base_url().'index.php/AdminOverdueController/index');
        }
    }
    /**
     * Function to set reading date
     * @param 
     * @return array
     */
    public function setBillingDate() {
        $monthNumber = $this->input->post('billingMonth');
        $monthName = date("F", mktime(0, 0, 0, $monthNumber, 10));
        $data = array(
            'setBillingMonthValue' => $monthNumber,
            'setBillingMonth' => $monthName,
            'setBillingYear' => $this->input->post('billingYear')
        );
        $this->session->set_userdata($data);
        redirect(base_url().'index.php/AdminBillingController/index');
        exit();
    }
    
    /**
     * Function use to pay customer balance
     * @param
     * @return string
     */
    public function payBalance() {
        $id = $this->input->post('id');
        $amount = $this->input->post('amount');
        $this->CustomerBillingModel->payBalance($id, $amount);
    }
    
}