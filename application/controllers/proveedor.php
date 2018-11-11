<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	class proveedor extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model("MProveedor");

		}
		public function index()
		{

			//FALTA CREAR LA VISTA LOCALL
			$dat['tipo'] = $this->MProveedor->combotipo();
			
			$this->load->view('VProveedor',$dat);

		}
		public function doreg()
		{
			$respuesta = array(); 
			$respuesta ['error']="";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');
        	$this->form_validation->set_message('exact_length', '%s Debe contener caracteres exactos');
        	$this->form_validation->set_message('is_natural_no_zero', '%s Debe contener numero natural');
        	$this->form_validation->set_message('is_natural', '%s Debe contener numero natural');
        	$this->form_validation->set_message('is_unique', '%s Debe ser campo unico');

			//VALIDACIONES
			$cant = $this->input->post("idtipoproveedorp");
			if($cant==2){
					$this ->form_validation->set_rules('norz','ingrese el nombre proveedor','required|min_length[2]|max_length[120]|callback_validarNombre',array('validarNombre' => 'Nombre no tiene caracteres validos'));
 
			$this ->form_validation->set_rules('aoruc','ingrese el apellido proveedor','required|min_length[3]|max_length[120]|callback_validarNombre',array('validarNombre' => 'apellido no tiene caracteres validos'));
			}
			if($cant==1){
						$this ->form_validation->set_rules('aoruc','ingrese ruc','required|exact_length[11]|is_natural');

			$this ->form_validation->set_rules('norz','ingrese razon social','required|min_length[5]|max_length[100]|callback_validarNombre',array('validarNombre' => 'razon social no tiene caracteres validos'));
			}
			

			
			$this ->form_validation->set_rules('idtipoproveedorp','Ingrese tipo de proveedor','required|is_natural_no_zero');

		

			$this ->form_validation->set_rules('telefonoprov','ingrese el telefono proveedor','required|min_length[9]|max_length[13]|is_natural');

			//CAMPO NO OBLIGATORIO
			$this ->form_validation->set_rules('correoelectronicol','ingrese correo electronico','min_length[15]|max_length[150]|callback_is_valid_email',array('is_valid_email'=> 'El correo ingresado es incorrecto.'));

			//CAMPO NO OBLIGATORIO
			$this ->form_validation->set_rules('direccionprov','ingrese la direccion del proveedor','min_length[17]|max_length[150]');

			if ($this->form_validation->run() == FALSE)
                {
                	//error 
                   $respuesta['error'] = validation_errors();
     
                }
                else
                {
                	//acierto
                	  $d=array($this->input->post("idtipoproveedorp"),
               			$this->input->post("norz"),
               			$this->input->post("aoruc"),
               			$this->input->post("telefonoprov"),
               			$this->input->post("correoelectronicol"),
               			$this->input->post("direccionprov"));
                	$ejecuta =$this->MProveedor->registra($d);
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
  function is_valid_email($str)
{
  $matches = null;
  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}

}

 ?>