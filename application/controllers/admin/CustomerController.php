<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {
    
    /**
     * Construct function
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer');
        $this->load->model("Administrator");
        $this->load->library('alert');
        $this->auth->checkLogin();
        $this->login_id = $this->session->userdata('AdminId');
        $this->account = $this->Administrator->getById($this->login_id);
    }
    
    /**
     * A function for add
     * @param
     * @return void
     */
    public function addField() {
        $data['page_number'] = 3;
        $data['page_title'] = 'Admin - add customer';
        $data['account'] = $this->account;
        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/customer/add-customer');
        $this->load->view('admin/modals/administrator/change-profile');
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
                'rules' => 'required|is_unique[customers.customer_meter_no]'
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
            $result = $this->Customer->addCustomer($data);
            if ($result) {
                $this->session->set_flashdata('success', $this->alert->successAlert('Customer successfully added.'));
            } else {
                $this->session->set_flashdata('error', $this->alert->dangerAlert('Customer doesnt add to database. An internal error occured.'));
            }
            redirect(base_url().'index.php/admin/CustomerController/viewCustomer');
            exit();
        }
    }
    
    /**
     * A function for view customer
     * @param
     * @return void
     */
    public function viewCustomer() {    
        $data['script'] = array('customer');
        $data['page_number'] = 2;
        $data['page_title'] = 'Admin - view customer';
        $data['customers'] = $this->Customer->getAll();
        $data['account'] = $this->account;

        $this->load->view('admin/default/header', $data);
        $this->load->view('admin/default/top-menu');
        $this->load->view('admin/default/side-bar');
        $this->load->view('admin/pages/customer/view-customer');

        $this->load->view('admin/modals/customer/customer-view-info');
        $this->load->view('admin/modals/customer/customer-update');
        $this->load->view('admin/modals/administrator/change-profile');
        $this->load->view('admin/default/footer');
        
    }
    
    /**
     * Function used for change customer status
     * @param
     * @return void
     */
    public function changeStatusCustomer() { 
        $data = array(
            'id' => $this->input->post('id'),
            'status' => $this->input->post('status')
        );
        $result  = $this->CustomerModel->changeStatus($data);
        echo ($result['valid'])? 'okay' : 'error';
    }

    /*
    * Function used view customer information
    * @param 
    * @return
    */
    public function getCustomeInfo() {
        $id = $this->input->post('id');
        $state = $this->input->post('state');
        $previous = $this->Customer->getFirstLastId("min");
        $next = $this->Customer->getFirstLastId("max");
        if ($state == 0){
            $result['customer'] = $this->Customer->getSingleData($id);
            $result['previous'] = $previous;
            $result['next'] = $next;
        } else if ($state == 1) {
            $result = $this->Customer->findPreviousNextById($id, "max", "<");
            $result['previous'] = $previous;
        } else if ($state == 2) {
            $result = $this->Customer->findPreviousNextById($id, "min", ">");
            $result['next'] = $next;
        }
        
        echo json_encode($result);
    }

    /*
    * Update customer Info
    * @param 
    * @return void
    */
    public function updateCustomeInfo() {
        $validate = array(
            array(
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'middlename',
                'label' => 'Middlename',
                'rules' => 'required'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'meter_number',
                'label' => 'Meter Number',
                'rules' => 'required'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'required'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $result = array(
                    'error' => true,
                    'messages' => $this->form_validation->error_array()
                );
        } else {
            $id = $this->input->post('id');
            $firstname = $this->input->post('firstname');
            $middlename = $this->input->post('middlename');
            $lastname = $this->input->post('lastname');
            $meter_number = $this->input->post('meter_number');
            $address = $this->input->post('address');
            $contact = $this->input->post('contact');
            
            $check_meter_number = $this->Customer->checkMeterNoExist($id, $meter_number);
            if ($check_meter_number) {
                $result = array(
                    'error' => true,
                    'messages' => array(
                        'meter_number' => 'Meter number is already exist!'
                    )
                );
            } else {
                $data = array(
                    'customer_firstname' => $firstname,
                    'customer_lastname' => $lastname,
                    'customer_middlename' => $middlename,
                    'customer_meter_no' => $meter_number,
                    'customer_address' => $address,
                    'customer_contact' => $contact
                );
                $update = $this->Customer->updateCustomerById($id, $data);
                if(!$update) {
                    $result = array(
                        'error' => true,
                        'messages' => array(
                            'error' => 'Cannot update customer info, it might nothing has change!'
                        )
                    );
                } else {
                    $this->session->set_flashdata('success', $this->alert->successAlert('Customer Successfully updated'));
                    $result['error'] = false;
                }
            }
        }
        echo json_encode($result);
    }


    public function changeCustomerStatus() {
        $id = $this->input->post('id');
        $status = ($this->input->post('status')) ? 0 : 1;
        $changeStatus = $this->Customer->changeCustomerStatus($id, $status);
        $result['change'] = $changeStatus;
        echo json_encode($result);
    }
    
}