<?php  

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class categoria extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model("MCategoria");
			
		}
		public function index(){
			$this->load->view('VCategoria');
		}
		public function doreg(){
			$respuesta = array();
			$respuesta ['error'] = "";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
         	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');

			$this->form_validation->set_rules('nombrec', 'Nombre de categoria', 'required|min_length[3]|max_length[30]|callback_validarNombre',array('validarNombre'=> 'Nombre no tiene caracteres validos'));

			$this->form_validation->set_rules('descripcionc', 'descripcion de categoria', 'required|min_length[10]|max_length[200]');

			if ($this->form_validation->run() == FALSE)
                {
                	//error
                   $respuesta['error'] = validation_errors();
     
                }
                else
                {
                	//acierto
               $d=array($this->input->post("nombrec"),
               	$this->input->post("descripcionc"));

                  $ejecuta =$this->MCategoria->registra($d);

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
		function validarNombre($cadena){
      
      $pattern = "/^[A-Za-z][A-Za-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ, ]{2,}$/";
      if (preg_match($pattern, $cadena)) {
          return true;
      }
      return false;
  }
	}




?>