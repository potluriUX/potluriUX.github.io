<?php
$quant_summary = '';
$nonquant_summary = '';
$paybackyrs = '0';
$total_benefits = '';
$reason_no_quant_benefits = '';
$date_inserted = '';
$date_edited = '';
if ($businesscase->num_rows() > 0)
    foreach ($businesscase->result() as $row) {

        $quant_summary = $row->quant_summary;
        $nonquant_summary = $row->nonquant_summary;
        $paybackyrs = $row->useful_life_yrs;
        $total_benefits = $row->total_benefits;
        $reason_no_quant_benefits = $row->reason_no_quant_benefits;
        $date_edited = ($row->date_edited != '') ? " Updated on :  " . date("F j, Y, g:i a", strtotime($row->date_edited)) : '';
       // $date_inserted = ($row->date_inserted != '') ? "Inserted on :   $row->date_inserted" : '' ;
    }
$checked = '';
if ($cas->result())
    $cachecked = "checked = checked";
else
    $cachecked = '';

if ($rgs->result())
    $rgchecked = "checked = checked";
else
    $rgchecked = '';

if ($css->result())
    $cschecked = "checked = checked";
else
    $cschecked = '';
    if(!$cschecked && !$cachecked && !$rgchecked)
    	$nqchecked = "checked = checked";
    else 
    	$nqchecked = '';
?>
<html>

    <body>
<?= form_open('index.php/businesscase/edit'); ?><div class="filter_content"><div  id="contentform">
                <input type='hidden' name ='ini_number' value="<?php echo $initiative_number; ?>">
                <div id="v_spacer"></div>
                <div id="colmain_div">
                    <div class="upload_title">Quantifiable Benefits</div>





                    <div id="col_div_noborder">


                        <table border-width="1px" cellpadding="0" cellspacing="0">
<?php
$i = 0;

if ($querybenefits->num_rows() > 0)
    foreach ($querybenefits->result() as $row) {
        switch ($row->id) {
            case 1: $name = 'ca';
                break;
            case 2: $name = 'cs';
                break;
            case 3: $name = 'rg';
                break;
                default: $name= 'nq';
        }
        echo "<tr>";

        echo '<td width=120 height=26>' . $row->name . '</td><td><div id="' . $name . '"><input type="checkbox" class=region name="region[]" id="' . $row->id . '" value="' . $row->id . '" ' . ${$name . 'checked'} . ' /></input></div> ' . '</td> ';

        echo "</tr>";
        $name = '';
        $i++;
    }
