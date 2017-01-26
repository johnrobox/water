<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Administrator');
        $this->load->model('AdministratorLog');
        $this->load->library('alert');
        $this->user_id = $this->session->userdata('AdminId');
        $this->token = $this->session->userdata('AdminToken');
        
        // Change password common error
        $this->common_error = array(
                    'error' => true,
                    'messages' => 'Cannot update password! Please logout and try it again!',
                    'common'  => true
                );
    }
    
    public function settings() {
        $data['script'] = array('admin');
        $data['page_number'] = 12;
        $data['page_title'] = 'Admin - Account Settings';
        $data['account'] = $this->Administrator->getById($this->user_id);
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/user/settings');
        $this->load->view('admin/modals/administrator/change-password');
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
            $response = $this->Administrator->updateById($this->user_id, $data);
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
    
    public function changePassword() {
        $validate = array(
            array(
                'field' => 'old_password',
                'label' => 'Old Password',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'new_password',
                'label' => 'New Password',
                'rules' => 'trim|required|min_length[6]'
            ),
            array(
                'field' => 'repeat_new_password',
                'label' => 'Repeat New Password',
                'rules' => 'trim|required|matches[new_password]'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'messages' => $this->form_validation->error_array(),
                'common' => false
            );
        } else {
            $result = $this->AdministratorLog->selectById($this->user_id, 'admin_token');
            if ($result['select'] == false) {
                $response = $this->common_error;
            } else {
                $login_token = $result['data']->admin_token;
                if ($login_token != $this->token) {
                    $response = $this->common_error;
                } else {
                    $get_password = $this->Administrator->selectById($this->user_id, 'admin_password');
                    if ($get_password['select'] == false) {
                        $response = $this->common_error;
                    } else {
                        $old_password = $this->input->post('old_password');
                        $new_password = $this->input->post('new_password');
                        $password = $get_password['data']->admin_password;
                        if ($password != md5(md5($old_password))) {
                            $response = array(
                                'error' => true,
                                'messages' => 'Incorrect old password',
                                'common' => true
                            );
                        } else {
                            $data = array('admin_password' => md5(md5($new_password)));
                            $update_password = $this->Administrator->updateById($this->user_id, $data);
                            if ($update_password == false) {
                                $response = array(
                                    'error' => true,
                                    'messages' => 'Cannot complete request, you did not change anything from your password!',
                                    'common' => true
                                );
                            } else {
                                // update the logs
                                date_default_timezone_set("Asia/Manila");
                                $this->AdministratorLog->update($this->user_id, array('admin_date_modified' => date('Y-m-d h:i:s')));
                                $response = array('error' => false);
                            }
                        }
                    }
                }
            }
        }
        echo json_encode($response);
    }
    
   
    
}

