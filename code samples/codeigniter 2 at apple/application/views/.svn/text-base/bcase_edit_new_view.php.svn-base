<link rel="stylesheet" href="<?= base_url(); ?>assets/css/cpt.css" type="text/css" charset="utf-8" />

<div id="v_spacer_2"  class = 'page-break'></div>
<?php
$quant_summary = '';
$nonquant_summary = '';
$additional_info = '';
$date_inserted = '';
$date_edited = '';
$labelname = '';
$total_benefit =  isset($total_benefit) ? $total_benefit : '';
$total_cost =  isset($total_cost) ? $total_cost : '';
$total_benefits_1 =  isset($total_benefits_1) ? $total_benefits_1 : '';
$total_cost_1 =  isset($total_cost_1) ? $total_cost_1 : '';
$total_benefits_2 =  isset($total_benefits_2) ? $total_benefits_2 : '';
$total_cost_2 =  isset($total_cost_2) ? $total_cost_2 : '';
foreach ($labels->result() as $label) {
    $first_yrdollars[$label->name] = '';
    $second_yrdollars[$label->name] = '';
    $bcase_assumptions[$label->name] = '';
}
if (!empty($bcase))
    foreach ($bcase->result() as $row) {

        $quant_summary = $row->quant_summary;
        $nonquant_summary = $row->nonquant_summary;
        $additional_info = $row->additional_info;
        $total_benefit = $row->total_benefit;
        $total_cost = $row->total_cost;
           $total_benefits_1 = $row->total_benefits_1;
        $total_cost_1 = $row->total_cost_1;
           $total_benefits_2 = $row->total_benefits_2;
        $total_cost_2 = $row->total_cost_2;
        $fy = $row->fy;
    }
if (!empty($bcaselabel))
    foreach ($bcaselabel->result() as $row) {

        $labelname = $row->labelname;
        $first_yrdollars[$labelname] = $row->first_yrdollars;
        $second_yrdollars[$labelname] = $row->second_yrdollars;
        $bcase_assumptions[$labelname] = $row->assumptions;
    }
echo form_open('index.php/bcase/index/' . $id);


?>
<div class="p_courseContainer ">
    <div class="p_courseHolder">
        <div class="p_courseContentRow2Container  ">
            <div class='p_courseContentRow2Col1'>
                <div class="p_courseContentRow2Col1SectionsTitle">Quantitative Benefits</div>
                <div class="p_courseContentRow2Col1SectionsBody">
<?php
echo validation_errors();
$i = 1;
if(isset($fy))
	echo "<div id =fiscalyrheader>FY" . ($fy+1) . "</div><div id =fiscalyrheader>FY" . ($fy) . "</div><div id =fiscalyrheader>Assumptions </div>";
else
	echo "<div id =fiscalyrheader>FY" . $fiscalyrs[1] . "</div><div id =fiscalyrheader>FY" . $fiscalyrs[2] . "</div><div id =fiscalyrheader>Assumptions </div>";
