function showBusy(){
$('#ajax-content').block({
message: 'Processing ......'

});
$('.reportssection').block({
message: ''

});

}

function updatePage(html){
	$('#ajax-content').html(html);
}
function getValue(name){
		  value=''; $('.'+name+' > option:selected').each(function() {


                                            value = value + ',' + $(this).val();

                                        });
                                        return value;
}

$(document).ready(function(){
var flag = 0;
	$('.ajax-pag > p a').live('click', function(eve){
		eve.preventDefault();

		var link = $(this).attr('href');
var 	archivedlist  = $('input.unarchived').is(':checked')?1:0;

 var org = getValue('org');
 var Replacedorg =escape(org);
  var track = getValue('track');
 var Replacedtrack =escape(track);
  var subtrack =getValue('subtrack');
 var Replacedsubtrack =escape(subtrack);
  var track2 =getValue('track2');
 var Replacedtrack2 =escape(track2);
  var subtrack2 = getValue('subtrack2');
 var Replacedsubtrack2 =escape(subtrack2);
 
var search = $('input[name=googlesearch]').val();
 var Replacedsearch =escape(search);
 
var searchoption = ($("select[name=searchoptions]").val()!= '') ?$("select[name=searchoptions]").val():'';

var operator = ($("select[name=operator]").val()!= '') ?$("select[name=operator]").val():'';

		$.ajax({
			url: link + '/'+ Replacedorg+ '/'+ Replacedtrack+ '/'+ Replacedsubtrack+ '/'+ Replacedtrack2+ '/'+ Replacedsubtrack2 + '/' + flag +'/' + archivedlist + '/' + searchoption +'/'+ operator + '/' + Replacedsearch   , 
			type:"GET",
			dataType:"html",
			data: $('#ajaxform').serialize(),
			beforeSend: function(){
			showBusy();
			},
			success: function(html){
			updatePage(html);
			$('.reportssection').show();
			$('.reportssection').unblock({
message: 'Processing ......'

});
			}
			
		});
		
	});
	
	$('.sortable').live('click', function(eve){
	flag = $(this).attr('id');

var 	archivedlist  = $('input.unarchived').is(':checked')?1:0;

 var org = getValue('org');
 var Replacedorg =escape(org);
  var track = getValue('track');
 var Replacedtrack =escape(track);
  var subtrack =getValue('subtrack');
 var Replacedsubtrack =escape(subtrack);
  var track2 =getValue('track2');
 var Replacedtrack2 =escape(track2);
  var subtrack2 = getValue('subtrack2');
 var Replacedsubtrack2 =escape(subtrack2);
 
var orderby = $(this).attr('id') ;
var search = $('input[name=googlesearch]').val();
 var Replacedsearch =escape(search);
var searchoption = ($("select[name=searchoptions]").val()!= '') ?$("select[name=searchoptions]").val():'';

var operator = ($("select[name=operator]").val()!= '') ?$("select[name=operator]").val():'';
		$.ajax({
			url: link + '/'+ Replacedorg+ '/'+ Replacedtrack+ '/'+ Replacedsubtrack+ '/'+ Replacedtrack2+ '/'+ Replacedsubtrack2 + '/' + orderby + '/' + archivedlist + '/' +  searchoption + '/' + operator + '/'+ Replacedsearch , 
			type:"GET",
			dataType:"html",
			data: $('#ajaxform').serialize(),
			beforeSend: function(){
			showBusy();
			},
			success: function(html){
			updatePage(html);
			$('.reportssection').show();
			$('.reportssection').unblock({
message: 'Processing ......'

});
			}
			
		});
		
	});
	
	
});