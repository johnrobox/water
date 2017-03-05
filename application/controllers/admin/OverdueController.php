<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OverdueController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerReading');
        $this->load->model("Administrator");
        $this->load->library('dateformater');
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
        $this->account = $this->Administrator->getById($this->login_id);
    }
    
    public function index() {
        $data['page_number'] = 6;
        $data['page_title'] = 'Admin - overdue';
        
        $overdue_date = $this->dateformater->getOverdueDate();
        $data['overdue'] = $this->CustomerReading->selectOverdue($overdue_date);
        $data['account'] = $this->account;
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/overdue/index');
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/modals/administrator/logout-confirmation');
        $this->load->view('admin/default/footer');
    }
    
}