?>







                        </table><div id ='error_region'></div><br>
                        Payback (# of years) <input type="text" name="useful_life" class="numbersOnly" value=<?php echo $paybackyrs; ?>>
                       <div id='error_useful_life'></div>
               
                       <div id='showfiles'>Attachments</div>
						<div id='showfilesdiv'>Your files will show here</div>
                    </div>
                    <div id="h_spacer"></div>

                    <div id="col_div_noborder">


                        Reason for no Quantifiable Benefits<br>
                        <textarea name="reason_no_quant_benefits"rows="5" cols="50"><?php echo $reason_no_quant_benefits; ?></textarea>
                        <div id="error_reason_no_quant_benefits"></div>
	                    QLOE <input type='text' name='QLOE' readonly='readonly'> &nbsp;&nbsp; PLOE <input type='text' name='PLOE' readonly ='readonly'>
	                    <br><br>
                        Total Benefits $ <input type=button name='calculatetotalbenefits' value='Calculate Sum'><input type="text" class="numbersOnly" name="total_benefits" value =<?php echo $total_benefits; ?>><br><br>
                        Attach Supplementary Documents? 
                        <input type="file" id="file_upload" name="file_upload" />
                        
                    </div>
                </div>


                <div id="v_spacer"></div>
                <div id="ca_colmain_div">
                    <div class="upload_title">Cost Avoidance</div>
                    <div id="colmain_div_content">
                        <div id='ca_TextBoxesGroup'>
                            <div id="ca_TextBoxDiv1">

                                <br>
<?php echo $tablelabelsca; ?>
                                <?php if ($cachecked == '') {
                                ?>           <label>Cost Avoidance Item   </label><span id =" ca_textbox1">
                                        <input type='textbox' name="ca_description1" size=50 > <input type='textbox' name="ca_assumption1" size=50> <input type='textbox' class='numbersOnly' name='ca_est_revenue_growth1' size=20></span><input type='button' value='+' class="ca_add" id='1'>
<?php } ?>
                                <div id='error_ca_description1'></div><div id='error_ca_assumption1'></div><div id='error_ca_est_revenue_growth1'></div>

<?php
                                $i = 1;
                                foreach ($cas->result() as $ca) {
                                    $remove = '<input type="button" id="' . $i . '" value="-" class="ca_remove">';
                                    if ($i == 1)
                                        $remove = '';
                                    echo '<div id="ca_TextBoxDiv' . $i . '"><label>Cost Avoidance Item   </label><input type="textbox" name="ca_description' . $i . '" value="' . $ca->description . '" size="50"> <input type="textbox" name="ca_assumption' . $i . '" value="' . $ca->assumption . '" size="50"> <input type="textbox" name="ca_est_revenue_growth' . $i . '" class="numbersOnly" value="' . $ca->est_cost_avoidance . '" size="20">' . $remove . '<input type="button" id="' . $i . '" value="+" class="ca_add"></div>';
                                    $i++;
                                }
?>


                                <input type="hidden" name="ca_post" value=<?php
                                if ($cachecked == '')
                                    echo '0'; else
                                    echo '1'; ?>><input type="hidden" name="ca_counter" value="<?php echo $i; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="v_spacer"></div>

                <div id="cs_colmain_div">
                    <div class="upload_title">Cost Savings</div>
                    <div id="colmain_div_content">
                        <div id='cs_TextBoxesGroup'>
                            <div id="cs_TextBoxDiv1">

                                <br>
                                <?php echo $tablelabelscs; ?>
                                <?php if ($cschecked == '') {
                                ?>    <label>Cost Savings Item   </label><span id =" cs_textbox1">
                                               <input type='textbox' name="cs_description1" size=50 > <input type='textbox' name="cs_assumption1" size=50> <input type='textbox' class='numbersOnly' name='cs_est_revenue_growth1' size=20></span><input type='button' value='+' class="cs_add" id='1'>
                                <?php } ?>
                                 
                                   <div id='error_cs_description1'></div><div id='error_cs_assumption1'></div><div id='error_cs_est_revenue_growth1'></div>

                            <?php
                                       $i = 1;
                                       foreach ($css->result() as $cs) {
                                           $remove = '<input type="button" id="' . $i . '" value="-" class="cs_remove">';
                                           if ($i == 1)
                                               $remove = '';

                                           echo '<div id="cs_TextBoxDiv' . $i . '"><label>Cost Savings Item   </label><input type="textbox" name="cs_description' . $i . '" value="' . $cs->description . '" size="50"> <input type="textbox" name="cs_assumption' . $i . '" value="' . $cs->assumption . '"size="50"> <input type="textbox" name="cs_est_revenue_growth' . $i . '" class="numbersOnly" value="' . $cs->est_cost_savings . '" size="20">' . $remove . '<input type="button" id="' . $i . '" value="+" class="cs_add"></div>';
                                           $i++;
                                       }
                            ?>

                                       <input type="hidden" name="cs_post" value=<?php
                                       if ($cschecked == '')
                                           echo '0'; else
                                           echo '1';
                            ?>><input type="hidden" name="cs_counter" value="<?= $i; ?>">
  </div>
                            </div>
                        </div>
                    </div>
                    <div id="v_spacer"></div>

                    <div id="rg_colmain_div">
                        <div class="upload_title">Revenue Growth</div>
                        <div id="colmain_div_content">

                            <div id='rg_TextBoxesGroup'>
                                <div id="rg_TextBoxDiv1">


                                    <br>
                                <?php echo $tablelabelsrg; ?>

<?php if ($rgchecked == '') {
?> <label>Revenue Growth Item  </label><span id =" rg_textbox1"><input type='textbox' name="rg_description1" size=50  > <input type='textbox' name="rg_assumption1" size=50 > <input type='textbox' class='numbersOnly' name='rg_est_revenue_growth1' size=20></span><input type='button' class="rg_add" value='+' id='rg_addButton'>
                                           </div>
<?php } ?>
                                       <div id='error_rg_description1'></div><div id='error_rg_assumption1'></div><div id='error_rg_est_revenue_growth1'></div>

                            <?php
                                       $i = 1;
                                       foreach ($rgs->result() as $rg) {
                                           $remove = '<input type="button" id="' . $i . '" value="-" class="rg_remove">';
                                           if ($i == 1)
                                               $remove = '';
                                           echo '<div id="rg_TextBoxDiv' . $i . '"><label>Revenue Growth Item   </label><input type="textbox" name="rg_description' . $i . '" value="' . $rg->description . '" size="50"> <input type="textbox" name="rg_assumption' . $i . '" value="' . $rg->assumption . '" size="50"> <input type="textbox" name="rg_est_revenue_growth' . $i . '" id="1txt" class="numbersOnly" value="' . $rg->est_revenue_growth . '" size="20">' . $remove . '<input type="button" id="' . $i . '" value="+" class="rg_add"></div>';
                                           $i++;
                                       }
                            ?>
                                       <input type="hidden" name="rg_post" value=<?php
                                       if ($rgchecked == '')
                                           echo '0'; else
                                           echo '1';
                            ?>><input type="hidden" name="rg_counter" value="<?= $i; ?>">

                            </div>

                        </div>


                    </div>

    </div>
                <div id="v_spacer"></div>



<div id="contentform">
 <div id="colmain_div" >
                    <div class="upload_title">Benefits Summary</div>
                    <div id="col_div_noborder">



                        Quantifiable Benefits<br>
                        <textarea name="quant_benefits"rows="6" cols="40"><?php echo $quant_summary; ?></textarea>
                        <div id="error_quant_benefits"></div>

                    </div>


                    <div id="col_div_noborder">


                        Non-Quantifiable Benefits<br>
                        <textarea name="nonquant_benefits"rows="6" cols="40"><?php echo $nonquant_summary; ?></textarea>
                        <div id="error_nonquant_benefits"></div>
                    </div>

                </div>
                 <div id="colmain_div_nobgborderleft"> <?php echo $date_edited; ?>&nbsp;&nbsp;  </div> 
                 <div id="colmain_div_nobgborderright" style="text-align:right;padding:3px;"><a href="<?php echo site_url('index.php/concept/index2') ?>"><input type="button" value="Cancel"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Finish"/></div>

            </div>
</div>

    </form>




    </body>

    <html>
        <head>


            <script  src="<?= base_url(); ?>assets/js/jquery.js"></script>


            <link hrefs="<?= base_url(); ?>assets/js/ajax-file-upload/uploadify.css" type="text/css" rel="stylesheet" />

            <script type="text/javascript" src="<?= base_url(); ?>assets/js/ajax-file-upload/jquery-1.4.2.min.js"></script>

            <script type="text/javascript" src="<?= base_url(); ?>assets/js/ajax-file-upload/swfobject.js"></script>

            <script type="text/javascript" src="<?= base_url(); ?>assets/js/ajax-file-upload/jquery.uploadify.v2.1.4.min.js"></script>

            <script type="text/javascript">


            </script>




        </head>


        <script type="text/javascript">

            $(document).ready(function(){
				
	
                $('.numbersOnly').keyup(function () {
                    this.value = this.value.replace(/[^0-9\.]/g,'');
                });

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

                        if(!value) $("#error_"+name).html("<font color=red>*Required</font>");
                        else $("#error_"+name).html("");
                        if(!value) return false;
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

					var val = 0;
                    var flag =0;
                    	nq  = $('#nq input.region').is(':checked');
           if(nq){
                    val = error_check('reason_no_quant_benefits', 'textarea');
                      if(!val) flag =1;
                }
                 val = error_check('useful_life', 'input');
                    if(!val) flag =1;
                  
                    val = error_check('quant_benefits', 'textarea');
                    if(!val) flag =1;
                    val = error_check('nonquant_benefits', 'textarea');
                    if(!val) flag =1;
                    val = error_check('region', 'checkbox');
                    if(!val) flag=1;

                    if($('input[name=ca_post]').val() != 0){
                        val = error_check('ca_description1', 'input');
                        if(val){
                            val = error_check('ca_assumption1', 'input');
                            if(val){

                                val = error_check('ca_est_revenue_growth1', 'input');
                            }
                        }

                        if(!val)
                            flag=1;
                    }
                    if($('input[name=cs_post]').val() != 0){
                        val = error_check('cs_description1', 'input');
                        if(val){
                            val = error_check('cs_assumption1', 'input');
                            if(val){

                                val = error_check('cs_est_revenue_growth1', 'input');
                            }
                        }
                              if(!val)
                            flag=1;
                    }

var cacsrgflag = 0;
var totalbenefits = 0;
var i=1;

 if($('input[name=ca_post]').val() != 0){
					$('#ca_TextBoxesGroup :input[type=text]').each(function(index) {
      if($(this).val() == '') 
      	{
      	val = false;
      	
      	cacsrgflag = 1;
      	flag = 1;
      	}
      	if(i%3 == 0) 
      		totalbenefits = totalbenefits + Number($(this).val());
      	i++;
  });
  
  }
   if($('input[name=cs_post]').val() != 0){
  					$('#cs_TextBoxesGroup :input[type=text]').each(function(index) {
      if($(this).val() == '') 
      	{
      	val = false;
      
      	cacsrgflag = 1;
      	flag = 1;
      	}
      	 	if(i%3 == 0) 
      		totalbenefits = totalbenefits + Number($(this).val());
      	i++;
      	
  });
  }
  					 if($('input[name=rg_post]').val() != 0){
  					$('#rg_TextBoxesGroup :input[type=text]').each(function(index) {
  					
      if($(this).val() == '') 
      	{
      	val = false;
      	
      	cacsrgflag = 1;
      	flag = 1;
      	}
      	 	if(i%3 == 0) 
      		totalbenefits = totalbenefits + Number($(this).val());
      	i++;
      	
  });
  }
 $('input[name=total_benefits]').val(totalbenefits);
  if(cacsrgflag)
  	alert("Please enter all the Textfields in Cost Avoidance, Cost Savings and Revenue Growth boxes");
                  
                    if($('input[name=rg_post]').val() != 0){
                        val = error_check('rg_description1', 'input');
                        if(val){
                            val = error_check('rg_assumption1', 'input');
                            if(val){

                                val = error_check('rg_est_revenue_growth1', 'input');
                            }
                        }

                        if(!val)
                            flag=1;
                    }

                    if(flag) return false;
                    else
                            	alert("Business Case Saved!");


                });
            });

        </script>

    <script type='text/javascript'>
        $(document).ready(function(){
       // var files =  '<?php echo site_url("index.php/filesaver/showfiles/$initiative_number");?>';
        //alert(files);
         $('input[name=total_benefits]').attr('readonly', true);
         $('input[name=useful_life]').attr('readonly', true);
            if($('input[name=ca_post]').val() == '0')   
            {
            	
            	$("#ca_colmain_div").hide();
            }
            if($('input[name=cs_post]').val() == '0')     $("#cs_colmain_div").hide();
            if($('input[name=rg_post]').val() == '0')       $("#rg_colmain_div").hide();
        });

    </script>

        <script src ="<?= base_url(); ?>assets/js/dynamictextbox.js">
        

