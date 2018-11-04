<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class cotizacion extends CI_Controller
	{
		public function __construct()
		{
			
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');

		}
		public function index()
		{

			//FALTA CREAR LA VISTA LOCALL
			$this->load->view('Vistacotizacion');

		}
		public function doreg()
		{
			$respuesta = array();
			$respuesta ['error']="";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');
        	$this->form_validation->set_message('is_natural_no_zero', '%s Debe contener numero natural o un 0');
        	$this->form_validation->set_message('is_natural', '%s Debe contener numero natural');

			//VALIDACIONES
			$this ->form_validation->set_rules('iddetallepedio','Ingresar id pedido','required|is_natural_no_zero');

			$this ->form_validation->set_rules('idproveedor','','required|is_natural_no_zero');

			$this ->form_validation->set_rules('fecha','','');

			//CAMPO NO OBLIGATORIO
			$this ->form_validation->set_rules('correoelectronicol','ingrese correo electronico','min_length[3]|max_length[100]');

			//CAMPO NO OBLIGATORIO
			$this ->form_validation->set_rules('aforo','capacidad a foro','min_length[2]|max_length[3]|is_natural');

			if ($this->form_validation->run()==false) {

				//error
				$respuesta['error']=validation_errors();
			}
			else
			{
				$respuesta['ok']="Validacion Correcta";


			}
			header('Content-Type: application/x-json; charset=utf-8');
                echo(json_encode($respuesta));

		}

		function validarNombre($cadena){
      
      $pattern = "/^[A-Za-z][A-Za-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ, ]{2,}$/";
      if (preg_match($pattern, $cadena)) {
            return true;
      }
      return false;
  }
	}

 ?>