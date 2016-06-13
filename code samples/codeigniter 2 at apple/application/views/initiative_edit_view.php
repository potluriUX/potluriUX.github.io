<?php 
if(!isset($initiativesaved)) $initiativesaved = '';
$comments_name = array();
if($initiatives->num_rows()>0)
          foreach($initiatives->result() as $row){
          
          $exec_summary =  $row->exec_summary;
          $proj_description =  $row->proj_description ;
          $scope = $row->scope;
          $initiative_number = $row->initiative_number;
          $fiscal_year_id = $row->fiscal_year;
          $rollover = $row->rollover;
          $ultimate_gold_impact = $row->ultimate_gold_impact;
          
          $executive_sponsor = $row->executive_sponsor;
          $author = $row->author;
          $BPR_contact = $row->BPR_contact; 
          $initiative = $row->initiative_name;
          $type = $row->type;
          $regions_benefitting_justification = $row->regions_benefitting_justification;
          $BHU = $row->BHU;
          $start_date_yr_id = $row->start_date_yr;
          $start_date_month_id = $row->start_date_month;
          $end_date_yr_id = $row->end_date_yr;
          $end_date_month_id = $row->end_date_month;
          $date_inserted = $row->date_inserted ;
          $date_edited = $row->date_edited;
          $BPR_pm = $row->BPR_pm;
          $BPR_analyst = $row->BPR_analyst;
          $pathfinder_status_id = $row->pathfinder_status_id;
         
          }
               if($originatorregions->num_rows()>0)
          foreach($originatorregions->result() as $row){
          
          	$orig_id[] =  $row->id ;
          
          }
          $months = array(0=>"Jan", 1=>'Feb' , 2=>'Mar', 3=>'Apr', 4=>'May', 5=>'Jun', 
          				  6=>'Jul', 7=>'Aug', 8=>"Sep", 9=>"Oct", 10=>"Nov", 11=>"Dec");
          
                    if($regions->num_rows()>0)
          foreach($regions->result() as $row){
          
          	$region_id[] =  $row->id ;
          
          }
          
              foreach($justifications->result() as $row){
          
          	$justifications_id[] =  $row->id ;
          
          }
          
               foreach($comments->result() as $row){
          
          	$comments_name[$row->name] =  $row->comment;
          
          }
          
                 foreach($organizations->result() as $row){
          
          	$orgs_id[] =  $row->id;
          
          }
          
         
      
          
         
          ?>
<html>

    <body><div class="filter_content"><div  id="contentform">
                <?= form_open('index.php/initiative/edit'); ?>
                <input type=hidden name=initiative_id value=<?php echo $initiativeid;?>>
                <div id="v_spacer"></div>
                <div id="colmain_div">
                    <div class="upload_title">Summary
                    <div style='float:right'>
                    <?php
                    echo " Not to be pushed to Pathfinder<input type='checkbox' name='pathfinder_status' value='3'";
							
								
								if( $pathfinder_status_id == 3)
									echo  "checked = checked";
								else
									echo  '';
									
					?>
					</div>
                    </div>
                    <div id="col3_div">

                        <table>

                            <tr>
                                <td> Initiative Number </td></tr>
                            <tr>   <td><?php echo $initiative_number;?></td>
                            </tr>
                            
                            
                            
<tr>
<td>

BHU
</td>

</tr>
  </tr>

                                <td><input type="hidden" name="BHU" size="30" value="<?php echo $BHU;?>">
                                    <div id="error_BHU"></div>
                                    <?php // echo form_error('initiative_name'); ?>
                                </td>
                            </tr>
  <tr>
  <?= $emptyrow ?>
                            
                            <tr><td>Initiative Name </td></tr>
                            <tr>
                                <td><input type="text" name="initiative_name"  value="<?php echo $initiative;?>" size="30">
                                    <div id="error_initiative_name"></div>
                                    <?php echo form_error('initiative_name'); ?>
                                </td>
                            </tr>

                          
                           <?= $emptyrow ?> 
                          
                                    <tr>  
                                        <td> Originating Region



                                    <?php
                                    $i = 0;
                                    echo '<select name="originator_region[]" size=5 class="originator_region" multiple style="font-size:smaller">';

                                    if ($queryregions->num_rows() > 0)
                                    {
                                        foreach ($queryregions->result() as $row) 
                                        {
											if(in_array($row->id, $orig_id))
											$selected = "selected = selected";
											else 
											$selected = '';
                                            echo '<option value="' . $row->id  .'"' . $selected . '>' . $row->name . '</option> ';
                                        }
                                    }
                                    echo '</select>';
                                    ?>
                                    <div id="error_originator_region"></div>
                                    <?php echo form_error('originator_region[]'); ?>


