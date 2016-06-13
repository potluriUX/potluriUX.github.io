<?php

class Bcase extends CI_Controller {
private $initiative_array;

    function Bcase() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
         $this->load->library('session');
          date_default_timezone_set('America/Chicago');
    }
    
    function index(){
         $initiativeid = $this->uri->segment(3);
       $data['fiscalyrs'] =  $this->getfiscalyears();
       $fy =  $data['fiscalyrs'];
    $this->header('Business Case edit');
    $data['bcase'] = '';
    $data['labels'] = $this->db->get('label');
           $this->load->library(array('email', 'form_validation'));
            $this->form_validation->set_error_delimiters('<div style="color:red">*', '</div>');
             $this->form_validation->set_rules("quant_summary", 'Quant Summary', 'required|xss_clean|trim');
              $this->form_validation->set_rules("nonquant_summary", 'Non Quant Summary', 'required|xss_clean|trim');
               $this->form_validation->set_rules("additional_info", 'Additional Info', 'required|xss_clean|trim');
               $this->form_validation->set_rules("total_benefits", 'Total Benefits', 'required|xss_clean|trim');
               $this->form_validation->set_rules("total_benefits_1", 'Total Benefits', 'required|xss_clean|trim');
               $this->form_validation->set_rules("total_benefits_2", 'Total Benefits', 'required|xss_clean|trim');
                $this->form_validation->set_rules("total_cost", 'Total Cost', 'required|xss_clean|trim');
                 $this->form_validation->set_rules("total_cost_1", 'Total Cost', 'required|xss_clean|trim');
                  $this->form_validation->set_rules("total_cost_2", 'Total Cost', 'required|xss_clean|trim');
    foreach($data['labels']->result() as $row){
    	 
    	 $this->form_validation->set_rules("$row->name" ."_assumption", $row->name , 'required|xss_clean|trim');
    	 $this->form_validation->set_rules($row->name . '_firstyr_dollars', $row->name , 'required|xss_clean|trim');
    	 $this->form_validation->set_rules($row->name . '_secondyr_dollars', $row->name , 'required|xss_clean|trim');
    	
    }
  
    if ($this->form_validation->run() == FALSE) {
    $data['id'] = $initiativeid;
     $this->db->select('Bcase.id, Bcase.quant_summary, Bcase.nonquant_summary,Bcase.additional_info, Bcase.total_benefit, Bcase.total_cost,
     Bcase.total_benefits_1, Bcase.total_cost_1, Bcase.total_benefits_2, Bcase.total_cost_2, fy
     ');
            $this->db->from('Bcase');
            

            if ($initiativeid) {
                $this->db->where('Bcase.initiative_number', $initiativeid);
                 $data['bcase'] = $this->db->get();
            }
            
         $this->db->select('bcase_label.label_id, bcase_label.first_yrdollars, bcase_label.second_yrdollars, bcase_label.assumptions, label.name as labelname');
         $this->db->join('Bcase', 'Bcase.id = bcase_label.bcase_id');
         $this->db->join('label', 'bcase_label.label_id = label.id');
            $this->db->from('bcase_label');
     if ($initiativeid) {
                $this->db->where('Bcase.initiative_number', $initiativeid);
                 $data['bcaselabel'] = $this->db->get();
            }
    
       
       $this->load->view('bcase_edit_new_view.php', $data);
    }
    
    else
    {
      $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'quant_summary' =>$this->input->post('quant_summary') ,
                'nonquant_summary' => $this->input->post('nonquant_summary'),
                'additional_info' => $this->input->post('additional_info'),
              'total_benefit' => $this->input->post('total_benefits'),
               'total_cost' => $this->input->post('total_cost'),
                'total_benefits_1' => $this->input->post('total_benefits_1'),
               'total_cost_1' => $this->input->post('total_cost_1'),
                'total_benefits_2' => $this->input->post('total_benefits_2'),
               'total_cost_2' => $this->input->post('total_cost_2'),
                'date_inserted' => date( 'Y-m-d H:i:s' ),
               

            );
     

    if ($initiativeid) {
        
		 	
		 	$this->db->from('Bcase');
	
			
			$this->db->where('initiative_number', $initiativeid);
           if($this->db->count_all_results() == 0)
          {
          $data['fy'] =  $fy[1]; 
          
          $data['initiative_number'] = $initiativeid;
          $this->db->insert('Bcase', $data);
            	
        	}

           else
           { 
           
           $this->db->where('initiative_number', $initiativeid);
             $this->db->update('Bcase', $data);
             
           }
          echo  $this->db->last_query();
           $data['labels'] = $this->db->get('label');    
           $this->db->select('Bcase.id');
           $this->db->from('Bcase');
	
			
			$this->db->where('initiative_number', $initiativeid);
			foreach($this->db->get()->result() as $row)
				$bcaseid = $row->id;
				
			 $this->db->where('bcase_id',$bcaseid);

			$this->db->delete('bcase_label'); 
			 echo  $this->db->last_query();
				$i = 1;
      foreach($data['labels']->result() as $row){
      $data2['bcase_id']= $bcaseid;
      $data2['label_id'] = $i;
     
      $data2['first_yrdollars'] = $this->input->post($row->name . '_firstyr_dollars');
       $data2['second_yrdollars'] = $this->input->post($row->name . '_secondyr_dollars');
        $data2['assumptions'] = $this->input->post($row->name . '_assumption');
         $this->db->insert('bcase_label', $data2);
          echo  $this->db->last_query();
         $data2 = '';
        $i++;
      }
     exit;
    }
   
   

    
    }
    }
    
    
       function getfiscalyears() {

        $fiscalyears = array();
       
       if (ceil(date("m") / 3) != 4)
    	{ 	 $fiscalyears[0] = date('y');
          	 $fiscalyears[1] = date('y') + 1;
     	  	 $fiscalyears[2] = date('y') + 2;
     	}
     	else
     	{
     		 $fiscalyears[0] = date('y') + 1;
    	   	 $fiscalyears[1] = date('y') + 2;
     	  	 $fiscalyears[2] = date('y') + 3;
     	}

        return $fiscalyears;
    }
        function header($title) {
        $data['title'] = $title;
        $data['is_admin'] = $this->session->userdata('is_admin');
		$data['name'] = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
        $this->load->view('header_view', $data);
    }
    }