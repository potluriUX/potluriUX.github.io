<?php

class Ajaxselect extends CI_Controller {

    function Ajaxselect() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
    }

      function loadajax(){

      $data['heading'] = 'Concept Page';
  $data['query'] = $this->db->get('data_parent');
         $this->load->view('ajaxselect_view', $data);
    }



    function findchildren(){
        $data['response'] = 'true';
        $data['message'] = '';
        //$this->db->where('id',$this->input->post('id'));
        //$data2['query'] = $this->db->get('country');

     //echo $data['message'];
    // form submission worked
  // $data['message']  = $this->input->post('ravi') . $this->input->post('teja');
$this->db->select(' data.id as did, data.data as data');
$this->db->from('data');
$this->db->join('data_parent', 'data.pid = data_parent.id');
$this->db->where_in('data_parent.id',explode(',' , $this->input->post('id')));
$trackid = explode(',', $this->input->post('trackid'));
$data2['query'] = $this->db->get();
$rowids = '';
$message = '';
 if($data2['query']->num_rows()>0)
           foreach($data2['query']->result() as $row){
               if(isset($trackid)) if( in_array($row->did, $trackid)){
               			$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."' selected='selected'>" . $row->data . "</option>" ;
}
                else {$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
                        
                        }
                        }
$data['message'] = "<option value='". $rowids ."' selected=selected>All</option>";
$data['message'] .= $message;
 echo json_encode($data);
    }
    
       function findchildren2(){
        $data['response'] = 'true';
        $data['message'] = '';
        //$this->db->where('id',$this->input->post('id'));
        //$data2['query'] = $this->db->get('country');

     //echo $data['message'];
    // form submission worked
  // $data['message']  = $this->input->post('ravi') . $this->input->post('teja');
$this->db->select(' data_child.id as did, data_child.data as data');
$this->db->from('data_child');
$this->db->join('data', 'data_child.pid = data.id');
$this->db->where_in('data.id',explode(',' , $this->input->post('id')));
$subtrackid = explode(',', $this->input->post('subtrackid'));
$rowids = '0';
$message = '';
$data2['query'] = $this->db->get();
$data['message'] = "<option value='All' selected=selected>All</option>";
 if($data2['query']->num_rows()>0)
           foreach($data2['query']->result() as $row)
                if(isset($subtrackid)) if( in_array($row->did, $subtrackid)){
                     	$rowids .= ',' . $row->did;
                    $message .=  "<option value='".$row->did  ."' selected='selected'>" . $row->data . "</option>" ;
                    }

                else{
                			$rowids .= ',' . $row->did;
                       $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
                    }
$homepageflag = $this->uri->segment(3);
if($homepageflag)
{	$data['message'] = "<option value='". $rowids ."' selected=selected>All</option>";
	$data['message'] .= $message;
	$data['message'] .= "<option value='0' >None</option>";
}
else 
{
	$data['message'] = "<option value='0' selected = selected>None</option>";
	$data['message'] .= $message;
	
}
echo json_encode($data);
    }




    function findchildren3(){
        $data['response'] = 'true';
        $data['message'] = '';
        //$this->db->where('id',$this->input->post('id'));
        //$data2['query'] = $this->db->get('country');

     //echo $data['message'];
    // form submission worked
  // $data['message']  = $this->input->post('ravi') . $this->input->post('teja');
$this->db->select(' capabilities.id as did, capabilities.data as data');
$this->db->from('capabilities');
$this->db->join('data_parent', 'capabilities.pid = data_parent.id');
$this->db->where_in('data_parent.id',explode(',' , $this->input->post('id')));
$trackid = explode(',', $this->input->post('trackid'));
$rowids = '';
$message = '';
$data2['query'] = $this->db->get();
$data['message'] = "<option value='All' selected=selected>All</option>";
 if($data2['query']->num_rows()>0)
           foreach($data2['query']->result() as $row)
               if(isset($trackid)) if( in_array($row->did, $trackid)){
                     	$rowids .= ',' . $row->did;
                     $message .=  "<option value='".$row->did  ."' selected='selected'>" . $row->data . "</option>" ;
                    }

                else{
                	$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
                    }
$homepageflag = $this->uri->segment(3);
if($homepageflag)
{	$data['message'] = "<option value='". $rowids ."' selected=selected>All</option>";
	$data['message'] .= $message;
	$data['message'] .= "<option value='0' >None</option>";
}
else 
{
	$data['message'] = "<option value='' selected = selected>Select One</option>";
	$data['message'] .= $message;
	
}
 echo json_encode($data);
    }

           function findchildren4(){
        $data['response'] = 'true';
        $data['message'] = '';
        //$this->db->where('id',$this->input->post('id'));
        //$data2['query'] = $this->db->get('country');

     //echo $data['message'];
    // form submission worked
  // $data['message']  = $this->input->post('ravi') . $this->input->post('teja');
$this->db->select(' subcapabilities.id as did, subcapabilities.data as data');
$this->db->from('subcapabilities');
$this->db->join('capabilities', 'subcapabilities.pid = capabilities.id');
$this->db->where_in('capabilities.id',explode(',' , $this->input->post('id')));
$subtrackid = explode(',', $this->input->post('subtrackid'));
$flag =  $this->input->post('flag');
$rowids = '0';
$message = '';
$data2['query'] = $this->db->get();
$data['message'] =  "<option value='All' selected=selected>All</option>";
 if($data2['query']->num_rows()>0 && !$flag)//hover effect
           foreach($data2['query']->result() as $row){
                if(isset($subtrackid)) if( in_array($row->did, $subtrackid)){
                        	$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."' selected='selected'>" . $row->data . "</option>" ;
                    }
                     else{
                	$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
                    }
                $value .= $row->did . ',';
}
 else//click on track2
       foreach($data2['query']->result() as $row)
{
               			$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
}
$homepageflag = $this->uri->segment(3);
if($homepageflag)
{	$data['message'] = "<option value='". $rowids ."' selected=selected>All</option>";
	$data['message'] .= $message;
	$data['message'] .= "<option value='0' >None</option>";
}
else 
{
	$data['message'] = "<option value='0' selected = selected>None</option>";
	$data['message'] .= $message;
	
}
echo json_encode($data);
    }




 function editfindchildren(){
        $data['response'] = 'true';
        $data['message'] = '';
        //$this->db->where('id',$this->input->post('id'));
        //$data2['query'] = $this->db->get('country');
        $this->load->model('concept_model');
         $initiativeid = $this->uri->segment(3);
$tracks = $this->concept_model->get_tracks($initiativeid);

      foreach($tracks->result() as $row){
          
          	$tracks_id[] =  $row->id;
          
          }


     //echo $data['message'];
    // form submission worked
  // $data['message']  = $this->input->post('ravi') . $this->input->post('teja');
$this->db->select(' data.id as did, data.data as data');
$this->db->from('data');
$this->db->join('data_parent', 'data.pid = data_parent.id');
$this->db->where_in('data_parent.id',explode(',' , $this->input->post('id')));
$trackid = explode(',', $this->input->post('trackid'));
$data2['query'] = $this->db->get();
$rowids = '';
$message = '';
 if($data2['query']->num_rows()>0)
           foreach($data2['query']->result() as $row){
               if(isset($tracks_id)) if( in_array($row->did, $tracks_id)){
               			$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."' selected='selected'>" . $row->data . "</option>" ;
}
                else {$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
                        
                        }
                        }
$data['message'] = "<option value='". $rowids ."' >All</option>";
$data['message'] .= $message;
 echo json_encode($data);
    }
    
       function editfindchildren2(){
        $data['response'] = 'true';
        $data['message'] = '';
        //$this->db->where('id',$this->input->post('id'));
        //$data2['query'] = $this->db->get('country');
$this->load->model('concept_model');
         $initiativeid = $this->uri->segment(3);
         $subtracks = $this->concept_model->get_subtracks($initiativeid);
         
            foreach($subtracks->result() as $row){
          
          	$subtracks_id[] =  $row->id;
          
          }
     //echo $data['message'];
    // form submission worked
  // $data['message']  = $this->input->post('ravi') . $this->input->post('teja');
$this->db->select(' data_child.id as did, data_child.data as data');
$this->db->from('data_child');
$this->db->join('data', 'data_child.pid = data.id');
$this->db->where_in('data.id',explode(',' , $this->input->post('id')));
$subtrackid = explode(',', $this->input->post('subtrackid'));
$rowids = '';
$message = '';
$selected = '';
$rowidflag = '';
$data2['query'] = $this->db->get();

 if($data2['query']->num_rows()>0)
           foreach($data2['query']->result() as $row)
                if(isset($subtracks_id)) if( in_array($row->did, $subtracks_id)){
                     	$rowids .= ',' . $row->did;
                    $message .=  "<option value='".$row->did  ."' selected='selected'>" . $row->data . "</option>" ;
                    $rowidflag = 1;
                    }

                else{
                			$rowids .= ',' . $row->did;
                       $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
                    }
if($rowidflag == '') $selected = 'selected=selected';
//$data['message'] = "<option value='". $rowids ."'".$selected." >All</option>";
$data['message'] = "<option value='0' $selected>None</option>";
$data['message'] .= $message;

echo json_encode($data);
    }




    function editfindchildren3(){
        $data['response'] = 'true';
        $data['message'] = '';
        //$this->db->where('id',$this->input->post('id'));
        //$data2['query'] = $this->db->get('country');
$this->load->model('concept_model');
         $initiativeid = $this->uri->segment(3);
         $capabilities = $this->concept_model->get_capabilities($initiativeid);
         
            foreach($capabilities->result() as $row){
          
          	$capabilities_id[] =  $row->id;
          
          }
     //echo $data['message'];
    // form submission worked
  // $data['message']  = $this->input->post('ravi') . $this->input->post('teja');
$this->db->select(' capabilities.id as did, capabilities.data as data');
$this->db->from('capabilities');
$this->db->join('data_parent', 'capabilities.pid = data_parent.id');
$this->db->where_in('data_parent.id',explode(',' , $this->input->post('id')));
$trackid = explode(',', $this->input->post('trackid'));
$rowids = '';
$message = '';
$data2['query'] = $this->db->get();
$data['message'] = "<option value='' selected=selected>Select One</option>";
 if($data2['query']->num_rows()>0)
           foreach($data2['query']->result() as $row)
               if(isset($capabilities_id)) if( in_array($row->did, $capabilities_id)){
                     	$rowids .= ',' . $row->did;
                     $message .=  "<option value='".$row->did  ."' selected='selected'>" . $row->data . "</option>" ;
                    }

                else{
                	$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
                    }
//$data['message'] = "<option value='". $rowids ."' >All</option>";
$data['message'] .= $message;
 echo json_encode($data);
    }

           function editfindchildren4(){
        $data['response'] = 'true';
        $data['message'] = '';
        //$this->db->where('id',$this->input->post('id'));
        //$data2['query'] = $this->db->get('country');
$this->load->model('concept_model');
         $initiativeid = $this->uri->segment(3);
         $subcapabilities = $this->concept_model->get_subcapabilities($initiativeid);
         
            foreach($subcapabilities->result() as $row){
          
          	$subcapabilities_id[] =  $row->id;
          
          }
     //echo $data['message'];
    // form submission worked
  // $data['message']  = $this->input->post('ravi') . $this->input->post('teja');
$this->db->select(' subcapabilities.id as did, subcapabilities.data as data');
$this->db->from('subcapabilities');
$this->db->join('capabilities', 'subcapabilities.pid = capabilities.id');
$this->db->where_in('capabilities.id',explode(',' , $this->input->post('id')));
$subtrackid = explode(',', $this->input->post('subtrackid'));
$flag =  $this->input->post('flag');
$rowids = '';
$message = '';
$selected = '';
$rowidflag = '';
$data2['query'] = $this->db->get();
$data['message'] =  "<option value='All' selected=selected>All</option>";
if($data2['query']->num_rows()>0)
           foreach($data2['query']->result() as $row)
               if(isset($subcapabilities_id)) if( in_array($row->did, $subcapabilities_id)){
                     	$rowids .= ',' . $row->did;
                     $message .=  "<option value='".$row->did  ."' selected='selected'>" . $row->data . "</option>" ;
                     $rowidflag = 1;
                    }

                else{
                	$rowids .= ',' . $row->did;
                        $message .=  "<option value='".$row->did  ."'>" . $row->data . "</option>" ;
                    }
if($rowidflag == '') $selected = 'selected=selected';
//$data['message'] = "<option value='". $rowids ."'".$selected." >All</option>";
$data['message'] = "<option value='0' $selected >None</option>";
$data['message'] .= $message;

echo json_encode($data);
    }




}

?>