</script>



          <script type='text/javascript'>
var files =  '<?php echo site_url("index.php/filesaver/showfiles/$initiative_number");?>';

</script>
                    <script  src="<?= base_url(); ?>assets/js/fileshower.js"></script>
    

    <script type='text/javascript'>

        $(document).ready(function(){

            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            $("#1txt").each(function() {

                $(this).keyup(function(){

                    calculateSum(1);
                });
            });
            $(".3txt").each(function() {

                $(this).keyup(function(){
                    calculateSum(3);
                });
            });




        });

        function calculateSum(id) {

            var sum = 0;
            //iterate through each textboxes and add the values
            $("#"+id+"txt").each(function() {

                //add only if the value is number
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseFloat(this.value);

                }

            });
            //.toFixed() method will roundoff the final sum to 2 decimal places
            //   $("#" + id + "yr_sum").html(sum.toFixed(2));
            $("input[name=total_benefits]").val(sum.toFixed(2));
        }
    </script>



  
      <link href="<?= base_url(); ?>/assets/js/ajax-file-upload/uploadify.css" type="text/css" rel="stylesheet" />
  
      <script type="text/javascript" src="<?= base_url(); ?>/assets/js/ajax-file-upload/jquery-1.4.2.min.js"></script>
  
      <script type="text/javascript" src="<?= base_url(); ?>/assets/js/ajax-file-upload/swfobject.js"></script>
   
      <script type="text/javascript" src="<?= base_url(); ?>/assets/js/ajax-file-upload/jquery.uploadify.v2.1.4.min.js"></script>
 
      <script type="text/javascript">
 
      $(document).ready(function() {
     var files = "<?= base_url(); ?>index.php/filesaver/showfiles/<?php echo $initiative_number;?>";
   
        $('#file_upload').uploadify({
 
          'uploader'  : '<?= base_url(); ?>assets/js/ajax-file-upload/uploadify.swf',
  
          'script'    : "<?= base_url(); ?>index.php/filesaver/index/<?php echo $initiative_number;?>",
  
          'cancelImg' : '<?= base_url(); ?>assets/js/ajax-file-upload/cancel.png',
 
          'folder'    : 'uploads',
          'fileExt': '*.png;*.jpg;*.gif;*.doc;*.docx;*.xls;*.xlsx;*.pdf;*.ppt;*.pptx',
          'fileDesc': '*.png;*.jpg;*.gif;*.doc;*.docx;*.xls;*.xlsx;*.pdf;*.ppt;*.pptx',
  
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
     
   
</head>

    
     <script src="<?= base_url(); ?>assets/js/jquery.jqEasyCharCounter.js" type="text/javascript"></script>
     
     <script type='text/javascript'>
     $(document).ready(function(){
  $('input[name=calculatetotalbenefits]').click(function(){   
     var cacsrgflag = 0;
var totalbenefits = 0;
var i=1;

 if($('input[name=ca_post]').val() != 0){
					$('#ca_TextBoxesGroup :input[type=text]').each(function(index) {
      if($(this).val() == '') 
      	{
      	val = false;
      	
      	cacsrgflag = 1;
      	flag = 1;
      	}
      	if(i%3 == 0) 
      		totalbenefits = totalbenefits + Number($(this).val());
      	i++;
  });
  
  }
   if($('input[name=cs_post]').val() != 0){
  					$('#cs_TextBoxesGroup :input[type=text]').each(function(index) {
      if($(this).val() == '') 
      	{
      	val = false;
      
      	cacsrgflag = 1;
      	flag = 1;
      	}
      	 	if(i%3 == 0) 
      		totalbenefits = totalbenefits + Number($(this).val());
      	i++;
      	
  });
  }
  					 if($('input[name=rg_post]').val() != 0){
  					$('#rg_TextBoxesGroup :input[type=text]').each(function(index) {
  					
      if($(this).val() == '') 
      	{
      	val = false;
      	
      	cacsrgflag = 1;
      	flag = 1;
      	}
      	 	if(i%3 == 0) 
      		totalbenefits = totalbenefits + Number($(this).val());
      	i++;
      	
  });
  }
 $('input[name=total_benefits]').val(totalbenefits);
 
 });
 });
     </script>
   <script type='text/javascript'>
   
     $(document).ready(function(){

	$('.deletefiles').live('click', function(eve){
		eve.preventDefault();
		var files = "<?= base_url(); ?>index.php/filesaver/deletefiles/<?php echo $initiative_number;?>/" +  $(this).attr('name');
		
		
		//alert($(this).attr('id'));
		   $.ajax({
                    url: files ,
                    dataType: 'json',
                    type: 'POST',
                  
                    success: function(data){
                  var files =  '<?php echo site_url("index.php/filesaver/showfiles/$initiative_number");?>';
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