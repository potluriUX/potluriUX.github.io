<?php

class Initiative extends CI_Controller {
private $adminfuncs = array('delete', 'undelete');
    function Initiative() {
        parent::__construct();
      date_default_timezone_set('America/Chicago');
        $this->load->helper('url');
        $this->load->helper('form');
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
if(!$this->session->userdata('emailAddress'))
redirect('index.php/appleconnect/index/initiative');


        $this->header('Initiative');
        $data['queryregions'] = $this->getRegions();
        $data['emptyrow'] = "<tr><td> &nbsp;</td><td>&nbsp; </td></tr>";
        $data['heading'] = 'Concept Page';
        $data['query'] = $this->db->get('data_parent');
        $data['query'] = $this->db->get('data_parent');
        $data['track_query'] = $this->db->get('data');
        $data['subtrack_query'] = $this->db->get('data_child');
        $data['cap_query'] = $this->db->get('capabilities');
        $data['subcap_query'] = $this->db->get('subcapabilities');
        $data['queryjustifications'] = $this->getJustifications();
         $data['pathfinder_status'] = $this->getpathfinderstatus();
        $data['fiscal_yrs'] = $this->getFiscalyrs();
        $data['fiscal_yrs_system'] = $this->getfiscalyears();
        
        $data['start_end_yrs'] = $this->getstart_end_yrs();
        $data['username'] = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
        $data['type'] = $this->db->get('type');
        $this->load->view('initiative_view', $data);
    }

