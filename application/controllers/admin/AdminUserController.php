<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserController extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        $this->auth->checkLogin();
        $this->load->library('alert');
        $this->load->model('Administrator');
        $this->load->model('AdministratorLog');
        $this->login_id = $this->session->userdata('AdminId');
        
        // get login account detail
        $this->account = $this->Administrator->getById($this->login_id);
    }
    
    public function index() {
        $data['page_number'] = 10;
        $data['page_title'] = 'Admin - add user';
        $data['account'] = $this->account;
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/user/add-user');
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/default/footer');
        
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
            $admin_user = array(
                'admin_firstname' => $this->input->post('firstname'),
                'admin_lastname' => $this->input->post('lastname'),
                'admin_email' => $this->input->post('email'),
                'admin_password' => md5(md5($this->input->post('password'))),
                'admin_gender' => $this->input->post('gender'),
                'admin_birthdate' => $this->input->post('birthdate')
            );
            $result = $this->Administrator->addAdmin($admin_user);
            if (!$result) {
                $this->session->set_flashdata('error', $this->alert->dangerAlert('Cannot add new user!'));
            } else {
                $admin_user_log = array(
                    'admin_id' => $result,
                    'admin_role' => 1,
                    'admin_status' => 1,
                    'admin_date_created' => date('Y-m-d h:i:s'),
                    'admin_date_modified' => date('Y-m-d h:i:s')
                );
                $log = $this->AdministratorLog->insertLog($admin_user_log);
                if (!$log) {
                    $this->session->set_flashdata('error', $this->alert->dangerAlert('Cannot complete actions!'));
                } else {
                    $this->session->set_flashdata('success', $this->alert->successAlert('Admin successfully added.'));
                }
            }
            redirect(base_url().'index.php/admin/AdminUserController/viewUsers');
            exit();
        }
    }
    
    public function viewUsers() {
        $data['page_number'] = 11;
        $data['page_title'] = 'Admin - View User';
        $data['results'] = $this->Administrator->getAll();
        $data['account'] = $this->account;
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/user/view-user');
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/default/footer');
    }
    
}