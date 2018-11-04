<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

	class detallepedido extends CI_Controller{

		public function __construct(){

			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		public function index()
		{

			//FALTA CREAR LA VISTA LOCALL
			$this->load->view('Vistadetallepedido');
		}
		public function doreg(){
			$respuesta = array();
			$respuesta ['error']="";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');

        	$this ->form_validation->set_rules('idpedido', 'Ingresar id pedido', 'required|is_natural_no_zero');
        	$this ->form_validation->set_rules('idproducto', 'Ingresar id producto', 'required|is_natural_no_zero');
        	$this ->form_validation->set_rules('cantidad', 'Ingrese cantidad de pedido', 'is_natural');
        	$this ->form_validation->set_rules('precio', '', 'required|callback_validarnumerodecimalpositivo',array('validarnumerodecimalpositivo'=> 'El valor ingresado es incorrecto.'));

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
	}





 ?>