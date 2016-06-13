<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('ravi');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */