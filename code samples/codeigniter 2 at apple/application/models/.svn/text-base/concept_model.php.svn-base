<?php

class concept_model extends CI_Model {
private $initiativeresult ;
    function __construct() {
        parent::__construct();
    }

    function get_concept($num, $offset) {
        $this->db->select('exec_summary, type, proj_description, scope, initiative_number, fiscal_year, rollover, executive_sponsor, author, BPR_contact, initiative_name');

		$this->db->where("initiative.is_deleted = 0");

        $query = $this->db->get('initiative', $num, $offset);
        return $query;
    }
function getmyinitiatives($namesarray, $is_admin = ''){
  $this->db->select('initiative.initiative_number');
  if(!$is_admin)
  {	
  	$this->db->where_in("initiative.author", $namesarray);
  	$this->db->or_where_in("initiative.BPR_contact", $namesarray);
  }
  $this->db->order_by('initiative.initiative_number');
  return $this->db->get('initiative');

}

function getroadmap($initiativesarray = ''){
	
	if(empty($initiativesarray))
    {
     	return false;
	}
	else
	{
	    $this->db->select("initiative.initiative_number as initiative_number,  initiative.author as author,  initiative.initiative_name as name, ultimate_gold_impact, capabilities.data as capabilities, subcapabilities.data as subcapabilities, start.year as startyear, end.year as endyear, start_date_month, end_date_month, GROUP_CONCAT(DISTINCT data.data SEPARATOR ', ') as track, BHU, GROUP_CONCAT(DISTINCT `exec_sponsor`.`name` SEPARATOR ', ') as exec_sponsor_name, initiative.BPR_contact as tracklead, type.name as type, BPR_analyst, BPR_pm", false);
        $this->db->from('initiative');
        $this->db->join('initiative_organization', 'initiative.initiative_number = initiative_organization.initiative_number');
        $this->db->join('data_parent', 'data_parent.id = initiative_organization.organization_id');
        $this->db->join('initiative_track', 'initiative.initiative_number = initiative_track.initiative_number');
        $this->db->join('data', 'data.id = initiative_track.track_id');
        $this->db->join('initiative_subtrack', 'initiative.initiative_number = initiative_subtrack.initiative_number', 'left');
        $this->db->join('data_child', 'data_child.id = initiative_subtrack.subtrack_id', 'left');
        $this->db->join('initiative_capabilities', 'initiative.initiative_number = initiative_capabilities.initiative_number');
        $this->db->join('capabilities', 'capabilities.id = initiative_capabilities.capabilities_id');
        $this->db->join('initiative_subcapabilities', 'initiative.initiative_number = initiative_subcapabilities.initiative_number', 'left');
        $this->db->join('subcapabilities', 'subcapabilities.id = initiative_subcapabilities.subcapabilities_id', 'left');
        $this->db->join('start_end_yrs start', 'initiative.start_date_yr = start.id');
        $this->db->join('start_end_yrs end', 'initiative.end_date_yr = end.id');
        $this->db->join('initiative_exec_sponsor', 'initiative.initiative_number = initiative_exec_sponsor.initiative_number');
        $this->db->join('exec_sponsor', 'exec_sponsor.id = initiative_exec_sponsor.exec_sponsor_id');
        $this->db->join('type', 'initiative.type = type.id');
        $this->db->where("start.year <= end.year");
         $this->db->where("initiative.is_deleted = 0");
        $this->db->where_in('initiative.initiative_number', $initiativesarray);
        $this->db->group_by('  initiative.initiative_number');
        $this->db->order_by('capabilities.data, subcapabilities.data, track');
        
    	return $this->db->get();
	}
}
function get_type($typenumber){
	switch ($typenumber){
		case 0 : return 'Non Capital';
		break;
		case 1 : return 'Capital';
		break;
		case 2 : return 'Process';
		break;
		case 3 : return 'BI';
		break;
		default : 
	    return 'Error';
	}
}


function getinitiatives(){
	return $this->initiativeresult;
}
function get_month_name($monthnum){
date_default_timezone_set('UTC');
 return date("F", mktime(0, 0, 0, ($monthnum + 1)));
}
	function get_dates($initiativeid){
		 $this->db->select(' start.year as startyear, end.year as endyear, initiative.start_date_month, initiative.end_date_month');
        $this->db->from('initiative');
		 $this->db->join('start_end_yrs start', 'initiative.start_date_yr = start.id');
        $this->db->join('start_end_yrs end', 'initiative.end_date_yr = end.id');
         $this->db->where("start.year <= end.year");
          if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
         return $this->db->get();
	}

