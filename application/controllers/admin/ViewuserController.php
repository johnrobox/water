<?php

class ViewuserController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->library("pagination");
        $this->load->library("paginatedesign");
    }
    
    public function index() {
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data['pageTitle'] = 'Admin - View User';
            $config = $this->paginatedesign->bootstrapPagination();
            $config['base_url'] = base_url() . "index.php/AdminViewuserController/index";
            $config['total_rows'] = $this->AdminModel->countAdmin();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->AdminModel->allAdmin($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('admin/default/header', $data);
            $this->load->view('admin/default/top-menu');
            $this->load->view('admin/default/side-bar');
            $this->load->view('admin/pages/user/view-user');
            $this->load->view('admin/default/footer');
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }
    
}