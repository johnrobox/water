<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReadingController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer');
        $this->load->model('CustomerReading');
        $this->load->model('CustomerReadingModel');
        $this->load->library('alert');
        $this->auth->checkLogin();
    }
    
    public function index() {
        $data['script'] = array('customer-reading');
        $data['page_number'] = 4;
        $data['page_title'] = 'Admin - reading';

        // Session the month you like
        if (!$this->session->has_userdata('setReadingMonth') && !$this->session->has_userdata('setReadingYear')) {
            $toSet = array(
                'setReadingMonthValue' => date('m'),
                'setReadingMonth' => date('F'),
                'setReadingYear' => date('Y')
            );
            $this->session->set_userdata($toSet);
        }

        $data["results"] = $this->Customer->getAll();

        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/reading/index');
        $this->load->view('admin/modals/reading/update-reading');
        $this->load->view('admin/default/footer');
    }
    
    
    public function addReading() {
        $customer_id = $this->input->post('customer_id');
        $reading_amount = $this->input->post('reading_amount');
        $reading_cover = $this->session->userdata('setReadingMonthValue').'-'.$this->session->userdata('setReadingYear');
        date_default_timezone_set("Asia/Manila");
        $reading_date = date('Y-m-d h:i:s');
        $user_id = $this->session->userdata('AdminId');
        $data = array(
            'customer_id' => $customer_id,
            'customer_reading_amount' => $reading_amount,
            'customer_reading_date' => $reading_date,
            'customer_reading_month_cover' => $reading_cover,
            'customer_readed_by' => $user_id
        );
        $response =  $this->CustomerReading->insertData($data);
        if ($response) {
            $this->session->set_flashdata('success', $this->alert->successAlert('Reading amount successfully setted!'));
        } else {
            $this->session->set_flashdata('error', $this->alert->dangerAlert('Failed to set reading amount!'));
        }
        redirect(base_url().'index.php/admin/ReadingController');
        exit();       
    }
    
    public function editReading() {
        $readingAmount = $this->input->post('amountValue');
        $id = $this->input->post('customerId');
        $response = $this->CustomerReadingModel->edit($id, $readingAmount);
        if($response['valid']) {
            $this->session->set_flashdata('success', $this->alert->successAlert('Reading amount updated successfully.'));
        } else {
            $this->session->set_flashdata('error', $this->alert->dangerAlert('Reading amount not failed to update'));
        }
        redirect(base_url().'index.php/AdminReadingController/');
        exit();
    }
    
    /**
     * Function to set reading date
     * @param 
     * @return array
     */
    public function setReadingDate() {
        $monthNumber = $this->input->post('readingMonth');
        $monthName = date("F", mktime(0, 0, 0, $monthNumber, 10));
        $data = array(
            'setReadingMonthValue' => sprintf('%02d', $monthNumber),
            'setReadingMonth' => $monthName,
            'setReadingYear' => $this->input->post('readingYear')
        );
        $this->session->set_userdata($data);
        redirect(base_url().'index.php/admin//ReadingController/index');
        exit();
    }
    
}
 