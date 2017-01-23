<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('CustomerOverdueModel');
        $this->auth->checkLogin();
    }
    
    public function index(){
        $data['page_number'] = 1;
        $data['page_title'] = 'Admin - homepage';
        $data['overdue'] = $this->CustomerOverdueModel->getCustomerWithOverDue();
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/homepage/index');
        $this->load->view('admin/default/footer');
    }
    
}