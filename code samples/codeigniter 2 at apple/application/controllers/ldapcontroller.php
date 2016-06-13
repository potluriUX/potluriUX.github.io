<?php

class LDAPController{
	const ldap_host = "ldap.apple.com";
	
	function SharedConnection() {
		if (!isset($GLOBALS['LDAP_CONNECTION'])) {
			$GLOBALS['LDAP_CONNECTION'] = ldap_connect(LDAPController::ldap_host);
		}
		return $GLOBALS['LDAP_CONNECTION'];
	}
	
	function searchldap($string = '') {
		set_error_handler(array('LDAPController','handle_exception'));
		$i = 0;
		if($_GET['q'])
		$string =  $_GET['q'];
		$ldap = LDAPController::SharedConnection();
		//$filter = "(&(|(cn=*$string*)(sn=$string*)(givenName=$string*)(mail=$string))(mail=*apple.com))";
		$filter = "(&(|(cn=$string*)(givenName=$string*)(mail=$string))(mail=*apple.com))";
		
		$result = ldap_search($ldap, "ou=people,o=apple computer", $filter, array("cn"));//,"mail","appleDSID","applePreferredEmail"));
		
		
		
		ldap_sort($ldap, $result, "cn");
		$data = array_change_key_case(ldap_get_entries($ldap, $result), CASE_LOWER);
//	echo "<pre>" . print_r( $data, true) . "</pre>";
	
	foreach($data as $key=>$value)
		{
			 $namearray[] =$value['cn'][0];
			// echo $value['cn'][0];
			
		}
		$namearray = array_unique($namearray);
		
		foreach($namearray as $name)
		{
		
			echo      "$name\n";
		
		}
		restore_error_handler();
	}
	
		function handle_exception($errorno, $errorstr) {
			switch($errorno) {
				case E_USER_WARNING: {
				echo "Please type more";
					break;
				}
				default: {
				echo "Please type more";
					break;
				}
			}
		}
	
	
	}