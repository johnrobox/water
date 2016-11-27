<?php

class AdminOverdueController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('CustomerOverdueModel');
    }
    
    public function index() {
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data['pageTitle'] = 'Admin - overdue';
            $data['overdue'] = $this->CustomerOverdueModel->getCustomerWithOverDue();
            $this->load->view('admin/default/header', $data);
            $this->load->view('admin/default/top-menu');
            $this->load->view('admin/default/side-bar');
            $this->load->view('admin/pages/overdue/index');
            $this->load->view('admin/default/footer');
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }
    
    public function view($id) {
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data['pageTitle'] = 'Admin - overdue';
            $data['overdue'] = $this->CustomerOverdueModel->getCustomerWithOverDue($id);
            $this->load->view('admin/default/header', $data);
            $this->load->view('admin/default/top-menu');
            $this->load->view('admin/default/side-bar');
            $this->load->view('admin/pages/overdue/view');
            $this->load->view('admin/default/footer');
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }
}
