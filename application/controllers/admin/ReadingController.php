<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReadingController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer');
        $this->load->model('CustomerReading');
        $this->load->model("Administrator");
        $this->load->model("SystemSetting");
        $this->load->library('alert');
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
        $this->account = $this->Administrator->getById($this->login_id);
        
    }
    
    public function index() {
        $data['script'] = array('customer-reading');
        $data['page_number'] = 4;
        $data['page_title'] = 'ADMIN - READING';
        $data['account'] = $this->account;
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
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/modals/administrator/logout-confirmation');
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
            $reading_cover = $this->session->userdata('setReadingMonthValue').'-'.$this->session->userdata('setReadingYear');
            date_default_timezone_set("Asia/Manila");
            $reading_date = date('Y-m-d h:i:s');
            
            $per_cubic = $this->SystemSetting->getPerCubic();
            $minimum = $this->SystemSetting->getMinimumAmount();
            
            $reading_in_peso = $reading_amount * $per_cubic;
            $final_amount_to_pay =  ($reading_in_peso < $minimum) ? $minimum : $reading_in_peso;
            
            $data = array(
                'customer_id' => $customer_id,
                'customer_reading_amount' => $final_amount_to_pay,
                'customer_reading_cubic' => $reading_amount,
                'customer_reading_per_cubic' => $per_cubic,
                'customer_reading_minimum'=> $minimum,
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
                    'reading_amount' => $final_amount_to_pay,
                    'reading_date' => date('M d, Y', strtotime($reading_date)),
                    'reading_id' => $result['inserted_id'],
                    'per_cubic' => $per_cubic
                );
            }
        }
        echo json_encode($response);     
    }
    
    public function refreshData() {
        $id = $this->input->post('id');
        $fields = 'customer_reading_amount, customer_reading_cubic, customer_reading_per_cubic, customer_reading_minimum';
        $response = $this->CustomerReading->selectData($id, $fields);
        if ($response['select'] == false) {
            $result = array(
                'error' => true,
                'message' => 'Cannot query result!');
        } else {
            $result = array(
                'error' => false,
                'data' => $response['data']
            );
        }
        echo json_encode($result);
    }
    
    public function editReading() {
        $this->form_validation->set_rules('cubic_used', 'Cubic Used', 'required');
        $this->form_validation->set_rules('minimum_amount', 'Minimum Amount', 'required');
        $this->form_validation->set_rules('per_cubic', 'Per Cubic', 'required');
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'message' => $this->form_validation->error_array(),
                'common' => true
            );
        } else {
            
            $id = $this->input->post('id');
            $cubic_used = $this->input->post('cubic_used');
            $minimum_amount = $this->input->post('minimum_amount');
            $per_cubic = $this->input->post('per_cubic');
            $amount = $cubic_used * $per_cubic;
            $final_amount = ($amount < $minimum_amount) ? $minimum_amount : $amount;
            
            $data = array(
                'customer_reading_amount' => $final_amount,
                'customer_reading_cubic' => $cubic_used,
                'customer_reading_per_cubic' => $per_cubic,
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
                    'customer_reading_amount' => number_format($final_amount, 2),
                    'customer_reading_cubic' => number_format($cubic_used, 2),
                    'customer_reading_minimum' => number_format($minimum_amount, 2),
                    'customer_reading_per_cubic' => number_format($per_cubic, 2)
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
 