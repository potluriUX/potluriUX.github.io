  $(document).ready(function(){
                        $("input[name=subtrack_hidden]").val(0);

                        $("input[name=subtrack2_hidden]").val(0);
                        $("input[name=track2_hidden]").val(0);
               


                        var value = '';
                        $(".org").change(function(){
                            value = '';
                            $('.org > option:selected').each(function() {
                                value = value + ',' + $(this).val();

                            });
     if(value==',All'){
                                            $('.org > option').each(function() {
                                                value = value + ',' + $(this).val();
                                            });
                                        }
                                        $("input[name=org_hidden]").val(value);
                            $.ajax({
                                url: ajaxfindchildren,
                                dataType: 'json',
                                type: 'POST',
                                data: "id="+value,
                                success: function(data){
                                    if(data.response =='true'){
                                        $(".track").html(data.message); //change alert to updated DOM somewhere




                                        value=''; $('.track > option:selected').each(function() {


                                            value = value + ',' + $(this).val();

                                        });
                                        if(value==',All'){
                                            $('.track > option').each(function() {
                                                value = value + ',' + $(this).val();
                                            });
                                        }
                                        $("input[name=track_hidden]").val(value);
                                        $.ajax({
                                            url:ajaxfindchildren2,
                                            dataType: 'json',
                                            type: 'POST',
                                            data: "id="+value,
                                            success: function(data){
                                                if(data.response =='true'){
                                                    $(".subtrack").html(data.message);//change alert to updated DOM somewhere

                                                }value = '';
                                                $('.subtrack > option').each(function() {
                                                    value = value + ',' + $(this).val();

                                                }); $("input[name=subtrack_hidden]").val(value);

                                            },
                                            error: function(){
                                               // alert('Something major failed');
                                            }
                                        });



                                        //  $(".subtrack").html('<option value="">--Select Subtrack--</option>');
                                    }
                                },
                                error: function(){
                                   // alert('Something major failed');
                                }
                            });



                            $.ajax({
                                url: ajaxfindchildren3,
                                dataType: 'json',
                                type: 'POST',
                                data: "id="+value,
                                success: function(data){
                                    if(data.response =='true'){
                                        $(".track2").html(data.message); //change alert to updated DOM somewhere
                                        //$(".subtrack2").html('<option value="">--Select Subtrack--</option>');
                                    }


                                    value = '';
                                    $('.track2 > option:selected').each(function() {
                                        value = value + ',' + $(this).val();

                                    });
                                    if(value==',All'){
                                        $('.track2 > option').each(function() {
                                            value = value + ',' + $(this).val();
                                        });
                                    }

                                    $("input[name=track2_hidden]").val(value);


                                    $.ajax({
                                        url: ajaxfindchildren4,
                                        dataType: 'json',
                                        type: 'POST',
                                        data: "id="+value+"&flag=1",
                                        success: function(data){
                                            if(data.response =='true'){
                                                $(".subtrack2").html(data.message); //change alert to updated DOM somewhere
                                            }
                                            value = '';
                                            $('.subtrack2 > option').each(function() {
                                                value = value + ',' + $(this).val();

                                            });
                                           
                                            $("input[name=subtrack2_hidden]").val(value);
                                        },
                                        error: function(){
                                            //alert('Something major failed');
                                        }
                                    });
                                },
                                error: function(){
                                    //alert('Something major failed');
                                }
                            });


                        });
 value = '';
                            $('.org > option:selected').each(function() {
                                value = value + ',' + $(this).val();

                            });
     if(value==',All'){
                                            $('.org > option').each(function() {
                                                value = value + ',' + $(this).val();
                                            });
                                        }
                                        $("input[name=org_hidden]").val(value);
                            $.ajax({
                                url: findchildren,
                                dataType: 'json',
                                type: 'POST',
                                data: "id="+value,
                                success: function(data){
                                    if(data.response =='true'){
                                        $(".track").html(data.message); //change alert to updated DOM somewhere




                                        value=''; $('.track > option:selected').each(function() {


                                            value = value + ',' + $(this).val();

                                        });
                                        if(value==',All'){
                                            $('.track > option').each(function() {
                                                value = value + ',' + $(this).val();
                                            });
                                        }
                                        $("input[name=track_hidden]").val(value);
                                        $.ajax({
                                            url: findchildren2,
                                            dataType: 'json',
                                            type: 'POST',
                                            data: "id="+value,
                                            success: function(data){
                                                if(data.response =='true'){
                                                    $(".subtrack").html(data.message);//change alert to updated DOM somewhere

                                                }value = '';
                                                $('.subtrack > option').each(function() {
                                                    value = value + ',' + $(this).val();

                                                }); $("input[name=subtrack_hidden]").val(value);

                                            },
                                            error: function(){
                                               // alert('Something major failed');
                                            }
                                        });



                                        //  $(".subtrack").html('<option value="">--Select Subtrack--</option>');
                                    }
                                },
                                error: function(){
                                   // alert('Something major failed');
                                }
                            });



                            $.ajax({
                                url: findchildren3,
                                dataType: 'json',
                                type: 'POST',
                                data: "id="+value,
                                success: function(data){
                                    if(data.response =='true'){
                                        $(".track2").html(data.message); //change alert to updated DOM somewhere
                                        //$(".subtrack2").html('<option value="">--Select Subtrack--</option>');
                                    }


                                    value = '';
                                    $('.track2 > option:selected').each(function() {
                                        value = value + ',' + $(this).val();

                                    });
                                    if(value==',All'){
                                        $('.track2 > option').each(function() {
                                            value = value + ',' + $(this).val();
                                        });
                                    }

                                    $("input[name=track2_hidden]").val(value);


                                    $.ajax({
                                        url: findchildren4,
                                        dataType: 'json',
                                        type: 'POST',
                                        data: "id="+value+"&flag=1",
                                        success: function(data){
                                            if(data.response =='true'){
                                                $(".subtrack2").html(data.message); //change alert to updated DOM somewhere
                                            }
                                            value = '';
                                            $('.subtrack2 > option').each(function() {
                                                value = value + ',' + $(this).val();

                                            });
                                            
                                            $("input[name=subtrack2_hidden]").val(value);
                                        },
                                        error: function(){
                                       //     alert('Something major failed');
                                        }
                                    });
                                },
                                error: function(){
                                  //  alert('Something major failed');
                                }
                            });


                       


                        value='';
                        $(".track").change(function(){
                            value = '';
                            $('.track > option:selected').each(function() {
                                value = value + ',' + $(this).val();

                            });
                            if(value==',All'){
                                $('.track > option').each(function() {
                                    value = value + ',' + $(this).val();
                                });
                              
                            }
                            $.ajax({
                                url: ajaxfindchildren2,
                                dataType: 'json',
                                type: 'POST',
                                data: "id="+value,
                                success: function(data){
                                    if(data.response =='true'){
                                        $(".subtrack").html(data.message); //change alert to updated DOM somewhere


                                    }value = '';
                                    $('.subtrack > option').each(function() {
                                        value = value + ',' + $(this).val();

                                    });
                                    $("input[name=subtrack_hidden]").val(value);
                                },
                                error: function(){
                                   // alert('Something major failed');
                                }
                            });
                        });


                        value='';
                        $(".track2").change(function(){
                            value = '';
                            $('.track2 > option:selected').each(function() {
                                value = value + ',' + $(this).val();

                            });
                            if(value==',All'){
                                $('.track2 > option').each(function() {
                                    value = value + ',' + $(this).val();
                                });

                            }
                            $.ajax({
                                url: ajaxfindchildren4,
                    dataType: 'json',
                    type: 'POST',
                    data: "id="+value+"&flag=1",
                    success: function(data){
                        if(data.response =='true'){
                            $(".subtrack2").html(data.message); //change alert to updated DOM somewhere
                        }value = '';
                        $('.subtrack2 > option').each(function() {
                            value = value + ',' + $(this).val();

                        });

                        $("input[name=subtrack2_hidden]").val(value);
                    },
                    error: function(){
                      //  alert('Something major failed');
                    }
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
            $("input#" + id + "yr_hidden_sum").val(sum.toFixed(2));
        }
        
        
        $(document).ready(function(){
		
		
		$('textarea[name=proj_description]').jqEasyCounter({
			'maxChars': 3000,
			'maxCharsWarning': 1970,
			'msgFontSize': '12px',
			'msgFontColor': '#000',
			'msgFontFamily': 'Verdana',
			'msgTextAlign': 'left',
			'msgWarningColor': '#F00',
			'msgAppendMethod': 'insertAfter'				
		});

	$('textarea[name=exec_summary]').jqEasyCounter({
			'maxChars': 1000,
			'maxCharsWarning': 670,
			'msgFontSize': '12px',
			'msgFontColor': '#000',
			'msgFontFamily': 'Verdana',
			'msgTextAlign': 'left',
			'msgWarningColor': '#F00',
			'msgAppendMethod': 'insertAfter'				
		});
		
		$('textarea[name=regions_benefitting_justification]').jqEasyCounter({
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


$().ready(function() {

	function formatItem(row) {
		return row[0] + " (<strong>id: " + row[1] + "</strong>)";
	}
	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}
	
	
	$("#course").autocomplete(autocompsiteurl, {
		width: 260,
		
		minChars : 2,
		max: 40,
		multiple : true,
		multipleSeparator: ", ", 
		mustMatch: true,
		selectFirst: false,
		matchContains: true,
		
		// onSelect: function(value, data){ alert('You selected: ' + value + ', ' + data); },
    // local autosugest options:
	});
	
	
		$("input[name='initiative_requestor']").autocomplete(autocompsiteurl, {
		width: 260,
		
		minChars : 2,
		max: 40,
		
		mustMatch: true,
		selectFirst: false,
		matchContains: true,
		
		// onSelect: function(value, data){ alert('You selected: ' + value + ', ' + data); },
    // local autosugest options:
	});
	
			$("input[name='BPR_contact']").autocomplete(autocompsiteurl, {
		width: 260,
		
		minChars : 2,
		max: 40,
	
		mustMatch: true,
		selectFirst: false,
		matchContains: true,
		
		// onSelect: function(value, data){ alert('You selected: ' + value + ', ' + data); },
    // local autosugest options:
	});
	
				$("input[name='author']").autocomplete(autocompsiteurl, {
		width: 260,
		
		minChars : 2,
		max: 40,
	
		mustMatch: true,
		selectFirst: false,
		matchContains: true,
		
		// onSelect: function(value, data){ alert('You selected: ' + value + ', ' + data); },
    // local autosugest options:
	});
});


  $(document).ready(function(){
					//	$('textarea[name=regions_benefitting_justification]').attr('disabled', 'disabled');
					 var checked = $("input.region:checked").length;
						
						 if(checked != 1) {
						 	$('textarea[name=regions_benefitting_justification]').attr('disabled', 'disabled');
						 	}
						$('#regiondivcheckbox').click(function(){
						
						 var checked = $("input.region:checked").length;
						
						 if(checked == 1) {
						 	$('textarea[name=regions_benefitting_justification]').removeAttr('disabled');
						 	}
						 else
						 {
						 	$('textarea[name=regions_benefitting_justification]').val('');
						 	$('textarea[name=regions_benefitting_justification]').attr('disabled', 'disabled');	
						 }
						});
                        $("form").submit(function (e){

                            var value=''
                            // var checked = $("input[type=checkbox]:checked").length;
                            var checked = $("input.region:checked").length;


                            if(checked ==1)
                            {
                            	if(!$('textarea[name=regions_benefitting_justification]').val())
                                {	
                                	alert('Please enter justification why there is only one Region that is benefitting. ');
                                	return false;
                                }

                            }
                        });

                    });