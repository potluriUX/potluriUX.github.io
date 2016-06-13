<?php

class User extends CI_Controller {

    private $headers;
    private $users;
    private $table;
    private $adminfuncs = array('insert', 'edit');

    function User() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
         date_default_timezone_set('America/Chicago');
        $this->load->library('session');
    }
	function check($functionname){
	
		if(in_array($functionname, $this->adminfuncs))
		{	
			
			if($this->session->userdata('is_admin'))
				return true;
			else 
				echo "Access prohibited";
		}	
		else
			return false;
	
	}
    function index() {
        if (!$this->session->userdata('emailAddress'))
            redirect('index.php/appleconnect/index/user/');

        $this->header('User');
    }

    function getusers() {

        $this->headers = array('id', '', 'First Name', 'Last Name', 'Email', 'Access Type', 'Modified Date', 'Modified By', 'Last Login');
        $this->db->select('user.id, firstname, lastname, email, access.name, modified_date, modified_by, last_login');
		 $this->db->from('user');
		$this->db->join('access', 'user.is_admin = access.accessid');
       
        $this->users = $this->db->get();
        $this->drawcaptable();
    }

    function insert() {
        if (!$this->session->userdata('emailAddress'))
            redirect('index.php/appleconnect/index/user/insert');
            $check = $this->check($this->uri->segment(2));

 		if(!$check)
 			exit;
        $this->getusers();
        $data['success'] = $this->session->flashdata('success');
        $this->load->library(array('email', 'form_validation'));
        $this->load->helper(array('email', 'form'));
        $this->form_validation->set_error_delimiters('<div style="color:red">*', '</div>');
        $data['table'] = $this->table;
        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email|trim');
		$this->form_validation->set_rules('admin', 'Admin', 'xss_clean|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->header('User');
            $data['insert'] = 1;
            $this->load->view("user_view", $data);
        } else {
            $this->load->database();
            $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'firstname' => $this->input->post('first_name'),
                'lastname' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'is_admin' => $this->input->post('admin'),
                'modified_by' => $this->session->userdata('cn')
            );
            $this->db->select('email');
            $this->db->from('user');
            $this->db->where('email', $data['email']);

            if ($this->db->count_all_results() == 0)
                $this->db->insert('user', $data);
            $id = $this->db->insert_id();
            if ($id) {
                $this->session->set_flashdata('success', 'User Added Successfully');
                redirect(base_url() . 'index.php/user/edit/' . $id);
            } else {
                $this->session->set_flashdata('success', 'User Already Exists');
                redirect(base_url() . 'index.php/user/insert');
            }
        }
    }

    function edit() {
        $data['id'] = $this->uri->segment(3);
		$check = $this->check($this->uri->segment(2));

 		if(!$check)
 		exit;
        if (!$this->session->userdata('emailAddress'))
            redirect('index.php/appleconnect/index/user/edit/' . $data['id']);
        $data['success'] = $this->session->flashdata('success');
        $this->getusers();
        $data['table'] = $this->table;
        $this->load->library(array('email', 'form_validation'));
        $this->load->helper(array('email', 'form'));
        $this->form_validation->set_error_delimiters('<div style="color:red">*', '</div>');

        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->header('Edit user');
            if (isset($data['id'])) {
                $this->db->select('firstname, lastname, email, is_admin');
                $this->db->where('id', $data['id']);
                $this->db->from('user');
                $data['user'] = $this->db->get();
            }

            $this->load->view("user_view", $data);
        } else {
            $this->load->database();
            $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'firstname' => $this->input->post('first_name'),
                'lastname' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'is_admin' => $this->input->post('admin'),
                'modified_by' => $this->session->userdata('cn')
            );
            $id = $this->input->post('id');
            if (isset($id)) {
                $this->db->where('id', $id);
                $this->db->update('user', $data);
				$this->session->set_flashdata('success', 'User Edited Successfully');


                redirect(base_url() . 'index.php/user/insert');
            }
        }
    }

    function drawcaptable() {


        $keys = $this->headers;

        $this->table .= "<table id='mytable' border=1 cellspacing ='0' cellpadding='3' width=100% >";
		$this->table .= "<thead><tr>";
        foreach ($keys as $key) {

            $this->table .= "<th style='cursor:pointer;color:blue'>$key</th>";
        }
        $this->table .= "</tr>";
        $this->table .= "</thead><tbody>";

        
        foreach ($this->users->result() as $row) {




            $this->table .= "<tr class='bob_row data_row odd'>";
            foreach ($row as $key => $value)
                if ($key == 'id')
                {	
                	$this->table .= "<td>" . $row->id . "</td>";
                    $this->table .= "<td><a href='" . base_url() . 'index.php/user/edit/' . $row->id . "'>Edit</a></td>";
                }
                else
                    $this->table .= "<td>" . $value . "</td>";
            $this->table .= "</tr>";
        }
        
        $this->table .= "</tbody></table>";
    }

    function header($title, $initiativeid = '') {
        $data['title'] = $title;
        $data['initiativeid'] = $initiativeid;
        $data['name'] = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
        $this->load->view('header_view', $data);
    }

}

