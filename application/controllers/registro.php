<?php
class Registro extends CI_Controller {
       	
		
	function __construct()
	{
		parent::__construct();
		
	}
	
	function index()
	{
		
	}
	
	function nuevo_formulario_ingreso()
	{
		$this->load->model('Status_modelo');
		$data['status'] 	= $this->Status_modelo->get_status();
		
		$this->load->model('Tipificacion_fraude_modelo');
		$data['tipificacion_fraude'] = $this->Tipificacion_fraude_modelo->get_tipificaciones();
		
		$this->load->model('Usuario_modelo');
		$data['usuarios'] = $this->Usuario_modelo->get_usuarios();
	
	
		$this->load->view('vista_ingreso_registro',$data);
	}
	
	
	
	
	function ver_registro($registro)
	{
		$this->load->model('Status_modelo');
		$data['status'] 	= $this->Status_modelo->get_status();
		
		$this->load->model('Tipificacion_fraude_modelo');
		$data['tipificacion_fraude'] = $this->Tipificacion_fraude_modelo->get_tipificaciones();
		
		$this->load->model('Usuario_modelo');
		$data['usuarios'] = $this->Usuario_modelo->get_usuarios();
		
		$this->load->model('Registro_modelo');
		
		$data['registro'] = $this->Registro_modelo->get_registro($registro);
		$this->load->view('vista_ver_registro',$data);
	}
	
	
	function formulario_editar_registro($registro)
	{
		$this->load->model('Status_modelo');
		$data['status'] 	= $this->Status_modelo->get_status();
		
		$this->load->model('Tipificacion_fraude_modelo');
		$data['tipificacion_fraude'] = $this->Tipificacion_fraude_modelo->get_tipificaciones();
		
		$this->load->model('Usuario_modelo');
		$data['usuarios'] = $this->Usuario_modelo->get_usuarios();
		
		$this->load->model('Registro_modelo');
		
		$data['registro'] = $this->Registro_modelo->get_registro($registro);
		$this->load->view('vista_editar_registro',$data);
	}
	
	
	
	
	
	
		function listar_registros()
	{
		
		$tipo = $this->uri->segment(3);
		
		$this->load->model('Status_modelo');
		$data['status'] 	= $this->Status_modelo->get_status();
		
		
		$this->load->model('Usuario_modelo');
		$data['usuarios'] = $this->Usuario_modelo->get_usuarios();
	
	
	    $this->load->model('Registro_modelo');
		$data['registro'] 	= $this->Registro_modelo->get_registros($tipo);
	
		$this->load->view('vista_listar_registros',$data);
	}
	
	
	
	function crear_registro()
	{

	$id_usuario = $this->input->post('id_usuario');
	$id_status = $this->input->post('id_status');
	$id_tipificacion_fraude = $this->input->post('id_tipificacion_fraude');
	$bloqueo_pf = $this->input->post('bloqueo_pf');
	$dia_retiro_pf = $this->input->post('dia_retiro_pf');
	$numero_tarjeta = $this->input->post('numero_tarjeta');
	$nombre_cliente = $this->input->post('nombre_cliente');
	$obs_llamado_1 = $this->input->post('obs_llamado_1');
	$obs_llamado_2 = $this->input->post('obs_llamado_2');
	$obs_llamado_3 = $this->input->post('obs_llamado_3');
	$ultima_gestion = $this->input->post('ultima_gestion');
	
	$se_saco_pf = $this->input->post('se_saco_pf');
	$quien = $this->input->post('quien');
	$titular_contactado = $this->input->post('titular_contactado');
	$dejar_mensaje = $this->input->post('dejar_mensaje');
	$enviar_carta = $this->input->post('enviar_carta');
	$telefono_erroneo = $this->input->post('telefono_erroneo');
	$telefono = $this->input->post('telefono'); 
	$anexo = $this->input->post('anexo');
	 
	 
  	$this->load->library('form_validation');
  	//reglas
  	$this->form_validation->set_rules('id_status', 'Status', 'required|is_natural_no_zero');
	$this->form_validation->set_rules('bloqueo_pf', 'Bloqueo PF', 'required');
	$this->form_validation->set_rules('numero_tarjeta', 'Numero Tarjeta', 'required');
	$this->form_validation->set_rules('nombre_cliente', 'Nombre Cliente', 'required');
	
	//corre validacion
	$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
	$this->form_validation->set_message('required', 'El campo %s es requerido');
	
	
	
	$success = $this->form_validation->run();
	
	
	//comprueba resultados 
	if ($success ) { 
	
	$this->load->model('Registro_modelo');
	$resultado = $this->Registro_modelo->set_registro(0,$id_usuario, $id_status, $id_tipificacion_fraude, $bloqueo_pf, $dia_retiro_pf, 				 $numero_tarjeta, $nombre_cliente, $obs_llamado_1, $obs_llamado_2, $obs_llamado_3, $ultima_gestion, $se_saco_pf, 		
				 $quien, $titular_contactado, $dejar_mensaje, $enviar_carta, $telefono_erroneo,$telefono, $anexo);
	 
	 if($resultado){
	 	echo "1";
	 }
	 else{
	 	echo "No se pudo guardar, vuelva a intentar";
	 
	 }
	
	
	
	
	 }
	else { echo strip_tags(validation_errors()); }

	
	}
	
	