<?= $emptyrow ?>







                                </td>
                          

                                </table>

                            </div>
                            <div id="h_spacer"></div>

                            <div id="col3_div">

  <table>
                            <tr>
                                <td> Executive Sponsor</td></tr>
                            <tr>
                                <td><input type="text" id = 'course' name="executive_sponsor" value="<?php echo $executive_sponsor ?>" size="30">
                                            <div id="error_executive_sponsor"</div>

<?php echo form_error('executive_sponsor'); ?>
                                        </td>

                                    </tr>


<?= $emptyrow ?>
                            <tr><td>Author </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="author" value="<?php echo $author; ?>" size="30">
                                            <div id="error_author"></div>
<?php echo form_error('author'); ?>
                                        </td>
                                    </tr>
<?= $emptyrow ?>
                            <tr>
                                <td> Track Lead</td>
                            </tr>
                            <tr>
                                <td><input type="text" id = 'course' name="BPR_contact" value="<?php echo $BPR_contact ?>" size="30">
                                            <div id="error_BPR_contact"></div>
<?php echo form_error('BPR_contact'); ?>
                                        </td>
                                    </tr>
<?= $emptyrow ?>
    <tr><td>Fiscal yr                <?php
                                    $i = 0;
                                    echo '<select name="fiscal_year" style="font-size:smaller">';

                                    if ($fiscal_yrs->num_rows() > 0)
                                    {
                                        foreach ($fiscal_yrs->result() as $row) 
                                        {
											if($row->id== $fiscal_year_id)
											$selected = "selected = selected";
												
											else
												$selected = '';
                                            echo '<option value="' . $row->id  . set_select('fiscal_year', $row->id) .'"'. $selected . '>' . $row->year . '</option> ';
                                        }
                                    }
                                    echo '</select>';
                                    ?>
                                        </td></tr>
<?= $emptyrow ?>
<tr><td>Resourcing</td></tr>
 <tr><td><div style='float:left;font-size:11px'>BPR PM &nbsp;</div> <div id='h_spacer'></div><div id='h_spacer'></div>
 			<select name='BPR_pm' style="width:12mm;font-size:smaller">
 				<option value='0' <?php if($BPR_pm == 0) 
											echo  "selected = selected";?>>0</option>
 				<option value='.5' <?php if($BPR_pm == 0.5) 
											echo  "selected = selected";?>>0.5</option>
 				<option value='1' <?php if($BPR_pm == 1) 
											echo  "selected = selected";?>>1</option>
				<option value='1.5' <?php if($BPR_pm == 1.5) 
											echo  "selected = selected";?>>1.5</option>
				<option value='2' <?php if($BPR_pm == 2) 
											echo  "selected = selected";?>>2</option>
 			</select>
 		</td>
 		<td>
 		</tr>
 		<tr>
 		<td>
 			<div style='float:left;font-size:11px'>
 			BPR Analyst &nbsp;
 			</div>
 			<select name='BPR_analyst' style="width:12mm;font-size:smaller">
 				<option value='0' <?php if($BPR_analyst == 0) 
											echo  "selected = selected";?>>0</option>
 				<option value='.5' <?php if($BPR_analyst == 0.5) 
											echo  "selected = selected";?>>0.5</option>
 				<option value='1' <?php if($BPR_analyst == 1) 
											echo  "selected = selected";?>>1</option>
				<option value='1.5' <?php if($BPR_analyst == 1.5) 
											echo  "selected = selected";?>>1.5</option>
				<option value='2' <?php if($BPR_analyst == 2) 
											echo  "selected = selected";?>>2</option>
 			</select>
 			</td></tr>

                                </table>

                            </div>
                            <div id="h_spacer"></div>

                            <div id="col3_div">


                                <table>

                                

                            <tr>
                                <td>Rollover
                                    <br><input  type="radio" name="rollover" value="1" <?php if($rollover == '1') echo "checked";?>> &nbsp;  <font style="font-size:11px">Yes</font>
                                    <br><input type="radio" name="rollover" value="0" <?php if($rollover == '0') echo "checked";?>> &nbsp; <font style="font-size:11px">No</font  </td><td></td></tr>
