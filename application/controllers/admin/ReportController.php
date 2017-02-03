<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->auth->checkLogin();
        $this->load->model('Customer');
        $this->load->model('CustomerReading');
    }
    
    public function index(){
        $data['page_number'] = 7;
        $data['page_title'] = 'Admin - report';

        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/report/index');
        $this->load->view('admin/default/footer');
        
    }
    
    public function generateReport($customer_id = null) {
        if (!isset($customer_id)) {
            redirect(base_url().'index.php/admin/CustomerController/viewCustomer');
        }

        $data['customer'] = $this->Customer->getInfo($customer_id);
        $data['billing'] = $this->CustomerReading->selectByCustomerId($customer_id);
        
        $this->load->view('admin/pages/report/customer-billing', $data);
    }

}