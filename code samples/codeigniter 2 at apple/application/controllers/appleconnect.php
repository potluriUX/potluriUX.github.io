<?php
class Appleconnect extends CI_Controller {
	const ldap_host = "ldap.apple.com";
	

    function Appleconnect() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        
    }
    	function SharedConnection() {
		if (!isset($GLOBALS['LDAP_CONNECTION'])) {
			$GLOBALS['LDAP_CONNECTION'] = ldap_connect(Appleconnect::ldap_host);
		}
		return $GLOBALS['LDAP_CONNECTION'];
	}
	
	function searchldap($string = '') {
		
		$i = 0;
	
		$string = urldecode($string);
		$ldap = Appleconnect::SharedConnection();
		//$filter = "(&(|(cn=*$string*)(sn=$string*)(givenName=$string*)(mail=$string))(mail=*apple.com))";
		$filter = "(&(|(cn=$string*)(givenName=$string*)(mail=$string*))(mail=*apple.com))";
		
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
		
	$resultname =      $name;
		
		}
	return $resultname;
	}
	
/*if ($this->router->fetch_method() != 'login') {
	$acArray = $this->_ac_auth();
	$this->gsm_userlib->set_userlogin_email($acArray['emailAddress']);
}*/
    function index($seg3 = '', $seg4 = '', $seg5 = '', $seg6 = '', $seg7 = '') {
    
//	$acArray = $this->_ac_auth();
$acArray['emailAddress'] = 'ravi_potluri@apple.com';
$acArray['firstName']= 'Ravi';
$acArray['lastName'] = 'Potluri';
	  $this->db->select('id, firstname, lastname, email, is_admin');
        
                $this->db->where("user.email", 'ravi_potluri@apple.com');
           
            $this->db->from('user');
    
					 		$commonname =    'Ravi Potluri';

$acArray['cn'] = $commonname;

       
		//	$acArray['is_admin'] = $this->db->get()->result()->is_admin;
foreach($this->db->get()->result() as $row)
	{
	
		$acArray['is_admin'] =  $row->is_admin;
		$id = $row->id;
	}
			
if($this->db->count_all_results() == 1)
	{	
		$data['last_login'] = date( 'Y-m-d H:i:s' );
		 $this->db->where('id', $id);
            $this->db->update('user', $data);
		$this->session->set_userdata($acArray);
		redirect('index.php/' . $seg3 . '/' . $seg4 . '/' . $seg5 . '/' . $seg6 . '/' . $seg7);
	}
	
else 
{	
$this->logout();


	
}
}
 
public function login()
{
	$acArray = $this->_ac_auth();
	
	if(!empty($acArray))
	{
		redirect('index.php/initiative');
	}
}

public function logout()
	{ 
		$this->session->sess_destroy();
		setcookie ("KUDOS_LOGIN", "", time() - 3600, '/', 'apple.com');
		setcookie ("ACID", "", time() - 3600, '/', 'apple.com');

		setcookie ("DefaultAppleID", "", time() - 3600, '/', 'apple.com');
		setcookie ("myacinfo", "", time() - 3600, '/', 'apple.com');
		setcookie ("MYAC", "", time() - 3600, '/', 'apple.com');
		setcookie ("AppleID", "", time() - 3600, '/', 'apple.com');
		$this->session->unset_userdata('emailAddress');
		$this->session->unset_userdata('is_admin');
		//$this->session->userdata = '';
		
		redirect('index.php/appleconnect/login', 'refresh');
		//$this->gsm_auth_form_processing->logout();
	}


public function _ac_auth(){
	
		$thislocation = '';
		$appIdKey="D334F3C40FE582ACBC881CE35878B15D7186478B42FA9A161F6A628F0291F620";
		$appId="324";
		$appAdminPassword = "91jU5Ep2";
		/****** END CONFIG ****/

		//Helps to construct the return url
		function selfURL() { $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; } function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

		$myacinfo = $_COOKIE["myacinfo"];

		//Go to DS Auth Web and get login info based off of the myacinfo cookie
		$validateURL = file("https://dsauthweb.corp.apple.com/cgi-bin/WebObjects/DSAuthWeb.woa/wa/validate?cookie=" . $myacinfo . "&ip=" . $_SERVER['REMOTE_ADDR'] . "&appId=" . $appId . "&appAdminPassword=" . $appAdminPassword . "&func=prsId;emailAddress;firstName;lastName;commonName;prsTypeCode;allGroups");

		//Convert the info from DS Auth Web to an array
		$myacarray = array();
		foreach($validateURL as $value){
			$thisline = explode("=",$value);
			$myacarray[trim($thisline[0])]=trim($thisline[1]);
		}

		if ($myacinfo == '' || $myacarray['status']!=0) {
			//If the user hasn't logged in yet, or login has expired, send the user to the login page
			unset($_COOKIE["myacinfo"]);
			$returnURL = selfURL();

			//This cookie is used only by WWBI.  Because the appleIdKey above is tied to a specific server, DS Auth Web will only
			//return users to that server.  We have a script set up on that server that will return you to your original location.
			setcookie("wwbi_login_return",$returnURL,0,"/",".apple.com");
			header ("Location: https://dsauthweb.corp.apple.com/cgi-bin/WebObjects/DSAuthWeb.woa/wa/login?appIdKey=" . $appIdKey . "&path=/auth/redir.php");

			//return false;
			exit;
		} else {
			//It looks like we got some results from DS Auth Web and the user has successfully logged in
			//Check the value for emailAddress just to be sure
			$username = $myacarray['emailAddress'];
			if ($username == '') {
				//If we don't have anything, send them to log in again. It's possible there is something wrong with their directory record
				//echo"no user info.  login failed";
				unset($_COOKIE["myacinfo"]);
				$returnURL = selfURL();
				setcookie("wwbi_login_return",$returnURL,0,"/",".apple.com");
				header ("Location: https://dsauthweb.corp.apple.com/cgi-bin/WebObjects/DSAuthWeb.woa/wa/login?appIdKey=" . $appIdKey . "&path=/auth/redir.php");
				//return false;
				exit;
			}else{
				//We got our results from DS Authweb and the user has logged in.  Now we have their name and email address as well as the Apple Directory groups they belong to

				//$firstName=$myacarray['firstName'];
				//$lastName=$myacarray['lastName'];
				//$emailAddress=$myacarray['emailAddress'];

				//$allGroups will look something like 124;5555;45645;55555
				//It is a list of all the Apple Directory groups the user belongs to, separated by semicolons.
				//$allGroups=$myacarray['allGroups'];

				return $myacarray;

			}
		}
	}
	}