<?= $emptyrow ?>
                             <tr>
                                <td>Ultimate Gold Impact
                                    <br><input  type="radio" name="ultimate_gold_impact" value="Yes" <?php if($ultimate_gold_impact == 'Yes') echo "checked";?>> &nbsp;  <font style="font-size:11px">Yes</font>
                                    <br><input type="radio" name="ultimate_gold_impact" value="No" <?php if($ultimate_gold_impact == 'No') echo "checked";?>> &nbsp; <font style="font-size:11px">No</font  </td><td></td></tr>
<?= $emptyrow ?>
                <tr>
                                <td>Type
                                <?php
                                             if ($typetable->num_rows() > 0)
                                    {
                                        foreach ($typetable->result() as $row) {
                                        if($row->name == $type)
                                   echo ' <br><input  type="radio" name="type" value="'. $row->id.'"  "checked=checked"> &nbsp;<font style="font-size:11px"> '. $row->name . '</font>';
                                   else
                                        echo ' <br><input  type="radio" name="type" value="'. $row->id.'"  > &nbsp;<font style="font-size:11px">' .  $row->name . '</font>';
                                        }
                                        }
                                    ?>
                                   </td><td></td></tr>
<?= $emptyrow ?>


<tr>
<td>Start Date</td><td>            <?php
                                    $i = 0;
                                    echo '<select name="start_date_yr" style="font-size:smaller">';

                                    if ($start_end_yrs->num_rows() > 0)
                                    {
                                        foreach ($start_end_yrs->result() as $row) 
                                        {	if(in_array($row->year, $fiscal_yrs_system))
                                        	{
												if($row->id == $start_date_yr_id)
													$selected = 'selected=selected';
												else
													$selected = '';
                                           		 echo '<option value="' . $row->id  . set_select('start_date_year', $row->id) .'"'. $selected . '>' . $row->year . '</option> ';
                                        	}
                                        }
                                    }
                                    echo '</select>';
                                    ?>
                                            </td><td>
                                                <select name="start_date_month" style="font-size:smaller">
                                              <?php 
                                              foreach($months as $key=>$month)
                                              {
                                              
                                              	if($key == $start_date_month_id)
												$selected = 'selected=selected';
											else
												$selected = '';
                                              	echo  '"<option value="' . $key . '"' . $selected . '>' . $month . "</option>"	;
                                              }
                                        ?>
                                               
                                                

                                            </select>
                                            </td>
</tr>

<tr>
<td>End Date</td><td>
                                            
                                                        <?php
                                    $i = 0;
                                    echo '<select name="end_date_yr" style="font-size:smaller">';

                                    if ($start_end_yrs->num_rows() > 0)
                                    {
                                        foreach ($start_end_yrs->result() as $row) 
                                        {	
                                        	if(in_array($row->year, $fiscal_yrs_system))
                                        	{
												if($row->id == $end_date_yr_id)
													$selected = 'selected=selected';
												else
													$selected = '';
                                            	echo '<option value="' . $row->id  . set_select('end_date_year', $row->id) .'"'. $selected . '>' . $row->year . '</option> ';
                                       		}
                                       }
                                    }
                                    echo '</select>';
                                    ?>
                                            </td><td>
                                            <select name="end_date_month" style="font-size:smaller">
                                                  <?php 
                                              foreach($months as $key=>$month)
                                              {
                                              
                                              	if($key == $end_date_month_id)
												$selected = 'selected=selected';
											else
												$selected = '';
                                              	echo  '"<option value="' . $key . '"' . $selected . '>' . $month . "</option>"	;
                                              }
                                        ?>
                                                

                                            </select>
                                            </td>
</tr>


                                </table>

                            </div>
                        </div>
<div id="v_spacer"></div>
                        <div id="colmain_div">
                            <div class="upload_title">Classification</div>
                            <div id="col5_div">
                                                     Organization <br>
                                <select name="org[]" class="org" size="10" multiple style="width:40mm">
                                    
<?php
						$orgtemp = '';
						$idtemp = '';
                                    if ($query->num_rows() > 0)
                                   foreach ($query->result() as $row)
                                           {
                                           if(in_array($row->id, $orgs_id))
                                		$selected = "selected = selected";
                                		else 
                                		$selected = '';
                                           $orgtemp .= '<option value="' . $row->id . '"'. $selected  . '>' . $row->name . '</option>';
                                           $idtemp .= ',' . $row->id;
                                           
                                    }
                        echo '<option value="' . $idtemp . '">All</option>';
                        echo $orgtemp;