    function insert() {
        $this->load->library(array('email', 'form_validation'));
        $this->load->helper(array('email', 'form'));
        $this->form_validation->set_error_delimiters('<div style="color:red">*', '</div>');

        $data['query'] = $this->db->get('data_parent');
        $data['track_query'] = $this->db->get('data');
        $data['subtrack_query'] = $this->db->get('data_child');
        $data['cap_query'] = $this->db->get('capabilities');
        $data['subcap_query'] = $this->db->get('subcapabilities');
    


        $this->form_validation->set_rules('initiative_name', 'Initiative Name', 'required|xss_clean');
        $this->form_validation->set_rules('executive_sponsor', 'Executive Sponsor', 'required|xss_clean');

        $this->form_validation->set_rules('author', 'Author', 'required|xss_clean');
        $this->form_validation->set_rules('initiative_name', 'Initiative Name', 'required|xss_clean');
        $this->form_validation->set_rules('BPR_contact', 'BPR Contact', 'required|xss_clean');
        $this->form_validation->set_rules('justification[]', 'Justification', 'required|xss_clean');

        $this->form_validation->set_rules('org[]', 'Organization', 'required|xss_clean');
        // $this->form_validation->set_rules('track[]', 'Track', 'required|xss_clean');
        //  $this->form_validation->set_rules('subtrack[]', 'Subtrack', 'required|xss_clean');

        $this->form_validation->set_rules('exec_summary', 'Executive Summary', 'required|xss_clean');
        $this->form_validation->set_rules('proj_description', 'Project Description', 'required|xss_clean');

        //  $this->form_validation->set_rules('collaborative_comments', 'Collaborative Comments', '|max_length[12]|required|xss_clean');
        $this->form_validation->set_rules('region[]', 'Region', '|max_length[12]|required|xss_clean');
        $this->form_validation->set_rules('originator_region[]', 'Originating Region', '|max_length[12]|required|xss_clean');





        if ($this->form_validation->run() == FALSE) {
            $this->header('Initiative');
            $data['queryregions'] = $this->getRegions();
            $data['emptyrow'] = "<tr><td> &nbsp;</td><td>&nbsp; </td></tr>";
            $data['queryjustifications'] = $this->getJustifications();
            $data['trackpost'] = $this->input->post('track');
            $data['track2post'] = $this->input->post('track2');
//echo $this->input->post('ravi');
            $data['subtrackpost'] = $this->input->post('subtrack');
            $data['subtrack2post'] = $this->input->post('subtrack2');
            //   print_r( $data['trackpost']);
            //    print_r( $data['subtrackpost']);echo "Ravi";

            $this->load->view('initiative_view', $data);
        } else {
            $this->load->database();
            $this->header('Businesscase');
            $businesscase['querybenefits'] = $this->getBenefits();
            $businesscase['emptyrow'] = "<tr><td> &nbsp;</td><td>&nbsp; </td></tr>";
            $businesscase['queryjustifications'] = $this->getJustifications();
             $businesscase['tablelabelsca'] = $this->drawTablelabels('ca');
            $businesscase['tablelabelscs'] = $this->drawTablelabels('cs');
            $businesscase['tablelabelsrg'] = $this->drawTablelabels('rg');
           $rbj = $this->input->post('regions_benefitting_justification') ?   $this->input->post('regions_benefitting_justification') : '';
           
            $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'initiative_name' => $this->input->post('initiative_name'),
                'rollover' => $this->input->post('rollover'),
                'ultimate_gold_impact'=>$this->input->post('ultimate_gold_impact'),
                'fiscal_year' => $this->input->post('fiscal_year'),
                'executive_sponsor' => $this->input->post('executive_sponsor'),
           
                'author' => $this->input->post('author'),
                'BPR_contact' => $this->input->post('BPR_contact'),
                'type' => $this->input->post('type'),
                'exec_summary' => $this->input->post('exec_summary'),
                'proj_description' => $this->input->post('proj_description'),
                'regions_benefitting_justification' => $rbj,
                 'BHU' => $this->input->post('BHU'),
                 'start_date_yr' => $this->input->post('start_date_yr'),
                 'start_date_month' => $this->input->post('start_date_month'),
                 'end_date_yr' => $this->input->post('end_date_yr'),
                 'end_date_month' => $this->input->post('end_date_month'), 
                 'date_edited' => date( 'Y-m-d H:i:s' ),
                 'date_inserted' => date( 'Y-m-d H:i:s' ),
                 'BPR_pm'=> $this->input->post('BPR_pm'),
                 'BPR_analyst'=>$this->input->post('BPR_analyst'), 
                 'pathfinder_status_id' => $this->input->post('pathfinder_status')?$this->input->post('pathfinder_status'):1
            );


            $this->db->insert('initiative', $data);
            $id = $this->db->insert_id();

			$exec_sponsor_array = explode(', ', $this->input->post('executive_sponsor'));
			
			$temp = array();
			$tempid = '';
			
				foreach($exec_sponsor_array as $exec_sponsor)
				{	$exec_sponsor = rtrim($exec_sponsor, ','); 
					if($exec_sponsor != '')
					{
						$this->db->from('exec_sponsor');
		
				
						$this->db->where('name', $exec_sponsor);
        		 	  if($this->db->count_all_results() == 0)
         			  { 
         				 $temp['name'] = $exec_sponsor;
         				 $this->db->insert('exec_sponsor', $temp);
          		 	 	 $tempid = $this->db->insert_id();
          		  	 
          		  		 $ini_exec_sponsor['exec_sponsor_id'] = $tempid;
          		  		 $ini_exec_sponsor['initiative_number'] = $id;
          		  		 $this->db->insert('initiative_exec_sponsor', $ini_exec_sponsor);
        			  }

          		 	else
          			 {	
          			 	$this->db->select('id');
          	 			$this->db->where('name', $exec_sponsor);
           				$this->db->from('exec_sponsor');
           				$exec_results = $this->db->get();
           				 $tempid = $exec_results->row_array();
           		 
           				  $ini_exec_sponsor['exec_sponsor_id'] = $tempid['id'];
          			  	 $ini_exec_sponsor['initiative_number'] = $id;
          			  	 $this->db->insert('initiative_exec_sponsor', $ini_exec_sponsor);
                
          			 }
          	 
          			 $ini_exec_sponsor = array();
          			 $tempid = '';
          			 $exec_results = '';
          			 $temp = array();
          		 }
		   }

            foreach ($this->input->post('region') as $value) {
                $data = array("initiative_number" => $id,
                    "region_id" => $value);
                $this->db->insert('initiative_region', $data);
            }
            foreach ($this->input->post('originator_region') as $value) {
                $data = array("initiative_number" => $id,
                    "region_id" => $value);
                $this->db->insert('initiative_originatorregion', $data);
            }


            foreach ($this->input->post('org') as $value) {

                $orgarray = explode(',', $value);

                foreach ($orgarray as $value2) {

                    $data = array("initiative_number" => $id,
                        "organization_id" => $value2);
                    $this->db->insert('initiative_organization', $data);
                }
            }
            foreach ($this->input->post('track') as $value) {

                $trackarray = explode(',', $value);
                print_r($trackarray);
                foreach ($trackarray as $value2) {

                    $data = array("initiative_number" => $id,
                        "track_id" => $value2);
                    $this->db->insert('initiative_track', $data);
                }
            }

            foreach ($this->input->post('subtrack') as $value) {
                if ($value == '')
                    $value = 0;
                $subtrackarray = explode(',', $value);
                print_r($subtrackarray);
                foreach ($subtrackarray as $value2) {

                    $data = array("initiative_number" => $id,
                        "subtrack_id" => $value2);
                    if ($value2 != '')
                        $this->db->insert('initiative_subtrack', $data);
                }
            }
            foreach ($this->input->post('track2') as $value) {

                $track2array = explode(',', $value);
                print_r($track2array);
                foreach ($track2array as $value2) {

                    $data = array("initiative_number" => $id,
                        "capabilities_id" => $value2);
                    $this->db->insert('initiative_capabilities', $data);
                }
            }
            foreach ($this->input->post('subtrack2') as $value) {
                if ($value == '')
                    $value = 0;

                $subtrack2array = explode(',', $value);
                print_r($subtrack2array);
                foreach ($subtrack2array as $value2) {

                    $data = array("initiative_number" => $id,
                        "subcapabilities_id" => $value2);
                    if ($value2 != '')
                        $this->db->insert('initiative_subcapabilities', $data);
                }
            }

            foreach ($this->input->post('justification') as $value) {
                $data = array("initiative_number" => $id,
                    "justification_id" => $value);
                $this->db->insert('initiative_justification', $data);
            }

            $queryregions = $this->getRegions();
            foreach ($queryregions->result() as $row) {
                $comment = $this->input->post($row->name . "collaborative_comments");
                $region_id = $row->id;
                $data = array("comment" => date("F j, Y, g:i a") . ' : '. $comment . "<br><br>",
                    "region_id" => $region_id,
                    "initiative_number" => $id
                );
                if($this->input->post($row->name . "collaborative_comments"))
                $this->db->insert('collaborative_comments', $data);
                echo $this->db->last_query();
            }
            $businesscase['initiative_number'] = $id;
           // $this->load->view('businesscase_view', $businesscase);
         //  redirect( base_url() . 'index.php/initiative/edit/' . $id . '/' . '1');
         
          redirect( base_url() . 'index.php/businesscase/edit/' . $id );
        }
    }
