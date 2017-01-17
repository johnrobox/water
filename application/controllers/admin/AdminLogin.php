<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminLogin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Administrator');
        $this->load->library('alert');
    }

    public function index() {
        $this->load->view('admin/default/login');
    }
    
    public function loginExec(){
        $validate = array(
            array(
                'field' => 'email',
                'label' => 'Login Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Login Password',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false){
            $this->index();
        } else {
            $loginData = array(
                'admin_email' => $this->input->post('email'),
                'admin_password' => md5(md5($this->input->post('password')))
            );
            $login = $this->Administrator->checkLoginData($loginData);
            if ($login['valid'] == false) {
                $this->session->set_flashdata('error', $this->alert->dangerAlert('Invalid Email / Password'));
                redirect(base_url().'admin');
                exit();
            } else {
                $row = $login['data'];
                
            }
            
            $login = $this->Administrator->login($loginData);
            if ($login['valid']) {
                $this->session->set_userdata($login['data']);
                redirect(base_url().'index.php/AdminHomepageController/index');
            } else {
                
            }
        }
    }
}
