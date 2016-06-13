<?php

class Concept extends CI_Controller {
private $initiative_array;

    function Concept() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
         $this->load->library('session');
          date_default_timezone_set('America/Chicago');
    }

    function index() {
        $this->header('Concept Page');
        $data['queryregions'] = $this->getRegions();
        $data['queryjustifications'] = $this->getJustifications();
        $this->load->view('concept_view', $data);
    }

function index2(){

redirect(base_url());

}

    function search($adminurlparam = '') {

if(!$this->session->userdata('emailAddress'))
redirect('index.php/appleconnect/index/concept/search');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'index.php/concept/search/';

        $config['per_page'] = '10';
        $config['full_tag_open'] = '<p style="float:left">';
        $config['full_tag_close'] = '</p>';
		$config['num_links'] = 1;
		$config['next_link'] = 'Next ›';
		$config['prev_link'] = '‹ Prev';
		$config['last_link'] = 'Last ››';
		$config['first_link'] = '‹‹ First';
        //load the model and get results
         $this->load->model('concept_model');


		 $this->load->model('concept_model');
	  
	  	$acname = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
	 	 $commonname = $this->session->userdata('cn');
	 	 $is_admin = 	$this->session->userdata('is_admin');
	 	 $initiative_numbers = array();
	  	foreach($this->concept_model->getmyinitiatives(array($acname, $commonname), $is_admin)->result() as $row)
	  	{
	  		$initiative_numbers[] = $row->initiative_number;
	  	}

 		$data['myinitiatives'] = $initiative_numbers;
 		
 			$data['is_admin'] = $is_admin;
 		
        
        if (urldecode($this->uri->segment(8)) && strpos(urldecode($this->uri->segment(8)), ',') !== FALSE) {
            //echo 'no of items' . trim(urldecode($this->uri->segment(3)), ',') ;
            $orgs_id = trim(urldecode($this->uri->segment(4)), ',');
            $tracks_id = trim(urldecode($this->uri->segment(5)), ',');
            $subtracks_id = trim(urldecode($this->uri->segment(6)), ',');
            $capabilities_id = trim(urldecode($this->uri->segment(7)), ',');
            $subcapabilities_id = trim(urldecode($this->uri->segment(8)), ',');
           $order_by = $this->uri->segment(9)?$this->uri->segment(9):'';
             $archivedlist = $this->uri->segment(10)?trim(urldecode($this->uri->segment(10))):''; 
           $searchoption = $this->uri->segment(11)?trim(urldecode($this->uri->segment(11))):'';
             $operator = $this->uri->segment(12)?trim(urldecode($this->uri->segment(12))):'';
           $searchtext = $this->uri->segment(13)?trim(urldecode($this->uri->segment(13))):'';
         
        } 
        else {
        
            $orgs_id = trim(urldecode($this->uri->segment(3)), ',');
            $tracks_id = trim(urldecode($this->uri->segment(4)), ',');
            $subtracks_id = trim(urldecode($this->uri->segment(5)), ',');
            $capabilities_id = trim(urldecode($this->uri->segment(6)), ',');
            $subcapabilities_id = trim(urldecode($this->uri->segment(7)), ',');
              $order_by = $this->uri->segment(8)?$this->uri->segment(8):'';
               $archivedlist = $this->uri->segment(9)?trim(urldecode($this->uri->segment(9))):'';
              $searchoption = $this->uri->segment(10)?trim(urldecode($this->uri->segment(10))):'';
               $operator = $this->uri->segment(11)?trim(urldecode($this->uri->segment(11))):'';
              $searchtext = $this->uri->segment(12)?trim(urldecode($this->uri->segment(12))):'';
             
        }


// Some code happens here
		
		$data['column_sorted'] = $order_by?$order_by:'';
 		
        $data['results'] = $this->concept_model->get_all_select($is_admin, $config['per_page'], $this->uri->segment(3), $orgs_id, $tracks_id, $subtracks_id, $capabilities_id, $subcapabilities_id, $order_by, $searchtext, $searchoption, $operator, $archivedlist);

      
		  $config['total_rows'] = $this->concept_model->return_count($is_admin, $config['per_page'], $this->uri->segment(3), $orgs_id, $tracks_id, $subtracks_id, $capabilities_id, $subcapabilities_id, $searchtext, $searchoption, $operator, $archivedlist); // load the HTML Table Class
  
     
       $data['count'] = $config['total_rows'];
		 $data['success'] = $this->session->flashdata('success');
	
//echo $this->db->last_query();
        $this->pagination->initialize($config);
        $data['pag_links'] = $this->pagination->create_links();
        $this->load->library('table');

        $this->table->set_heading('Executive summary', 'Project Description', 'Scope', 'Initiative number', 'Fiscal Year', 'Rollover', 'Initiative requestor', 'Executive sponsor', 'Author', 'BPR contact', 'Initiative Name');
        $tmpl = array(
            'table_open' => '<table border="1" cellspacing ="0" cellpadding="5" border-style="solid"  >',
            'heading_row_start' => '<tr>',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end' => '</th>',
            'row_start' => '<tr>',
            'row_end' => '</tr>',
            'cell_start' => '<td>',
            'cell_end' => '</td>',
            'row_alt_start' => '<tr>',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',
            'table_close' => '</table>'
        );

        $this->table->set_template($tmpl);
        // load the view
        define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
        if (IS_AJAX)
            {
            
             $data['totalresults'] = $this->concept_model->getinitiatives(); 
            $this->load->view('concept2_ajax_view', $data);
            
            }
        else {
            
            $this->header('Landing Page');
           
           $data['adminurlparam'] = $adminurlparam;
        $data['query'] = $this->db->get('data_parent');
        $data['track_query'] = $this->db->get('data');
        $data['subtrack_query'] = $this->db->get('data_child');
        $data['cap_query'] = $this->db->get('capabilities');
        $data['subcap_query'] = $this->db->get('subcapabilities');
            $this->load->view('concept2_view', $data);
        }
    }

    function header($title) {
        $data['title'] = $title;
        $data['is_admin'] = $this->session->userdata('is_admin');
		$data['name'] = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
        $this->load->view('header_view', $data);
    }

    function insert() {
        $this->load->library(array('email', 'form_validation'));
        $this->load->helper(array('email', 'form'));
        $this->form_validation->
                set_rules('title', 'title', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('concept_view'); // load the contact form
        } else {
            $this->load->database();

            $data = array(
                'title' => $this->input->post('title'),
                'requester_id' => $this->input->post('requester_id'),
                'exec_summary' => $this->input->post('exec_summary'),
                'justification' => $this->input->post('justification'),
                'initiative' => $this->input->post('initiative'),
                'opportunity' => $this->input->post('opportunity'),
                'proposal' => $this->input->post('proposal'),
                'scope' => $this->input->post('scope'),
                'initiative' => $this->input->post('initiative'),
                'quantifiable' => $this->input->post('quantifiable'),
                'nonquantifiable' => $this->input->post('nonquantifiable'),
                'oneyr_revenue' => $this->input->post('oneyr_revenue'),
                'threeyr_revenue' => $this->input->post('threeyr_revenue'),
            );


            $this->db->insert('concept', $data);
            $id = $this->db->insert_id();

            foreach ($this->input->post('region') as $value) {
                $data = array("concept_id" => $id,
                    "region_id" => $value);
                $this->db->insert('concept_region', $data);
            }
        }
    }

    function generate_excel() {



// run joins, order by, where, or anything else here
        $query = $this->db->get('concept');
        $this->to_excel($query);
    }

    function to_excel($query, $filename='exceloutput') {
        $headers = ''; // just creating the var for field headers to append to below
        $data = ''; // just creating the var for field data to append to below

        $obj = & get_instance();

        $fields = $query->field_data();
        if ($query->num_rows() == 0) {
            echo '<p>The table appears to have no data.</p>';
        } else {
            foreach ($fields as $field) {
                $headers .= $field->name . "\t";
            }

            foreach ($query->result() as $row) {
                $line = '';
                foreach ($row as $value) {
                    if ((!isset($value)) OR ($value == "")) {
                        $value = "\t";
                    } else {
                        $value = str_replace('"', '""', $value);
                        $value = '"' . $value . '"' . "\t";
                    }
                    $line .= $value;
                }
                $data .= trim($line) . "\n";
            }

            $data = str_replace("\r", "", $data);

            header("Content-type: application/x-msdownload");
            header("Content-Disposition: attachment; filename=$filename.xls");
            echo "$headers\n$data";
        }
    }

    function getRegions() {
		$this->db->order_by('region.id');
        $query = $this->db->get('region');

        return $query;
    }

    function getJustifications() {
        $query = $this->db->get('justification');

        return $query;
    }

}
