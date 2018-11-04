<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class local extends CI_Controller
	{
		
		public function index()
		{
			$this->load->view('Vlocall');
		} 
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model("MLocal");		
		}
		public function doreg()
		{
			$respuesta = array();
			$respuesta ['error']= "";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');
        	$this->form_validation->set_message('is_natural_no_zero', '%s Debe contener numero natural o un 0');
        	$this->form_validation->set_message('is_natural', '%s Debe contener numero natural');      

			//VALIDACIONES
			$this ->form_validation->set_rules('nombrel','Nombre del local','required|min_length[5]|max_length[100]|callback_validarNombre',array('validarNombre' => 'Nombre no tiene caracteres validos'));

			$this ->form_validation->set_rules('telefonol','Ingrese el telefono','required|exact_length[9]|is_natural');

			$this ->form_validation->set_rules('direccionl','ingrese la direccion','required|min_length[7]|max_length[150]');

			//CAMPO NO OBLIGATORIO
			$this ->form_validation->set_rules('correoelectronicol','ingrese correo electronico','min_length[15]|max_length[150]');

			//CAMPO NO OBLIGATORIO
			$this ->form_validation->set_rules('aforo','capacidad a foro','min_length[2]|max_length[3]|is_natural|callback_validaforo',array('validaforo' => 'Aforo tiene que ser mayor a 20 y menor a 999'));

			if ($this->form_validation->run() == FALSE)
                {
                	//error 
                   $respuesta['error'] = validation_errors();
     
                }
                else
                {
                	//acierto
               $d=array($this->input->post("nombrel"),$this->input->post("telefonol"),$this->input->post("direccionl"),$this->input->post("correoelectronicol"),$this->input->post("aforo"));

                	$ejecuta =$this->MLocal->registra($d);                	
                	if($ejecuta['respuesta'] ==1){
              		  $respuesta['ok'] = $ejecuta['mensaje'];              
            }
            else{
              $respuesta['error'] = $ejecuta['mensaje'];
            }
                   
                }
			header('Content-Type: application/x-json; charset=utf-8');
                echo(json_encode($respuesta));

		}

		public function dolist(){
        $respuesta = array();
        $respuesta['datos']=$this->MLocal->listar();
		//$respuesta=$this->MLocal->listar();


           header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta)); 
        }  

		function validarNombre($cadena){
      
      $pattern = "/^[A-Za-z][\.A-Za-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ, ]{2,}$/";
      if (preg_match($pattern, $cadena)) {
            return true;
      }
      return false;
  }
  	function validaforo($str){
  		if(strlen($str)==0 or strlen($str)==1 or strlen($str)>4){
  			return false;
  		}
  		if($str>999 or $str<20){
  			return false;
  		}
  		return true;
  	}
	}

 ?>