<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CustomerController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerSideModel');
        $this->load->library('alert');
    }
    
    public function index(){
        // sanitize input meter number
        $meterNo = $this->input->post('meterNo');
        // check if meter number is not empty
        if (empty($meterNo) || $meterNo == null) {
            $this->session->set_flashdata('error', $this->alert->dangerAlert('Meter number is required.'));
            redirect(base_url() . 'index.php/HomepageController/index');
            exit();
        }
        
        // check if meterNo is not set
        if (!isset($meterNo)) {
            if ($this->session->has_userdata('meter')) {
                $meterNo = $this->session->userdata('meter');
            } else {
                redirect(base_url() . 'index.php/HomepageController/index');
                exit();
            }
        }

        $result = $this->CustomerSideModel->authorize($meterNo);
        if ($result['valid']) {
            $this->session->set_userdata($result);
            if ($this->session->has_userdata('name') && $this->session->has_userdata('meter')) {
                $data['latestReadingData'] = $this->CustomerSideModel->getLatestReading();
                $data['pageTitle'] = 'Homepage';
                $this->load->view('customer/default/header', $data);
                $this->load->view('customer/pages/view-info');
                $this->load->view('customer/default/footer');
            }
        } else {
            $this->session->set_flashdata('error', $this->alert->dangerAlert('Invalid meter No.'));
            redirect(base_url() . 'index.php/HomepageController/index');
            exit();
        }
    }
    
    public function edit() {
        if ($this->session->has_userdata('id') && $this->session->has_userdata('name') && $this->session->has_userdata('valid')) {
            $data['pageTitle'] = 'My Information';
            $data['info'] = $this->CustomerSideModel->getMyInfo();
            $this->load->view('customer/default/header', $data);
            $this->load->view('customer/pages/edit');
            $this->load->view('customer/default/footer');
        } else {
            redirect(base_url() . 'index.php/HomepageController/index');
            exit();
        }
    }

    public function editExec() {
        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        $birthdate = $this->input->post('birthdate');
        $this->CustomerSideModel->update($contact, $email, $birthdate);
        $this->session->set_flashdata('okay', $this->alert->successAlert('Account information updated successfully.'));
        redirect(base_url() . 'index.php/HomepageController/edit');
        exit();
    }

    public function readingStatistic() {
        if ($this->session->has_userdata('id') && $this->session->has_userdata('name') && $this->session->has_userdata('valid')) {
            $data['pageTitle'] = 'Reading Statistics';
            //$data['notice'] = $this->CustomerSideModel->notice();
            $this->load->view('customer/default/header', $data);
            $this->load->view('customer/pages/reading-statistics');
            $this->load->view('customer/default/footer');
        } else {
            redirect(base_url() . 'index.php/HomepageController/index');
            exit();
        }
    }

    public function request() {
        if ($this->session->has_userdata('id') && $this->session->has_userdata('name') && $this->session->has_userdata('valid')) {
            $data['pageTitle'] = 'Request';
            $this->load->view('customer/default/header', $data);
            $this->load->view('customer/pages/request');
            $this->load->view('customer/default/footer');
        } else {
            redirect(base_url() . 'index.php/HomepageController/index');
            exit();
        }
    }

    public function requestExec() {
        $request = $this->input->post('request');
        $response = $this->CustomerSideModel->sendRequest($request);
        if ($response) {
            $this->session->set_flashdata('okay', $this->alert->successAlert('Request successfully send.'));
        } else {
            $this->session->set_flashdata('error', $this->alert->dangerAlert('Request not send.'));
        }
        redirect(base_url() . 'index.php/HomepageController/request');
        exit();
    }

    public function notice() {
        if ($this->session->has_userdata('id') && $this->session->has_userdata('name') && $this->session->has_userdata('valid')) {
            $data['pageTitle'] = 'Notice';
            $data['notice'] = $this->CustomerSideModel->notice();
            $this->load->view('customer/default/header', $data);
            $this->load->view('customer/pages/notice');
            $this->load->view('customer/default/footer');
        } else {
            redirect(base_url() . 'index.php/HomepageController/index');
            exit();
        }
    }

    public function paymentInfo() {
        if ($this->session->has_userdata('id') && $this->session->has_userdata('name') && $this->session->has_userdata('valid')) {
            $data['pageTitle'] = 'Payment Info';
            $data['paymentAndBilling'] = $this->CustomerSideModel->paymentAndBilling();
            $this->load->view('customer/default/header', $data);
            $this->load->view('customer/pages/paymentInfo');
            $this->load->view('customer/default/footer');
        } else {
            redirect(base_url() . 'index.php/HomepageController/index');
            exit();
        }
    }

    public function logout() {
        $customer = array(
            'id' => '',
            'name' => '',
            'meter' => '',
            'address' => '',
            'contact' => '',
            'valid' => false
        );
        $this->session->unset_userdata($customer);
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/HomepageController/index');
        exit();
    }
    
    
}
