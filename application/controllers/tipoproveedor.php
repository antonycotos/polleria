<?php  

	defined('BASEPATH') OR exit('No direct script access allowed');

	class tipoproveedor extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');

		}
		public function index()
		{

			//FALTA CREAR LA VISTA LOCALL
			$this->load->view('Vistatipoproveedor');

		}
		public function doreg(){
			$respuesta = array();
			$respuesta ['error']="";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');

        	$this->form_validation->set_rules('nombretipoprot', 'Ingrese nombre de tipo de proveedor', 'required|min_length[5]|max_length[20]|callback_validarNombre',array('validarNombre' => 'Nombre no tiene caracteres validos'));

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