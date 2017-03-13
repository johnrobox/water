<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Administrator');
        $this->load->model('AdministratorLog');
        $this->load->library('alert');
        $this->load->library('random');
    }

    public function index() {
        $this->auth->checkAuth();
        $data['page_title'] = 'ADMINISTRATOR LOGIN';
        $this->load->view('admin/default/login', $data);
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
            $response = array(
                'error' => true,
                'type' => 'required',
                'message' => $this->form_validation->error_array()
            );
        } else {
            $loginData = array(
                'admin_email' => $this->input->post('email'),
                'admin_password' => md5(md5($this->input->post('password')))
            );
            $login = $this->Administrator->login($loginData);
            if ($login['valid'] == false) {
                $response = array(
                    'error' => true,
                    'type' => 'common',
                    'message' => 'Invalid Email / Password'
                );
            } else {
                $row = $login['data'];
                $id = $row->id;
                $login_token = $this->random->generateRandomString(50);
                date_default_timezone_set("Asia/Manila");
                $log_data = array(
                    'admin_last_login' => date('Y-m-d h:i:s'),
                    'admin_token' => $login_token,
                    'admin_status' => 1
                );
                $response = $this->AdministratorLog->update($id, $log_data);
                if ($response ==  true) {
                    $session = array(
                        'AdminId' => $id,
                        'AdminFirstname' => $row->admin_firstname,
                        'AdminLastname' => $row->admin_lastname,
                        'AdminEmail' => $row->admin_email,
                        'AdminToken' => $login_token
                    );
                    $response = array(
                        'error' => false
                    );
                    $this->session->set_userdata($session);
                } else {
                    $response = array(
                        'error' => true,
                        'type' => 'common',
                        'message' => 'Cannot login your account'
                    );
                }
            }
        }
        echo json_encode($response);
    }
    
    public function logoutExec() {
        if ($this->input->post("type")) {
           $type = $this->input->post("type");
           if ($type == "logout") {
               
               date_default_timezone_set("Asia/Manila");
               $user_id = $this->session->userdata('AdminId');
               $user_last_logout = date('Y-m-d h:i:s');
               
               $data = array(
                   "admin_status" => 0,
                   "admin_last_logout" => $user_last_logout
               );
               $result = $this->Administrator->logout($user_id, $data);
               if ($result) {
                    $this->auth->forceLogout();
                    $response = array("logout" => true);
               } else {
                    $response = array("logout" => false);
               }
           } else {
               $response = array("logout" => false);
           }
        } else {
            $response = array("logout" => false);
        }
        echo json_encode($response);
    }
    
}
