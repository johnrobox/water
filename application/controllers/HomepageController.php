<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerSideModel');
        $this->load->library('alert');
    }

    public function index() {
        $this->load->view('customer/default/header');
        $this->load->view('customer/pages/index');
        $this->load->view('customer/default/footer');
    }

    

}
