<?php  
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class producto extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model("MProducto");
		 
		}
		public function index(){
			$dat['categoria'] = $this->MProducto->combocategoria();
			$this->load->view('VProducto',$dat);
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

			$this->form_validation->set_rules('idcategoriap', 'Ingresar id categoria', 'required|is_natural_no_zero');

			$this->form_validation->set_rules('nombrep', 'Ingrese nombre de producto','callback_validarNombre',  'required|min_length[3]|max_length[100]|callback_validarNombre',array('validarNombre'=> 'El nombre ingresado es incorrecto.'));

			$this->form_validation->set_rules('precio', 'Ingrese precio de producto', 'required|callback_validarnumerodecimalpositivo',array('validarnumerodecimalpositivo'=> 'El valor ingresado es incorrecto.'));

			$this->form_validation->set_rules('cantidadp', 'Ingrese cantidad de producto', 'is_natural');

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