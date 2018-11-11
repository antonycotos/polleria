<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class MCategoria extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function registrar($d)
	{
		$this->load->database();  
		$this->db->trans_start();
		$this->db->query("call sp_registrarcategoria(?,?,@s)",$d);
		$r=$this->db->query("select @s as v");
		$this->db->trans_complete();
		$this->db->close();	
		return $r->row()->v;

	}

	public function listar()
	{
		$this->load->database();  
		$this->db->trans_start();
		$r=$this->db->query("call sp_listarcategoria()");		
		$this->db->trans_complete();
		$this->db->close();	
		return 	 $r->result_array();

	}

}

?>