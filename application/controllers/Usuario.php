<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Usuario extends CI_Controller
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
			//falta vista trabajador
			$this->load->view('VistaUsuario');
		}

		public function dorog(){

			$respuesta = array(); 
			$respuesta ['error']="";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
         	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');
         	$this->form_validation->set_message('is_natural_no_zero', '%s Debe contener numero natural');

         	$this ->form_validation->set_rules('idtrabajadoru', 'ingrese id trabajador', 'is_natural_no_zero');

         	$this ->form_validation->set_rules('usuariou', 'ingrese un usuario', 'requiredcallback_validarNombre', array ('validarNombre'=> 'El nombre ingresado es incorrecto.'));

         	$this ->form_validation->set_rules('clave', 'ingrese una contraseña', 'required');

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