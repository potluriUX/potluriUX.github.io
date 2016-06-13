 <?php echo form_open('index.php/conceptslide/listslides', array('id'=>'selectsubmit', 'target'=>'_blank')); ?>


    <body><div class="filter_content"><div  id="contentform">
  <?php if($success)  {?> <div id="v_spacer"></div> 
     <div id="feedback">
                           
                             
                            <?php echo $success;?>
              </div>                   
        <?php } ?>
   
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
                                           
                                           $orgtemp .= '<option value=' . $row->id . set_select('org[]', $row->id) . '>' . $row->name . '</option>';
                                           $idtemp .= ',' . $row->id;
                                           
                                    }
                        echo '<option value="' . $idtemp . '" selected="selected">All</option>';
                        echo $orgtemp;
?>
                                </select>
                                  <input type="hidden" name="org_hidden">
                            <?php echo form_error('org[]'); ?>
                            </div>
                            <div id="h_spacer"></div>
                            <div id="col5_div">
                                Track <br>
                                <select name="track[]" class="track"  size ="10"  style="width:40mm" multiple>
                                    <option value="All" selected="selected">All</option>
                               
                               <?php
                                    if ($track_query->num_rows() > 0)
                                   foreach ($track_query->result() as $row)
                                           echo '<option value=' . $row->id . set_select('track[]', $row->id) . '>' . $row->data . '</option>';
                                           
                                           
                                    
?>
                               
                               </select>
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
                                    <select name="track2[]" class="track2"  size ="10" style="width:40mm" multiple>
                                        <option value="%" selected="selected">All</option>
                                   
                                                                  <?php
                                    if ($cap_query->num_rows() > 0)
                                   foreach ($cap_query->result() as $row)
                                           echo '<option value=' . $row->id . set_select('track[]', $row->id) . '>' . $row->data . '</option>';
                                           
                                           
                                    
?>
                                   </select>
                                    <input type="hidden" name="track2_hidden">
<?php echo form_error('track2[]'); ?>
                                </div>
                                <div id="h_spacer"></div>
                                <div id="col5_div">
                                    Subcapability<br>
                                    <select name="subtrack2[]" class="subtrack2" size="10" style="width:40mm">
                                        <option value="All" selected="selected">All</option>
                                                                  <?php
                                    if ($subcap_query->num_rows() > 0)
                                   foreach ($subcap_query->result() as $row)
                                           echo '<option value=' . $row->id . set_select('track[]', $row->id) . '>' . $row->data . '</option>';
                                           
                                           
                                    
?>
                                   </select>
                                   
                                    <input type="hidden" name="subtrack2_hidden" value="">
                                    </div>
                                   <div id=col_div_noborder> Search
                                   
                                   <select name='searchoptions'>
                                       <option value='' >Select one</option>
                                   <option value='initiative.initiative_number'>Initiative Number</option>
                                   <option value='initiative.initiative_name'>Initiative Name</option>
                                   <option value='initiative.BHU'>BHU</option>
                                   <option value='exec_sponsor.name'>Executive Sponsor</option>
                                   <option value='initiative.author'>Author</option>
                                   <option value='initiative.BPR_contact'>Track lead</option>
                                   <option value = 'initiative.proj_description'>Description</option>
                                   <option value='type.name'>Type</option>
                                    <option value = 'fiscal_yr.year'>Fiscal Yr</option>
                                   
                                   </select> 
                                   <select name='operator'>
                                   <option value='equal'>=</option>
                                   <option value='wildcard'>%</option>
                                   </select>
                                   <input type='text' name='googlesearch' size=30> </div>
                                    <div id=col_div_noborder>
                                  <?php 
                                  if($is_admin)
                                   echo "<input type='checkbox' class='unarchived'>Archived list";
                                 
                                  ?>
                                  </div>
                                    <div id='v_spacer'></div>
                               <ul class="ajax-pag" id="pagination-digg" style='float:right; padding-right:10px; padding-bottom:10px'><p>&nbsp;<a href="<?= base_url(); ?>index.php/concept/search/"><input type='button' value='Submit'></a></p></ul>
                               

                            </div>
    
 <div id="v_spacer"></div>    
