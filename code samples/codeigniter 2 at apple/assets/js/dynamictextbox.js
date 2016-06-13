          $(document).ready(function(){    $("body").click(function(e){
                    var target = $(e.target);

                    if (target.is(".ca_add")) {

 
                        var newTextBoxDiv = $(document.createElement('div'))
                        .attr("id", 'ca_TextBoxDiv' + ca_counter);

                        newTextBoxDiv.html('<label>Cost Avoidance Item   </label>' +'<input type="textbox" size=50 name="ca_description' + ca_counter + '"> <input type="textbox" size=50 name="ca_assumption' + ca_counter + '"> <input type="textbox" size=20 class="numbersOnly" name="ca_est_revenue_growth' + ca_counter +'" >' + '<input type="button"  class="ca_remove'+ca_counter+'" value="-" id ="' + ca_counter + '">'+ '<input type="button" class="ca_add" value="+" id ="' + ca_counter + '">');

                        newTextBoxDiv.insertAfter("#ca_TextBoxDiv"+target.attr('id'));
                        $("input[name=ca_counter]").val(ca_counter);
                        $('.ca_remove'+ca_counter).click(function(){
						

                            ca2_counter--;

   
                            $("#ca_TextBoxDiv" +$(this).attr('id')).remove();
                        });
                        ca2_counter++;
                        ca_counter++;
                        return false;
                    }

                    if (target.is(".cs_add")) {

					
                        var newTextBoxDiv = $(document.createElement('div'))
                        .attr("id", 'cs_TextBoxDiv' + cs_counter);

                        newTextBoxDiv.html('<label>Cost Savings Item   </label>' +'<input type="textbox" size=50 name="cs_description' + cs_counter + '"> <input type="textbox" size=50 name="cs_assumption' + cs_counter + '"> <input type="textbox" size=20 class="numbersOnly" name="cs_est_revenue_growth' + cs_counter +'" >' + '<input type="button"  class="cs_remove'+cs_counter+'" value="-" id ="' + cs_counter + '">'+ '<input type="button" class="cs_add" value="+" id ="' + cs_counter + '">');

                        newTextBoxDiv.insertAfter("#cs_TextBoxDiv"+target.attr('id'));
                        $("input[name=cs_counter]").val(ca_counter);
                        $('.cs_remove'+cs_counter).click(function(){


                            cs2_counter--;


                            $("#cs_TextBoxDiv" +$(this).attr('id')).remove();
                        });
                        cs2_counter++;
                        cs_counter++;
                        return false;
                    }
                    if (target.is(".rg_add")) {


                        var newTextBoxDiv = $(document.createElement('div'))
                        .attr("id", 'rg_TextBoxDiv' + rg_counter);

                        newTextBoxDiv.html('<label>Revenue Growth Item   </label>' +'<input type="textbox" size=50 name="rg_description' + rg_counter + '"> <input type="textbox" size=50 name="rg_assumption' + rg_counter + '"> <input type="textbox" size=20 class="numbersOnly" name="rg_est_revenue_growth' + rg_counter +'" >' + '<input type="button"  class="rg_remove'+rg_counter+'" value="-" id ="' + rg_counter + '">'+ '<input type="button" class="rg_add" value="+" id ="' + rg_counter + '">');
   
                        newTextBoxDiv.insertAfter("#rg_TextBoxDiv"+target.attr('id'));
                        $("input[name=rg_counter]").val(rg_counter);
                        $('.rg_remove'+rg_counter).click(function(){
                            alert('rav');

                            rg2_counter--;


                            $("#rg_TextBoxDiv" +$(this).attr('id')).remove();
                        });
                        rg2_counter++;
                    
                        rg_counter++;
                         
                        return false;
                    }
                    $('.numbersOnly').keyup(function () { 
                        this.value = this.value.replace(/[^0-9\.]/g,'');
                    });
                });

               
                function hide2(id){
                    $("#"+id+"_colmain_div").toggle();
      
                    if($("input[name="+id+"_post]").val()==1){
                        $("input[name="+id+"_post]").val(0);}
                    else{
                        $("input[name="+id+"_post]").val(1);}
       
                }
                $("#rg").click(function(){
                    hide2($(this).attr("id"));
                    $('textarea[name=reason_no_quant_benefits]').val('');
                     $('textarea[name=reason_no_quant_benefits]').attr('disabled', true);
                    
     
                });
                $("#ca").click(function(){
                    hide2($(this).attr("id"));
                    $('textarea[name=reason_no_quant_benefits]').val('');
                      $('textarea[name=reason_no_quant_benefits]').attr('disabled', true);

                });
                $("#cs").click(function(){
                    hide2($(this).attr("id"));
                    $('textarea[name=reason_no_quant_benefits]').val('');
                      $('textarea[name=reason_no_quant_benefits]').attr('disabled', true);

                });
                	nq  = $('#nq input.region').is(':checked');
           if(nq){
	 $('#rg input.region').attr('disabled', true);
	 $('#cs input.region').attr('disabled', true);
	 $('#ca input.region').attr('disabled', true);
	 
	 $("#ca_colmain_div").hide();
	$("#cs_colmain_div").hide();
	 $("#rg_colmain_div").hide();
	 
}  
else
{
$('textarea[name=reason_no_quant_benefits]').attr('disabled', true);

}
                   $("#nq").click(function(){
        //  $('#rg  input.region:checkbox').removeAttr('checked');
        nq  = $('#nq input.region').is(':checked');
        
                   if(nq){
                  // alert("Ravi");
                    $('#rg input.region').attr('checked', false);
	 $('#cs input.region').attr('checked', false);
	 $('#ca input.region').attr('checked', false);
	$("#ca_colmain_div").hide();
	$("#cs_colmain_div").hide();
	 $("#rg_colmain_div").hide();
	 $("input[name=rg_post]").val(0);
	 $("input[name=ca_post]").val(0);
	 $("input[name=cs_post]").val(0);
	 $('textarea[name=reason_no_quant_benefits]').attr('disabled', false);
	 $('#rg input.region').attr('disabled', true);
	 $('#cs input.region').attr('disabled', true);
	 $('#ca input.region').attr('disabled', true);
	 
}  
else{

 $('#rg input.region').attr('disabled', false);
	 $('#cs input.region').attr('disabled', false);
	 $('#ca input.region').attr('disabled', false);
$('textarea[name=reason_no_quant_benefits]').val('');

}


                });
                var rg_counter = Number($("input[name=rg_counter]").val()) + 2;
                var rg2_counter=Number($("input[name=rg_counter]").val()) + 2;
                $("#rg_addButton").click(function () {

                    if(ca2_counter>10){
                        alert("Only 10 textboxes allowed");
                        return false;
                    }

                    var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'rg_TextBoxDiv' + rg_counter);

                    newTextBoxDiv.html('<label>Revenue Growth Item   </label>' +'<input type="textbox" size=50 name="rg_description' + rg_counter + '"> <input type="textbox" size=50 name="rg_assumption' + rg_counter + '"> <input type="textbox" size=20 class="numbersOnly" name="rg_est_revenue_growth' + rg_counter +'" >' + '<input type="button"  class="remove'+rg_counter+'" value="-" id ="' + rg_counter + '">'+ '<input type="button" class="rg_add" value="+" id ="' + rg_counter + '">');

                    newTextBoxDiv.appendTo("#rg_TextBoxesGroup");
                    $("input[name=rg_counter]").val(rg_counter);

                    $('.remove'+rg_counter).click(function(){


                        rg2_counter--;


                        $("#rg_TextBoxDiv" +$(this).attr('id')).remove();
                    });




                    rg2_counter++;
                    rg_counter++;

                });
            var cs_counter = Number($("input[name=cs_counter]").val()) + 2;
                var cs2_counter=Number($("input[name=cs_counter]").val()) + 2;
                $("#cs_addButton").click(function () {



                    var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'cs_TextBoxDiv' + cs_counter);

                    newTextBoxDiv.html('<label>Cost Savings Item   </label>' +'<input type="textbox" size=50 name="cs_description' + cs_counter + '"> <input type="textbox" size=50 name="cs_assumption' + cs_counter + '"> <input type="textbox" size=20 class="numbersOnly" name="cs_est_revenue_growth' + cs_counter +'" >' + '<input type="button"  class="remove'+cs_counter+'" value="-" id ="' + cs_counter + '">'+ '<input type="button" class="cs_add" value="+" id ="' + cs_counter + '">');

                    newTextBoxDiv.appendTo("#cs_TextBoxesGroup");
                    $("input[name=cs_counter]").val(rg_counter);

                    $('.remove'+cs_counter).click(function(){


                        cs2_counter--;


                        $("#cs_TextBoxDiv" +$(this).attr('id')).remove();
                    });




                    cs2_counter++;
                    cs_counter++;

                });
                $(".rg_remove").click(function () {
                   
                 

                    rg2_counter--;

                    if($("#rg_TextBoxDiv" + $(this).attr('id')).html())
                        $("#rg_TextBoxDiv" + $(this).attr('id')).remove();
                    else alert("no");

                });



                 var ca_counter = Number($("input[name=ca_counter]").val()) + 2;
                var ca2_counter=Number($("input[name=ca_counter]").val()) + 2;
                $("#ca_addButton").click(function () {

                    if(ca2_counter>10){
                        alert("Only 10 textboxes allowed");
                        return false;
                    }

                    var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'ca_TextBoxDiv' + ca_counter);

                    newTextBoxDiv.html('<label>Cost Avoidance Item   </label>' +'<input type="textbox" size=50 name="ca_description' + ca_counter + '"> <input type="textbox" size=50 name="ca_assumption' + ca_counter + '"> <input type="textbox" size=20 class="numbersOnly" name="ca_est_revenue_growth' + ca_counter +'" >' + '<input type="button"  class="remove'+ca_counter+'" value="-" id ="' + ca_counter + '">'+ '<input type="button" class="ca_add" value="+" id ="' + ca_counter + '">');

                    newTextBoxDiv.appendTo("#ca_TextBoxesGroup");
                    $("input[name=ca_counter]").val(ca_counter);

                    $('.remove'+ca_counter).click(function(){


                        ca2_counter--;

   
                        $("#ca_TextBoxDiv" +$(this).attr('id')).remove();
                    });




                    ca2_counter++;
                    ca_counter++;

                });

                 $(".cs_remove").click(function () {
                   
                 

                    cs2_counter--;

                    if($("#cs_TextBoxDiv" + $(this).attr('id')).html())
                        $("#cs_TextBoxDiv" + $(this).attr('id')).remove();
                    else alert("no");

                });

      $(".ca_remove").click(function () {
                   
                 

                    ca2_counter--;

                    if($("#ca_TextBoxDiv" + $(this).attr('id')).html())
                        $("#ca_TextBoxDiv" + $(this).attr('id')).remove();
                    else alert("no");

                });

                $("#getButtonValue").click(function () {

                    var msg = '';
                    for(i=1; i<ca_counter; i++){
                        msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
                    }
                    alert(msg);
                });


          
    	});
    	
       $(document).ready(function(){
		
		
		$('textarea[name=quant_benefits]').jqEasyCounter({
			'maxChars': 700,
			'maxCharsWarning': 670,
			'msgFontSize': '12px',
			'msgFontColor': '#000',
			'msgFontFamily': 'Verdana',
			'msgTextAlign': 'left',
			'msgWarningColor': '#F00',
			'msgAppendMethod': 'insertAfter'				
		});

	$('textarea[name=nonquant_benefits]').jqEasyCounter({
			'maxChars': 700,
			'maxCharsWarning': 670,
			'msgFontSize': '12px',
			'msgFontColor': '#000',
			'msgFontFamily': 'Verdana',
			'msgTextAlign': 'left',
			'msgWarningColor': '#F00',
			'msgAppendMethod': 'insertAfter'				
		});
		
		$('textarea[name=reason_no_quant_benefits]').jqEasyCounter({
			'maxChars': 700,
			'maxCharsWarning': 670,
			'msgFontSize': '12px',
			'msgFontColor': '#000',
			'msgFontFamily': 'Verdana',
			'msgTextAlign': 'left',
			'msgWarningColor': '#F00',
			'msgAppendMethod': 'insertAfter'				
		});
		
});	


