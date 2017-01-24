<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Administrator');
        $this->load->library('alert');
    }
    
    public function settings(){
        $data['page_number'] = 12;
        $data['page_title'] = 'Admin - Account Settings';
        $data['account'] = $this->Administrator->getById($this->session->userdata('AdminId'));
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/user/settings');
        $this->load->view('admin/default/footer');
    }
    
    public function updateExec() {
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
                'rules' => 'required'
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
            $this->settings();
        } else {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $gender = $this->input->post('gender');
            $birthdate = $this->input->post('birthdate');
            $data = array(
                'admin_firstname' => $firstname,
                'admin_lastname' => $lastname,
                'admin_email' => $email,
                'admin_gender' => $gender,
                'admin_birthdate' => $birthdate
            );
            $user_id = $this->session->userdata('AdminId');
            $response = $this->Administrator->updateById($user_id, $data);
            if (!$response) {
                $this->session->set_flashdata('error', $this->alert->dangerAlert('Cannot update info! Maybe you dont change anything!'));
            } else {
                $session = array(
                        'AdminFirstname' => $firstname,
                        'AdminLastname' => $lastname,
                        'AdminEmail' => $email,
                    );
                $this->session->set_userdata($session);
                $this->session->set_flashdata('success', $this->alert->successAlert('Update success!'));
            }
            redirect(base_url().'index.php/admin/AccountController/settings');
            exit();
        }
    }
    
}

