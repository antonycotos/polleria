<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portada extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
			$this->load->view('Inicio');
	}

}

/* End of file Portada.php */
/* Location: ./application/controllers/Portada.php */