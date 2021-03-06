<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerReading');
        $this->load->library('dateformater');
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
        
        // get login account 
        $this->load->model("Administrator");
        $this->account = $this->Administrator->getById($this->login_id);
    }
    
    public function index(){
        $prefs['template'] = array(
                'table_open'           => '<table class="calendar table table-bordered table-hover">', 
                'cal_cell_start'       => '<td class="day">',
                'cal_cell_start_today' => '<td class="today" style="color: blue; font-size : 15px">'
        );

        $this->load->library('calendar', $prefs);
        $data['page_number'] = 1;
        $data['page_title'] = 'ADMIN - HOMEPAGE';
        $data['account'] = $this->account;
        // request the overdue date
        $overdue_date = $this->dateformater->getOverdueDate();
        $data['overdue'] = $this->CustomerReading->selectOverdue($overdue_date);
        
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/homepage/index');
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/modals/administrator/logout-confirmation');
        $this->load->view('admin/default/footer');
    }
    
}