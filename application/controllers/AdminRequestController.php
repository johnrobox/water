<?php

class AdminRequestController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('CustomerRequestModel');
    }
    
    public function index(){
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data['pageTitle'] = 'Admin - request';
            $data['allRequest'] = $this->CustomerRequestModel->getAllRequest();
            $this->load->view('admin/default/header', $data);
            $this->load->view('admin/default/top-menu');
            $this->load->view('admin/default/side-bar');
            $this->load->view('admin/pages/request/index');
            $this->load->view('admin/default/footer');
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }
    
    public function deleteRequest(){
        $id = $this->input->post('id');
        $this->CustomerRequestModel->deleteRequest($id);
    }
    
}
