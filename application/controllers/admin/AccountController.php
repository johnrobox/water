<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Administrator');
    }
    
    public function settings(){
        $data['page_number'] = 12;
        $data['page_title'] = 'Admin - Account Settings';
        $data['account'] = $this->Administrator->getById($this->session->userdata('AdminId'));
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/user/settings');
        $this->load->view('admin/default/footer');
    }
    
}

