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
        $data['page_title'] = 'Admin - System Settings';
        $data['script'] = array('system-setting');
        $data['account'] = $this->account;
        $data['system_settings'] = $this->SystemSetting->getPerCubic();
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/system_settings/index');
        $this->load->view('admin/modals/system_setting/edit-cubic');
        $this->load->view('admin/default/footer');
    }
    
    public function editCubic() {
        $cubic = $this->input->post('cubic');
        $result = $this->SystemSetting->udpateSetting($cubic, 1);
        $response = ($result) ? true : false;
        echo json_encode($response);
    }
    
}