<div id="colmain_div">

                    <div class="upload_title">Initiatives list</div>

<div id='ajax-content'>  
	No Items Found
<?php 
//print_r( $this->table->generate($results));  
echo "<ul id =\"pagination-digg\" class=\"ajax-pag\">";?>
<?php //echo $this->pagination->create_links(); 
echo "</ul>";
?>
</div>

            </div>
            
            
            <div id="v_spacer"></div>    
<div id="colmain_div">

                    <div class="upload_title">Reports</div>
                     <div class = 'reportssection' style='padding:5px'>
                    
                 <?php //echo "<a href ='" . site_url('index.php/roadmap/excelreport') . "'>Roadmap Excel Report</a>" ;
                 
                   echo " <select class='formaction' >
                                         <option value='conceptslides' selected='selected'> Concept Slides</option>
                                        <option value='roadmap' >Roadmap</option>
                                       
                                        </select>";
               
                 echo "&nbsp;&nbsp;<input type='submit' value='Generate Report'/>";
                 
                 ?> 
                     <!--<div id="colmain_div_nobgborder" style="text-align:right;">&nbsp;&nbsp;<input type="submit" value="Generate Report"/></div>-->
                 
                 </div>
                 </div>
                    </div>
                     <div id='v_spacer'></div>
                              
        </div>
        </div>
                </body>
</html>
<script  src="<?= base_url(); ?>assets/js/jquery.js"></script>
<script type='text/javascript'>
	var link = "<?php echo site_url('index.php/concept/search');?>";
	
	</script>
<script type='text/javascript' src="<?= base_url(); ?>assets/js/pagination.js">


</script>
 <script type='text/javascript'>
    
            
                    $(document).ready(function(){  
                    $('.reportssection').hide();
    $(".formaction").change(function() {

  var action = $(this).val() == "conceptslides" ? "<?php echo site_url('index.php/conceptslide/listslides'); ?> ":  "<?php echo site_url('index.php/roadmap/excelreport');?>";
  var target = $(this).val() == "conceptslides" ? '_blank' : '' ;
  $("#selectsubmit").attr("action",   action);
   $("#selectsubmit").attr("target",  target);
});
var test = 0;
   $("form").submit(function (e){
     var flag =0;
     if($('input[name=names]').val() == 's:0:"";;')
     flag = 1;
    
if (test == 1) {

flag = 1;

}
test = 0;
     if(flag) return false;
   });
$(document).keypress(function (evt) {
     if (evt.keyCode == 13) {
    	test = 1;
     }
     
     	
    
 }); 
});
</script>


<script type='text/javascript'>
var findchildren = "<?php echo site_url('index.php/ajaxselect/findchildren');?>";
var findchildren2 = "<?php echo site_url('index.php/ajaxselect/findchildren2/1');?>";
var findchildren3 = "<?php echo site_url('index.php/ajaxselect/findchildren3/1');?>";
var findchildren4 = "<?php echo site_url('index.php/ajaxselect/findchildren4/1');?>";
var ajaxfindchildren = "<?php echo site_url('index.php/ajaxselect/findchildren');?>";
var ajaxfindchildren2 = "<?php echo site_url('index.php/ajaxselect/findchildren2/1');?>";
var ajaxfindchildren3 = "<?php echo site_url('index.php/ajaxselect/findchildren3/1');?>";
var ajaxfindchildren4 = "<?php echo site_url('index.php/ajaxselect/findchildren4/1');?>";
</script>
                <script src ="<?= base_url(); ?>assets/js/selectboxtree.js">
                
                  
    </script>
    <script src ="<?= base_url(); ?>assets/js/blockui.js">
    
    </script>
    
   
