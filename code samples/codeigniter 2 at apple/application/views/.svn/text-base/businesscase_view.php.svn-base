
<html>

    <body><div class="filter_content"><div  id="contentform">
                <?= form_open('index.php/businesscase/insert'); ?>
                <input type='hidden' name ='ini_number' value="<?php echo $initiative_number;?>">
                <div id="v_spacer"></div>
                <div id="colmain_div">
                    <div class="upload_title">Quantifiable Benefits</div>





                    <div id="col_div_noborder">


                        <table border-width="1px" cellpadding="0" cellspacing="0">
                            <?php
                            $i = 0;

                            if ($querybenefits->num_rows() > 0)
                                foreach ($querybenefits->result() as $row) {
                                    switch ($row->id){
                                        case 1: $name = 'ca';
                                            break;
                                        case 2: $name='cs';
                                            break;
                                        case 3: $name ='rg';
                                            break;
                                    }
                                    echo "<tr>";

                                    echo '<td width=120 height=26>' . $row->name . '</td><td><div id="'. $name. '"><input type="checkbox" class=region name="region[]" id="' . $row->id . '" value="' . $row->id . '" /></input></div> ' . '</td> ';

                                    echo "</tr>";

                                    $i++;
                                }
                            ?>







                        </table><div id ='error_region'></div><br>
                        Payback (# of years) <input type="text" name="useful_life" class="numbersOnly">
                    </div>
                    <div id="h_spacer"></div>

                    <div id="col_div_noborder">


                        Reason for no Quantifiable Benefits<br>
                        <textarea name="reason_no_quant_benefits"rows="5" cols="50"></textarea>
                        <div id="error_reason_no_quant_benefits"></div>
                        <br><br><br>
                        Total Benefits $ <input type="text" class="numbersOnly" name="total_benefits"><br>
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
                        <?php echo $tablelabelsca;?>
                      <label>Cost Avoidance Item   </label><span id =" ca_textbox1">
                                <input type='textbox' name="ca_description1" size=50 > <input type='textbox' name="ca_assumption1" size=50> <input type='textbox' class='numbersOnly' name='ca_est_revenue_growth1' size=20></span><input type='button' value='+' class="ca_add" id='1'>
                           <div id='error_ca_description1'></div><div id='error_ca_assumption1'></div><div id='error_ca_est_revenue_growth1'></div>
                        
                             
                                
                        <input type="hidden" name="ca_post" value="0"><input type="hidden" name="ca_counter" value="0">
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
                            <?php echo $tablelabelscs;?>
                            <label>Cost Savings Item   </label><span id =" cs_textbox1">
                                <input type='textbox' name="cs_description1" size=50 > <input type='textbox' name="cs_assumption1" size=50> <input type='textbox' class='numbersOnly' name='cs_est_revenue_growth1' size=20></span><input type='button' value='+' class="cs_add" id='1'>

                        </div>
                         <div id='error_cs_description1'></div><div id='error_cs_assumption1'></div><div id='error_cs_est_revenue_growth1'></div>
                        
                        <input type="hidden" name="cs_post" value="0"><input type="hidden" name="cs_counter" value="0">

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
                            <?php echo $tablelabelsrg;?>
                            <label>Revenue Growth Item  </label><span id =" rg_textbox1"><input type='textbox' name="rg_description1" size=50  > <input type='textbox' name="rg_assumption1" size=50 > <input type='textbox' class='numbersOnly' id='1txt' name='rg_est_revenue_growth1' size=20></span><input type='button' class="rg_add" value='+' id='rg_addButton'>
                        </div>
                        
                         <div id='error_rg_description1'></div><div id='error_rg_assumption1'></div><div id='error_rg_est_revenue_growth1'></div>
                        
                        <input type="hidden" name="rg_post" value="0"><input type="hidden" name="rg_counter" value="0">

                    </div>

</div>



                </div>
 <div id="v_spacer"></div>
                <div id="colmain_div">
                    <div class="upload_title">Benefits Summary</div>





                    <div id="col_div_noborder">



 Quantifiable Benefits <br>
                        <textarea name="quant_benefits"rows="4" cols="40"></textarea>
                        <div id="error_quant_benefits"></div>
                        <br><br><br>
                    </div>
                    

                    <div id="col_div_noborder">


                       Non-Quantifiable Benefits<br>
                        <textarea name="nonquant_benefits"rows="4" cols="40"></textarea>
                       <div id="error_nonquant_benefits"></div><br><br><br>
                    </div>
                </div>
                <div id="col_div_noborder"><input type="submit" value="Submit"/></div>
                </form>
            </div>
        </div>


    </body>

    <html>
        <head>


         <script  src="<?=base_url();?>assets/js/jquery.js"></script>

  
      <link hrefs="<?=base_url();?>assets/js/ajax-file-upload/uploadify.css" type="text/css" rel="stylesheet" />
  
      <script type="text/javascript" src="<?=base_url();?>assets/js/ajax-file-upload/jquery-1.4.2.min.js"></script>
  
      <script type="text/javascript" src="<?=base_url();?>assets/js/ajax-file-upload/swfobject.js"></script>
   
      <script type="text/javascript" src="<?=base_url();?>assets/js/ajax-file-upload/jquery.uploadify.v2.1.4.min.js"></script>
 
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

   
  var flag =0;
    val = error_check('reason_no_quant_benefits', 'textarea');
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

    
        });
  


            });
        </script>
        
        <script src ="<?= base_url(); ?>assets/js/dynamictextbox.js">
       </script>
       
       <script type='text/javascript'>
       $(document).ready(function(){
        $("#ca_colmain_div").hide();
                $("#cs_colmain_div").hide();
                $("#rg_colmain_div").hide();
       });
       </script>
       
         
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
            $("."+id+"txt").each(function() {

                //add only if the value is number
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseFloat(this.value);

                }

            });
            //.toFixed() method will roundoff the final sum to 2 decimal places
            $("#" + id + "yr_sum").html(sum.toFixed(2));
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
     
    </head><body>



    </body>
</html>