?>
                                </select>
                                  <input type="hidden" name="org_hidden">
                                  <div id='error_org'></div>
                            <?php echo form_error('org[]'); ?>
                            </div>
                            <div id="h_spacer"></div>
                            <div id="col5_div">
                                Track <br>
                                <select name="track[]" class="track"  size ="10"  style="width:40mm" multiple>
                                    <option value="All" >All</option>
                               
                               <?php
                                    if ($track_query->num_rows() > 0)
                                   foreach ($track_query->result() as $row)
                                   {
                                		
                                		echo '<option value="' . $row->id . '" >' . $row->data . '</option>';
                                           
                                   }     
                                    
?>
                               
                               </select>
                               <div id="error_track"></div>
                                <input type="hidden" name="track_hidden">
<?php echo form_error('track[]'); ?>
                                </div>
                           <div id="h_spacer"></div>
                                <div id="col5_div">
                                    Subtrack<br>
                                    <select name="subtrack[]" class="subtrack" size="10" style="width:40mm" multiple>
                                        <option value="All" selected="selected">All</option>
                                                                <?php
                                    if ($subtrack_query->num_rows() > 0)
                                   foreach ($subtrack_query->result() as $row)
                                           echo '<option value=' . $row->id . set_select('subtrack[]', $row->id) . '>' . $row->data . '</option>';
                                           
                                           
                                    
									?>
                                 </select>
                                    <input type="hidden" name="subtrack_hidden" value="">
                                </div>
                                <div id="h_spacer"></div>
                                     <div id="col5_div">
                                    Capability <br>
                                    <select name="track2[]" class="track2"  size ="10" style="width:40mm" >
                                        <option value="%" selected="selected">All</option>
                                   
                                                                  <?php
                                    if ($cap_query->num_rows() > 0)
                                   foreach ($cap_query->result() as $row)
                                           echo '<option value=' . $row->id . set_select('track[]', $row->id) . '>' . $row->data . '</option>';
                                           
                                           
                                    
?>
                                   </select>
                                    <input type="hidden" name="track2_hidden">
                                    <div id='error_track2'></div>
<?php echo form_error('track2[]'); ?>
                                </div>
                                <div id="h_spacer"></div>
                                <div id="col5_div">
                                    Subcapability<br>
                                    <select name="subtrack2[]" class="subtrack2" size="10" style="width:40mm" >
                                        <option value="All" selected="selected">All</option>
                                                                  <?php
                                    if ($subcap_query->num_rows() > 0)
                                   foreach ($subcap_query->result() as $row)
                                           echo '<option value=' . $row->id . set_select('track[]', $row->id) . '>' . $row->data . '</option>';
                                           
                                           
                                    
?>
                                   </select>
                                    <input type="hidden" name="subtrack2_hidden" value="">
                                </div>

                            </div>

                            <div id="v_spacer"></div>

                            <div id="colmain_div">
                                <div class="upload_title">Description</div>
                                <div id="col_div_noborder">


                                    Executive Summary<br>
                                    <textarea name="exec_summary"rows="5" cols="50"><?php echo $exec_summary;?></textarea>
                                    <div id="error_exec_summary"></div>
<?php echo form_error('exec_summary'); ?>

                                    <br>
                                    Project Description & Scope<br>
                                    <textarea name="proj_description"rows="14" cols="50"><?php echo $proj_description;?></textarea>
                                    <div id="error_proj_description"></div>
<?php echo form_error('proj_description'); ?>

                                    <br>

                            


                                </div>


                                <div id="col_div_noborder">

                               Justification (select all that apply)

                                <table border-width="1px" cellpadding="5" cellspacing="0">

<?php
                                    $i = 0;
                                    if ($queryjustifications->num_rows() > 0)
                                        foreach ($queryjustifications->result() as $row) {
											if(in_array($row->id, $justifications_id))
												$checked = "checked=checked";
											else 
												$checked = '';
                                            if ($i % 2 == 0) {
                                                echo "<tr>";
                                            }

                                            echo '<td><input type="checkbox"  class=justification name="justification[]" value="' . $row->id . '"' . $checked . '></td> <td height=17><font style="font-size:11px">' . $row->statement . '</font></td>';

                                            if ($i % 2 == 1) {
                                                echo "</tr>";
                                            }

                                            $i++;
                                        } ?>
                                    <div id="error_justification"></div>
                            <?php echo form_error('justification[]'); ?>
                                </table>
                           <div id='regiondivcheckbox'>  
                                    Regions Benefitting (select all that apply)
                                    <table border-width="1px" cellpadding="0" cellspacing="0">
