<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class pedido extends CI_Controller{

		public function __construct(){

			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('security');	
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model("MProducto");

		}
		public function index()
		{
			$dat['categoria'] = $this->MProducto->combocategoria();
			$this->load->view('VPedido',$dat);

		}
		public function doreg(){
			$respuesta = array();
			$respuesta ['error']="";

			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('numeric', '%s Debe contener solo numeros');

        	$this ->form_validation->set_rules('idtrabajador', 'Id tipo trabajador', 'required|is_natural_no_zero');

        	$this ->form_validation->set_rules('cantidad', 'Ingrese cantidad de pedido', 'is_natural');
        	
        	$this ->form_validation->set_rules('subto', 'ingrese subtotal del pedido', '');
        	
        	$this ->form_validation->set_rules('igv', 'Ingrese IGV del pedido', '');

        	$this ->form_validation->set_rules('tot', 'Ingrese el total del pedido', '');

        	$this ->form_validation->set_rules('est', 'Ingrese el estado del pedido', '');

        	$this ->form_validation->set_rules('fecha', 'Ingrese la fecha del pedido', '');

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
		public function buscarproducto(){
			$opcion=0;
			$respuesta = array();
			$respuesta ['error']="";			
			$this->form_validation->set_message('required', '%s no debe ser vacio.');
        	$this->form_validation->set_message('min_length', '%s tiene menos caracteres de lo esperado.');
        	$this->form_validation->set_message('max_length', '%s excede el numero de caracteres.');
        	$this->form_validation->set_message('is_natural_no_zero', '%s Debe contener numero natural');

        	$this ->form_validation->set_rules('producto', 'Nombre Producto', 'required|min_length[2]|max_length[50]');
        	$this ->form_validation->set_rules('bcat', 'CHECK'); 

        	$checkbox = $this->input->post("bcat");

        	if($checkbox==1){
        	$this->form_validation->set_rules('categoria', 'EL  ID CATEGORIA', 'required|is_natural_no_zero');
        	$opcion=1;
        	}
        	if($checkbox==0){
        		$this->form_validation->set_rules('categoria', 'Ingresar id categoria');
        		$opcion=2;
        	}
        	
        	if ($this->form_validation->run()==false) {

				//error
				$respuesta['error']=validation_errors();
			}
			else
			{	
				if($opcion=1){
					$ejecuta =$this->MProducto->listabusquedaproductos($this->input->post("categoria"),$this->input->post("producto"));
					$respuesta['ok'] ="BUSQUEDA REALIZADA";
					/*$d=array($this->input->post("categoria"),$this->input->post("producto"));	*/
				}
				if($opcion=2){
					$ejecuta =$this->MProducto->listabusquedaproductos(0,$this->input->post("producto"));
					$respuesta['ok'] ="BUSQUEDA REALIZADA";	
				}					
				                         	
			}
			header('Content-Type: application/x-json; charset=utf-8');
                echo(json_encode($respuesta));

		}

		public function listabusquedaproducto(){
			$categoria = $this->input->post("categoria");	
	      	$buscar = $this->input->post("buscar");
	      	$respuesta['datos']=$this->MProducto->listabusquedaproductos($categoria,$buscar);
	      	header('Content-Type: application/x-json; charset=utf-8');
	       	echo json_encode($respuesta);  
  		}
	} 

 ?>