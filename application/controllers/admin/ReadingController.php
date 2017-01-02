<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ReadingController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('CustomerModel');
        $this->load->model('CustomerReadingModel');
        $this->load->library("pagination");
        $this->load->library("paginatedesign");
        $this->load->library('alert');
    }
    
    public function index() {
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data['pageTitle'] = 'Admin - reading';
            
            // Session the month you like
            if (!$this->session->has_userdata('setReadingMonth') && !$this->session->has_userdata('setReadingYear')) {
                $toSet = array(
                    'setReadingMonthValue' => date('m'),
                    'setReadingMonth' => date('F'),
                    'setReadingYear' => date('Y')
                );
                $this->session->set_userdata($toSet);
            }
            
            $config = $this->paginatedesign->bootstrapPagination();
            $config['base_url'] = base_url() . "index.php/AdminCustomerController/viewCustomer";
            $config['total_rows'] = $this->CustomerModel->countCustomer();
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->CustomerModel->allCustomer($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            
            $this->load->view('admin/default/header', $data);
            $this->load->view('admin/default/top-menu');
            $this->load->view('admin/default/side-bar');
            $this->load->view('admin/pages/reading/index');
            $this->load->view('admin/modals/update-reading');
            $this->load->view('admin/default/footer');
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }
    
    
    public function addReading() {
        $data = array(
            'customer_id' => $this->input->post('customer_id'),
            'customer_reading_amount' => $this->input->post('reading_amount'),
            'customer_reading_date' => $this->session->userdata('setReadingMonthValue').'-'.$this->session->userdata('setReadingYear')
        );
        $result = $this->CustomerReadingModel->reading($data);
        if ($result['inserted']) {
            $this->session->set_flashdata('success', $this->alert->successAlert('Reading amount successfully setted!'));
        } else {
            $this->session->set_flashdata('error', $this->alert->dangerAlert('Failed to set reading amount!'));
        }
        redirect(base_url().'index.php/AdminReadingController/');
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
            'setReadingMonthValue' => $monthNumber,
            'setReadingMonth' => $monthName,
            'setReadingYear' => $this->input->post('readingYear')
        );
        $this->session->set_userdata($data);
        redirect(base_url().'index.php/AdminReadingController/index');
        exit();
    }
    
}
 