<?php
                                    $i = 0;
					
                                    if ($queryregions->num_rows() > 0)
                                        foreach ($queryregions->result() as $row) {
                                        	if(in_array($row->id, $region_id))
												$checked = "checked=checked";
											else 
												$checked = '';
                                            if ($i % 2 == 0) {
                                                echo "<tr>";
                                            }
                                            echo '<td width=140 height=28>' . '<input type="checkbox" class="region" name="region[]" value="' . $row->id . '"' . $checked . ' />&nbsp;&nbsp;<font style="font-size:11px">' . $row->name . '</font></input> ' . '</td> ';
                                            if ($i % 2 == 1) {
                                                echo "</tr>";
                                            }
                                            $i++;
                                        }
                                        
               
?>


                                    <div id="error_region"></div>
<?php echo form_error('region[]'); ?>



                                </table>

</div>

                                <br>  Regions Benefitting (if only one region justification required)<br>
                                <textarea name="regions_benefitting_justification"rows="5" cols="50"><?php echo $regions_benefitting_justification;?></textarea>

                                <br>

	<?php
							
								
									
							
							
							
							?>
                            </div>
                        </div>
                        <div id="v_spacer"></div>

                        <div id="colmain_div">
                            <div class="upload_title">Comments & Feedback</div>
                         
<?php
                                    if ($queryregions->num_rows() > 0)
                                        foreach ($queryregions->result() as $row) {
                                        echo "<div id='col5_div'>";
                                            echo "<br>" . $row->name . " Comments<br>";

                                           
		                                   if(isset($comments_name[$row->name]))
		                                   		echo  $comments_name[$row->name];
		                                     echo '<textarea name="' . $row->name . 'collaborative_comments" rows="9" cols="17"></textarea>';
                                            echo "</div><div id=h_spacer></div>";
                                        }
?>
                        <?php echo form_error('collaborative_comments'); ?>


                                    <br>
                                  
                                </div>
                                <div id='v_spacer'></div>
                               
                             <div id="colmain_div_nobgborderleft"><?php echo 'Created on :' .  date("F j, Y, g:i a", strtotime($date_inserted)) . ' Updated on : ' . date("F j, Y, g:i a", strtotime($date_edited)); ?> </div>    <div id="colmain_div_nobgborderright" style="text-align:right;padding:3px;"><a href="<?php echo site_url('index.php/concept/index2')?>"><input type="button" value="Cancel"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Continue"/></div>

                            </div>
                            <br><br><br>
                           
                          
                            </form>
                        </div>
                    </div>


                </body>


                <head>


                    <script  src="<?= base_url(); ?>assets/js/jquery.js"></script>



                </head>
               


               <script type='text/javascript'>
var findchildren = '<?php echo site_url("index.php/ajaxselect/editfindchildren/$initiativeid");?>';
var ajaxfindchildren = '<?php echo site_url("index.php/ajaxselect/findchildren");?>';
var findchildren2 = '<?php echo site_url("index.php/ajaxselect/editfindchildren2/$initiativeid");?>';
var ajaxfindchildren2 = '<?php echo site_url("index.php/ajaxselect/findchildren2");?>';
var findchildren3 = '<?php echo site_url("index.php/ajaxselect/editfindchildren3/$initiativeid");?>';
var ajaxfindchildren3 = '<?php echo site_url("index.php/ajaxselect/findchildren3/");?>';
var findchildren4 = '<?php echo site_url("index.php/ajaxselect/editfindchildren4/$initiativeid");?>';
var ajaxfindchildren4 = '<?php echo site_url("index.php/ajaxselect/findchildren4");?>';
</script>
                <script src ="<?= base_url(); ?>assets/js/selectboxtree.js">
                  
    </script>
    
 
    
  
<script type='text/javascript' src="<?= base_url(); ?>assets/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/jquery.autocomplete.css" />

<script type="text/javascript">

