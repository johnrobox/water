<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OverdueController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerOverdueModel');
        $this->auth->checkLogin();
    }
    
    public function index() {
        $data['page_number'] = 6;
        $data['page_title'] = 'Admin - overdue';
        $data['overdue'] = $this->CustomerOverdueModel->getCustomerWithOverDue();
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/overdue/index');
        $this->load->view('admin/default/footer');
    }
    
    public function view($id) {
        $data['page_title'] = 'Admin - overdue';
        $data['overdue'] = $this->CustomerOverdueModel->getCustomerWithOverDue($id);
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/overdue/view');
        $this->load->view('admin/default/footer');
        
    }
}
