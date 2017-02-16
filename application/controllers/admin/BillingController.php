<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BillingController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer');
        $this->load->model('CustomerReading');
        $this->load->model("Administrator");
        $this->load->library('alert');
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
        $this->account = $this->Administrator->getById($this->login_id);
    }
    
    public function index() {
        $data['script'] = array('customer_billing');
        $data['page_number'] = 5;
        $data['page_title'] = 'Admin - billing';
        $data['account'] = $this->account;
        // Session the month you like
        if (!$this->session->has_userdata('setBillingMonth') && !$this->session->has_userdata('setBillingYear')) {
            $toSet = array(
                'setBillingMonthValue' => date('m'),
                'setBillingMonth' => date('F'),
                'setBillingYear' => date('Y')
            );
            $this->session->set_userdata($toSet);
        }
        $condition = "WHERE customer_status !=0";   
        $data["results"] = $this->Customer->getAll($condition);

        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/billing/index');
        $this->load->view('admin/modals/billing/mark-as-paid');
        $this->load->view('admin/modals/billing/mark-as-unpaid');
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/default/footer');       
    }
    
    public function payBilling() {
        $id = $this->input->post('id');
        $amount = $this->input->post('amount');
        date_default_timezone_set("Asia/Manila");
        $paid_date = date('Y-m-d h:i:s');
        $data = array(
            'customer_billing_amount' => $amount,
            'customer_billing_date' => $paid_date,
            'customer_billing_flag' => 1
        );
        $result = $this->CustomerReading->updateById($id, $data);
        if ($result ==  false) {
            $response = array(
                'error' => true,
                'message' => 'System cannot process request! Please contact administrator!'
            );
        } else {
            $response = array('error' => false, 'date' => $paid_date);
        }
        echo json_encode($response);
    }
    
    public function unPayBilling() {
        $id = $this->input->post('id');
        $paid_date = date('Y-m-d h:i:s');
        $data = array(
            'customer_billing_amount' => '',
            'customer_billing_date' => '',
            'customer_billing_flag' => 0
        );
        $result = $this->CustomerReading->updateById($id, $data);
        if ($result ==  false) {
            $response = array(
                'error' => true,
                'message' => 'System cannot process request! Please contact administrator!'
            );
        } else {
            $response = array('error' => false, 'date' => $paid_date);
        }
        echo json_encode($response);
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
            'setBillingMonthValue' => sprintf('%02d', $monthNumber),
            'setBillingMonth' => $monthName,
            'setBillingYear' => $this->input->post('billingYear')
        );
        $this->session->set_userdata($data);
        redirect(base_url().'index.php/admin/BillingController/index');
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
    
    
    public function singleReport($customer_id = null) {
        if (!isset($customer_id)) {
            redirect(base_url().'index.php/admin/CustomerController/viewCustomer');
        }
        $data['page_number'] = 0;
        $data['script'] = array('customer-report');
        $data['customer'] = $this->Customer->getInfo($customer_id);
        $data['billing'] = $this->CustomerReading->selectByCustomerId($customer_id);
        $data['account'] = $this->account;
        
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/billing/single-report');
        $this->load->view('admin/modals/billing/mark-as-paid');
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/default/footer');
    }
    
}