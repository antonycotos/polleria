<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class tipotrabajador extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		public function index(){

				//FALTA CREAR LA VISTA TIPO DE TRABAJADOR
				$this->load->view('VistaTipotrabajador');

		}
		public function doreg(){
			
			$respuesta = array();
			$respuesta ['error']="";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');

			$this->form_validation->set_rules('nombretipot', 'Nombre de tipo de trabajador', 'required|min_length[10]|max_length[45]|callback_validarNombre',array('validarNombre'=> 'El nombre ingresado es incorrecto.'));

			$this->form_validation->set_rules('descripciont', 'Descripcion de tipo de trabajador', 'required|min_length[3]|max_length[200]|callback_validarNombre',array('validarNombre'=> 'La Descripcion ingresada es incorrecto.'));

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