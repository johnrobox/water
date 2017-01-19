<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Administrator');
        $this->load->library('alert');
        $this->load->library('random');
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
                $id = $row->id;
                $login_token = $this->random->generateRandomString(50);
                date_default_timezone_set("Asia/Manila");
                $login_time = date('Y-m-d h:i:s');
                $response = $this->Administrator->loginLog($id, $login_time, $login_token);
                if ($response ==  true) {
                    $session = array(
                        'AdminId' => $id,
                        'AdminFirstname' => $row->admin_firstname,
                        'AdminLastname' => $row->admin_lastname,
                        'AdminEmail' => $row->admin_email,
                        'AdminToken' => $login_token
                    );
                    $this->session->set_userdata($session);
                    redirect(base_url().'index.php/admin/HomepageController/index');
                    exit();
                } else {
                    $this->session->set_flashdata('error', $this->alert->dangerAlert('Cannot login your account.'));
                    redirect(base_url().'admin');
                    exit();
                }
            }
        }
    }
    
    public function logoutExec() {
        $this->auth->forceLogout();
    }
    
}
