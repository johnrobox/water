<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NoticeController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Notice');
        $this->load->library('alert');
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
    }
    
    public function index(){
        $data['page_number'] = 9;
        $data['page_title'] = 'Admin - notice';
        $data['notices'] = $this->Notice->getAll();
        $data['script'] = array('notice');
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/notice/index');
        $this->load->view('admin/modals/notice/add-notice');
        $this->load->view('admin/modals/notice/delete-notice');
        $this->load->view('admin/modals/notice/update-notice');
        $this->load->view('admin/default/footer');
        
    }
    
    public function addNotice() {
        $notice = $this->input->post('notice');
        $data = array(
            'note' => $notice,
            'created_by' => $this->login_id,
            'date_created' => date('Y-m-d h:i:s')
        );
        $response = $this->Notice->insertData($data);
        if ($response) {
            $this->session->set_flashdata('success', $this->alert->successAlert('Notice successfully added.'));
        } else {
            $this->session->set_flashdata('error', $this->alert->dangerAlert('Cannot process request!. An internal error occured.'));
        }
    }
    
    public function deleteItem() {
        $id = $this->input->post('id');
        $response = $this->Notice->deleteById($id);
        echo json_encode(array('deleted' => $response));
    }
    
    public function getNoticeInfo() {
        $id = $this->input->post('id');
        $response =  $this->Notice->getInfoById($id);
        if ($response) {
            $result = array(
                'selected' => true,
                'note' => $response->note
            );
        } else {
            $result = array(
                'selected' => false
            );
        }
        echo json_encode($result);
    }
    
    public function changeStatus() {
        $id = $this->input->post('id');
        $status = ($this->input->post('status')) ? 0 : 1;
        $response = $this->Notice->changeStatusById($id, array('status' => $status));
        echo json_encode(array('changed' => $response));
    }
    
    public function updateData() {
        $id = $this->input->post('id');
        $note = $this->input->post('note');
        $data = array(
            'date_modified' =>  date('Y-m-d h:i:s'),
            'note' => $note,
            'modified_by' => $this->login_id
        );
        $response = $this->Notice->updateData($id, $data);
        if ($response) {
            $this->session->set_flashdata('success', $this->alert->successAlert('Notice successfully modified.'));
        } else {
            $this->session->set_flashdata('error', $this->alert->dangerAlert('Cannot process request!. An internal error occured.'));
        }
    }
    
}