<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RequestController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerRequestModel');
        $this->auth->checkLogin();
    }
    
    public function index(){
        $data['page_number'] = 8;
        $data['page_title'] = 'Admin - request';
        $data['allRequest'] = $this->CustomerRequestModel->getAllRequest();
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/request/index');
        $this->load->view('admin/default/footer');
        
    }
    
    public function deleteRequest(){
        $id = $this->input->post('id');
        $this->CustomerRequestModel->deleteRequest($id);
    }
    
}
