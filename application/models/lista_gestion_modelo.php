<?php

class Lista_gestion_modelo extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function index()
	{

	}

	function get_listas_campana($campana){
		$sql = "SELECT id_lista, l.nombre, id_campana, total_registros, estado_lista, numero_gestiones, (

SELECT COUNT( * )
FROM lista_deuda ld
WHERE ld.id_lista = l.id_lista
AND ld.id_deuda
IN (

SELECT DISTINCT g.id_deuda
FROM gestion g
WHERE g.id_campana = l.id_campana
AND g.estado_gestion =2
)
) AS barridos,


(segmentacion_sin_gestion + segmentacion_ag_privado + segmentacion_ag_publico + segmentacion_pendiente) as segmentacion_suma

FROM lista l
WHERE l.id_campana = ?";
		$query = $this->db->query($sql,array($campana));
		return $query->result();
	}
	/*Trae todas las listas en estado no terminado de una campa�a en particular*/
	function get_listas_no_terminadas($campana){
		$sql = "select id_lista,nombre
			from lista where estado_lista <> 4 and id_campana = ?";
		$query = $this->db->query($sql,array($campana));
		return $query->result();
	}
	function get_lista_result($id)
	{
		$sql = "select * from lista where id_lista = ?";
		$query = $this->db->query($sql,array($id));
		return $query->result();
	}

		function get_lista_extendido_result($id, $tipo_campana)
	{
		$sql = "select l.*,
		(select count(*) from lista_cliente_mkt where estado_registro = 4 and id_lista = l.id_lista) as terminado,
		(select count(*) from lista_cliente_mkt where estado_registro = 3 and id_lista = l.id_lista) as pendiente,
		(select count(*) from lista_cliente_mkt where estado_registro = 2 and id_lista = l.id_lista) as apublico,
		(select count(*) from lista_cliente_mkt where estado_registro = 1 and id_lista = l.id_lista) as aprivado,
		(select count(*) from lista_cliente_mkt where estado_registro = 0 and id_lista = l.id_lista) as sin_gestion,
		(select count(*) from lista_cliente_mkt where estado_segmentacion = 1 and estado_registro < 4 and id_lista = l.id_lista) as disponible




		 from lista l where l.id_lista = ?";
		$query = $this->db->query($sql,array($id));
		return $query->result();
	}


	function get_lista($id)
	{
		$sql = "select * from lista where id_lista = ?";
		$query = $this->db->query($sql,array($id));
		return $query->row();
	}


	function add_lista($data){
		$this->db->insert('lista',$data);
		return $this->db->insert_id();
	}

	function add_usuario_lista($id_lista,$id_user){
		$data['id_lista'] = $id_lista;
		$data['id_usuario'] = $id_user;
		$this->db->insert('lista_usuario',$data);
	}

	function edit_lista($data){
		$this->db->update('lista',$data,array('id_lista'=>$data['id_lista']));
	}

	function del_lista($id){

		$tipo = $this->session->userdata('campana_tipo');
		if ($tipo == 2) { // MARKETING
		$tables = array('lista_cliente_mkt','lista_usuario','lista');
		}else{
		$tables = array('lista_deuda','lista_usuario','lista');
		}
		$this->db->where('id_lista',$id);
		$this->db->delete($tables);
	}



	function del_usuario_lista($id_user,$lista){
		$this->db->delete('lista_usuario',array('id_usuario'=>$id_user,'id_lista'=>$lista));
	}

	function del_usuarios_lista($lista)
	{
		$this->db->delete('lista_usuario',array('id_lista'=>$lista));
	}


	function resetear_lista($id){

		$tipo = $this->session->userdata('campana_tipo');
		if ($tipo == 2) { // MARKETING
		$tables = array('lista_usuario','lista_cliente_mkt');
		}else{
		$tables = array('lista_deuda','lista_usuario');
		}
		$this->db->where('id_lista',$id);
		$this->db->delete($tables);

		$sql = "update lista set total_registros = 0, estado_lista = 0, script = NULL where id_lista = ".$id;
		$this->db->query($sql);



	}


	function get_usuarios_lista($id_lista){
		$sql = "SELECT * FROM usuario where id_usuario in (select id_usuario from lista_usuario where id_lista = ?)";
		$query = $this->db->query($sql,array($id_lista));
		return $query->result();
	}

	function get_usuarios_not_lista($campana,$lista){

		$sql = "SELECT * FROM usuario where id_usuario in (select id_usuario from campana_usuario where id_campana = ?) and id_usuario not in (select id_usuario from lista_usuario where id_lista = ?)";
		$query = $this->db->query($sql,array($campana,$lista));
		return $query->result();
	}

	function get_fields_type_view($campana){
		$sql = "SHOW COLUMNS FROM vista_cliente_".$campana." WHERE Field NOT LIKE 'id_%' ";
		$query = $this->db->query($sql);
		return $query->result();
	}


	function get_fields_type_table_segmentacion($lista){
		$sql = "SHOW COLUMNS FROM tmp_segmentacion_lista_".$lista." WHERE Field NOT LIKE 'id_%'
		 ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function create_view_campana($campana)
	{
		$db2 = $this->load->database('default2', TRUE);
		$tipo_campana = $this->session->userdata('campana_tipo');
		$db2->query("call crear_vista_cliente(".$db2->escape($campana).",".$tipo_campana." );");
	}
function crear_tabla_segmentacion_online($id_lista, $tipo_campana)
	{
		$db2 = $this->load->database('default2', TRUE);
		$tipo_campana = $this->session->userdata('campana_tipo');
		$db2->query("call crear_tabla_segmentacion_online(".$id_lista.",".$tipo_campana.");");
	}

	function count_records($sql)
	{

		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function count_deudas($id_campana, $tipo_campana)
	{


		if($tipo_campana==1)
		{

		    //TODO :: AGREGAR LAS CONDICIONES
			$query = $this->db->query("select distinct(id_deuda) FROM vista_cliente_".$id_campana." ");
			return $query->num_rows();
		}
		else
		{
		 	return 0;
		}


	}


	//se cuentan los registros de la lista que se va a segmentar.
	function count_deudas_segmentacion($id_campana, $tipo_campana, $id_lista)
	{

		if($tipo_campana==1)
		{

		    //TODO :: AGREGAR LAS CONDICIONES
			$query = $this->db->query("select count(distinct(id_deuda)) as cantidad FROM lista_deuda where id_lista = ".$id_lista." limit 1");
			$row = $query->row();
			return $row->cantidad;
		}
		else
		{
		 	return 0;
		}


	}


	function get_clientes_preview($sql)
	{


		if(preg_match('/\bWHERE\b/', $sql )) // el where que me interes detectar es con mayuscula
			{
			$condicion = " and estado_registro < 4 ";
			}
		else{
			$condicion = " where estado_registro < 4 ";
			}
		$sql = $sql." $condicion limit 12";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function clean_lista_cliente($lista,$tipo_campana )
	{
		if ($tipo_campana  == 2) { // MARKETING
		$this->db->delete('lista_cliente_mkt',array('id_lista'=>$lista));
		}else{
		$this->db->delete('lista_deuda',array('id_lista'=>$lista));
		}

	}

	function procesing_list($lista,$campana,$condicion,$tipo_campana)
	{
		$rows = 0;


	if ($tipo_campana  == 2) { // MARKETING

		$sql = "insert ignore into lista_cliente_mkt(id_lista,id_cliente,estado_registro,estado_actual,usuario_actual,numero_gestiones) ";
		$sql.= "(select ".$lista.",id_cliente,0,0,null,0 from vista_cliente_".$campana." ";
		$sql.= $condicion."  )";

	}else{
		$sql = "insert ignore into lista_deuda(id_lista,id_deuda,id_cliente,estado_registro,estado_actual,usuario_actual,numero_gestiones) ";
		$sql.= "( select distinct ".$lista.",id_deuda,id_cliente,0,0,null,0 from vista_cliente_".$campana." ";

		$sql.= $condicion." order by monto_documento desc ) ";

	}

		//echo $sql;

		//return $sql;

		//exit;
		$this->db->query($sql);
		$rows = $this->db->affected_rows();
		// echo "aaafffff:  ".$this->db->affected_rows();
		//$data["total_registros"] =  $rows;
		//$this->db->update('lista',$data,array('id_lista'=>$lista));
		$sql = "update lista set total_registros = total_registros + ".$rows." where id_lista = ".$lista." ";
		$this->db->query($sql);

		return $rows;

	}




		function procesing_list_segmentacion($lista,$campana,$condicion,$tipo_campana)
	{
		$rows = 0;


	if ($tipo_campana  == 2) { // MARKETING

		$sql = "update lista_cliente_mkt set estado_segmentacion = 0 where id_lista = ".$lista." and id_cliente not in  ";
		$sql.= "( select distinct id_cliente from tmp_segmentacion_lista_".$lista."  ";
		$sql.= $condicion."  ) ";

	}else{
		$sql = "update lista_deuda set estado_segmentacion = 0 where id_lista = ".$lista." and id_deuda not in  ";
		$sql.= "( select distinct id_deuda from tmp_segmentacion_lista_".$lista."  ";

		$sql.= $condicion."  ) ";

	}

		// return $sql;

		$this->db->query($sql);
		$rows = $this->db->affected_rows();

		if($rows > 0){
		$data["estado_lista"] =  2;
		$this->db->update('lista',$data,array('id_lista'=>$lista));
		}

		return $rows;

	}



	function procesing_list_reseteo_segmentacion($lista,$tipo_campana)
	{
		$rows = 0;


	if ($tipo_campana  == 2) { // MARKETING

		$sql = "update lista_cliente_mkt set estado_segmentacion = 1 where id_lista = ".$lista." ";


	}else{
		$sql = "update lista_deuda set estado_segmentacion = 1 where id_lista = ".$lista." ";

	}

		// return $sql;
		// exit;
		$this->db->query($sql);
		$rows = $this->db->affected_rows();

		if($rows > 0){
		$data["estado_lista"] =  1;
		}
		$this->db->update('lista',$data,array('id_lista'=>$lista));
		return $rows;

	}




	function get_lista_activa_del_usuario($usuario, $campana)
	{
	$sql = "select * from lista where id_campana = ".$campana." and id_lista in (select id_lista from lista_usuario where id_usuario = ".$usuario.") ;";
	$query = $this->db->query($sql);
	return $query->result();

	}

	function set_lista_cliente($id_lista,$id_cliente_o_deuda,$id_nivel4,$fecha_agendada,$tipo_agendamiento,$id_usuario,$tipo_campana)
	{
	//clasifico el estado registro:
	/*  0:no recorrido
		1:ag privado
		2:ag publico
		3:pendiente
		4:terminado
	*/
	$accion = 0;
	$this->db->where("id_nivel4",$id_nivel4);
	$nivel4 = $this->db->get("nivel4")->row();
	if(!empty($nivel4))
	{
	  $accion = $nivel4->accion;
	}

	if($accion == 2)
	{
	  $estado_registro =  $tipo_agendamiento; //coinciden los id 1=privado 2=publico
	}
	else if($accion == 3)
	{
	  $estado_registro =  3; //coinciden los id 1=privado 2=publico
	}
	else {$estado_registro = 4; }


	$sql = "
	 update lista_cliente_mkt set estado_registro = ?
	,estado_actual = 0
	,usuario_actual = null
	,numero_gestiones = numero_gestiones + 1
	,fecha_agendada = ?
	,tipo_agendamiento = ?
	,usuario_agendamiento = ?
	,fecha_ultima_gestion = now()
        ,ultima_gestion = ?
	 where id_lista = ? and id_cliente = ? LIMIT 1; ";


	$res = $this->db->query($sql, array($estado_registro, $fecha_agendada,$tipo_agendamiento,$id_usuario,$id_nivel4, $id_lista,$id_cliente_o_deuda));


	return $res; //$res;
	}




function get_estado_lista($id)
	{
		$sql = "select estado_lista from lista where id_lista = ?";
		$query = $this->db->query($sql,array($id));
		$row = $query->row();
		return $row->estado_lista;

	}
	function set_segmentacion_rapida_lista($id_lista,$sin_gestion,$agendamiento_privado,$agendamiento_publico,$pendiente,$vector_estado_registro)
	{
		//sirve para segmentar rapidamente por estado_registro.
		//$this->db->trans_begin();

		$sql1 ="update lista set segmentacion_sin_gestion =  ?,
								 segmentacion_ag_privado = ? ,
								 segmentacion_ag_publico = ?,
								 segmentacion_pendiente = ?
								 where id_lista = ? ";

		$sql2 ="update lista_cliente_mkt set estado_segmentacion =  0
								 where id_lista = ? and estado_registro < 4 ";

		$sql3 ="update lista_cliente_mkt set estado_segmentacion =  1
								 where id_lista = ?
								 and estado_registro in ($vector_estado_registro) ";

		$this->db->query($sql1, array($sin_gestion,$agendamiento_privado,$agendamiento_publico,$pendiente,$id_lista));
		$this->db->query($sql2, array($id_lista));
		$this->db->query($sql3, array($id_lista));


		/*
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return 0;
		}
		else
		{
			$this->db->trans_commit();
			return 1;
		}
		*/



	}




	function resetear_Registros_Agendados_Lista($fecha_inicio_reseteo,$id_lista,$estado_registro){

	$sql= "update lista_cliente_mkt set estado_registro=0
	where date_format(fecha_agendada, '%Y%m%d') >= date_format(?, '%Y%m%d') and
	id_lista= ? and
	estado_registro= ?";
	$query = $this->db->query($sql,array($fecha_inicio_reseteo,$id_lista,$estado_registro));
	$afectados = $this->db->affected_rows();
	$tipo_agendamiento = ($estado_registro==1)?"privado":"publico";
	return "Se han reseteado $afectados registros con agendamiento $tipo_agendamiento de la lista ".$id_lista.", con fecha de agendamiento >= ".$fecha_inicio_reseteo." " ;


	}

	function consultar_registros_candidatos_agendados_para_resetear($fecha_inicio_reseteo,$id_lista){

	$sql= "select
	(select count(*) as publicos from lista_cliente_mkt  where date_format(fecha_agendada, '%Y%m%d') >= date_format(?, '%Y%m%d') and  id_lista= ? and  estado_registro= 2) as publicos,
	(select count(*) as privados from lista_cliente_mkt  where date_format(fecha_agendada, '%Y%m%d') >= date_format(?, '%Y%m%d') and  id_lista= ? and  estado_registro= 1) as privados
	from lista_cliente_mkt limit 1";
	$row = $this->db->query($sql,array($fecha_inicio_reseteo, $id_lista, $fecha_inicio_reseteo, $id_lista))->row();

	return "$row->publicos agendamientos publicos, $row->privados agendamientos privados para la lista ".$id_lista.", con fecha de agendamiento >= ".$fecha_inicio_reseteo." " ;


	}











}
?>