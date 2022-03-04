<?php
class Email extends CI_Controller {
       	function __construct()
	{
		parent::__construct();
		 
		
	}
	
	function index()
	{
		$this->load->model('Email_model');

		$data['title'] = "Mis Emails";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Email->get_last_ten_entries();

		$this->load->view('email', $data);
	}
	
	function ingresar_nuevo_email()
	{
	
	$email = $this->input->post('email');
	$tipo = $this->input->post('tipo');
	$id_cliente = $this->input->post('id_cliente');
	$tipo_campana = $this->session->userdata('campana_tipo');
	if($tipo_campana == 2) //marketing
	{
		$rut = '';
	} else {
		$rut = '';//$rut = $this->input->post('rut');
	}
	
	$this->form_validation->set_rules('tipo', 'Tipo', 'required|is_natural_no_zero');
	$this->form_validation->set_rules('email', 'Email', 'required');
	
	$success = $this->form_validation->run();
	
		if ($success){
		$this->load->model('Email_modelo');
		$res = $this->Email_modelo->ingresar_nuevo_email($id_cliente,$email,$tipo,$rut);

		echo $res; //1 = exito
		
		
		
		
		}
		else {
		echo strip_tags(validation_errors()); 
		}
	}
	
	
	
	function validar_email()
	{
	
	    $data["email"] = $this->uri->segment(3);
		$data["id_email"] = $this->uri->segment(4);
		$data["id_cliente"] = $this->uri->segment(5);
		$this->load->view('vista_validar_email', $data);
	}
 
 	function  form_carga_div_email($id_cliente)
	{
	    	$id_campana = $this->session->userdata("campana_id_campana");
		$id_empresa = $this->session->userdata("campana_id_empresa");
	    	$tipo_campana = $this->session->userdata("campana_tipo");
		$this->load->model('Email_modelo');
		$data['emails'] 	= $this->Email_modelo->get_email_cliente($id_cliente,$tipo_campana);	
		
		if($tipo_campana == 2) { // marketing
		
		
		switch ($id_campana) {
			case 1: //netline conac
				$this->load->view('vista_div_email_mkt', $data);	
				break;
			case 2: //netline pyme
				$this->load->view('vista_div_email_mkt', $data);	
				break;
			case 3: //claro hfcc
				$this->load->view('vista_div_email_mkt_hfcc', $data);		
				break;
			default:
			   $this->load->view('vista_div_email_mkt', $data);	
		}
			
			
		}else{  // cobranza
		
			switch ($id_empresa) {
			case 2: //claro
				$this->load->view('vista_div_email_cob', $data);	
				break;
			
			default:
			    $this->load->view('vista_div_email_cob', $data);	
		}
		
		}
		

		
	}

 
 	function ingresar_val_email(){
		//reglas
		$id_email = $this->input->post('id_email');
		$select_clasificacion = $this->input->post('id_clasificacion');
		$select_tipificacion = $this->input->post('id_tipificacion');
		$tipo_campana = $this->session->userdata('campana_tipo');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_clasificacion', 'Clasificacion', 'is_natural_no_zero');
		$this->form_validation->set_rules('id_tipificacion', 'Tipificacion', 'is_natural_no_zero');

		//corre validacion
		$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
		$success = $this->form_validation->run();
		

		//comprueba resultados 

		if ($success) { 
			
			$this->load->model('Email_modelo');
		    $resultado = $this->Email_modelo->set_calificacion($id_email, $select_clasificacion, $select_tipificacion,$tipo_campana);
			
			echo "1";

		}
		else { echo strip_tags(validation_errors()); }

  
	}
	
	
}
?>

