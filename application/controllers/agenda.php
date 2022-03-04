<?php
class Agenda extends CI_Controller {
    	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		echo "imposible acceder directamente a este controlador";
	}
	
	
	
	function form_crear_agenda()
	{
		$data["id_gestion"] = $this->uri->segment(3);
		$data["horas"] = array(
                   '08'  => '08',
                   '09'  => '09',
				   '10'  => '10',
				   '11'  => '11',
				   '12'  => '12',
				   '13'  => '13',
				   '14'  => '14',
				   '15'  => '15',
				   '16'  => '16',
				   '17'  => '17',
				   '18'  => '18',
				   '19'  => '19',
				   '20'  => '20',
				   '21'  => '21',
				   '22'  => '22',
				   '23'  => '23'  
               );
		$data["minutos"] = array(
                   '00'  => '00',
                   '15'  => '15',
				   '30'  => '30',
				   '45'  => '45'
               );
			   
			   
			   
		$this->load->view('vista_crear_agenda', $data);
	}
 	
	
	
	function ingresar_val_direccion(){
		//reglas
		$id_direccion = $this->input->post('id_direccion');
		$id_clasificacion = $this->input->post('id_clasificacion');
		$id_tipificacion = $this->input->post('id_tipificacion');
		
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('id_clasificacion', 'Clasificacion', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('id_tipificacion', 'Tipificacion', 'required|is_natural_no_zero');
		
		
		//corre validacion
		$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
		$success = $this->form_validation->run();
		

 
		//comprueba resultados 
		if ($success) { 
		$this->load->model('Direccion_modelo');
		$resultado =  $this->Direccion_modelo->set_calificacion($id_direccion,$id_clasificacion,$id_tipificacion);

				echo "1";

		}
		else { echo strip_tags(validation_errors()); }  

}


/*********************************/
/* MODULO DE TRATAMIENTO DE AGENDAMIENTOS

- re agendamiento (fecha)
- asignacion de agendamientos a otro agente que pertenezca a la lista
- liberacion de agendamiento (hacerlos publicos)

 */

function form_agendamiento_agente_gestion()
	{
		$this->load->model('Agenda_modelo');
		$this->load->model('Usuario_gestion_modelo');
		$data["id_usuario"] = $this->uri->segment(3);
		$id_usuario = $data["id_usuario"];
		$data['nombre_agente'] = $this->Usuario_gestion_modelo->get_nombre_usuario_gestion($id_usuario);
		$id_campana = $this->session->userdata('campana_id_campana');
		$data["horas"] = array(
                   
                   '09'  => '09',
				   '10'  => '10',
				   '11'  => '11',
				   '12'  => '12',
				   '13'  => '13',
				   '14'  => '14',
				   '15'  => '15',
				   '16'  => '16',
				   '17'  => '17',
				   '18'  => '18',
				   '19'  => '19',
				   '20'  => '20'
				   
               );
		$data["minutos"] = array(
                   '00'  => '00',
                   '15'  => '15',
				   '30'  => '30',
				   '45'  => '45'
               );
			   		   
		$data["agendamientos"] = $this->Agenda_modelo->get_agendamiento_usuario($id_campana,$id_usuario);	   
		$this->load->view('vista_listar_agendamiento_agente_gestion.php', $data);
		

		
	}
 	


	function set_agendamiento_publico_gestion()
	{
		
		//arreglo
		$agendamientos = $this->input->post('agendamientos');
		$id_usuario = $this->input->post('id_usuario');
		$id_campana = $this->session->userdata('campana_id_campana');
		$id_supervisor = $this->session->userdata('id_usuario');
		
		$agendamientos_comma_separated = implode(",", $agendamientos);
		$this->load->model('Agenda_modelo');
		$res = $this->Agenda_modelo->set_agendamiento_publico_gestion($agendamientos_comma_separated,$id_usuario, $id_campana, $id_supervisor);	   
		echo "Se ha realizado la operacion, $res registros fueron afectados."; //retorna el data 
		
		//print_r($agendamientos);
		
	}

	function set_fecha_agendamiento_gestion()
	{		
		//arreglo
		$agendamientos = $this->input->post('agendamientos');
		$id_usuario = $this->input->post('id_usuario');
		$fecha = $this->input->post('fecha');
		$hora = $this->input->post('hora');
		$minuto = $this->input->post('minuto');
		$fecha_agendada = $fecha." ".$hora.":".$minuto.":".'00';
		$id_campana = $this->session->userdata('campana_id_campana');
		$id_supervisor = $this->session->userdata('id_usuario');
		
		$agendamientos_comma_separated = implode(",", $agendamientos);
		$this->load->model('Agenda_modelo');
		$res = $this->Agenda_modelo->set_fecha_agendamiento_gestion($agendamientos_comma_separated, $id_usuario, $fecha_agendada, $id_campana, $id_supervisor);	   
		echo "Se ha realizado la operacion, $res registros fueron afectados."; //retorna el data 
		//print_r($agendamientos);
		
	}
	
	function form_asignar_otro_usuario_agenda_gestion()
	{
		$campana = $this->session->userdata('campana');
		$empresa = $this->session->userdata('empresa');
		$agendamientos = $this->input->post('agendamientos');
		$id_usuario = $this->input->post('id_usuario');
		$this->load->model('Agenda_modelo');
		
		$agendamientos_comma_separated = implode(",", $agendamientos);
		
		
		$data['usuarios'] = $this->Agenda_modelo->get_usuarios_misma_lista_gestion($campana , $empresa, $agendamientos_comma_separated, $id_usuario);
		$data['id_usuario'] = $id_usuario;
		$this->load->view('vista_asignar_otro_usuario_agenda_gestion.php',$data);
		
		
		//echo "asdasdasdasdasdasdas334343";
	}

	function asignar_otro_usuario_agenda_gestion()
		{
			$id_campana = $this->session->userdata('campana_id_campana');
			$id_supervisor = $this->session->userdata('id_usuario');
			$agendamientos = $this->input->post('agendamientos');
			$id_usuario = $this->input->post('id_usuario');
			$id_usuario_destino = $this->input->post('id_usuario_destino');
			$this->load->model('Agenda_modelo');
			
			$agendamientos_comma_separated = implode(",", $agendamientos);
			
			
			$res = $this->Agenda_modelo->asignar_otro_usuario_agenda_gestion($agendamientos_comma_separated, $id_usuario, $id_usuario_destino,$id_campana, $id_supervisor);
			echo "Se ha realizado la operacion, $res registros fueron afectados."; //retorna el data 
			
		}
		
		
	function form_agendamiento_por_lista_gestion()
	{
		$this->load->model('Lista_gestion_modelo');
		 
		$campana = $this->session->userdata('campana');
		$data['listas'] = $this->Lista_gestion_modelo->get_agendamiento_lista_campana($campana);
		$this->load->view('vista_agendamiento_por_lista_gestion.php',$data);			 
	}
	
	function form_agendamiento_por_usuario_gestion()
	{
		$this->load->model('Agenda_modelo');
		 
		$campana = $this->session->userdata('campana');
		$data['usuarios'] = $this->Agenda_modelo->get_agendamiento_usuario_campana($campana);
		$this->load->view('vista_agendamiento_por_usuario_gestion',$data);
 
	}
		
		
		
		
 

}
?>

