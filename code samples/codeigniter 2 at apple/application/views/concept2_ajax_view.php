
<div id='ajax-content'>                    
    <?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    $temp = $results->row_array();
    $keys = array_keys($temp);
    //print_r($keys);
	$i = 0;
    foreach($keys as $key)
    {
    
    if($column_sorted == $key)
    	$style[$i] = 'color:grey;';
    else
    	$style[$i] = 'color:blue;cursor:pointer';
    	$i++;
    }
  
    
    $count2 = count($results->result_array);
	//print_r( $this->table->generate($results));  
      
  echo "<ul id =\"pagination-digg\" class=\"ajax-pag\">";
    echo "<p style='float:right;'> " . " " . $count . " Records</p>"; 
    echo $this->pagination->create_links();  echo "</ul>";

  
    echo "<table border=1 cellspacing ='0' cellpadding='3' width=100% >";
    if($count !=0)
    {
    	echo "<tr class='bob_row data_row odd'><th id='".$keys[0] . "' class='sortable'" . "style='" . $style[0] ."' >Initiative Number</th><th id='".$keys[3]. "' class='sortable'". "style='" . $style[3] ."'>BHU</th><th id='".$keys[1]."' class='sortable'". "style='" . $style[1] ."'>Author</th><th id='".$keys[2]."' class='sortable'". "style='" . $style[2] ."'>Name</th><th>Org</th><th>Track(Subtrack)</th><th>Capability (Subcapability)</th><th></th>";
   		 if($is_admin)
			echo "<th></th><th id='" . $keys[9] . "' class='sortable'" . "style='" . $style[9] ."'>Status</th></tr>";
		else
			echo "</tr>";
	}
    $i = 0;

    foreach ($results->result() as $row) {

        if ($i % 2 == 0)
            echo "<tr class='bob_row data_row even'>";

        else
            echo "<tr class='bob_row data_row odd'>";
        $i++;

        echo "<td>" . $row->initiative_number . "</td>";
        echo "<td>" . $row->BHU . "</td>";
        echo "<td>" . $row->author . "</td>";
        echo "<td>" . "<a href='" . base_url() . 'index.php/conceptslide/index/' . $row->initiative_number . "' target='_blank'>" . $row->name . "</a></td><td>";
         $organizations = $this->concept_model->get_organizations($row->initiative_number);
         $tracks = $this->concept_model->get_tracks($row->initiative_number);
        // $subtracks = $this->concept_model->get_subtracks($row->initiative_number);
        // $capabilities = $this->concept_model->get_capabilities2($row->initiative_number);
        //$subcapabilities = $this->concept_model->get_subcapabilities($row->initiative_number);
        /*     if ($organizations->num_rows() > 0)
          foreach ($organizations->result() as $row2) {

          echo $row2->name;
          } */

           if ($organizations->num_rows() > 0)
          foreach ($organizations->result() as $row2) {

          echo $row2->name . "<br>";
          }
        echo "</td><td>";

          if ($tracks->num_rows() > 0)
          foreach ($tracks->result() as $row2) {

          echo $row2->data . "<br>";
          }
             if ($row->subtracks)
            echo '(' . $row->subtracks . ')' . "<br>";
        echo "</td><td>";

        echo $row->capabilities . '<br>';
        if ($row->subcapabilities)
            echo '(' . $row->subcapabilities . ')' . "<br>";


        echo "</td>";
        echo "<td>";
		if(in_array($row->initiative_number, $myinitiatives))
		{
		
        echo "<a href='" . base_url() . 'index.php/initiative/edit/' . $row->initiative_number . "' >Edit</a>";
        
		}
		 echo "</td>";
		if($is_admin)
		{	
			echo "<td>";
			if(!$row->is_deleted)
		
       		 echo "<a href='" . base_url() . 'index.php/initiative/delete/' . $row->initiative_number . "' >Delete</a>";
      		else
      		 echo "<a href='" . base_url() . 'index.php/initiative/undelete/' . $row->initiative_number . "' >Undelete</a>";
      		 echo "</td>";
      		 echo "<td>" . $row->pathfinderstatus . "</td>";
      		 
 		}      
       echo "</tr>";
    }
    echo "</table>";


    foreach ($totalresults->result() as $row) {
        $initiative_array[] = $row->initiative_number;
    }
    ?>
    <input name="names" type="hidden" value='<?php print_r(serialize(!empty($initiative_array) ? $initiative_array : "")); ?>;' />

</div>


