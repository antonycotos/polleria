<?php  

	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class trabajador extends CI_Controller
	{
		public function index()
		{
			//falta vista trabajador
      $dat['tipotrabajador'] = $this->Mtrabajador->combotipotrabajador();
      $dat['tipodocumento'] = $this->Mtrabajador->combotipodocumento();
			$this->load->view('VTrabajadordos',$dat);

		}
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model("Mtrabajador");

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

			//VALIDACIONES
			$this ->form_validation->set_rules('idtipot', 'Id tipo trabajador','required|is_natural_no_zero');

			$this ->form_validation->set_rules('idtipodocut', 'Id tipo Documento','required|is_natural_no_zero');

			$this ->form_validation->set_rules('nombrest','Nombre de trabajor','required|min_length[2]|max_length[120]|callback_validarNombre', array ('validarNombre'=> 'El nombre ingresado es incorrecto.'));

			$this ->form_validation->set_rules('apellidost', 'Apellido de trabajor','required|min_length[1]|max_length[120]|callback_validarNombre', array ('validarNombre'=> 'El nombre ingresado es incorrecto.'));

			//CAMPO NO OBLIGATORIO
			$this ->form_validation->set_rules('telefonot', 'Telefono de trabajor','min_length[6]|max_length[13]is_natural');

			$this ->form_validation->set_rules('direcciont', 'Direccion de trabajador','required|min_length[7]|max_length[150]');

			$this ->form_validation->set_rules('correoelectronicot', 'Correo electronico de trabajador','required|min_length[15]|max_length[150]|callback_is_valid_email',array('is_valid_email'=> 'El correo ingresado es incorrecto.'));

			$this ->form_validation->set_rules('fechanacimientot', 'Fecha nacimiento de trabajador','callback_valid_date',array('valid_date' => 'fecha no tiene caracteres validos'));

      $this ->form_validation->set_rules('documento', 'documento de trabajor','min_length[8]|max_length[12]is_natural');

			if ($this->form_validation->run() == FALSE)
                {
                	//error
                   $respuesta['error'] = validation_errors();
     
                }
                else
                {
                	//acierto
                $d=array($this->input->post("idtipot"),$this->input->post("idtipodocut"),$this->input->post("nombrest"),$this->input->post("apellidost"),$this->input->post("telefonot"), $this->input->post("direcciont"), $this->input->post("correoelectronicot"), $this->input->post("fechanacimientot"), $this->input->post("documento"));
                	if($this->Mtrabajador->registrar($d)==1){
                		$respuesta['ok'] ="Registro Correcto";

                	}else{
						$respuesta['error'] ="No se pudo registrar";

                	}
                   
                }
			header('Content-Type: application/x-json; charset=utf-8');
                echo(json_encode($respuesta));
		}

		public function dolist(){
        $respuesta = array();
        $respuesta['datos']=$this->Mtrabajador->listar();
		$respuesta=$this->Mtrabajador->listar();


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


function is_valid_email($str)
{
  $matches = null;
  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}


	}
function valida_dni($str){
   $permitidos = "0123456789"; 
   for ($i=0; $i<strlen($nombre_usuario); $i++){ 
      if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){  
         return false; 
      } 
   } 
   return true; 

}




?>