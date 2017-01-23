<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library('alert');
    }
    
    public function hellos(){
        echo "he";
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
            $login = $this->LoginModel->checkLogin($loginData);
            if ($login['valid']) {
                $this->session->set_userdata($login['data']);
                redirect(base_url().'index.php/admin/HomepageController/index');
            } else {
                $this->session->set_flashdata('error', $this->alert->dangerAlert('Invalid Email / Password'));
                redirect(base_url().'index.php/admin/logincontroller/index');
                exit();
            }
        }
    }
}
