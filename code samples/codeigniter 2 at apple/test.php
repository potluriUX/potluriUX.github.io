<?php 
$script1 =  urlencode('
tell application "Safari"
	set execText to do JavaScript "
	
	document.forms[0].exec_summary.value.replace(/\\\n/g, \'<br>\');
		" in document 1 of window 2
	
end tell
tell application "Safari"
	set execSponsor to do JavaScript "
	document.forms[0].executive_sponsor.value.replace(/\\\n/g, \'l\');
	
		" in document 1 of window 2
	
end tell
tell application "Safari"
	set tracklead to do JavaScript "
	document.forms[0].BPR_contact.value
		" in document 1 of window 2
	
end tell

tell application "Safari"
	set originatorregion to do JavaScript "
$(\".originator_region\").val().join(\",\");
	" in document 1 of window 2
	
end tell

tell application "Safari"
	set authorname to do JavaScript "
$(\"input[name=author]\").val();
	" in document 1 of window 2
	
end tell

tell application "Safari"
	set org to do JavaScript "
$(\".org\").val().join(\"\");
	" in document 1 of window 2
	
end tell

tell application "Safari"
	set rollover to do JavaScript "
$(\"input[name=rollover]:checked\").val();
" in document 1 of window 2
	
end tell

tell application "Safari"
	set initiativename to do JavaScript "
	document.forms[0].initiative_name.value
		" in document 1 of window 2
	
end tell
tell application "Safari"
	set description to do JavaScript "
	document.forms[0].proj_description.value.replace(/\\\n/g, \'<br>\');
		" in document 1 of window 2
	
end tell

tell application "Safari"
	set output to do JavaScript "
		var mainWindow = window.frames[document.getElementById(\'main1\').name].document;
		var mceWindow = mainWindow.getElementById(\'EXECSUMMARY_ifr\').contentWindow.document;
		
		 
		x =  \"" & execText & "\";
		
		
		y = \"" & originatorregion & "\";

		y = y.split(\',\');
				var len=y.length;
			
			var result = new Array();	
for(var i=0; i<len; i++) {
	var value = y[i];
	if(value == 2)
		result[i] = 3;
	if(value == 3)
		result[i] = 2;
	if(value == 4)
		result[i] = 4;
	if(value == 5)
		result[i] = 1;
		
}
		mceWindow.body.innerHTML = x;
		$(\'#main1\').contents().find(\'#PROJECTNAME\').val(\"" & initiativename & "\");
		z = \"" & rollover & "\";
		if(z ==1)
		z=2;
		else
		z=3;
		
		
		k = \"" & org & "\";
		
		if(k==1)
			k=10;
		else if(k==2)
			k=9;
		else
			k=0;
		execsponsor = \"" & execSponsor & "\";
		h = execsponsor.split(\',\');

		$(\'#main1\').contents().find(\'#PROJECTNAME\').val(\"" & initiativename & "\");
		
		$(\'#main1\').contents().find(\'#EXECSPONSORNAME\').val(h[0]);
		$(\'#main1\').contents().find(\'#PROJECTMANAGERNAME\').val(\"" & tracklead & "\");
		$(\'#main1\').contents().find(\'#PROJECTDESCRIPTION\').val(\"" & description & "\");
		$(\'#main1\').contents().find(\'#PROJECTDESCRIPTION\').val($(\'#main1\').contents().find(\'#PROJECTDESCRIPTION\').val().replace(/<br>/g, \'\\\n\'));
		$(\'#main1\').contents().find(\'#ORIGINATINGREGIONID\').val(result.join(\',\').split(\',\'));
	$(\'#main1\').contents().find(\'#AUTHORNAME\').val(\"" & authorname & "\");
	$(\'#main1\').contents().find(\'#BHUCATEGORYID\').val(z);
	$(\'#main1\').contents().find(\'#BUSINESSUNITID\').val(k);
		
		" in document 1 of window 1
end tell

');





$script2 = urlencode('



tell application "Safari"
	set quant_benefits to do JavaScript "
	document.forms[0].quant_benefits.value.replace(/\\\n/g, \'<br>\');
		" in document 1 of window 2
	
end tell
tell application "Safari"
	set nonquant_benefits to do JavaScript "
	 document.forms[0].nonquant_benefits.value.replace(/\\\n/g, \'<br>\');
		" in document 1 of window 2
	
end tell
tell application "Safari"
	set output to do JavaScript "
$(\'#main1\').contents().find(\'#QUANTIFIABLEBENEFITS\').val(\"" & quant_benefits & "\");
$(\'#main1\').contents().find(\'#NONQUANTIFIABLEBENEFITS\').val(\"" & nonquant_benefits & "\");
$(\'#main1\').contents().find(\'#QUANTIFIABLEBENEFITS\').val($(\'#main1\').contents().find(\'#QUANTIFIABLEBENEFITS\').val().replace(/<br>/g, \'\\\n\'));
$(\'#main1\').contents().find(\'#NONQUANTIFIABLEBENEFITS\').val($(\'#main1\').contents().find(\'#NONQUANTIFIABLEBENEFITS\').val().replace(/<br>/g, \'\\\n\'));
	" in document 1 of window 1
end tell
');
?>

 <a href='applescript://com.apple.scripteditor?action=new&amp;script=<?php echo  str_replace('+', ' ' , $script1);?>'>Run Script for Initiative Page</a>
 
 
 <a href='applescript://com.apple.scripteditor?action=new&amp;script=<?php echo str_replace('+', ' ' , $script2);?>'>Run Script for Bcase page</a>
 
 
 