<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReadingController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer');
        $this->load->model('CustomerReading');
        $this->load->library('alert');
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
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
        $condition = "WHERE customer_status !=0";
        $data["results"] = $this->Customer->getAll($condition);

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
        if (empty($reading_amount) || $reading_amount == '' || $reading_amount == null) {
            $response = array(
                'error' => true,
                'message' => 'Field is required!'
            );
        } else {
            $reading_amount = $reading_amount;
            $reading_cover = $this->session->userdata('setReadingMonthValue').'-'.$this->session->userdata('setReadingYear');
            date_default_timezone_set("Asia/Manila");
            $reading_date = date('Y-m-d h:i:s');
            $data = array(
                'customer_id' => $customer_id,
                'customer_reading_amount' => $reading_amount,
                'customer_reading_date' => $reading_date,
                'customer_reading_month_cover' => $reading_cover,
                'customer_readed_by' => $this->login_id
            );
            $result =  $this->CustomerReading->insertData($data);
            if ($result['inserted'] == false) {
                $response = array(
                    'error' =>  true,
                    'message' => 'Cannot complete request!'
                );
            } else {
                $response = array(
                    'error' => false,
                    'reading_amount' => $reading_amount,
                    'reading_date' => date('M d, Y', strtotime($reading_date)),
                    'reading_id' => $result['inserted_id']
                );
            }
        }
        echo json_encode($response);     
    }
    
    public function refreshData() {
        $id = $this->input->post('id');
        $fields = 'customer_reading_amount';
        $response = $this->CustomerReading->selectData($id, $fields);
        if ($response['select'] == false) {
            $result = array(
                'error' => true,
                'message' => 'Cannot query result!');
        } else {
            $result = array(
                'error' => false,
                'amount' => $response['data']
            );
        }
        echo json_encode($result);
    }
    
    public function editReading() {
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'message' => $this->form_validation->error_array(),
                'common' => true
            );
        } else {
            $amount = $this->input->post('amount');
            $id = $this->input->post('id');
            $data = array(
                'customer_reading_amount' => $amount,
                'customer_updated_by' => 0);
            $update = $this->CustomerReading->updateById($id, $data);
            if ($update == false) {
                $response = array(
                    'error' => true,
                    'message' => 'Cannot update reading amount! Maybe nothing change.',
                    'common' => false
                );
            } else {
                $response = array(
                    'error' => false, 
                    'reading_amount' => number_format($amount, 2)
                    );
            }
        }
        echo json_encode($response);

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
 