function check_inmyinitiatives($initiativeid){
	
	  $this->load->model('concept_model');
	  
	  $acname = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
	  $commonname = $this->session->userdata('cn');
	  $is_admin = 	$this->session->userdata('is_admin');
	  $initiative_numbers = array();
	  foreach($this->concept_model->getmyinitiatives(array($acname, $commonname), $is_admin)->result() as $row)
	  {
	  		$initiative_numbers[] = $row->initiative_number;
	  }
	  
	  if(in_array($initiativeid, $initiative_numbers))
	  {
	  	return true;	
	  }
	  else
	  {
	  	echo "Not permitted";
	  	exit;
	  }
	}

    function edit() {
     $initiativeid = $this->uri->segment(3);
    
    if(!$this->session->userdata('emailAddress'))
redirect('index.php/appleconnect/index/initiative/edit/' . $initiativeid);
        $this->load->library(array('email', 'form_validation'));
        $this->load->helper(array('email', 'form'));
     
        $data['initiativeid'] = $initiativeid;
        if(!empty($initiativeid))
        $this->check_inmyinitiatives($initiativeid);
        $this->form_validation->set_rules('initiative_name', 'Initiative Name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->header('Initiative Edit', $initiativeid);
            $data['queryregions'] = $this->getRegions();
            $data['emptyrow'] = "<tr><td> &nbsp;</td><td>&nbsp; </td></tr>";
            $data['heading'] = 'Concept Page';
            $data['query'] = $this->db->get('data_parent');
		
            $data['track_query'] = $this->db->get('data');
            $data['subtrack_query'] = $this->db->get('data_child');
            $data['cap_query'] = $this->db->get('capabilities');
            $data['subcap_query'] = $this->db->get('subcapabilities');
            $data['queryjustifications'] = $this->getJustifications();
                $data['fiscal_yrs'] = $this->getFiscalyrs();
                 $data['fiscal_yrs_system'] = $this->getfiscalyears();
                
                  $data['start_end_yrs'] = $this->getstart_end_yrs();
			 $data['pathfinder_status'] = $this->getpathfinderstatus();
			$data['typetable'] = $this->db->get('type');
            $this->db->select('exec_summary, type.name as type, proj_description, scope, initiative.initiative_number, fiscal_year, rollover, ultimate_gold_impact, GROUP_CONCAT(DISTINCT `exec_sponsor`.`name` SEPARATOR \', \') as executive_sponsor,  author, BPR_contact, initiative_name, regions_benefitting_justification, BHU, start_date_yr, start_date_month, end_date_yr, end_date_month, date_inserted, date_edited, BPR_analyst, BPR_pm, pathfinder_status_id', false);
            if ($initiativeid) {
            	$this->db->join('type', 'initiative.type = type.id');
            	$this->db->join('initiative_exec_sponsor', 'initiative.initiative_number = initiative_exec_sponsor.initiative_number');
            	$this->db->join('exec_sponsor', 'exec_sponsor.id = `initiative_exec_sponsor`.`exec_sponsor_id`');
                $this->db->where("initiative.initiative_number", $initiativeid);
            }
            $this->db->from('initiative');

            $data['initiatives'] = $this->db->get();
            $this->load->model('concept_model');

            $this->db->select('initiative.initiative_number, region.id, region.name');
            $this->db->from('initiative');
            $this->db->join('initiative_region', 'initiative.initiative_number = initiative_region.initiative_number');
            $this->db->join('region', 'region.id = initiative_region.region_id');
            if ($initiativeid) {
                $this->db->where('initiative.initiative_number', $initiativeid);
            }
            $data['regions'] = $this->db->get();

            $this->db->select('initiative.initiative_number, region.id, region.name');
            $this->db->from('initiative');
            $this->db->join('initiative_originatorregion', 'initiative.initiative_number = initiative_originatorregion.initiative_number');
            $this->db->join('region', 'region.id = initiative_originatorregion.region_id');
            if ($initiativeid) {
                $this->db->where("initiative.initiative_number", $initiativeid);
            }
            $data['originatorregions'] = $this->db->get();



            $data['organizations'] = $this->concept_model->get_organizations($initiativeid);




            $data['justifications'] = $this->concept_model->get_justifications($initiativeid);
            $data['comments'] = $this->concept_model->get_comments($initiativeid);

            $this->load->view('initiative_edit_view', $data);
        } else {
            $this->load->database();
           $this->header('BusinessCase');
            $businesscase['querybenefits'] = $this->getBenefits();
            $businesscase['emptyrow'] = "<tr><td> &nbsp;</td><td>&nbsp; </td></tr>";
            $businesscase['queryjustifications'] = $this->getJustifications();
            $businesscase['tablelabelsca'] = $this->drawTablelabels('ca');
            $businesscase['tablelabelscs'] = $this->drawTablelabels('cs');
            $businesscase['tablelabelsrg'] = $this->drawTablelabels('rg');
            $rbj = $this->input->post('regions_benefitting_justification') ?   $this->input->post('regions_benefitting_justification') : '';
            $data2 = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'initiative_name' => $this->input->post('initiative_name'),
                'rollover' => $this->input->post('rollover'),
				'ultimate_gold_impact'=>$this->input->post('ultimate_gold_impact'),
                'fiscal_year' => $this->input->post('fiscal_year'),
                'executive_sponsor' => $this->input->post('executive_sponsor'),
         
                'author' => $this->input->post('author'),
                'BPR_contact' => $this->input->post('BPR_contact'),
                'type' => $this->input->post('type'),
                'exec_summary' => $this->input->post('exec_summary'),
                'proj_description' => $this->input->post('proj_description'),
                'regions_benefitting_justification' => $rbj,
                  'BHU' => $this->input->post('BHU'),
                 'start_date_yr' => $this->input->post('start_date_yr'),
                 'start_date_month' => $this->input->post('start_date_month'),
                 'end_date_yr' => $this->input->post('end_date_yr'),
                 'end_date_month' => $this->input->post('end_date_month'),
                  'date_edited' => date( 'Y-m-d H:i:s' ), 
                  'BPR_pm'=> $this->input->post('BPR_pm'),
                 'BPR_analyst'=>$this->input->post('BPR_analyst'),
                   'pathfinder_status_id' => $this->input->post('pathfinder_status')?$this->input->post('pathfinder_status'):1
            );
            
            $initiative_id = $this->input->post('initiative_id');
         
          
if($initiative_id){
   $this->db->where('initiative_number', $initiative_id);
            $this->db->update('initiative', $data2);
          //  echo $this->input->post('regions_benefitting_justification');
            $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_exec_sponsor');
           $exec_sponsor_array = explode(', ', $this->input->post('executive_sponsor'));
			
			$temp = array();
			$tempid = '';
			
				foreach($exec_sponsor_array as $exec_sponsor)
				{$exec_sponsor = rtrim($exec_sponsor, ','); 
					if($exec_sponsor != '')
					{
						$this->db->from('exec_sponsor');
		
				
						$this->db->where('name', $exec_sponsor);
        		 	  if($this->db->count_all_results() == 0)
         			  { 
         				 $temp['name'] = $exec_sponsor;
         				 $this->db->insert('exec_sponsor', $temp);
          		 	 	 $tempid = $this->db->insert_id();
          		  	 
          		  		 $ini_exec_sponsor['exec_sponsor_id'] = $tempid;
          		  		 $ini_exec_sponsor['initiative_number'] = $initiative_id;
          		  		 $this->db->insert('initiative_exec_sponsor', $ini_exec_sponsor);
        			  }

          		 	else
          			 {	
          			 	$this->db->select('id');
          	 			$this->db->where('name', $exec_sponsor);
           				$this->db->from('exec_sponsor');
           				$exec_results = $this->db->get();
           				 $tempid = $exec_results->row_array();
           		 
           				  $ini_exec_sponsor['exec_sponsor_id'] = $tempid['id'];
          			  	 $ini_exec_sponsor['initiative_number'] = $initiative_id;
          			  	 $this->db->insert('initiative_exec_sponsor', $ini_exec_sponsor);
                
          			 }
          	 
          			 $ini_exec_sponsor = array();
          			 $tempid = '';
          			 $exec_results = '';
          			 $temp = array();
          		 }
		   }
           
           $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_region');

            foreach ($this->input->post('region') as $value) {
                $data = array("initiative_number" => $initiative_id,
                    "region_id" => $value);
                $this->db->insert('initiative_region', $data);
            }
            $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_originatorregion');
            foreach ($this->input->post('originator_region') as $value) {
                $data = array("initiative_number" => $initiative_id,
                    "region_id" => $value);
                $this->db->insert('initiative_originatorregion', $data);
            }
            $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_organization');
            foreach ($this->input->post('org') as $value) {

                $orgarray = explode(',', $value);

                foreach ($orgarray as $value2) {

                    $data = array("initiative_number" => $initiative_id,
                        "organization_id" => $value2);
                    $this->db->insert('initiative_organization', $data);
                }
            }

            $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_track');
            foreach ($this->input->post('track') as $value) {

                $trackarray = explode(',', $value);

                foreach ($trackarray as $value2) {

                    $data = array("initiative_number" => $initiative_id,
                        "track_id" => $value2);
                    $this->db->insert('initiative_track', $data);
                }
            }
            $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_subtrack');
          
            foreach ($this->input->post('subtrack') as $value) {
                if ($value == '')
                    $value = 0;
                $subtrackarray = explode(',', $value);

                foreach ($subtrackarray as $value2) {

                    $data = array("initiative_number" => $initiative_id,
                        "subtrack_id" => $value2);
                    if ($value2 != '')
                        $this->db->insert('initiative_subtrack', $data);
                }
            }
			
            $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_capabilities');
            foreach ($this->input->post('track2') as $value) {

                $track2array = explode(',', $value);

                foreach ($track2array as $value2) {

                    $data = array("initiative_number" => $initiative_id,
                        "capabilities_id" => $value2);
                    $this->db->insert('initiative_capabilities', $data);
                }
            }

            $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_subcapabilities');
            foreach ($this->input->post('subtrack2') as $value) {
                if ($value == '')
                    $value = 0;

                $subtrack2array = explode(',', $value);

                foreach ($subtrack2array as $value2) {

                    $data = array("initiative_number" => $initiative_id,
                        "subcapabilities_id" => $value2);
                    if ($value2 != '')
                        $this->db->insert('initiative_subcapabilities', $data);
                }
            }

            $this->db->where('initiative_number', $initiative_id);

            $this->db->delete('initiative_justification');


            foreach ($this->input->post('justification') as $value) {
                $data = array("initiative_number" => $initiative_id,
                    "justification_id" => $value);
                $this->db->insert('initiative_justification', $data);
            }
           // $this->db->where('initiative_number', $initiative_id);

          //  $this->db->delete('collaborative_comments');
            $queryregions = $this->getRegions();
            
            $comments_name = array();
            
                    
           $this->load->model('concept_model');
            
           
            $pastcomments = $this->concept_model->get_comments($initiative_id);
                foreach($pastcomments->result() as $row2){
          
          	$comments_name[$row2->name]['name'] =  $row2->comment;
          	$comments_name[$row2->name]['id'] =  $row2->collid;
          	
          
          }
          
        //  print_r($comments_name);
            foreach ($queryregions->result() as $row) {
            
            
    
           if(isset($comments_name[$row->name]['name'] ))
            
                $comment = $comments_name[$row->name]['name'] . date("F j, Y, g:i a") . ' : ' . $this->input->post($row->name . "collaborative_comments") . '<br><br>';
                
                else
                $comment =  date("F j, Y, g:i a") . ' : ' . $this->input->post($row->name . "collaborative_comments") . '<br><br>'; 	
                $region_id = $row->id;
                $data = array("comment" => $comment,
                    "region_id" => $region_id,
                    "initiative_number" => $initiative_id
                );
                
                 
           if($this->input->post($row->name . "collaborative_comments"))
           {
           		$this->db->where('id',  $comments_name[$row->name]['id']);
           		$this->db->update('collaborative_comments', $data);
           		if(!$comments_name[$row->name]['id'])
           		$this->db->insert('collaborative_comments', $data);
           		
           }
        
          // echo $this->db->last_query();
                //$this->db->insert('collaborative_comments', $data);
                
             //   echo $comment . $comments_name[$row->name]['id'];
            }
          redirect( base_url() . 'index.php/businesscase/edit/' . $initiative_id );
        }
        
        else{
         redirect( base_url()  );
        }
        }
    }
