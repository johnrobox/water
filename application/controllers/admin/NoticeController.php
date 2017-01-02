<?php

class NoticeController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('CustomerNoticeModel');
        $this->load->library('alert');
    }
    
    public function index(){
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data['pageTitle'] = 'Admin - notice';
            $data['notice'] = $this->CustomerNoticeModel->notice();
            $this->load->view('admin/default/header', $data);
            $this->load->view('admin/default/top-menu');
            $this->load->view('admin/default/side-bar');
            $this->load->view('admin/pages/notice/index');
            $this->load->view('admin/default/footer');
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }
    
    public function update(){
        $id = $this->input->post('id');
        $notice = $this->input->post('notice');
        $this->CustomerNoticeModel->updateNotice($id, $notice);
        $this->session->set_flashdata('okay', $this->alert->successAlert('Notice successfully updated'));
        redirect(base_url().'index.php/AdminNoticeController/index');
        exit();
    }
}