	function editar_registro()
	{

	$id_registro = $this->input->post('id_registro');
	$id_usuario = $this->input->post('id_usuario');
	$id_status = $this->input->post('id_status');
	$id_tipificacion_fraude = $this->input->post('id_tipificacion_fraude');
	$bloqueo_pf = $this->input->post('bloqueo_pf');
	$dia_retiro_pf = $this->input->post('dia_retiro_pf');
	$numero_tarjeta = $this->input->post('numero_tarjeta');
	$nombre_cliente = $this->input->post('nombre_cliente');
	$obs_llamado_1 = $this->input->post('obs_llamado_1');
	$obs_llamado_2 = $this->input->post('obs_llamado_2');
	$obs_llamado_3 = $this->input->post('obs_llamado_3');
	$ultima_gestion = $this->input->post('ultima_gestion');
	
	$se_saco_pf = $this->input->post('se_saco_pf');
	$quien = $this->input->post('quien');
	$titular_contactado = $this->input->post('titular_contactado');
	$dejar_mensaje = $this->input->post('dejar_mensaje');
	$enviar_carta = $this->input->post('enviar_carta');
	$telefono_erroneo = $this->input->post('telefono_erroneo');
	
	$telefono = $this->input->post('telefono'); 
	$anexo = $this->input->post('anexo');
	 
  	$this->load->library('form_validation');
  	//reglas
  	$this->form_validation->set_rules('id_status', 'Status', 'required|is_natural_no_zero');
	$this->form_validation->set_rules('bloqueo_pf', 'Bloqueo PF', 'required');
	$this->form_validation->set_rules('numero_tarjeta', 'Numero Tarjeta', 'required');
	$this->form_validation->set_rules('nombre_cliente', 'Nombre Cliente', 'required');
	
	//corre validacion
	$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
	$this->form_validation->set_message('required', 'El campo %s es requerido');
	
	$success = $this->form_validation->run();
	
	
	//comprueba resultados 
	if ($success ) { 
	
	
	  $this->load->model('Registro_modelo');
	  $resultado = $this->Registro_modelo->set_registro($id_registro,$id_usuario, $id_status, $id_tipificacion_fraude, $bloqueo_pf, $dia_retiro_pf, 				 $numero_tarjeta, $nombre_cliente, $obs_llamado_1, $obs_llamado_2, $obs_llamado_3, $ultima_gestion, $se_saco_pf, 		
				 $quien, $titular_contactado, $dejar_mensaje, $enviar_carta, $telefono_erroneo, $telefono, $anexo);
	 
	 if($resultado){
	 	echo "1";
	 }
	 else{
	 	echo "No se pudo guardar, vuelva a intentar";
	 
	 }
 
	
	 }
	else { echo strip_tags(validation_errors()); }

	
	}
	
	
	function exportar_registros()
	{
	
	$this->load->model('Registro_modelo');
	$data['registro'] 	= $this->Registro_modelo->get_registros('exportar');
	
	$this->load->view('vista_exportar_registros',$data);
	}
	
	
	
	function buscar_registros()
	{
	
	$columna_a_buscar = $this->input->post('columna_a_buscar');
	$valor_a_buscar = $this->input->post('valor_a_buscar');
	
	$this->form_validation->set_rules('columna_a_buscar', 'Columna a buscar', 'is_natural_no_zero');
	$this->form_validation->set_rules('valor_a_buscar', 'Valor a buscar', 'required');
	
	//corre validacion
	$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
	$this->form_validation->set_message('required', 'Debe ingresar valor de busqueda');
	
	$success = $this->form_validation->run();
	
	
	$this->load->model('Registro_modelo');
	$data['registro'] 	= $this->Registro_modelo->buscar_registros($columna_a_buscar,$valor_a_buscar);
	
	
	if ($success) { 
		$this->load->view('vista_listar_registros',$data);
	 }
	
	else {
	echo strip_tags(validation_errors()); 
	}
	
	
	
	}
	
	 
	
}