function undelete(){
$check = $this->check($this->uri->segment(2));

 	if(!$check)
 		exit;
 		
 		echo "not exited";
 	  $initiativeid = $this->uri->segment(3);
 	    $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'is_deleted' =>0
                );
 	  if($initiativeid){
   $this->db->where('initiative_number', $initiativeid);
            $this->db->update('initiative', $data);
             $this->session->set_flashdata('success', ' Unarchived the record');
                 redirect(base_url() . 'index.php/concept/search');
    }
}
 function delete(){
 	$check = $this->check($this->uri->segment(2));
 	if(!$check)
 		exit;
 		
 		echo "not exited";
 	  $initiativeid = $this->uri->segment(3);
 	    $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'is_deleted' =>1
                );
 	  if($initiativeid){
   $this->db->where('initiative_number', $initiativeid);
            $this->db->update('initiative', $data);
             $this->session->set_flashdata('success', ' Archived the record');
                 redirect(base_url() . 'index.php/concept/search');
    }
 	  
 }	
 function header($title, $initiativeid = '') {
        $data['title'] = $title;
        $data['initiativeid'] = $initiativeid;
		$data['name'] = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
        $this->load->view('header_view', $data);
    }

    function getBenefits() {
        $query = $this->db->get('quantifiable_benefits');

        return $query;
    }

    function getRegions() {
		$this->db->order_by('region.id');
        $query = $this->db->get('region');

        return $query;
    }
    
        function getFiscalyrs() {
		$this->db->order_by('fiscal_yr.id');
        $query = $this->db->get('fiscal_yr');

        return $query;
    }

		  function getfiscalyears() {

        $fiscalyears = array();
       
       if (ceil(date("m") / 3) != 4)
    	{	  
    		$fiscalyears[0] = date('Y')-1;
    		$fiscalyears[1] = date('Y') ;
    	    $fiscalyears[2] = date('Y') + 1;
     	   $fiscalyears[3] = date('Y') + 2;
     	}
     	else{
     		$fiscalyears[0] = date('Y');
    		$fiscalyears[1] = date('Y') +1;
    	    $fiscalyears[2] = date('Y') + 2;
     	   $fiscalyears[3] = date('Y') + 3;
     	   }

        return $fiscalyears;
    }
        function getstart_end_yrs() {
		$this->db->order_by('start_end_yrs.id');
        $query = $this->db->get('start_end_yrs');

        return $query;
    }
    function getJustifications() {
        $query = $this->db->get('justification');

        return $query;
    }
    function getpathfinderstatus(){
    $query = $this->db->get('pathfinder_status');

        return $query;
    
    }

    function drawTablelabels($name) {
      if($name == 'ca')
      $tablelabels = '<table>
                          <tr><td width="120px"></td><td width=270px>Description</td><td width=270px>Assumptions</td><td width=200px>Est. Cost Avoidance</td></tr>
                          </table>';
      if($name == 'cs')
        $tablelabels = '<table>
                          <tr><td width="120px"></td><td width=250px>Description</td><td width=270px>Assumptions</td><td width=200px>Est. Cost Savings</td></tr>
                          </table>';
    if($name == 'rg')
        $tablelabels = '<table>
                          <tr><td width="120px"></td><td width=270px>Description</td><td width=270px>Assumptions</td><td width=200px>Est. Revenue Growth</td></tr>
                          </table>';
        return $tablelabels;
    }

}