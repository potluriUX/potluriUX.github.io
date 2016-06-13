<?php

class Conceptslide extends CI_Controller {

    function Conceptslide() {
        parent::__construct();
        date_default_timezone_set('America/Chicago');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

    function index($initiative_id = '') {
        if (!$this->session->userdata('emailAddress'))
            redirect('index.php/appleconnect/index/conceptslide/index/' . $this->uri->segment(3));
       // $this->header('Concept Slide');
        $initiativeid = $this->uri->segment(3);
       if(!$initiativeid)
        	$initiativeid = $initiative_id;
    	else 
    		$this->header('Concept Slide');
      if ($initiativeid) {
     
        $this->db->select('exec_summary, proj_description, scope, initiative.initiative_number,  rollover, ultimate_gold_impact, GROUP_CONCAT(DISTINCT `exec_sponsor`.`name` SEPARATOR \', \') as executive_sponsor, author, BPR_contact, initiative_name, BHU, type.name as type, date_inserted, date_edited', false);
        if ($initiativeid) {
         	$this->db->join('initiative_exec_sponsor', 'initiative.initiative_number = initiative_exec_sponsor.initiative_number');
            	$this->db->join('exec_sponsor', 'exec_sponsor.id = `initiative_exec_sponsor`.`exec_sponsor_id`');
        	$this->db->join('type', "initiative.type = type.id");
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        $this->db->from('initiative');

        $data['initiatives'] = $this->db->get();

        $this->db->select('fiscal_yr.year');
        $this->db->from('initiative');
        $this->db->join('fiscal_yr', 'initiative.fiscal_year = fiscal_yr.id');

        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }

        $data['fiscal_year'] = $this->db->get();
        $this->load->model('concept_model');

        $this->db->select('initiative.initiative_number, region.name');
        $this->db->from('initiative');
        $this->db->join('initiative_region', 'initiative.initiative_number = initiative_region.initiative_number');
        $this->db->join('region', 'region.id = initiative_region.region_id');
        if ($initiativeid) {
            $this->db->where('initiative.initiative_number', $initiativeid);
        }
        $data['regions'] = $this->db->get();

        $this->db->select('initiative.initiative_number, region.name');
        $this->db->from('initiative');
        $this->db->join('initiative_originatorregion', 'initiative.initiative_number = initiative_originatorregion.initiative_number');
        $this->db->join('region', 'region.id = initiative_originatorregion.region_id');
        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        $data['originatorregions'] = $this->db->get();



        $data['organizations'] = $this->concept_model->get_organizations($initiativeid);


        $data['tracks'] = $this->concept_model->get_tracks($initiativeid);


        $data['subtracks'] = $this->concept_model->get_subtracks($initiativeid);



        $data['capabilities'] = $this->concept_model->get_capabilities($initiativeid);


        $data['subcapabilities'] = $this->concept_model->get_subcapabilities($initiativeid);
        
		$date = $this->concept_model->get_dates($initiativeid);

		 $years = $this->getfiscalyears();

 $j = 0;

foreach ($years as $year) {
            $i = 0;


            if ($j != 1)
                for ($i = 0; $i < 4; $i++) {
                   // $data['timelineheaderyr'][] = $year;
                    $data['timelineheader'][] =  'Q' . ($i + 1) ;//. "'" . $year;
                  
                }
            else
                for ($i = 0; $i < 12; $i++) {
                   //$data['timelineheaderyr'][] = $year;
                     $data['timelineheader'][] =  'Q' . (ceil(($i+1) / 3 )) . "'"  . date("M", mktime(0, 0, 1, ($i - 2), 1));
                   
                }
            $j++;
        }

		foreach($date->result() as $row){
		$data['startyear'] = $row->startyear;
		$data['start_date_month'] = $this->concept_model->get_month_name($row->start_date_month);
		$startmonthnum = $row->start_date_month;
		$data['endyear'] = $row->endyear;
		$data['end_date_month'] = $this->concept_model->get_month_name($row->end_date_month);
		$endmonthnum = $row->end_date_month;
		}

		 $array_month = array(0 => 3, 1 => 4, 2 => 5, 3 => 6, 4 => 7, 5 => 8, 6 => 9, 7 => 10, 8 => 11, 9 => 0, 10 => 1, 11 => 2);
		 $offset = $this->getoffset($startmonthnum, $data['startyear'], $years[0]);
		if(isset($startmonthnum))
        	$offset1 =  $this->getrealoffset($offset, $array_month, $startmonthnum);
		else 
			$offset1 = 0;
       
               
		$data['offset1'] = $offset1;
		
			 $offset = $this->getoffset($endmonthnum, $data['endyear'], $years[0]);
		if(isset($endmonthnum))
        $offset2 =  $this->getrealoffset($offset, $array_month, $endmonthnum);
		else 
			$offset2 = 0;
       
               
		$data['offset2'] = $offset2;
		
		
		
        $this->db->select('businesscase.quant_summary, businesscase.nonquant_summary, businesscase.useful_life_yrs, businesscase.total_benefits ');
        $this->db->from('initiative');
        $this->db->join('businesscase', 'initiative.initiative_number = businesscase.initiative_number');

        if ($initiativeid) {
            $this->db->where('initiative.initiative_number', $initiativeid);
        }
        $data['businesscase'] = $this->db->get();


        $this->db->select('businesscase_id, sum(est_revenue_growth) as sum_est_rg');
        $this->db->from('businesscase_revenue');
        $this->db->join('businesscase', 'businesscase_revenue.businesscase_id = businesscase.id');
        $this->db->join('initiative', 'initiative.initiative_number = businesscase.initiative_number');

        if ($initiativeid) {
            $this->db->where('initiative.initiative_number', $initiativeid);
        }
        $this->db->group_by('businesscase_revenue.businesscase_id');
        $data['est_rg_sum'] = $this->db->get();

        $this->db->select('businesscase_id, sum(est_cost_avoidance) as sum_est_ca');
        $this->db->from('businesscase_costavoidance');
        $this->db->join('businesscase', 'businesscase_costavoidance.businesscase_id = businesscase.id');
        $this->db->join('initiative', 'initiative.initiative_number = businesscase.initiative_number');

        if ($initiativeid) {
            $this->db->where('initiative.initiative_number', $initiativeid);
        }
        $this->db->group_by('businesscase_costavoidance.businesscase_id');
        $data['est_ca_sum'] = $this->db->get();


        $this->db->select('businesscase_id, sum(est_cost_savings) as sum_est_cs');
        $this->db->from('businesscase_costsavings');
        $this->db->join('businesscase', 'businesscase_costsavings.businesscase_id = businesscase.id');
        $this->db->join('initiative', 'initiative.initiative_number = businesscase.initiative_number');

        if ($initiativeid) {
            $this->db->where('initiative.initiative_number', $initiativeid);
        }
        $this->db->group_by('businesscase_costsavings.businesscase_id');
        $data['est_cs_sum'] = $this->db->get();


        $this->load->view('conceptslide_view', $data);
    }
    }

    function header($title) {
        $data['title'] = $title;
        $data['name'] = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
        $this->load->view('header_view', $data);
    }
    
        function getoffset($start_date_month, $startyear, $year) {

        $tm = mktime(0, 0, 0, $start_date_month + 1, 1, $startyear);
//echo ceil(date("m", $tm)/3);
        if (ceil(date("m", $tm) / 3) == 4)
            $offset = ceil(date("m", $tm) / 3) * ($startyear - 2000 - $year + 1);
        else
            $offset = 4 * ($startyear - 2000 - $year ) + ceil(date("m", $tm) / 3);

        return $offset;
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
    
    function getrealoffset($offset, $array_month, $startmonthnum){
             if ($offset > 3 && $offset < 8) {

                    $offset1 =4 + $array_month[$startmonthnum];
                    //echo $offset . 'm ' .$offset1 .'r'. $array_month[$row->start_date_month];
                } elseif ($offset > 7) {
                    $offset1 = $offset + 8;
                } else {
                    $offset1 =  $offset;
                }
                
                return $offset1;
    }
    
    function listslides(){
    
    $this->header('Concept Slide');
    $initiative_array = array();
    $initiative_array = unserialize($this->input->post('names'));
    $i = 0;
    foreach($initiative_array as $initiativeid)
    {$i++;
    	$this->index($initiativeid);
    }
    
    }
    
    

}