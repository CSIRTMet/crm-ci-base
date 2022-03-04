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
		$sql = "select * from lista where id_campana = ?";
		$query = $this->db->query($sql,array($campana));
		return $query->result();
	}
	
	function get_lista_result($id)
	{
		$sql = "select * from lista where id_lista = ?";
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
	
	function create_view_campana($campana)
	{
		$db2 = $this->load->database('default2', TRUE);
		$tipo_campana = $this->session->userdata('campana_tipo');
		$db2->query("call crear_vista_cliente(".$db2->escape($campana).",".$tipo_campana." );");
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
	
	
	function get_clientes_preview($sql)
	{
		$sql = $sql." limit 12";
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
		
		$sql = "insert into lista_cliente_mkt(id_lista,id_cliente,estado_registro,estado_actual,usuario_actual,numero_gestiones) ";
		$sql.= " select distinct ".$lista.",id_cliente,0,0,null,0 from vista_cliente_".$campana." ";
		$sql.= $condicion."  ";
		
	}else{
		$sql = "insert into lista_deuda(id_lista,id_deuda,id_cliente,estado_registro,estado_actual,usuario_actual,numero_gestiones) ";
		$sql.= "( select distinct ".$lista.",id_deuda,id_cliente,0,0,null,0 from vista_cliente_".$campana." ";
		
		$sql.= $condicion." order by monto_documento desc ) ";
		
	}
		
		
		
		//return $sql;
		
		//exit;
		$this->db->query($sql);
		$rows = $this->db->affected_rows();
		
		$data["total_registros"] =  $rows;
		$this->db->update('lista',$data,array('id_lista'=>$lista));
		return $rows;
		
	}
	
	
	function get_lista_activa_del_usuario($usuario, $campana)
	{
	$sql = "select * from lista where id_campana = ".$campana." and id_lista in (select id_lista from lista_usuario where id_usuario = ".$usuario.") ;"; 
	$query = $this->db->query($sql);
	return $query->result();
	
	}
	
	function set_lista_cliente($id_lista,$id_cliente_o_deuda,$id_sub_respuesta,$fecha_agendada,$tipo_agendamiento,$id_usuario,$tipo_campana)
	{
	//clasifico el estado registro:
	/*  0:no recorrido
		1:ag privado
		2:ag publico
		3:pendiente
		4:terminado
	*/
	
	
	
	switch($id_sub_respuesta)
	{
	case  1: $estado_registro = 3;
			break;
	case  2: $estado_registro = 3;
			break;
	case  3: $estado_registro = 3;
			break;
	case  4: $estado_registro = 3;
			break;
	default: $estado_registro = 4;
	}
	
	/*caso especial de agendamiento
		8 = volver a llamar
		11= compromiso de pago
		23= cliente solicita volver a llamar
	*/
	if($id_sub_respuesta == 8 || $id_sub_respuesta == 11 || $id_sub_respuesta == 23){
	 $estado_registro =  $tipo_agendamiento; //coinciden los id 1=privado 2=publico
	}
 
 
    if($tipo_campana==1){ //cobranza
 
 //LOS ACEPTA SE TRATAN COMO AGENDAMIENTO
  if ($id_sub_respuesta == 29 || $id_sub_respuesta == 30 || $id_sub_respuesta == 31 || $id_sub_respuesta == 32
	 ||  $id_sub_respuesta == 33 || $id_sub_respuesta == 34 || $id_sub_respuesta == 35 || $id_sub_respuesta == 36
	 ||  $id_sub_respuesta == 37 || $id_sub_respuesta == 38	|| $id_sub_respuesta =="48" )
	{
	 $estado_registro =  $tipo_agendamiento; //coinciden los id 1=privado 2=publico
	}
 
 
 
	$sql = " 	
	 update lista_deuda set estado_registro = ? 
	,estado_actual = 0
	,usuario_actual = null
	,numero_gestiones = numero_gestiones + 1
	,fecha_agendada = ?
	,tipo_agendamiento = ?
	,usuario_agendamiento = ?
	,fecha_ultima_gestion = now()
	 where id_lista = ? and id_deuda = ? LIMIT 1; ";
	}
	else { //marketing
	$sql = " 	
	 update lista_cliente_mkt set estado_registro = ? 
	,estado_actual = 0
	,usuario_actual = null
	,numero_gestiones = numero_gestiones + 1
	,fecha_agendada = ?
	,tipo_agendamiento = ?
	,usuario_agendamiento = ?
	,fecha_ultima_gestion = now()
	 where id_lista = ? and id_cliente = ? LIMIT 1; ";
	}
	
	
	/* DEPURACION */
	//return $sql." \n $estado_registro, $fecha_agendada,$tipo_agendamiento,$id_usuario,$id_lista,$id_cliente";
	

	
	$res = $this->db->query($sql, array($estado_registro, $fecha_agendada,$tipo_agendamiento,$id_usuario,$id_lista,$id_cliente_o_deuda));

 
	return $res; //$res;
	}
	
	
	
}
?>