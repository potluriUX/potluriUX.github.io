<?php

class Filesaver extends CI_Controller {

    function Filesaver() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
             $this->load->library('session');
        
    }
    
    function index(){
    	
	$filename = $this->cleanFileName($_FILES['Filedata']['name']);
 	
 	     $this->load->database();
            $this->db->from('file');
	
			
			 $this->db->where('filename', $filename);
			 $this->db->where('initiative_number', $this->uri->segment(3));
           if($this->db->count_all_results() == 0)
           {
        	 $data = array(
                // 'initiative_number' => $this->input->post('initiative_number'),
                'filename' => $filename,
                'initiative_number' => $this->uri->segment(3)
              
        	    );


        	    $this->db->insert('file', $data);
            }
           // $id = $this->db->insert_id();
           if (!is_dir ( $_SERVER['DOCUMENT_ROOT'] .'/' . 'uploads' . '/' .  $this->uri->segment(3)))
			{
				mkdir( $_SERVER['DOCUMENT_ROOT'] .'/' . 'uploads' . '/' .  $this->uri->segment(3));
			} 
    	if (!empty($_FILES)) {
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$targetPath = $_SERVER['DOCUMENT_ROOT'] .'/' . 'uploads' . '/' .  $this->uri->segment(3) . '/';
		$targetFile =  str_replace('//','/',$targetPath) . $filename;
	
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
			move_uploaded_file($tempFile,$targetFile);
			chmod ($targetFile, 0755);
			echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
	// } else {
	// 	echo 'Invalid file type.';
	// }
	}
         
    }
   
   
   function showfiles(){
  $url = explode('/', base_url());
  //echo "ravi";
 
		$initiative_number =  $this->uri->segment(3);
		if($initiative_number){
			$this->db->select('id, filename');
            $this->db->from('file');
            $this->db->where('file.initiative_number', $initiative_number);
   
		}			
$data['message']= '';

	$data2['query'] = $this->db->get();
	       foreach($data2['query']->result() as $row)
{
               			
                        $data['message'] .=   "<a href='" . $url[0] . '//'.$url[2] .  '/uploads/' . $initiative_number . '/' . $this->cleanFileName($row->filename) . "'>$row->filename</a>"." <input type=button value='Remove' class='deletefiles' id='". $row->id . "' name='". $row->filename . "'>"."</input><br>" ;
}
echo json_encode($data);
	}
	
	
	   function deletefiles(){
	$myFile = $_SERVER['DOCUMENT_ROOT'] .'/' . 'uploads' . '/' . $this->uri->segment(3) . '/' . urldecode($this->uri->segment(4));
	   		  $this->load->database();
            $this->db->from('file');
	
			 $this->db->where('filename', urldecode($this->uri->segment(4)));
			 unlink($myFile);

			 $this->db->where('initiative_number', $this->uri->segment(3));
			 
			 $this->db->delete();
	   	
	   
	   }
	   
	   function cleanFileName( $str )
{
$cleaner = array();
$cleaner[] = array('expression'=>"/[àáäãâª]/",'replace'=>"a");
$cleaner[] = array('expression'=>"/[èéêë]/",'replace'=>"e");
$cleaner[] = array('expression'=>"/[ìíîï]/",'replace'=>"i");
$cleaner[] = array('expression'=>"/[òóõôö]/",'replace'=>"o");
$cleaner[] = array('expression'=>"/[ùúûü]/",'replace'=>"u");
$cleaner[] = array('expression'=>"/[ñ]/",'replace'=>"n");
$cleaner[] = array('expression'=>"/[ç]/",'replace'=>"c");

$str = strtolower($str);
$ext_point = strripos($str,"."); // Changed to strripos to avoid issues with ‘.’ Thanks nico.
if ($ext_point===false) return false;
$ext = substr($str,$ext_point,strlen($str));
$str = substr($str,0,$ext_point);

foreach( $cleaner as $cv ) $str = preg_replace($cv["expression"],$cv["replace"],$str);

return preg_replace("/[^a-z0-9-]/","_",$str).$ext;
}


}