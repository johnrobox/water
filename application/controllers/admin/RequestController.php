<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RequestController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerRequest');
        $this->load->model("Administrator");
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
        $this->account = $this->Administrator->getById($this->login_id);
    }
    
    public function index(){
        $data['page_number'] = 8;
        $data['page_title'] = 'ADMIN - REQUEST';
        $data['script'] = array('customer_request');
        $data['allRequest'] = $this->CustomerRequest->getAll();
        $data['account'] = $this->account;
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/request/index');
        $this->load->view('admin/modals/request/delete-request');
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/modals/administrator/logout-confirmation');
        $this->load->view('admin/default/footer');
        
    }
    
    public function deleteItem(){
        $id = $this->input->post('id');
        $response['deleted'] = $this->CustomerRequest->deleteById($id);
        echo json_encode($response);
    }
    
}
