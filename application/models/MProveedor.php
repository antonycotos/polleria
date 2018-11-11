<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class MProveedor extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function registrar($d) 
	{
		$this->load->database();  
		$this->db->trans_start();
		$this->db->query("call sp_registrarproveedor(?,?,?,?,?,?,?,?,@s)",$d);
		$r=$this->db->query("select @s as v");
		$this->db->trans_complete(); 
		$this->db->close();	
		return $r->row()->v;

	}
	public function registra($data)
	{
		$res;
		$this->load->database();
		$this->db->trans_start();
		$consulta="call sp_registrarproveedor(?,?,?,?,?,?,@v_res,@v_mensaje)";
		$this->db->query($consulta,$data);		
		$res=$this->db->query("select @v_res as respuesta, @v_mensaje as mensaje");
		$datos = ['respuesta' => $res->row()->respuesta, 'mensaje' => $res->row()->mensaje];
		$this->db->trans_complete();
		$this->db->close();
		return  $datos;

	}
	public function listar()
	{
		$this->load->database();  
		$this->db->trans_start();
		$r=$this->db->query("call sp_listarproveedor()");		
		$this->db->trans_complete();
		$this->db->close();	 
		return 	 $r->result_array();

	}
			public function combotipo()
{
	$this->load->database();
	$consulta="call sp_ltproveedor()";
	$r=$this->db->query($consulta);
	$this->db->close();
	$coll = $r->result_array();
	$combo=array();
	$combo[''] = 'Seleccionar';
	foreach ($coll as $value) {
		$combo [$value['v1']]=$value['v2'];
	}
	return $combo;
}

}

?>