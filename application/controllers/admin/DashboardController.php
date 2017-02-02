<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerReading');
        $this->auth->checkLogin();
    }
    
    public function index(){
        $data['page_number'] = 1;
        $data['page_title'] = 'Admin - homepage';
        
        $data['overdue'] = $this->checkOverdue();
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/homepage/index');
        $this->load->view('admin/default/footer');
    }
    
    
    public function checkOverdue() {
        date_default_timezone_set("Asia/Manila");   
        $today = date('Y-m-d');
        $date = strtotime($today .' -1 months');
        $get_date = date('m-Y', $date);
        $fields = 'customer_id, customer_reading_amount, customer_reading_date';
        $get_overdue = $this->CustomerReading->selectOverdue($get_date, $fields);
        return $get_overdue;
    }
    
}