<?php 
/**
 * Admin Customer Controller
 */
class AdminCustomerController extends CI_Controller {
    
    /**
     * Construct function
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerModel');
        $this->load->model('AdminModel');
        $this->load->model('Customer');
        $this->load->library('alert');
        $this->load->library("pagination");
        $this->load->library("paginatedesign");
        $login = $this->AdminModel->checkAuthentication();
        if (!$login['valid'])
            redirect(base_url().'index.php/AdminLogoutController');
    }
    
    /**
     * A function for add
     * @param
     * @return void
     */
    public function addField() {
        $data['pageTitle'] = 'Admin - add customer';
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/customer/add-customer');
        $this->load->view('admin/default/footer');
    }
    
    /**
     * Used for validating inputed customer
     * @param 
     * @return void
     */
    public function addExec() {
        $validate =  array(
            array(
                'field' => 'firstname',
                'label' => 'Customer Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Customer Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'meterNo',
                'label' => 'Customer Meter No.',
                'rules' => 'required|is_unique[customer_lastname.customer_meter_no]'
            ),
            array(
                'field' => 'address',
                'label' => 'Customer Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'contact',
                'label' => 'Customer Contact No.',
                'rules' => 'required'
            ),
            array(
                'field' => 'birthdate',
                'label' => 'Customer Birthdate',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->addField();
        } else {
            $data = array(
                'customer_firstname' => $this->input->post('firstname'),
                'customer_middlename' => $this->input->post('middlename'),
                'customer_lastname' => $this->input->post('lastname'),
                'customer_meter_no' => $this->input->post('meterNo'),
                'customer_address' => $this->input->post('address'),
                'customer_contact' => $this->input->post('contact'),
                'customer_birthdate' => $this->input->post('birthdate')
            );
            $result = $this->CustomerModel->add($data);
            if ($result) {
                $this->session->set_flashdata('success', $this->alert->successAlert('Customer successfully added.'));
            } else {
                $this->session->set_flashdata('error', $this->alert->dangerAlert('Customer doesnt add to database. An internal error occured.'));
            }
            redirect(base_url().'index.php/AdminCustomerController/viewCustomer');
            exit();
        }
    }
    
    /**
     * A function for view customer
     * @param
     * @return void
     */
    public function viewCustomer() {
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data['script'] = array('customer');
            $data['pageTitle'] = 'Admin - view customer';
            $config = $this->paginatedesign->bootstrapPagination();
            $config['base_url'] = base_url() . "index.php/AdminCustomerController/viewCustomer";
            $config['total_rows'] = $this->CustomerModel->countCustomer();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->CustomerModel->allCustomer($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('admin/default/header', $data);
            $this->load->view('admin/default/top-menu');
            $this->load->view('admin/default/side-bar');
            $this->load->view('admin/pages/customer/view-customer');
            
            $this->load->view('admin/modals/customer-view-info');
            $this->load->view('admin/modals/customer-update');
            $this->load->view('admin/modals/customer-change-status');
            
            $this->load->view('admin/default/footer');
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }
    
    /**
     * Function used for change customer status
     * @param
     * @return void
     */
    public function changeStatusCustomer() {
        $login = $this->AdminModel->checkAuthentication();
        if ($login['valid']) {
            $data = array(
                'id' => $this->input->post('id'),
                'status' => $this->input->post('status')
            );
            $result  = $this->CustomerModel->changeStatus($data);
            echo ($result['valid'])? 'okay' : 'error';
        } else {
            redirect(base_url().'index.php/AdminLogoutController');
        }
    }

    /*
    * Function used view customer information
    * @param 
    * @return
    */
    public function getCustomeInfo() {
        $id = $this->input->post('id');
        $customer = $this->Customer->getSingleData($id);
        echo json_encode($customer);
    }

    /*
    * Update customer Info
    * @param 
    * @return void
    */
    public function updateCustomeInfo() {
        $id = $this->input->post("id");
        $data = array(
            "customer_firstname" => $this->input->post('firstname'),
            "customer_middlename" => $this->input->post("middlename"),
            "customer_lastname" => $this->input->post("lastname"),
            "customer_meter_no" => $this->input->post("meter_number"),
            "customer_address" => $this->input->post("address"),
            "customer_contact" => $this->input->post("contact")
            );

        $update = $this->Customer->updateCustomerById($id, $data);
        if ($update['updated']){
            $this->session->set_flashdata('success', $this->alert->successAlert('Customer Successfully updated'));
        }
        echo json_encode($update);
    }


    public function changeCustomerStatus() {
        $id = $this->input->post('id');
        $status = ($this->input->post('status')) ? 0 : 1;
        $changeStatus = $this->Customer->changeCustomerStatus($id, $status);

        $data = array(
                'id' => $this->input->post('id'),
                'status' => $this->input->post('status')
            );
        echo json_encode($data);
    }

    
}