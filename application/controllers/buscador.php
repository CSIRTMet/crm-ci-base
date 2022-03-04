<?php
class Buscador extends CI_Controller {
       	
		
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Telefono_modelo');
		$this->load->model('Deuda_modelo');
		
		$this->load->model('Cliente_modelo');	
	}
	
	
	function listar_columnas()
	{
		
	// no va	echo "<option value='0' selected>*Seleccione campo*</option>";
		
		$this->load->model('Cliente_modelo');
		$columnas = $this->Cliente_modelo->get_columnas();	
		$tipo_campana = $this->session->userdata('campana_tipo');	
				
			if(!empty($columnas))
			{
				
				echo "<option value='nombre'>Nombre</option>";
				echo "<option value='rut'>Rut (sin punto ni dv)</option>";
				echo "<option value='telefono'>Telefono</option>";
				
				if($tipo_campana == 1)
				{
				echo "<option value='numero_documento'>Num Documento</option>";
				}
			}
			else
			{
			    echo "<option value='0' selected>--</option>";
			}
			
			
		
	}
	
	/*FUNCIONES DE TESTEO 
	
	ESTAS FUNCIONES PERTENECEN A LOS MODELOS Y HAN SIDO MODIFICADAS UN POCO PARA VER LO KE ARROJAN 
	ESTO ES PARA DEBUG

	
	*/

	
	
	
	
	function buscar_registro()
	{
	
	$columna_a_buscar 	= $this->input->post('columna_a_buscar');
	$valor_a_buscar 	= $this->input->post('valor_a_buscar');
	
	$tipo_campana		= $this->session->userdata('campana_tipo');
	$id_campana			= $this->session->userdata('campana_id_campana');
	$id_lista			= $this->session->userdata('lista_id_lista');


	$this->form_validation->set_rules('valor_a_buscar', 'Valor a buscar', 'required');
	
	//corre validacion
	//$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
	$this->form_validation->set_message('required', 'Debe ingresar valor de busqueda');
	
	$success = $this->form_validation->run();
	
	
	
	
	if ($success) { 
		echo "Buscando por $columna_a_buscar (maximo 20 resultados), solo aplica a registros de su lista asignada.";
		$this->load->model('Cliente_modelo');
		$data['clientes'] 	= $this->Cliente_modelo->buscar_registros($columna_a_buscar,$valor_a_buscar,$tipo_campana,$id_lista);
		//echo $data['clientes'];
		$this->load->view('vista_listar_registro_encontrado',$data);
	 }
	
	else {
	echo strip_tags(validation_errors())."---"; 
	}
	/*$tipo */
	
	
	}
	
	
	
	
	
}


