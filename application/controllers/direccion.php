<?php
class Direccion extends CI_Controller {
       	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->model('Telefono_model');

		$data['title'] = "Mis telefonos";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Telefono->get_last_ten_entries();

		$this->load->view('telefono', $data);
	}
	
	
	
	function validar_direccion()
	{
	
	    
		$data["direccionID"] = $this->uri->segment(3);
		$data["id_cliente"] = $this->uri->segment(4);
		
		$tipo_campana = $this->session->userdata("campana_tipo");
		$this->load->model('Direccion_modelo');

		$data["direcciones"] = $this->Direccion_modelo->get_direccion($data["direccionID"], $tipo_campana);

		$this->load->view('vista_validar_direccion', $data);
	}
 	
	
	
	function ingresar_val_direccion(){
		//reglas
		$id_direccion = $this->input->post('id_direccion');
		$id_clasificacion = 3; //otro //$this->input->post('id_clasificacion');
		$id_tipificacion = $this->input->post('id_tipificacion');
		$tipo_campana = $this->session->userdata('campana_tipo');
		
		$this->load->library('form_validation');
		
		
		//$this->form_validation->set_rules('id_clasificacion', 'Clasificacion', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('id_tipificacion', 'Tipificacion', 'required|is_natural_no_zero');
		
		
		//corre validacion
		$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
		$success = $this->form_validation->run();
		

 
		//comprueba resultados 
		if ($success) { 
		$this->load->model('Direccion_modelo');
		$resultado =  $this->Direccion_modelo->set_calificacion($id_direccion,$id_clasificacion,$id_tipificacion,$tipo_campana);

				echo "1";

		}
		else { echo strip_tags(validation_errors()); }  

}



function  form_carga_div_direcciones($id_cliente)
	{
	
	    $id_campana = $this->session->userdata("campana_id_campana");
	    $tipo_campana = $this->session->userdata("campana_tipo");
		$this->load->model('Direccion_modelo');
		$data['direcciones'] = $this->Direccion_modelo->get_direcciones_cliente($id_cliente,$tipo_campana);	
		$data['regiones'] = $this->Direccion_modelo->get_regiones();	
		if($tipo_campana == 2) { // marketing
		
			if($id_campana == 2) //2 = netline pyme
			{
				$this->load->view('vista_div_direccion_mkt', $data);
			}
			else
			{
				$this->load->view('vista_div_direccion_mkt', $data);
			}
		}
		
		else{  // cobranza

		 		$this->load->view('vista_div_direccion_mkt', $data);
		}

	}




function get_ciudad(){

			$this->load->model('Direccion_modelo');
			$id_region = $this->input->get_post("id");
			$ciudad = $this->Direccion_modelo->get_ciudades($id_region);
			
				
			if(!empty($ciudad))
			{
				echo "<option value='0' selected>* Region *</option>";
				foreach($ciudad as $item):
					echo "<option value='".$item->id_ciudad."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
	}


function get_comuna(){

			$this->load->model('Direccion_modelo');
			$id_ciudad = $this->input->get_post("id");	
			$comuna = $this->Direccion_modelo->get_comunas($id_ciudad);
	
			if(!empty($comuna))
			{
				echo "<option value='0' selected>* Region *</option>";
				foreach($comuna as $item):
					echo "<option value='".$item->id_comuna."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
	}
	
	
 
 	function ingresar_nueva_direccion()
	{
	
	$id_region = $this->input->post('direccion_region');
	$id_ciudad= $this->input->post('direccion_ciudad');
	$id_comuna = $this->input->post('direccion_comuna');
	$calle = $this->input->post('direccion_calle');
	$numero = $this->input->post('direccion_numero');
	$complemento = $this->input->post('direccion_complemento');
	
	$id_cliente = $this->input->post('id_cliente');
	$tipo_campana = $this->session->userdata('campana_tipo');
	
	if($tipo_campana == 2) //marketing
	{
	$rut = '';
	} else {
	$rut = '';
	}
	
	$this->form_validation->set_rules('direccion_comuna', 'Comuna', 'required|is_natural_no_zero');
	$this->form_validation->set_rules('direccion_calle', 'Calle', 'required');
	$this->form_validation->set_rules('direccion_numero', 'Número', 'required');
	
	$success = $this->form_validation->run();
	
		if ($success){
		$this->load->model('Direccion_modelo');
		$res = $this->Direccion_modelo->ingresar_nueva_direccion($id_cliente,$id_region,$id_ciudad,$id_comuna,$calle,$numero,$complemento,$rut);

		echo $res; //1 = exito
		
		
		
		
		}
		else {
		echo strip_tags(validation_errors()); 
		}
	}
 
 

 

}
?>