var autocompsiteurl = "<?= site_url('index.php'); ?>/ldapcontroller/searchldap/";

    </script>
    
    
    <script type='text/javascript'>
    
            
                    $(document).ready(function(){
                        $("input[name=subtrack_hidden]").val(0);

                        $("input[name=subtrack2_hidden]").val(0);
                        $("input[name=track2_hidden]").val(0);
                        function error_check(name, mode){
                            if(mode=='textarea'|| mode =='input'){
                                val = $(mode+"[name="+name+"]").val();
                                if(!val) $("#error_"+name).html("<font color=red>*Required</font>");
                                else $("#error_"+name).html("");

                                if(!val) return false;

                                else return true;
                            }
                            if(mode=="select"){
                                value = '';
                                $('.'+name+' > option:selected').each(function() {
                                    value = value + ',' + $(this).val();

                                });

                                if(!value || value == ',') $("#error_"+name).html("<font color=red>*Required</font>");
                                else $("#error_"+name).html("");
                                if(!value || value == ',') return false;
                                else return true;
                            }

                            if(mode=="checkbox"){

                                var numSelected = $("input."+name+":checked").length;
                                if(!numSelected)  $("#error_"+name).html("<font color=red>*Required</font>");
                                else $("#error_"+name).html("");
                                if(!numSelected) return false;
                                else return true;
                            }
                        }
                        
                        $("form").submit(function (e){


                            var flag =0;
                            val = error_check('proj_description', 'textarea');
                            if(!val) flag =1;
                           
                            val = error_check('exec_summary','textarea');
                            if(!val) flag =1;
                            val = error_check('initiative_name','input');
                            if(!val) flag =1;
                            val = error_check('originator_region', 'select');
             
                            if(!val) flag=1;
                            
								val = error_check('org', 'select');
                            if(!val) flag=1;
							val = error_check('track', 'select');
                            if(!val) flag=1;
							val = error_check('track2', 'select');
                            if(!val) flag=1;
                            
                            val = error_check('justification', 'checkbox');
                            if(!val) flag=1;
                            val = error_check('region', 'checkbox');
                            if(!val) flag=1;
                            val = error_check('executive_sponsor', 'input');
                            if(!val) flag=1;
                           
                            val = error_check('author', 'input');
                            if(!val) flag=1;
                            val = error_check('BPR_contact', 'input');
                            if(!val) flag=1;
                            var endmonth = Number($('select[name=end_date_month]').val()); 
                            var endyr = Number($('select[name=end_date_yr]').val());
                           	var startyr =  Number($('select[name=start_date_yr]').val());
	                        var startmonth =  Number($('select[name=start_date_month]').val());
	                        var startfirstoption = Number($('select[name=start_date_yr] option:first').val());
	                        var endfirstoption = Number($('select[name=end_date_yr] option:first').val());
	                        var startlastoption = Number($('select[name=start_date_yr] option:last').val());
	                         var endlastoption = Number($('select[name=end_date_yr] option:last').val());
	                       
                            if(    endyr < startyr)
                            {
                            	alert("End date is less than Start date");
                            	flag = 1;
                            	
                        	}
                        	if(   endyr == startyr)
                            { 
                            	if(endmonth < startmonth)
                            	{	
                            		alert("Endmonth is before Startmonth");
                            		flag =  1;
                            	}
                            
                            		
                            	
                        	}
                           if(startyr == startfirstoption) {
                           
                          		if(startmonth < 8){
									alert("The StartDate cannot be before current fiscal year's first month");	
									flag =1;
                            	}
                            }
                              if(endyr == endfirstoption) {
                           
                          		if(endmonth< 8){
									alert("The EndDate cannot be before current fiscal year's first month");	
									flag =1;
                            	}
                            }
                                  if(startyr == startlastoption) {
                           
                          		if(startmonth > 8){
									alert("The StartDate cannot be after last fiscal year's last month");	
									flag =1;
                            	}
                            }
                              if(endyr == endlastoption) {
                           
                          		if(endmonth> 8){
									alert("The EndDate cannot be after last fiscal year's last month");	
									flag =1;
                            	}
                            }
                            if(flag) return false;
                            else
                            	alert("Initiative Saved!");
                            	


                        });
                        });
                        //iterate through each textboxes and add keyup
                        //handler to trigger sum event
                        $(".1txt").each(function() {

                            $(this).keyup(function(){
                                calculateSum(1);
                            });
                        });
                        $(".3txt").each(function() {

                            $(this).keyup(function(){
                                calculateSum(3);
                            });
                        });
    </script>
    
    <script src="<?= base_url(); ?>assets/js/jquery.jqEasyCharCounter.js" type="text/javascript"></script>
