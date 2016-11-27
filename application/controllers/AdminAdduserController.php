<?php

class AdminAdduserController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->library('alert');
    }
    
    public function index() {
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data['pageTitle'] = 'Admin - add user';
            $this->load->view('admin/default/header', $data);
            $this->load->view('admin/default/top-menu');
            $this->load->view('admin/default/side-bar');
            $this->load->view('admin/pages/user/add-user');
            $this->load->view('admin/default/footer');
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }
    
    public function addExec() {
        $validate = array(
            array(
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|is_unique[admin.admin_email]|valid_email'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ),
            array(
                'field' => 'repeat_password',
                'label' => 'Repeat Password',
                'rules' => 'required|matches[password]'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ),
            array(
                'field' => 'birthdate',
                'label' => 'Birthdate',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
             $this->index();
        } else {
            $prepare = array(
                'admin_firstname' => $this->input->post('firstname'),
                'admin_lastname' => $this->input->post('lastname'),
                'admin_email' => $this->input->post('email'),
                'admin_password' => md5(md5($this->input->post('password'))),
                'admin_gender' => $this->input->post('gender'),
                'admin_birthdate' => $this->input->post('birthdate')
            );
            $this->AdminModel->addAdmin($prepare);
            $this->session->set_flashdata('okay', $this->alert->successAlert('Admin successfully added.'));
            redirect(base_url().'index.php/AdminAdduserController/index');
            exit();
        }
    }
    
}