<?php
class Venta extends CI_Controller {
    	function __construct()
	{
		parent::__construct();
		$this->load->model('Venta_modelo');
		$this->load->model('lista_gestion_modelo','lista');
	}
	
	function index()
	{
		echo "imposible acceder directamente a este controlador";
	}
	function get_resumen_mensual_campana_mkt(){
		date_default_timezone_set("America/Santiago");
		list($anio, $mes, $dia) = explode("-",date( "Y-m-d",time()));
		
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		
		$anio_actual = $this->input->post('anio_actual');
		$mes_actual = $this->input->post('mes_actual');
		
		if($anio_actual == ''){
			$anio_actual=$anio;
		}
		if($mes_actual == ''){
			$mes_actual=$mes;
		}
		$todo = $anio_actual.$mes_actual;
		$anio_mes = $anio_actual."-".$mes_actual;
		//echo $id_campana.",".$tipo_campana.",".$todo;
		//exit;
		$query =  $this->Venta_modelo->get_resumen_mensual_campana_mkt($id_campana, $tipo_campana, $todo);
		//echo $query;
		//exit;
		$data["ventas"] =  $query->result();
		$data["todo"] = $todo;
		$data["anio_mes"] = $anio_mes;
		$data["anio_actual"] = $anio_actual;
		$data["mes_actual"] = $mes_actual;
		//print_r($data);
		$this->load->view('calidad/vista_div_resumen_mensual_campana_mkt',$data);
	}
	function traer_resumen_auditoria_mensual_campana_mkt(){
		date_default_timezone_set("America/Santiago");
		list($anio, $mes, $dia) = explode("-",date( "Y-m-d",time()));
		
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		
		$anio_actual = $this->input->post('anio_actual');
		$mes_actual = $this->input->post('mes_actual');
		
		if($anio_actual == ''){
			$anio_actual=$anio;
		}
		if($mes_actual == ''){
			$mes_actual=$mes;
		}
		$todo = $anio_actual.$mes_actual;
		$anio_mes = $anio_actual."-".$mes_actual;
		//echo $id_campana.",".$tipo_campana.",".$todo;
		//exit;
		$query =  $this->Venta_modelo->get_resumen_auditoria_mensual_campana_mkt($id_campana, $tipo_campana, $todo);
		
		//echo $query;
		//exit;
		$data["ventas"] =  $query->result();
		$data["todo"] = $todo;
		$data["anio_mes"] = $anio_mes;
		$data["anio_actual"] = $anio_actual;
		$data["mes_actual"] = $mes_actual;
		//print_r($data);
		$this->load->view('calidad/vista_div_resumen_auditoria_mensual_campana_mkt',$data);
		//*/
	}
	function mostrar_detalle_por_dia(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$todo = $this->input->post('todo');
		$tipo_calificacion = $this->input->post('tipo_calificacion');
		$query =  $this->Venta_modelo->get_resumen_diario_campana_mkt($id_campana, $tipo_campana, $todo,$tipo_calificacion);
		$data["ventas"] =  $query->result();
		$data["todo"] = $todo;
		$data["tipo_calificacion"] = $tipo_calificacion;
		//print_r($data);
		$this->load->view('calidad/vista_div_resumen_diario_campana_mkt',$data);
	}
	function mostrar_detalle_auditoria_por_dia(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$todo = $this->input->post('todo');
		$id_usuario_calificacion = $this->input->post('id_usuario_calificacion');
		$agente_auditor = $this->input->post('agente_auditor');
		
		$query =  $this->Venta_modelo->get_resumen_auditoria_diario_campana_mkt($id_campana, $tipo_campana, $todo,$id_usuario_calificacion);
		$data["ventas"] =  $query->result();
		$data["todo"] = $todo;
		$data["id_usuario_calificacion"] = $id_usuario_calificacion;
		$data["agente_auditor"] = $agente_auditor;
		//print_r($data);
		$this->load->view('calidad/vista_div_resumen_auditoria_diario_campana_mkt',$data);
	}
	function mostrar_detalle_del_dia(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$dia = $this->input->post('dia');
		$dia_tmp = str_replace("-", "", $dia);
		$tipo_calificacion = $this->input->post('tipo_calificacion');
		
		$query =  $this->Venta_modelo->mostrar_detalle_del_dia($id_campana, $tipo_campana, $dia_tmp,$tipo_calificacion);
		
		//echo $query;
		$data["ventas"] =  $query->result();
		$data["dia"] = $dia;
		$data["tipo_calificacion"] = $tipo_calificacion;
		//print_r($data);
		$this->load->view('calidad/vista_div_detalle_auditoria_diaria_ventas_campana_mkt',$data);
		//*/
	}
	function mostrar_detalle_auditoria_del_dia(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$dia = $this->input->post('dia');
		$dia_tmp = str_replace("-", "", $dia);
		$id_usuario_calificacion = $this->input->post('id_usuario_calificacion');
		$agente_auditor = $this->input->post('agente_auditor');
		
		$query =  $this->Venta_modelo->mostrar_detalle_auditoria_del_dia($id_campana, $tipo_campana, $dia_tmp,$id_usuario_calificacion);
		//echo $query;
		$data["ventas"] =  $query->result();
		$data["dia"] = $dia;
		$data["id_usuario_calificacion"] = $id_usuario_calificacion;
		$date["agente_auditor"] = $agente_auditor;
		//$date["tipo_calificacion"] = $agente_auditor;
		
		
		//print_r($data);
		$this->load->view('calidad/vista_div_detalle_auditoria_diaria_ventas_campana_mkt',$data);
		//*/
	}
	function get_buscar_venta_mensual_campana_mkt(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$data['listas_no_terminadas'] = $this->lista->get_listas_no_terminadas($id_campana);
		$this->load->view('calidad/vista_div_ventas_mkt',$data);
	}
	function buscar_gestion_o_venta(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$fecha = $this->input->post('fecha');
		$rut = $this->input->post('rut');
		$tipo_gestion = $this->input->post('tipo_gestion');
		$tipo_calificacion = $this->input->post('tipo_calificacion');
		$anexo = $this->input->post('anexo');
		$lista_a_buscar = $this->input->post('lista_a_buscar');
		$ejecutivo = $this->input->post('ejecutivo');
		
		$fecha_tmp = str_replace("-", "", $fecha);
		
		$query =  $this->Venta_modelo->buscar_gestion_o_venta($id_campana, $tipo_campana, $fecha_tmp, $rut, $tipo_gestion, $tipo_calificacion, $anexo, $lista_a_buscar, $ejecutivo);
		//echo "$id_campana, $tipo_campana, $fecha_tmp, $rut, $tipo_gestion, $tipo_calificacion, $anexo, $lista_a_buscar, $ejecutivo";
		
		$data["ventas"] =  $query->result();
		$data["dia"] = $fecha;
		$data["tipo_calificacion"] = $tipo_calificacion;
		$data["rut"] = $rut;
		$data["anexo"] = $anexo;
		$data["lista_a_buscar"] = $lista_a_buscar;
		$data["ejecutivo"] = $ejecutivo;
		
		//print_r($data);
		$this->load->view('calidad/vista_div_detalle_diario_ventas_campana_mkt',$data);
		//*/
	}
	function set_califica_venta(){
   		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$id_usuario_califica = $this->session->userdata('id_usuario');
		
   		$calificacion_auditoria = $this->input->post('calificacion_auditoria');
   		$observacion_calificacion_auditoria = $this->input->post('observacion_calificacion_auditoria');
   		$id_gestion = $this->input->post('id_gestion');
		$id_cliente = $this->input->post('id_cliente');
   		$id_nivel4 = $this->input->post('id_nivel4');
		
		//$id = $this->Venta_modelo->califica_venta($id_gestion,$tipo_campana,$id_campana,$calificacion_auditoria, $observacion_calificacion_auditoria,$id_usuario_califica);
		//echo $id_gestion.", ".$id_cliente.",".$tipo_campana.", ".$id_campana.", ".$id_sub_respuesta.", ".$id_usuario_califica.", ".$calificacion_auditoria.", ".$observacion_calificacion_auditoria;
		//exit;
		$ok = "retorno masmm";
		//$campanas   = array(1,10,14,20);
		if($calificacion_auditoria == 1){
			$ok = $this->Venta_modelo->crea_ventas_mkt(0, $id_gestion, $id_cliente, $tipo_campana, $id_campana,$id_nivel4, $id_usuario_califica, $calificacion_auditoria, $observacion_calificacion_auditoria);
		}
		if($calificacion_auditoria == 2){
			$ok = $this->Venta_modelo->libera_ventas_mkt($id_gestion, $id_cliente, $tipo_campana, $id_campana, $id_usuario_califica, $calificacion_auditoria, $observacion_calificacion_auditoria);
		}
		echo $ok;
	}
	function set_modifica_calificacion_venta(){
		$id_campana = $this->session->userdata('campana_id_campana');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$id_gestion = $this->input->post('id_gestion');
		$id_cliente = $this->input->post('id_cliente');
		$id_lista = $this->input->post('id_lista');
		
		$ok = $this->Venta_modelo->set_modifica_calificacion_venta($id_gestion, $id_cliente, $id_lista, $tipo_campana, $id_campana);
		echo $ok;
	}
}
?>

