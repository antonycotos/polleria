 	<?php  

	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class proveedorxproducto extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
	
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		public function index(){

			$this->load->view('VistaProvProd');
		}
		public function doreg(){

			$respuesta = array();
			$respuesta ['error']="";

        	$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');
        	$this->form_validation->set_message('decimal', '%s Debe contener solo decimales');
        	$this->form_validation->set_message('is_natural_no_zero', '%s Debe contener numero natural');
        	$this->form_validation->set_message('is_natural', '%s Debe contener numero natural');

			//validaciones
			$this->form_validation->set_rules('idprod', 'Ingrese id producto', 'required|is_natural_no_zero');

			$this->form_validation->set_rules('idprov', 'Ingrese id proveedor','required|is_natural_no_zero');

			$this->form_validation->set_rules('preciop', 'ingrese precio', 'required|callback_validarnumerodecimalpositivo',array('validarnumerodecimalpositivo'=> 'El valor ingresado es incorrecto.'));

			if($this->form_validation->run()==FALSE){

				$respuesta['error'] = validation_errors();
			}
			else{
				$respuesta['ok'] = "validacion correcta";
			}

			header('Content-Type: application/x-json; charset=utf-8');
                echo(json_encode($respuesta));
		}

		public function validarnumerodecimalpositivo($val)
    {
    	if(is_numeric($val)){
    		if($val>0){
    			return true;
    		}
    		if($val<=0){
    			return false;
    		}
    	}
    	else{
    		return false;	
    	}	
    }
	}

?>