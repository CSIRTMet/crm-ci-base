<?php
class Consulta_gestion extends CI_Controller {
    	function __construct()
	{
		parent::__construct();
		$this->load->model('Gestion_modelo');
		$this->load->model('Telefono_modelo');
		$this->load->model('Direccion_modelo');
		$this->load->model('Contactabilidad_modelo');
		$this->load->model('Accion_modelo');
		$this->load->model('Cliente_modelo');
		$this->load->model('Email_modelo');
		$this->load->model('lista_gestion_modelo','lista');
		$this->load->model('Email_modelo');
		$this->load->model('Consulta_gestion_modelo');		
	}
	
	function index()
	{
		echo "imposible acceder directamente a este controlador";
	}
	function get_buscar_gestiones_campana_mkt(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$this->load->view('vista_div_gestiones_mkt');
	}
	function buscar_gestion(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		
		$fecha = $this->input->post('fecha');
		$rut = $this->input->post('rut');
		
		$fecha_tmp = str_replace("-", "", $fecha);
		
		$query =  $this->Consulta_gestion_modelo->buscar_gestion($id_campana, $tipo_campana, $fecha_tmp, $rut);
		//echo $query;
		
		$data["gestiones"] =  $query->result();
		$data["dia"] = $fecha;
		$data["rut"] = $rut;
		
		//print_r($data);
		$this->load->view('vista_div_detalle_gestiones_campana_mkt',$data);
		//*/
	}
}
?>

