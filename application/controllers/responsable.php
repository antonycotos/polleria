<?php  
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class responsable extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
	
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model("MResponsable");

		}
		public function index(){

			//VISTA NO CREADA
			$this->load->view('VResponsable');
		}

		public function doreg(){

			$respuesta = array();
			$respuesta ['error']="";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
         	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');
         	$this->form_validation->set_message('is_natural_no_zero', '%s Debe contener numero natural');
        	$this->form_validation->set_message('is_natural', '%s Debe contener numero natural');

			$this->form_validation->set_rules('idtrab', 'Ingrese id trabajador', 'required|is_natural_no_zero');

			$this->form_validation->set_rules('idloc', 'Ingrese id local', 'required|is_natural_no_zero');

			$this ->form_validation->set_rules('fecini', 'Fecha inicio','callback_valid_date',array('valid_date' => 'fecha no tiene caracteres validos'));

			$this ->form_validation->set_rules('fecfin', 'Fecha fin','callback_valid_date',array('valid_date' => 'fecha no tiene caracteres validos'));

			if ($this->form_validation->run() == FALSE)
                {
                	//error 
                   $respuesta['error'] = validation_errors();
     
                }
                else
                {
                	//acierto
               $d=array($this->input->post("idtrab"),$this->input->post("idloc"),$this->input->post("fecini"),$this->input->post("fecfin"));

                	$ejecuta =$this->MResponsable->registrar($d);                	
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


function valid_date( $str )
{
    $stamp = strtotime( $str );
      
    if (!is_numeric($stamp)) 
    { 
        return FALSE;
    } 
      
     $month = date( 'm', $stamp );
     $day   = date( 'd', $stamp );
     $year  = date( 'Y', $stamp );
      
     if (checkdate($month, $day, $year)) 
     {
        return $year.'-'.$month.'-'.$day;
     }
      

     return FALSE;
}



	}



?>