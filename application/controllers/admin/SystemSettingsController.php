<?php

class SystemSettingsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Administrator");
        $this->load->model("SystemSetting");
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
        $this->account = $this->Administrator->getById($this->login_id);
    }
    
    public function index() {
        $data['page_number'] = 13;
        $data['page_title'] = 'ADMIN - SYSTEM SETTINGS';
        $data['script'] = array('system-setting');
        $data['account'] = $this->account;
        $data['cubic_settings'] = $this->SystemSetting->getPerCubic();
        $data['minimum_settings'] = $this->SystemSetting->getMinimumAmount();
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/system_settings/index');
        $this->load->view('admin/modals/system_setting/edit-cubic');
        $this->load->view('admin/modals/system_setting/edit-minimum');
        $this->load->view('admin/modals/administrator/logout-confirmation');
        $this->load->view('admin/default/footer');
    }
    
    public function updateSetting() {
        $id = $this->input->post("id");
        if (!isset($id)) {
            $response = array(
                'error' => true,
                'message' => "Invalid request"
            );
        } else {
            $value = $this->input->post('value');
            $result = $this->SystemSetting->udpateSetting($value, $id);
            $response = ($result) ? array('error' => false) : array("error" => true, "message" => "Cannot complete process! Nothing change...");
        }
        echo json_encode($response);
    }
    
}