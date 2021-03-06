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

			$this->form_validation->set_rules('idcategoria', 'Ingresar id categoria', 'required|is_natural_no_zero');

			$this->form_validation->set_rules('nombrep', 'Ingrese nombre de producto','required|min_length[2]|max_length[120]');

			$this->form_validation->set_rules('precio', 'Ingrese precio de producto', 'min_length[1]|max_length[6]|required|callback_validarnumerodecimalpositivo2',array('validarnumerodecimalpositivo2'=> 'El precio ingresado es incorrecto.'));

			$this->form_validation->set_rules('cantidad', 'Ingrese cantidad de producto', 'is_natural|min_length[1]|max_length[4]|callback_evluarcantidad',array('evluarcantidad' =>'LA CANTIDAD DEBE SER SOLO DIGITOS POSITIVOS'));

			if ($this->form_validation->run()==false) {

				//error
				$respuesta['error']=validation_errors();
			}
			else
			{
                	//acierto
				 $cant = $this->input->post("cantidad");

				 if($cant!=null or strlen($cant)>0){
				 	$d=array($this->input->post("idcategoria"),
               			$this->input->post("nombrep"),
               			$this->input->post("precio"),
               			$this->input->post("cantidad"));

                   		$ejecuta =$this->MProducto->registra($d,1);

	                	if($ejecuta['respuesta'] ==1){
	                    $respuesta['ok'] = $ejecuta['mensaje'];              
	           			}
			            else{
			              $respuesta['error'] = $ejecuta['mensaje'];
			            }
				}

				else{
					$d=array($this->input->post("idcategoria"),
               			$this->input->post("nombrep"),
               			$this->input->post("precio"),
               			$this->input->post("cantidad"));

                   	$ejecuta =$this->MProducto->registra($d,0);

                	if($ejecuta['respuesta'] ==1){
                    $respuesta['ok'] = $ejecuta['mensaje'];              
           			}
		            else{
		              $respuesta['error'] = $ejecuta['mensaje'];
		            }	
				}
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

   public function validarnumerodecimalpositivo2($val)
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
    function validarnumerodecimalpositivo($num) { 
    if (preg_match("/^[01.]*$/",$num)){ 
        return true; 
    } else { 
        return false; 
    } 
}  
    public function evluarcantidad($val)
    {
    	if(strlen($val)>0){
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
    	else{
    		return true;	
    	}	
    } 
    
	}

?>