foreach ($labels->result() as $label) {
    if ($i < 4)
    {
    	if($i==1)
    		echo "<div style='float:left;text-decoration:underline;font-weight:bold;width:500px'>Cost</div>";
    	echo "<div style='float:right;'> " . $label->name . "<input type=text name = '" . $label->name . "_assumption' value='" . set_value($label->name . "_assumption", $bcase_assumptions[$label->name]) . "' ><input type = text name= '" . $label->name . "_firstyr_dollars' class=1txt value='" . set_value($label->name . "_firstyr_dollars", $first_yrdollars[$label->name]) . "'><input type = text name= '" . $label->name . "_secondyr_dollars' class=1txt-2  value='" . set_value($label->name . "_secondyr_dollars", $second_yrdollars[$label->name]) . "'>" . "</div><div id=v_spacer_2></div>";
    
    }
    else
    {
    	if($i==4)
    		echo "<div style='float:left;text-decoration:underline;font-weight:bold;width:500px'>Benefits</div>";
        echo "<div style='float:right'> " . $label->name . "<input type=text name = '" . $label->name . "_assumption' value='" . set_value($label->name . "_assumption", $bcase_assumptions[$label->name]) . "' ><input type = text name= '" . $label->name . "_firstyr_dollars' class=3txt value='" . set_value($label->name . "_firstyr_dollars", $first_yrdollars[$label->name]) . "'><input type = text name= '" . $label->name . "_secondyr_dollars' class=3txt-2  value='" . set_value($label->name . "_secondyr_dollars", $second_yrdollars[$label->name]) . "'>" . "</div><div id=v_spacer_2></div>";
	}

    $i++;
}
?>
                </div>
               
            </div>
            <div id='v_spacer_2'></div>
            <div class='p_courseContentRow2Col1'>

                <div class="p_courseContentRow2Col1SectionsTitle">Quantitative Benefits Summary</div>
                <div class="p_courseContentRow2Col1SectionsBody">
                    <textarea name="quant_summary" rows="5" cols="50"><?php echo set_value('quant_summary', $quant_summary); ?></textarea>
                </div>
            </div>
            <div id='v_spacer_2'></div>
            <div class='p_courseContentRow2Col1'>

                <div class="p_courseContentRow2Col1SectionsTitle">Strategic and Quanlitative Benefits Summary</div>
                <div class="p_courseContentRow2Col1SectionsBody">
                    <textarea name="nonquant_summary"rows="5" cols="50" ><?php echo set_value('nonquant_summary', $nonquant_summary); ?></textarea>
                </div>
            </div>
            <div id='v_spacer_2'></div>
            <div class='p_courseContentRow2Col1'>

                <div class="p_courseContentRow2Col1SectionsTitle">Additional Info</div>
                <div class="p_courseContentRow2Col1SectionsBody">
                    <textarea name="additional_info"rows="5" cols="50"><?php echo set_value('additional_info', $additional_info); ?></textarea>
                </div>
            </div>
            <div class='p_courseContentRow2Col2' style='height:auto; text-align:center'>
           
                <div class="p_courseContentRow2Col2SectionsTitle"></div>
                <div class="p_courseContentSidebarRow1header">Analysis</div>
                	<div id='v_spacer_2'></div>
			Total Benefit<input type=text readonly name='total_benefits' value=<?php echo set_value('total_benefits', $total_benefit); ?>>
			<input type=hidden name='total_benefits_1' value=<?php echo set_value('total_benefits_1', $total_benefits_1); ?> >
			<input type=hidden name='total_benefits_2' value=<?php echo set_value('total_benefits_2', $total_benefits_2); ?>>
			<br>
				<div id='v_spacer_2'></div>
			Total Cost<input type=text readonly name='total_cost' value=<?php echo set_value('total_cost', $total_cost); ?>>
				<input type=hidden name='total_cost_1' value=<?php echo set_value('total_cost_1', $total_cost_1); ?>>
			<input type=hidden name='total_cost_2' value=<?php echo set_value('total_cost_2', $total_cost_2); ?>>
			<br>
				<div id='v_spacer_2'></div>
			Net Present Value<input type=text readonly name='net_present_value'>
			<input type=button name=npv>
			<br>
				<div id='v_spacer_2'></div>
			Payback<input type='hidden' name='payback'>




                    <div class="p_courseContentRow2Col2SectionsTitle"></div>
                 
                    <div class="p_courseContentSidebarRow1">IS&T Sourced Data</div>
                    <div id='v_spacer_2'></div>
			QLOE Capital<input type=hidden name='total_benefits2' ><br>
			<div id='v_spacer_2'></div>
			QLOE Expense<input type=hidden name='total_cost2' ><br>
				<div id='v_spacer_2'></div>
			PLOE Capital<input type=hidden name='net_present_value2'><br>
				<div id='v_spacer_2'></div>
			PLOE Expense<input type='hidden' name='payback2'><br>
				<div id='v_spacer_2'></div>
			IMT Driver<input type='hidden' name='payback2'><br>
				<div id='v_spacer_2'></div>
			IS&T Driver<input type='hidden' name='payback2'><br>
				<div id='v_spacer_2'></div>
			IS&T Super Driver<input type='hidden' name='payback2'><br>
				<div id='v_spacer_2'></div>
  Attach Supplementary Documents? 
                        <input type="file" id="file_upload" name="file_upload" />


                <div class="p_courseContentRow2Col2SectionsTitle"></div>
                <div class="p_courseContentSidebarRow1">Guidance</div>
                    <?php
                    for ($i = 1; $i < 8; $i++) {
                    echo "	<div id='v_spacer_2'></div>";
                        echo "Assumption $i<input type=hidden name='assumption_" . $i . "'>  <br>";
                    }
                    ?>





                <input type="submit" value="Continue"/>

      </div></div>
        </div>

    </div></div>
            <script  src="<?= base_url(); ?>assets/js/jquery.js"></script>
            <script>
                $(document).ready(function(){

                    //iterate through each textboxes and add keyup
                    //handler to trigger sum event
                    //**************calculate sum of all 1's or 3's separately for 2 yrs
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
                     $(".1txt-2").each(function() {

                        $(this).keyup(function(){
                        
                            calculateSum(1);
                        });
                    });
                    $(".3txt-2").each(function() {

                        $(this).keyup(function(){
                            calculateSum(3);
                        });
                    });

					
					
				var	tb1 =  $("input[name=total_benefits_1]").val();
				var	tb2 =  $("input[name=total_benefits_2]").val();
				var	 tc1 = $("input[name=total_cost_1]").val();
				var	 tc2 = $("input[name=total_cost_2]").val();
					 
					 npv = (tb1-tc1)/1  +  (tb2-tc2)/1.02;
					$("input[name=net_present_value]").val(npv);
					 
			


                });

                function calculateSum(id) {

                    var sum = 0;
                    //iterate through each textboxes and add the values
                    $("."+id+"txt").each(function() {

                        //add only if the value is number
                        if(!isNaN(this.value) && this.value.length!=0) {
                            sum += parseFloat(this.value);

                        }
                     
                    });
					   var sum2= 0 ;
                        
                             $("."+id+"txt-2").each(function() {

                        //add only if the value is number
                        if(!isNaN(this.value) && this.value.length!=0) {
                            sum2 += parseFloat(this.value);

                        }
			
					
					});
					
					
                    //.toFixed() method will roundoff the final sum to 2 decimal places
                    if(id == 1)
                     {   $("input[name=total_benefits]").val(sum + sum2 );
                     
                     	 $("input[name=total_benefits_1]").val(sum );
                     $("input[name=total_benefits_2]").val(sum2);
                     
                     }
                    else
                      {  $("input[name=total_cost]").val(parseFloat(sum.toFixed(2)) + parseFloat(sum2.toFixed(2)) );
                         $("input[name=total_cost_1]").val(parseFloat(sum.toFixed(2))  );
                     $("input[name=total_cost_2]").val(parseFloat(sum2.toFixed(2)));
                     }
                }
            </script>
            
            
               <link href="<?= base_url(); ?>/assets/js/ajax-file-upload/uploadify.css" type="text/css" rel="stylesheet" />
  
  
  
      <script type="text/javascript" src="<?= base_url(); ?>/assets/js/ajax-file-upload/jquery-1.4.2.min.js"></script>
  
      <script type="text/javascript" src="<?= base_url(); ?>/assets/js/ajax-file-upload/swfobject.js"></script>
   
      <script type="text/javascript" src="<?= base_url(); ?>/assets/js/ajax-file-upload/jquery.uploadify.v2.1.4.min.js"></script>
 
      <script type="text/javascript">
 
      $(document).ready(function() {
     var files = "<?= base_url(); ?>index.php/filesaver/showfiles/<?php echo $id;?>";
   
        $('#file_upload').uploadify({
 
          'uploader'  : '<?= base_url(); ?>assets/js/ajax-file-upload/uploadify.swf',
  
          'script'    : "<?= base_url(); ?>index.php/filesaver/index/<?php echo $id;?>",
  
          'cancelImg' : '<?= base_url(); ?>assets/js/ajax-file-upload/cancel.png',
 
          'folder'    : 'uploads',
          'fileExt': '*.png;*.jpg;*.gif;*.doc;*.docx;*.xls;*.xlsx;*.pdf;*.ppt;*.pptx',
          'fileDesc': '*.png;*.jpg;*.gif;*.doc;*.docx;*.xls;*.xlsx;*.pdf;*.ppt;*.pptx',
            'sizeLimit'   : 32000400,
  
     'displayData': false,
'buttonText': 'Choose File',
'wmode': 'transparent',
'auto' : true,
   onProgress: function() { 
        $('#loader').show(); 
    }, 
    onAllComplete: function() { 
        $.ajax({
                    url: files,
                    dataType: 'json',
                    type: 'POST',
                  
                    success: function(data){
                  
                            $("#showfilesdiv").html(data.message); //change alert to updated DOM somewhere
                        
                    },
                    error: function(){
                      alert('Something major failed');
                    }
                });
				
		
    } 
 
        });
 
      });
  
      </script>

    
      
   
      <a href="javascript:$('#file_upload').uploadifyUpload();" style="font-size:11px;font-family: arial, verdana, sans-serif;"></a>
     
   <div id='showfilesdiv'></div>

          <script type='text/javascript'>
var files =  '<?php echo site_url("index.php/filesaver/showfiles/$id");?>';

</script>
                    <script  src="<?= base_url(); ?>assets/js/fileshower.js"></script>
                    
                    <script type='text/javascript'>
   
     $(document).ready(function(){

	$('.deletefiles').live('click', function(eve){
		eve.preventDefault();
		var files = "<?= base_url(); ?>index.php/filesaver/deletefiles/<?php echo $id;?>/" +  $(this).attr('name');
		
		
		//alert($(this).attr('id'));
		   $.ajax({
                    url: files ,
                    dataType: 'json',
                    type: 'POST',
                  
                    success: function(data){
                  var files =  '<?php echo site_url("index.php/filesaver/showfiles/$id");?>';
                           alert("Deleted"); //change alert to updated DOM somewhere
                              $.ajax({
                    url: files,
                    dataType: 'json',
                    type: 'POST',
                  
                    success: function(data){
                  
                            $("#showfilesdiv").html(data.message); //change alert to updated DOM somewhere
                        
                    },
                    error: function(){
                      alert('Something major failed');
                    }
                });
                        
                    },
                    error: function(){
                      alert('Something major failed');
                    }
                });
		
		});
		
		
		});
		
		</script>