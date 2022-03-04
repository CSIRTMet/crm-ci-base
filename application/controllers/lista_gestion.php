<?php

class Lista_gestion extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('gestion');
		$this->load->model('lista_gestion_modelo','lista');
		// descomentar parte de abajo una vez puesto en produccion y haya un link para acceder a este controlador
		
		 if(!is_supervisor_logged($this->session->userdata('is_logged_in'),$this->session->userdata('tipo_usuario'))){
			redirect(base_url().'index.php/usuario/logout', 'refresh');
		}
		if(!is_campana_set($this->session->userdata('campana'))){
			redirect(base_url().'index.php/campana_gestion/index', 'refresh');
		} 
	}
	
	function index()
	{
		$data = $this->form_listar_lista_gestion();
		//$this->load->view('vista_listar_lista_gestion',$data);
	}
	

	function form_listar_lista_gestion()
	{
		$campana = $this->session->userdata('campana');
		$data['listas'] = $this->lista->get_listas_campana($campana);
		$this->load->view('vista_listar_lista_gestion',$data);
	}
		
	function form_listar_usuario_lista_gestion($campana,$id_lista)
	{
		
		$campana = $this->session->userdata('campana');
		$data["lista"] =  $this->lista->get_lista($id_lista);
		$data['usuarios_lista'] = $this->lista->get_usuarios_lista($id_lista);
		$data['usuarios_no_lista'] = $this->lista->get_usuarios_not_lista($campana,$id_lista);

		$this->load->view('vista_listar_usuario_lista_gestion',$data);
	}
	
	
	
	
	
	
	function get_agendamiento_lista_gestion(){  
	   $id_lista =  $this->input->get_post("id_lista");
	   $valor = $this->lista->get_agendamiento_lista_gestion($id_lista);
	   echo $valor;
	}
	
	function get_pendientes_lista_gestion(){  
	   $id_lista =  $this->input->get_post("id_lista");
	   $valor = $this->lista->get_pendientes_lista_gestion($id_lista);
	   echo $valor;
	}
	function get_terminados_lista_gestion(){  
	   $id_lista =  $this->input->get_post("id_lista");
	   $valor = $this->lista->get_terminados_lista_gestion($id_lista);
	   echo $valor;
	}
	function get_barridos_mes_lista_gestion(){  
	   $id_lista =  $this->input->get_post("id_lista");
	   $id_campana = $this->session->userdata('campana');
	   $valor = $this->lista->get_barridos_mes_lista_gestion($id_lista, $id_campana);
	   echo $valor;
	}
	
	
	
	
	
	function form_crear_lista_gestion()
	{
		$this->load->view('vista_crear_lista_gestion');
	}
	
	function crear_lista_gestion()
	{
		$config = array(
		       array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre de Lista',
		             'rules'   => 'required|max_length[50]'
		          ),
			   array(
		             'field'   => 'numero_gestiones',
		             'label'   => 'Numero de gestiones',
		             'rules'   => 'required|is_natural_no_zero'
		          ),
		       array(
		             'field'   => 'id_campana',
		             'label'   => 'Campaña',
		             'rules'   => 'required|is_natural_no_zero'
		          ));
		$this->form_validation->set_rules($config);
		
		$data['id_campana'] = $this->input->get_post("id_campana");
		$data['nombre'] = $this->input->get_post("nombre");
		$data['numero_gestiones'] = $this->input->get_post("numero_gestiones");
		$data['total_registros'] = 0;
		$data['estado_lista'] = 0;
		
		if($this->form_validation->run() == TRUE){
			$this->lista->add_lista($data);
			$this->form_listar_lista_gestion();
			echo '<body onload="opener.location.reload(); window.close();"></body>';
			
			//redirect(base_url().'index.php/lista_gestion/form_listar_lista_gestion', 'refresh');
		}
		else{
			$data['msg'] = "Lista no pudo ser creada..."; 
			$this->load->view('vista_crear_lista_gestion',$data);
		}
	}
	
	function form_asignar_usuario_lista()
	{
		$campana = $this->session->userdata('campana');
		$data['usuarios'] = $this->lista->get_usuarios_not_lista($campana);
		$this->load->view('vista_asignar_usuarios_lista_gestion',$data);
	}
	
	function asignar_usuario_lista_gestion()
	{
		
		$lista = $this->input->get_post("id_lista");
		$campana = $this->session->userdata('campana');
		$usuarios = $this->input->get_post("usuarios");
		if($this->form_validation->is_natural_no_zero($lista))
		{
			
			$this->lista->del_usuarios_lista($lista);
			if($usuarios != ""){
				foreach($usuarios as $usuario)
				{ 
					$this->lista->add_usuario_lista($lista,$usuario);
				}
			}
			
			
			
		
		}
	}
	
	function borrar_lista($id)
	{
		$this->lista->del_lista($id);
		redirect(base_url().'index.php/lista_gestion/index', 'refresh');
	}
	
	
	/////////////////////////////////// funciones para ejecutar el extractor y filtrado de listas //////////////////////////////////////////
	
	function form_crear_filtro_lista_gestion($campana,$id_lista)
	{
		//$campana = $this->session->userdata('campana');  al agregar esta linea borrar el parametro de entrada
		$this->lista->create_view_campana($campana);
		$this->load->library('consulta');
		$consulta = new Consulta();
		$consulta->addSources("vista_cliente_".$campana); 
		$fields = $this->lista->get_fields_type_view($campana);
		
		foreach($fields as $field){
			$consulta->addFields($field->Field);
		}
		$this->session->set_userdata('consulta',serialize($consulta));
		$this->session->set_userdata('valueParentesis','');
		
		$data['listas'] = $this->lista->get_lista_result($id_lista);
		$this->load->view('vista_crear_filtro_lista_gestion',$data);
	}
		/////////////////////////////////// funciones para ejecutar el segmentador de listas //////////////////////////////////////////
	
	
	function form_segmentacion_rapida_lista_gestion($campana,$id_lista)
	{
		$tipo_campana = $this->session->userdata('tipo_campana'); 
		//echo "$campana,$id_lista $tipo_campana";
		$data['listas'] = $this->lista->get_lista_extendido_result($id_lista, $tipo_campana);
		$this->load->view('vista_segmentador_rapido_lista_gestion',$data);
	}


	function form_editor_segmentador_lista_gestion($campana,$id_lista)
	{
		$tipo_campana = $this->session->userdata('campana_tipo_campana'); 
		$this->lista->crear_tabla_segmentacion_online($id_lista, $tipo_campana);
		$this->load->library('consulta');
		$consulta = new Consulta();
		$consulta->addSources("tmp_segmentacion_lista_".$id_lista); 
		$fields = $this->lista->get_fields_type_table_segmentacion($id_lista);
		 
		
		foreach($fields as $field){
			$consulta->addFields($field->Field);
		}
		$this->session->set_userdata('consulta',serialize($consulta));
		$this->session->set_userdata('valueParentesis','');
		
		$data['listas'] = $this->lista->get_lista_result($id_lista);
		$data['id_lista'] = $id_lista;
		$data['estado_lista'] = $this->lista->get_estado_lista($id_lista);
		$this->load->view('vista_editor_segmentacion_lista_gestion',$data);
	}
	
	function segmentar_rapido_lista_gestion()
	{

		$id_lista = $this->input->get_post("id_lista");
		$tipo_campana = $this->session->userdata('campana_tipo_campana'); 
		$sin_gestion = $this->input->get_post("sin_gestion");
		$agendamiento_privado = $this->input->get_post("agendamiento_privado");
		$agendamiento_publico = $this->input->get_post("agendamiento_publico");
		$pendiente = $this->input->get_post("pendiente");
		
	
	 	if(!$sin_gestion) $sin_gestion=0;
		if(!$agendamiento_privado) $agendamiento_privado=0;
		if(!$agendamiento_publico) $agendamiento_publico=0;
		if(!$pendiente) $pendiente=0;
		 
		
 		$vector_estado_registro= "100"; 
		
		if($sin_gestion==1) $vector_estado_registro  =$vector_estado_registro.","."0";
		if($agendamiento_privado==1) $vector_estado_registro = $vector_estado_registro.","."1";
		if($agendamiento_publico==1) $vector_estado_registro = $vector_estado_registro.","."2";
		if($pendiente==1) $vector_estado_registro = $vector_estado_registro.","."3";
 		//echo "sin_gestion: $sin_gestion agendamiento_privado $agendamiento_privado agendamiento_publico $agendamiento_publico pendiente $pendiente  vector_estado_registro $vector_estado_registro"; 
 
		$data['resultado'] = $this->lista->set_segmentacion_rapida_lista($id_lista,$sin_gestion,$agendamiento_privado,$agendamiento_publico,$pendiente, $vector_estado_registro);


		$data['listas'] = $this->lista->get_lista_extendido_result($id_lista, $tipo_campana);
		$this->load->view('vista_segmentador_rapido_lista_gestion',$data);	
		
	}
	
	function ajax_lista_usuarios($lista,$campana)
	{
		$data['usuarios_lista'] = $this->lista->get_usuarios_lista($lista);
		$data['usuarios_no_lista'] = $this->lista->get_usuarios_not_lista($campana,$lista);
		$this->load->view('ajax_lista/ajax_lista_usuarios',$data);
	}
	
	function ajax_lista_condiciones()
	{
		$this->load->library('consulta');
		$consulta = unserialize($this->session->userdata('consulta'));
		
		$data["lst_condiciones"] = $consulta->getConditions();
		$data["lst_andOr"] = $consulta->getAndor();
		$data["valueParentesis"] = str_split($consulta->getValueParentesis());
		$data["valParentesis"] = 0;
		$data["indice"] = 0;
		
		$this->load->view('ajax_lista/ajax_lista_condiciones',$data);
	}
	
	function form_procesar_lista()
	{
		$this->load->library('consulta');
		$rows = 0;
		$config = array(
		       array(
		             'field'   => 'lista',
		             'label'   => 'Lista',
		             'rules'   => 'required|is_natural_no_zero'
		          ),
			   array(
		             'field'   => 'campana',
		             'label'   => 'Campaña',
		             'rules'   => 'required|is_natural_no_zero'
		          ));
		$this->form_validation->set_rules($config);
	
		$lista = $this->input->get_post("lista");
		$campana = $this->input->get_post("campana");
		$tipo_campana = $this->session->userdata('campana_tipo');
		
		if($this->form_validation->run() == FALSE)
		{
			echo "No ha seleccionado lista.";
		}
		else{
			$registro = $this->lista->get_lista($lista);
		
			//if($registro->total_registros==0){
				$consulta = unserialize($this->session->userdata('consulta'));
				$condicion = $consulta->get_String_Conditions();
				//$this->lista->clean_lista_cliente($lista,$tipo_campana);
				$rows = $this->lista->procesing_list($lista,$campana,$condicion,$tipo_campana );
			    echo $rows;
				redirect('lista_gestion/index','refresh');
			//}
		}
	}
	
	function form_procesar_segmentacion_lista()
	{
		$this->load->library('consulta');
		$rows = 0;
		$config = array(
		      
		       array(
		             'field'   => 'lista',
		             'label'   => 'Lista',
		             'rules'   => 'required|is_natural_no_zero'
		          ),
			   array(
		             'field'   => 'campana',
		             'label'   => 'Campaña',
		             'rules'   => 'required|is_natural_no_zero'
		          ));
		$this->form_validation->set_rules($config);
		
		$lista = $this->input->get_post("lista");
		$campana = $this->input->get_post("campana");
		$tipo_campana = $this->session->userdata('campana_tipo');
		
		if($this->form_validation->run() == FALSE)
		{
			echo "no válido";
		}
		else{
			$registro = $this->lista->get_lista($lista);
			$consulta = unserialize($this->session->userdata('consulta'));
			$condicion = $consulta->get_String_Conditions();
			$rows = $this->lista->procesing_list_segmentacion($lista,$campana,$condicion,$tipo_campana );

			echo $rows;
			redirect('lista_gestion/index','refresh');
		}
	}
	
	
	
	
	
	function form_procesar_reseteo_segmentacion_lista()
	{
		 
		$lista = $this->input->get_post("id_lista"); 
		$tipo_campana = $this->session->userdata('campana_tipo');

		 
			$rows = $this->lista->procesing_list_reseteo_segmentacion($lista,$tipo_campana);

			echo $rows;
			redirect('lista_gestion/index','refresh');
		 
	}
	
	
	function desplegar_valor_condiciones_filtro()
	{
	
	$operacion = $this->input->get_post("operacion");
	switch($operacion)	{
		
	
	case 'estado_registro':	
							$options = array(
										  '0'  => 'Sin gestion',
										  '1'    => 'Agendamiento privado',
										  '2'   => 'Agendamiento publico',
										  '3' => 'Pendiente',
										  '4' => 'Terminado',
										);
							break;
	
	case 'ultima_gestion':	
					
							$this->load->model('Sub_respuesta_modelo');
							$options = $this->Sub_respuesta_modelo->llenar_dropdown();
							break;
	case 'mejor_gestion':	
					
							$this->load->model('Sub_respuesta_modelo');
							$options = $this->Sub_respuesta_modelo->llenar_dropdown();
							break;
	
	}
	
	$js = 'id="valor"';
	echo form_dropdown('valor', $options, '1', $js);
			
		
		
	}
	

	
	function open_popup_condiciones($campana)
	{
		$data['vista'] = 'vista_cliente_'.$campana;
		$data['campana'] = $campana;
		$data['lista']  = 0;
		$data['modulo']  = 'filtro_inicial';
		$data['fields'] = $this->lista->get_fields_type_view($campana);
		$this->load->view('ajax_lista/condiciones.php',$data);
	}
	
	function open_popup_condiciones_segmentador($lista)
	{
		$data['vista']  = 'tmp_segmentacion_lista_'.$lista;
		$data['lista']  = $lista;
		$data['modulo']  = 'segmentador';
		$data['campana']= $this->session->userdata('campana_id_campana');
		$data['fields'] = $this->lista->get_fields_type_table_segmentacion($lista);
		$this->load->view('ajax_lista/condiciones_segmentador.php',$data);
	}
	
	function add_condiciones()
	{
		$this->load->library('consulta');
		$config = array(
				array(
		             'field'   => 'oRadio',
		             'label'   => 'Operador',
		             'rules'   => 'required'
		          ),
				array(
		             'field'   => 'columna',
		             'label'   => 'Columna',
		             'rules'   => 'required'
		          ),
				array(
		             'field'   => 'campana',
		             'label'   => 'Campaña',
		             'rules'   => 'required|is_natural_no_zero'
		          ),
				array(
		             'field'   => 'condicion',
		             'label'   => 'Condicion',
		             'rules'   => 'required'
		        ));
		$this->form_validation->set_rules($config);
		$campana = $this->input->get_post("campana");
		$oradio = $this->input->get_post("oRadio");
		$columna = $this->input->get_post("columna");
		$condicion = $this->input->get_post("condicion");
		$texto = $this->input->get_post("valor");
		$fecha = $this->input->get_post("fecha");
		
		$lista = $this->input->get_post("lista");
		$modulo = $this->input->get_post("modulo");
		
		
		//echo "columna $columna  ; oradio $oradio; condicion $condicion; texto $texto; fecha $fecha" ;
		
		
		if($this->form_validation->run() == FALSE){
			if( $modulo == 'filtro_inicial')
			{
				$this->open_popup_condiciones($campana);
			}
			else //modulo segmentador
			{
				$this->open_popup_condiciones_segmentador($lista);
			}
				
				
		}
		else{
			$sentencia = "";
			$campo_tipo = array();
			$fecha_enviada = array();
			$campo_tipo = preg_split('/\//i', $columna); // split("/",$columna);
			$fecha_enviada =  preg_split('/\//i', $fecha); //split("/",$fecha);
			//print_r($campo_tipo);
			
			
			if($this->form_validation->required($fecha)){
				$parametro="DATE_FORMAT(".$campo_tipo[1].",'%Y%m%d') ";
				$valor=$fecha_enviada[2].$fecha_enviada[1].$fecha_enviada[0];
			}
			else{
				$parametro=$campo_tipo[1];
				$valor=$texto;
			}
			
			if($condicion == 'LIKE'){
				$sentencia = $parametro." like '%".$valor."%' ";
			}
			else{
				if($condicion == 'IGUAL'){
					$sentencia = $parametro." = '".$valor."' ";
				}else{
					if($condicion == 'DISTINTO'){
						$sentencia = $parametro." <> '".$valor."' ";
					}else{
						if($condicion == 'MAY_O_IGUAL'){
							$sentencia = $parametro." >= '".$valor."' ";
						}else{
							if($condicion == 'MEN_O_IGUAL'){
								$sentencia = $parametro." <= '".$valor."' ";
							}else{
								if($condicion == 'MAY'){
									$sentencia = $parametro." > '".$valor."' ";
								}else{
									if($condicion == 'MEN'){
										$sentencia = $parametro." < '".$valor."' ";
									}else{
										if($condicion == 'COM_CON'){
											$sentencia = $parametro." like '".$valor."%' ";
										}else{
											if($condicion == 'TER_CON'){
												$sentencia = $parametro." like '%".$valor."' ";
											}else{
												if($condicion == 'NO_COM_CON'){
													$sentencia = $parametro." not like '".$valor."%' ";
												}else{
													if($condicion == 'NO_TER_CON'){
														$sentencia = $parametro." not like '%".$valor."' ";
													}else{
														if($condicion == 'NO_LIKE'){
															$sentencia = $parametro." not like '%".$valor."%' ";
														}else{
															if($condicion == 'AGRUPA'){
																$sentencia = $parametro." in ( '".$valor."') ";
															}
														}
													}
												}		
											}
										}
									}
								}
							}
						}
					}
				}	
			}
			$consulta = unserialize($this->session->userdata('consulta'));
			$consulta->addConditions($sentencia);
			$consulta->addAndOr($oradio);
			$this->session->set_userdata('consulta',serialize($consulta)); 
		}
		echo '<body onload="opener.ViewConditions();window.close();"></body>';
	}
	
	function del_condiciones($id)
	{
		$this->load->library('consulta');
		$consulta = unserialize($this->session->userdata('consulta'));
		$consulta->delConditions($id);
		$this->session->set_userdata('consulta',serialize($consulta)); 
	}
	
	function del_and_or($id)
	{
		$this->load->library('consulta');
		$consulta = unserialize($this->session->userdata('consulta'));
		$consulta->delAndOr($id);
		$this->session->set_userdata('consulta',serialize($consulta)); 
	}
	
	function add_parentesis($parentesis)
	{
		$this->load->library('consulta');
		$consulta = unserialize($this->session->userdata('consulta'));
		$consulta->addValueParentesis($parentesis);
		$this->session->set_userdata('consulta',serialize($consulta));
		echo '<body onload="opener.ViewConditions();"></body>';
	}
	
	function load_consulta()
	{
		$this->load->library('consulta');
		$consulta = unserialize($this->session->userdata('consulta'));
		$consulta->loadQuery();
		echo $consulta->getFinalQuery();
	}
	
	function load_preview()
	{
		$this->load->library('consulta');
		$consulta = unserialize($this->session->userdata('consulta'));
		$consulta->loadQuery();
		$sql = $consulta->getFinalQuery();
		$sql = $sql;
		//echo $sql; 
		
		$tipo_campana = $this->session->userdata('campana_tipo');
		$id_campana = $this->session->userdata('campana_id_campana');
		$data["deudas"] = $this->lista->count_deudas($id_campana, $tipo_campana);
		$data["records"] = $this->lista->count_records($sql);
		$data["clientes"] = $this->lista->get_clientes_preview($sql);
		$this->load->view('ajax_lista/preview_filtro',$data);
	}
	

	function load_preview_segmentacion($id_lista)
	{
		$this->load->library('consulta');
		 
		$consulta = unserialize($this->session->userdata('consulta'));
		$consulta->loadQuery();
		$sql = $consulta->getFinalQuery();
		$sql = $sql;
		//echo $sql; 
		
		$tipo_campana = $this->session->userdata('campana_tipo');
		$id_campana = $this->session->userdata('campana_id_campana');
		$data["deudas"] = $this->lista->count_deudas_segmentacion($id_campana, $tipo_campana, $id_lista);
		$data["records"] = $this->lista->count_records($sql);
		
		
		$sql2= preg_replace('/\bultima_gestion\b/i',"(select nombre from sub_respuesta where id_sub_respuesta = ultima_gestion) as ultima_gestion ", $sql,1);
		$sql2= preg_replace('/\bmejor_gestion\b/i',"(select nombre from sub_respuesta where id_sub_respuesta = mejor_gestion) as mejor_gestion ", $sql2,1);
		
		 
		
		$data["clientes"] = $this->lista->get_clientes_preview($sql2);
		$this->load->view('ajax_lista/preview',$data);
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		
		
		
	//reseteo de agendamientos

    function form_resetear_Registros_Agendados_Lista($id_lista)
	{
		
		$campana = $this->session->userdata('campana');
		$data["id_lista"] =  $id_lista;

		$this->load->view('vista_resetear_agendamiento',$data);
	}
	
	function resetear_Registros_Agendados_Lista(){
	
	$this->load->model('lista_gestion_modelo');
	$fecha_inicio_reseteo=$this->input->post('fecha_inicio_reseteo');
	
	if($fecha_inicio_reseteo=="") {
		echo "Debe seleccionar una fecha desde la cual comience el reseteo";
		exit;
	}
	$id_lista=$this->input->post('id_lista');
	$estado_registro=$this->input->post('estado_registro');
	$id_usuario = $this->session->userdata("id_usuario");
	$res = $this->lista_gestion_modelo->resetear_Registros_Agendados_Lista($fecha_inicio_reseteo,$id_lista,$estado_registro);
	echo $res; 
	
	}
	
	
	function consultar_registros_candidatos_agendados_para_resetear(){
	
	$this->load->model('lista_gestion_modelo');
	$fecha_inicio_reseteo=$this->input->post('fecha_inicio_reseteo');
	
	if($fecha_inicio_reseteo=="") {
		echo "Debe seleccionar una fecha desde la cual comience el reseteo";
		exit;
	}
	$id_lista=$this->input->post('id_lista');
	$id_usuario = $this->session->userdata("id_usuario");
	$res = $this->lista_gestion_modelo->consultar_registros_candidatos_agendados_para_resetear($fecha_inicio_reseteo,$id_lista);
	echo $res; 
	
	}	
		
		
		
		
}
?>
	