    function get_all_select($is_admin, $num, $offset, $orgs, $tracks, $subtracks, $capabilities, $subcapabilities, $order_by, $searchtext, $searchoption, $operator, $archivedlist) {
        //'subcapabilities.data, data_parent.name, data.data as data1, data_child.data as data2, capabilities.data as data3,initiative.exec_summary as exec_summary, initiative.proj_description, initiative.scope as scope, initiative.fiscal_year, initiative.rollover, initiative.initiative_requestor, initiative.executive_sponsor,
        $this->db->select('initiative.initiative_number as initiative_number,  initiative.author as author,  initiative.initiative_name as name, initiative.is_deleted,
        BHU, capabilities.data as capabilities, GROUP_CONCAT(DISTINCT subcapabilities.data) as subcapabilities, 
        GROUP_CONCAT(DISTINCT data.data) as tracks, GROUP_CONCAT(DISTINCT data_parent.name) as orgs, 
        pathfinder_status.status pathfinderstatus,
        GROUP_CONCAT(DISTINCT data_child.data) as subtracks');
        $this->db->from('initiative');
          $this->db->join('type', 'type.id = initiative.type');
		  $this->db->join('initiative_exec_sponsor', 'initiative.initiative_number = initiative_exec_sponsor.initiative_number');
       $this->db->join('exec_sponsor', 'exec_sponsor.id = initiative_exec_sponsor.exec_sponsor_id');

        $this->db->join('pathfinder_status', 'pathfinder_status.id = initiative.pathfinder_status_id');
        $this->db->join('initiative_organization', 'initiative.initiative_number = initiative_organization.initiative_number');
        
        $this->db->join('data_parent', 'data_parent.id = initiative_organization.organization_id');
 	
        $this->db->join('initiative_track', 'initiative.initiative_number = initiative_track.initiative_number');
        
        $this->db->join('data', 'data.id = initiative_track.track_id');
       
     
        $this->db->join('initiative_subtrack', 'initiative.initiative_number = initiative_subtrack.initiative_number', 'left');
        $this->db->join('data_child', 'data_child.id = initiative_subtrack.subtrack_id', 'left');
        $this->db->join('initiative_capabilities', 'initiative.initiative_number = initiative_capabilities.initiative_number');
        $this->db->join('capabilities', 'capabilities.id = initiative_capabilities.capabilities_id');
        $this->db->join('initiative_subcapabilities', 'initiative.initiative_number = initiative_subcapabilities.initiative_number', 'left');
        $this->db->join('subcapabilities', 'subcapabilities.id = initiative_subcapabilities.subcapabilities_id', 'left');
       
               if($searchtext){
       			/*$this->db->where("(initiative.author like '%" . $searchtext . "%' or initiative.initiative_name like '%" . $searchtext . 
       			"%' or initiative.initiative_number like '%" . $searchtext . "%' or data_parent.name like '%" . $searchtext . 
       			"%' or data.data like '%" . $searchtext . "%' or exec_sponsor.name like '%" . $searchtext . "%'or capabilities.data like '%" . $searchtext . 
       			"%'or subcapabilities.data like '%" . $searchtext . "%')");*/
       				if($operator == 'wildcard')	
       		$this->db->where("(" . $searchoption . " like \"%" . addslashes($searchtext) . "%\" )");	
       		else
       			$this->db->where("(" . $searchoption . " = '" . addslashes($searchtext) . "' )");	
       		//author, initiative_name, number, org, track, exec_sponsor, 
       	}
       	
       	if(!$is_admin)
        	$this->db->where("initiative.is_deleted = 0");
        	
        if($is_admin && $archivedlist)
        	$this->db->where("initiative.is_deleted = 1");
        	        if($is_admin && !$archivedlist)
        		$this->db->where("initiative.is_deleted = 0");
        if (isset($orgs))
        	$this->db->where_in('initiative_organization.organization_id', explode(',', $orgs));
        if (isset($tracks))
        	$this->db->where_in('initiative_track.track_id', explode(',', $tracks));
        if (isset($subtracks))
        	$this->db->where_in('initiative_subtrack.subtrack_id', explode(',', $subtracks));
        if (isset($capabilities))
        	$this->db->where_in('capabilities.id', explode(',', $capabilities));
        if (isset($subcapabilities))
        	$this->db->where_in('initiative_subcapabilities.subcapabilities_id', explode(',', $subcapabilities));
  
        $this->db->group_by('initiative.initiative_number');
		if($order_by)
		$this->db->order_by($order_by);

        $this->db->limit($num, $offset);
        return $this->db->get();
    }

    function return_count($is_admin, $num, $offset, $orgs, $tracks, $subtracks, $capabilities, $subcapabilities, $searchtext, $searchoption, $operator, $archivedlist) {
        //'subcapabilities.data, data_parent.name, data.data as data1, data_child.data as data2, capabilities.data as data3,
        $this->db->select('  initiative.initiative_number');
        $this->db->from('initiative');
        $this->db->join('initiative_organization', 'initiative.initiative_number = initiative_organization.initiative_number');
        $this->db->join('data_parent', 'data_parent.id = initiative_organization.organization_id');
        $this->db->join('initiative_track', 'initiative.initiative_number = initiative_track.initiative_number');
        $this->db->join('data', 'data.id = initiative_track.track_id');
        $this->db->join('initiative_subtrack', 'initiative.initiative_number = initiative_subtrack.initiative_number', 'left');
        $this->db->join('data_child', 'data_child.id = initiative_subtrack.subtrack_id', 'left');
        $this->db->join('initiative_capabilities', 'initiative.initiative_number = initiative_capabilities.initiative_number');
        $this->db->join('capabilities', 'capabilities.id = initiative_capabilities.capabilities_id');
        $this->db->join('initiative_subcapabilities', 'initiative.initiative_number = initiative_subcapabilities.initiative_number', 'left');
        $this->db->join('subcapabilities', 'subcapabilities.id = initiative_subcapabilities.subcapabilities_id', 'left');
         $this->db->join('initiative_exec_sponsor', 'initiative.initiative_number = initiative_exec_sponsor.initiative_number');
        $this->db->join('exec_sponsor', 'exec_sponsor.id = initiative_exec_sponsor.exec_sponsor_id');
         $this->db->join('type', 'type.id = initiative.type');
         $this->db->join('fiscal_yr', 'initiative.fiscal_year = fiscal_yr.id');
	         if($searchtext){
       			//$this->db->where("(initiative.author like '%" . $searchtext . "%' or initiative.initiative_name like '%" . $searchtext . "%' or initiative.initiative_number like '%" . $searchtext . "%' or data_parent.name like '%" . $searchtext . "%' or data.data like '%" . $searchtext . "%' or exec_sponsor.name like '%" . $searchtext . "%')");
       				/*$this->db->where("(initiative.author like '%" . $searchtext . "%' or initiative.initiative_name like '%" . $searchtext . 
       			"%' or initiative.initiative_number like '%" . $searchtext . "%' or data_parent.name like '%" . $searchtext . 
       			"%' or data.data like '%" . $searchtext . "%' or exec_sponsor.name like '%" . $searchtext . "%'or capabilities.data like '%" . $searchtext . 
       			"%'or subcapabilities.data like '%" . $searchtext . "%')");*/
       		if($operator == 'wildcard')	
       		$this->db->where("(" . $searchoption . " like '%" . addslashes($searchtext) . "%' )");	
       		else
       			$this->db->where("(" . $searchoption . " = '" . addslashes($searchtext) . "' )");	
       		//author, initiative_name, number, org, track, exec_sponsor, 
       	}
       if(!$is_admin)
		  $this->db->where("initiative.is_deleted = 0");
		  
	      if($is_admin && $archivedlist)
        	$this->db->where("initiative.is_deleted = 1");
        if($is_admin && !$archivedlist)
        		$this->db->where("initiative.is_deleted = 0");
    if (isset($orgs))
        	$this->db->where_in('data_parent.id', explode(',', $orgs));
        if (isset($tracks))
        	$this->db->where_in('data.id', explode(',', $tracks));
        if (isset($subtracks))
        	$this->db->where_in('initiative_subtrack.subtrack_id', explode(',', $subtracks));
        if (isset($capabilities))
        	$this->db->where_in('capabilities.id', explode(',', $capabilities));
        if (isset($subcapabilities))
        	$this->db->where_in('initiative_subcapabilities.subcapabilities_id', explode(',', $subcapabilities));
    
       $this->db->group_by('initiative.initiative_number');

        $this->initiativeresult = $this->db->get();

        return $this->initiativeresult->num_rows();
    }

    function get_organizations($initiativeid) {
        $this->db->select('initiative.initiative_number, data_parent.name, data_parent.id');
        $this->db->from('initiative');
        $this->db->join('initiative_organization', 'initiative.initiative_number = initiative_organization.initiative_number');
        $this->db->join('data_parent', 'data_parent.id = initiative_organization.organization_id');


        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        return $this->db->get();
    }

    function get_tracks($initiativeid) {

        $this->db->select('initiative.initiative_number, data.data, data.id');
        $this->db->from('initiative');
        $this->db->join('initiative_track', 'initiative.initiative_number = initiative_track.initiative_number');
        $this->db->join('data', 'data.id = initiative_track.track_id');
        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        return $this->db->get();
    }

    function get_subtracks($initiativeid) {
        $this->db->select('initiative.initiative_number, data_child.data, data_child.id');
        $this->db->from('initiative');
        $this->db->join('initiative_subtrack', 'initiative.initiative_number = initiative_subtrack.initiative_number');
        $this->db->join('data_child', 'data_child.id = initiative_subtrack.subtrack_id');
        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        return $this->db->get();
    }

    function get_capabilities($initiativeid) {

        $this->db->select('initiative.initiative_number, capabilities.data, capabilities.id');
        $this->db->from('initiative');
        $this->db->join('initiative_capabilities', 'initiative.initiative_number = initiative_capabilities.initiative_number');
        $this->db->join('capabilities', 'capabilities.id = initiative_capabilities.capabilities_id');
        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        return $this->db->get();
    }
    function get_capabilities2($initiativeid) {

        $this->db->select('initiative.initiative_number, capabilities.data, GROUP_CONCAT(DISTINCT subcapabilities.data) as children');
        $this->db->from('initiative');
        $this->db->join('initiative_capabilities', 'initiative.initiative_number = initiative_capabilities.initiative_number', 'left');
        $this->db->join('capabilities', 'capabilities.id = initiative_capabilities.capabilities_id', 'left');
         $this->db->join('initiative_subcapabilities', 'initiative_subcapabilities.initiative_number = initiative.initiative_number', 'left');
        $this->db->join('subcapabilities', 'subcapabilities.id = initiative_subcapabilities.subcapabilities_id', 'left');
       
        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        
        $this->db->group_by('capabilities.data');
        return $this->db->get();
    }
    function get_subcapabilities($initiativeid) {
        $this->db->select('initiative.initiative_number, subcapabilities.data, subcapabilities.id');
        $this->db->from('initiative');
        $this->db->join('initiative_subcapabilities', 'initiative.initiative_number = initiative_subcapabilities.initiative_number');
        $this->db->join('subcapabilities', 'subcapabilities.id = initiative_subcapabilities.subcapabilities_id');
        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        $this->db->distinct();
        return $this->db->get();
    }

    function get_justifications($initiativeid) {

        $this->db->select('initiative.initiative_number, justification.id');
        $this->db->from('initiative');
        $this->db->join('initiative_justification', 'initiative.initiative_number = initiative_justification.initiative_number');
        $this->db->join('justification', 'justification.id = initiative_justification.justification_id');
        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        return $this->db->get();
    }

    function get_comments($initiativeid) {

        $this->db->select('initiative.initiative_number, collaborative_comments.id as collid, collaborative_comments.comment, region.name ');
        $this->db->from('collaborative_comments');
        $this->db->join('initiative', 'initiative.initiative_number = collaborative_comments.initiative_number');
        $this->db->join('region', 'region.id = collaborative_comments.region_id');
        if ($initiativeid) {
            $this->db->where("initiative.initiative_number", $initiativeid);
        }
        return $this->db->get();
    }
    
    function msword_conversion($str)
	{
	$str = str_replace('Ã¢â‚¬Â¢', '-', $str); 
	$str = str_replace('â€™', "'", $str);
	$str = str_replace('ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢', "'", $str);
	$str = str_replace('â€¢', '-', $str);
		$str = str_replace(chr(130), '', $str);    // baseline single quote
		$str = str_replace(chr(131), '', $str);  // florin
		$str = str_replace(chr(132), '"', $str);    // baseline double quote
		$str = str_replace(chr(133), '...', $str);  // ellipsis
		$str = str_replace(chr(134), '**', $str);   // dagger (a second footnote)
		$str = str_replace(chr(135), '***', $str);  // double dagger (a third footnote)
		$str = str_replace(chr(136), '^', $str);    // circumflex accent
		$str = str_replace(chr(137), 'o/oo', $str); // permile
		$str = str_replace(chr(138), 'Sh', $str);   // S Hacek
		$str = str_replace(chr(139), '<', $str);    // left single guillemet
		// $str = str_replace(chr(140), 'OE', $str);   // OE ligature
		$str = str_replace(chr(145), "'", $str);    // left single quote
		$str = str_replace(chr(146), "'", $str);    // right single quote
		// $str = str_replace(chr(147), '"', $str);    // left double quote
		// $str = str_replace(chr(148), '"', $str);    // right double quote
		$str = str_replace(chr(149), '-', $str);    // bullet
		$str = str_replace(chr(150), '-–', $str);    // endash
		$str = str_replace(chr(151), '--', $str);   // emdash
		// $str = str_replace(chr(152), '~', $str);    // tilde accent
		// $str = str_replace(chr(153), '(TM)', $str); // trademark ligature
		$str = str_replace(chr(154), 'sh', $str);   // s Hacek
		$str = str_replace(chr(155), '>', $str);    // right single guillemet
		// $str = str_replace(chr(156), 'oe', $str);   // oe ligature
		$str = str_replace(chr(159), 'Y', $str);    // Y Dieresis
		$str = str_replace('°C', '&deg;C', $str);    // Celcius is used quite a lot so it makes sense to add this in
		$str = str_replace('£', '&pound;', $str);
		$str = str_replace("'", "'", $str);
		$str = str_replace('"', '"', $str);
		$str = str_replace('–', '&ndash;', $str);
		//$str = preg_replace( '/[^[:print:]|\n|\r|\t]/', '', $str );

		return $str;
	}

}
?>
