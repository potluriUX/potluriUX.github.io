<?php

class Businesscase extends CI_Controller {

    function Businesscase() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
             $this->load->library('session');
              date_default_timezone_set('America/Chicago');
        
    }

    function index() {
if(!$this->session->userdata('emailAddress'))
redirect('index.php/appleconnect/index/businesscase');
        $this->header('BusinessCase');
        $data['querybenefits'] = $this->getBenefits();
        $data['emptyrow'] = "<tr><td> &nbsp;</td><td>&nbsp; </td></tr>";
        $data['queryjustifications'] = $this->getJustifications();
               $data['tablelabelsca'] = $this->drawTablelabels('ca');
            $data['tablelabelscs'] = $this->drawTablelabels('cs');
            $data['tablelabelsrg'] = $this->drawTablelabels('rg');
        $this->load->view('businesscase_view', $data);
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

    function insert() {
        $this->load->library(array('email', 'form_validation'));
        $this->load->helper(array('email', 'form'));
        $this->form_validation->set_rules('total_benefits', 'total_benefits', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->header('Businesscase');
            echo "avi";
            $data['queryregions'] = $this->getRegions();
            $data['emptyrow'] = "<tr><td> &nbsp;</td><td>&nbsp; </td></tr>";
            $data['querybenefits'] = $this->getBenefits();
            $data['queryjustifications'] = $this->getJustifications();
            //   $this->load->view('initiative_view', $data);
            $this->load->view('businesscase_view'); // load the contact form
        } else {
            $this->load->database();
            
            $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'reason_no_quant_benefits' => ($this->input->post('reason_no_quant_benefits') ) ?  $this->input->post('reason_no_quant_benefits') : '',
                'total_benefits' => $this->input->post('total_benefits'),
                'useful_life_yrs' => $this->input->post('useful_life'),
                'quant_summary' => $this->input->post('quant_benefits'),
                'nonquant_summary' => $this->input->post('nonquant_benefits'),
                'initiative_number' => $this->input->post('ini_number')
            );


            $this->db->insert('businesscase', $data);
            $id = $this->db->insert_id();
            $elements = array('rg' => "businesscase_revenue");

            $textboxes = array('description' => 'description', 'assumption' => 'assumption', 'est_revenue_growth' => 'est_revenue_growth');
            $this->insertcargcs($id, $elements, $textboxes);
            $elements = array('ca' => "businesscase_costavoidance");

            $textboxes = array('description' => 'description', 'assumption' => 'assumption', 'est_revenue_growth' => 'est_cost_avoidance');
            $this->insertcargcs($id, $elements, $textboxes);

            $elements = array('cs' => "businesscase_costsavings");

            $textboxes = array('description' => 'description', 'assumption' => 'assumption', 'est_revenue_growth' => 'est_cost_savings');
            $this->insertcargcs($id, $elements, $textboxes);
            redirect( base_url() . 'index.php/initiative/edit/' . $id);
        }
    }

    function edit() {
     $initiativeid = $this->uri->segment(3);
    	if(!$this->session->userdata('emailAddress'))
redirect('index.php/appleconnect/index/businesscase/edit/' . $initiativeid);
        $this->load->library(array('email', 'form_validation'));
        $this->load->helper(array('email', 'form'));
        $this->form_validation->set_rules('useful_life', 'useful_life', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
             $this->load->database();
           $this->header('Edit BusinessCase', $initiativeid);
            $businesscase['querybenefits'] = $this->getBenefits();
            $businesscase['emptyrow'] = "<tr><td> &nbsp;</td><td>&nbsp; </td></tr>";
            $businesscase['queryjustifications'] = $this->getJustifications();
            $businesscase['tablelabelsca'] = $this->drawTablelabels('ca');
            $businesscase['tablelabelscs'] = $this->drawTablelabels('cs');
            $businesscase['tablelabelsrg'] = $this->drawTablelabels('rg');
            
            $data2 = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'initiative_name' => $this->input->post('initiative_name'),
                'rollover' => $this->input->post('rollover'),
                'fiscal_year' => $this->input->post('fiscal_year'),
                'executive_sponsor' => $this->input->post('executive_sponsor'),
                'initiative_requestor' => $this->input->post('initiative_requestor'),
                'author' => $this->input->post('author'),
                'BPR_contact' => $this->input->post('BPR_contact'),
                'type' => $this->input->post('type'),
                'exec_summary' => $this->input->post('exec_summary'),
                'proj_description' => $this->input->post('proj_description'),
                'regions_benefitting_justification' => ($this->input->post('regions_benefitting_justification') ) ?  $this->input->post('regions_benefitting_justification') : '',
                 'date_edited' => date( 'Y-m-d H:i:s' )
            );
            $initiative_id =$this->uri->segment(3);;
           
            $businesscase['initiative_number'] = $initiative_id;

            $this->db->select('businesscase.quant_summary, businesscase.nonquant_summary,businesscase.reason_no_quant_benefits, businesscase.useful_life_yrs, businesscase.total_benefits, businesscase.date_inserted, businesscase.date_edited ');
            $this->db->from('initiative');
            $this->db->join('businesscase', 'initiative.initiative_number = businesscase.initiative_number');

            if ($initiative_id) {
                $this->db->where('initiative.initiative_number', $initiative_id);
            }
            $businesscase['businesscase'] = $this->db->get();


            $this->db->select('businesscase_id, description, assumption, est_revenue_growth');
            $this->db->from('businesscase_revenue');
            $this->db->join('businesscase', 'businesscase_revenue.businesscase_id = businesscase.id');
            $this->db->join('initiative', 'initiative.initiative_number = businesscase.initiative_number');

            if ($initiative_id) {
                $this->db->where('initiative.initiative_number', $initiative_id);
            }

            $businesscase['rgs'] = $this->db->get();

            $this->db->select('businesscase_id, description, assumption, est_cost_avoidance');
            $this->db->from('businesscase_costavoidance');
            $this->db->join('businesscase', 'businesscase_costavoidance.businesscase_id = businesscase.id');
            $this->db->join('initiative', 'initiative.initiative_number = businesscase.initiative_number');

            if ($initiative_id) {
                $this->db->where('initiative.initiative_number', $initiative_id);
            }

            $businesscase['cas'] = $this->db->get();


            $this->db->select('businesscase_id, description, assumption, est_cost_savings');
            $this->db->from('businesscase_costsavings');
            $this->db->join('businesscase', 'businesscase_costsavings.businesscase_id = businesscase.id');
            $this->db->join('initiative', 'initiative.initiative_number = businesscase.initiative_number');

            if ($initiative_id) {
                $this->db->where('initiative.initiative_number', $initiative_id);
            }

            $businesscase['css'] = $this->db->get();
            $this->load->view('businesscase_edit_view', $businesscase);
        
        } else {
            $this->load->database();
            $initiative_id = $this->input->post('ini_number');
            $rnqb = $this->input->post('reason_no_quant_benefits')  ?  $this->input->post('reason_no_quant_benefits') : '';
            $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'reason_no_quant_benefits' => $rnqb ,
                'total_benefits' => $this->input->post('total_benefits'),
                'useful_life_yrs' => $this->input->post('useful_life'),
                'quant_summary' => $this->input->post('quant_benefits'),
                'nonquant_summary' => $this->input->post('nonquant_benefits'),
                'date_inserted' => date( 'Y-m-d H:i:s' )

            );

 if ($initiative_id) {
        
		 	$this->db->from('businesscase');
	
			
			$this->db->where('initiative_number', $initiative_id);
           if($this->db->count_all_results() == 0)
          { 
          $data['initiative_number'] = $initiative_id;
          $this->db->insert('businesscase', $data);
            	
        	}

           else
           { $this->db->where('initiative_number', $initiative_id);
             $this->db->update('businesscase', $data);
           }
                  //  echo $this->db->last_query();
			  $this->db->select('businesscase.id');
		 	$this->db->from('businesscase');
			$this->db->where("businesscase.initiative_number", $initiative_id) ;
			$businesscaseresult = $this->db->get();
			foreach($businesscaseresult->result() as $row)
			$businesscaseid = $row->id;
				$this->db->where('businesscase_id',$businesscaseid);

			$this->db->delete('businesscase_revenue'); 
			  $elements = array('rg' => "businesscase_revenue");

            $textboxes = array('description' => 'description', 'assumption' => 'assumption', 'est_revenue_growth' => 'est_revenue_growth');
            $this->insertcargcs($businesscaseid, $elements, $textboxes);
           
           $this->db->where('businesscase_id',$businesscaseid);

			$this->db->delete('businesscase_costavoidance'); 
           $elements = array('ca' => "businesscase_costavoidance");

            $textboxes = array('description' => 'description', 'assumption' => 'assumption', 'est_revenue_growth' => 'est_cost_avoidance');
            $this->insertcargcs($businesscaseid, $elements, $textboxes);

$this->db->where('businesscase_id',$businesscaseid);

			$this->db->delete('businesscase_costsavings'); 
            $elements = array('cs' => "businesscase_costsavings");

            $textboxes = array('description' => 'description', 'assumption' => 'assumption', 'est_revenue_growth' => 'est_cost_savings');
            $this->insertcargcs($businesscaseid, $elements, $textboxes);
redirect( base_url() );
}

else{
//redirect( base_url());

}

        }
    }

    function insertcargcs($id, $elements, $textboxes) {

        foreach ($elements as $element => $value) {

            if ($this->input->post($element . '_post')) {
                for ($i = 0; $i <= $this->input->post($element . '_counter'); $i++) {
                    $data = array();
                    foreach ($textboxes as $textbox => $value2) {
                        if ($this->input->post($element . '_' . $textbox . ($i + 1))) {
                            $data[$value2] = $this->input->post($element . '_' . $textbox . ($i + 1));
                        }
                    }
                    if (!empty($data)) {
                        $data['businesscase_id'] = $id;
                        $this->db->insert($value, $data);
                    }
                }
            }
        }
    }



    function header($title, $initiativeid= '') {
        $data['title'] = $title;
         $data['initiativeid'] = $initiativeid;
		$data['name'] = $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName');
        $this->load->view('header_view', $data);
    }

    function getRegions() {

        $query = $this->db->get('region');

        return $query;
    }

    function getJustifications() {
        $query = $this->db->get('justification');

        return $query;
    }

    function getBenefits() {
        $query = $this->db->get('quantifiable_benefits');

        return $query;
    }

}