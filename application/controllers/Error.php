<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
		$this->load->view('errormsg');
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */