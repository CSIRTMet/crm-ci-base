<?php
class Reporte extends CI_Controller {
       	
		
	function __construct()
	{
		parent::__construct();
		
	}
	
	function index()
	{
		
	}
	
	
	
	function resumen_cantidad_de_gestiones_del_dia(){
	
	$id_campana = $this->session->userdata("campana_id_campana");
	$sql="select n4.nombre as nivel4,  count(*) as cantidad from gestion_mkt  g
	inner join nivel4 n4 on n4.id_nivel4 = g.id_nivel4
	where id_campana = ? and estado_gestion = 2
	and date_format(fecha_termino, '%Y%m%d') = date_format(now(), '%Y%m%d')
	group by  nivel4";
	$query = $this->db->query($sql, array($id_campana));
	$data['nivel4']= $query->result();

	$this->load->view('reportes/vista_div_resumen_cantidad_de_gestiones_del_dia',$data);
	
	}
	
	function cantidad_gestiones_totales_por_rango_horario(){
	
	$id_campana = $this->session->userdata("campana_id_campana");
	$sql=" select 

	CASE 
	WHEN HOUR(fecha_termino) = 8 THEN '8-9'
	WHEN HOUR(fecha_termino) = 9 THEN '9-10'
	WHEN HOUR(fecha_termino) = 10 THEN '10-11'
	WHEN HOUR(fecha_termino) = 11 THEN '11-12'
	WHEN HOUR(fecha_termino) = 12 THEN '12-13'
	WHEN HOUR(fecha_termino) = 13 THEN '13-14'
	WHEN HOUR(fecha_termino) = 14 THEN '14-15'
	WHEN HOUR(fecha_termino) = 15 THEN '15-16'
	WHEN HOUR(fecha_termino) = 16 THEN '16-17'
	WHEN HOUR(fecha_termino) = 17 THEN '17-18'
	WHEN HOUR(fecha_termino) = 18 THEN '18-19'
	WHEN HOUR(fecha_termino) = 19 THEN '19-20'
	WHEN HOUR(fecha_termino) = 20 THEN '20-21'
	ELSE 'fuera de horario'
	END AS rango
	, 	count(*) as cantidad from gestion_mkt  g 

	where id_campana = ? and estado_gestion = 2
	and date_format(fecha_termino, '%Y%m%d') = date_format(now(), '%Y%m%d')
	group by rango ";

	$query = $this->db->query($sql, array($id_campana));
	$data['rango']= $query->result();
	$this->load->view('reportes/vista_div_cantidad_gestiones_totales_por_rango_horario',$data);

	}
	
	
	function cantidad_gestiones_por_usuarios_por_dia(){
	
	$id_campana = $this->session->userdata("campana_id_campana");
	$sql="select u.nombre as usuario,  
	count(*) as cantidad , u.id_usuario
	
	from gestion_mkt  g
	
	inner join usuario u on u.id_usuario = g.id_usuario
	
	where id_campana = ? and  estado_gestion = 2
	and date_format(fecha_termino, '%Y%m%d') = date_format(now(), '%Y%m%d')
	group by usuario
	";
	$query = $this->db->query($sql, array($id_campana));
	$data['rango']= $query->result();
	//echo $sql;
	$this->load->view('reportes/vista_cantidad_gestiones_por_usuario',$data);
	}
	
	
	
	function cantidad_gestiones_por_usuarios_segun_rango_horario(){
	
	$id_campana = $this->session->userdata("campana_id_campana");
	$sql="select u.nombre as usuario, 

	CASE 
	WHEN HOUR(fecha_termino) = 8 THEN '8-9'
	WHEN HOUR(fecha_termino) = 9 THEN '9-10'
	WHEN HOUR(fecha_termino) = 10 THEN '10-11'
	WHEN HOUR(fecha_termino) = 11 THEN '11-12'
	WHEN HOUR(fecha_termino) = 12 THEN '12-13'
	WHEN HOUR(fecha_termino) = 13 THEN '13-14'
	WHEN HOUR(fecha_termino) = 14 THEN '14-15'
	WHEN HOUR(fecha_termino) = 15 THEN '15-16'
	WHEN HOUR(fecha_termino) = 16 THEN '16-17'
	WHEN HOUR(fecha_termino) = 17 THEN '17-18'
	WHEN HOUR(fecha_termino) = 18 THEN '18-19'
	WHEN HOUR(fecha_termino) = 19 THEN '19-20'
	WHEN HOUR(fecha_termino) = 20 THEN '20-21'
	ELSE 'fuera de horario'
	END AS rango,
	count(*) as cantidad , u.id_usuario
	
	from gestion_mkt  g
	inner join nivel4 n4 on n4.id_nivel4 = g.id_nivel4
	inner join usuario u on u.id_usuario = g.id_usuario
	
	where id_campana = ? and  estado_gestion = 2
	and date_format(fecha_termino, '%Y%m%d') = date_format(now(), '%Y%m%d')
	group by rango,usuario
	";
	$query = $this->db->query($sql, array($id_campana));
	$data['rango']= $query->result();
	$this->load->view('reportes/vista_cantidad_gestiones_por_usuarios_segun_rango_horario',$data);
	}
	function cantidad_gestiones_del_usuario_por_rango_horario($id_usuario){
	
	$id_campana = $this->session->userdata("campana_id_campana");
	$sql="select u.nombre as usuario, 

	CASE 
	WHEN HOUR(fecha_termino) = 8 THEN '8-9'
	WHEN HOUR(fecha_termino) = 9 THEN '9-10'
	WHEN HOUR(fecha_termino) = 10 THEN '10-11'
	WHEN HOUR(fecha_termino) = 11 THEN '11-12'
	WHEN HOUR(fecha_termino) = 12 THEN '12-13'
	WHEN HOUR(fecha_termino) = 13 THEN '13-14'
	WHEN HOUR(fecha_termino) = 14 THEN '14-15'
	WHEN HOUR(fecha_termino) = 15 THEN '15-16'
	WHEN HOUR(fecha_termino) = 16 THEN '16-17'
	WHEN HOUR(fecha_termino) = 17 THEN '17-18'
	WHEN HOUR(fecha_termino) = 18 THEN '18-19'
	WHEN HOUR(fecha_termino) = 19 THEN '19-20'
	WHEN HOUR(fecha_termino) = 20 THEN '20-21'
	ELSE 'fuera de horario'
	END AS rango,

	count(*) as cantidad from gestion_mkt  g
	inner join nivel4 n4 on n4.id_nivel4 = g.id_nivel4
	inner join usuario u on u.id_usuario = g.id_usuario
	
	where id_campana = ? and estado_gestion = 2
	and g.id_usuario = ".$id_usuario."
	and date_format(fecha_termino, '%Y%m%d') = date_format(now(), '%Y%m%d')
	group by rango
	";
	
	$query = $this->db->query($sql, array($id_campana));
	$data['rango']= $query->result();
	$this->load->view('reportes/vista_cantidad_gestiones_del_usuario_por_rango_horario',$data);
	
	}
	
	
	function cantidad_gestiones_por_usuario_nivel_4($id_usuario){
	
	$id_campana = $this->session->userdata("campana_id_campana");
	$sql="select u.nombre as usuario, n4.nombre as nivel4,  count(*) as cantidad from gestion_mkt  g
	inner join nivel4 n4 on n4.id_nivel4 = g.id_nivel4
	inner join usuario u on u.id_usuario = g.id_usuario
	
	where id_campana = ? and estado_gestion = 2
	and g.id_usuario = ".$id_usuario."
	and date_format(fecha_termino, '%Y%m%d') = date_format(now(), '%Y%m%d')
	group by usuario, nivel4
	";
	
	$query = $this->db->query($sql, array($id_campana));
	$data['rango']= $query->result();
	$this->load->view('reportes/vista_cantidad_gestiones_por_usuario_nivel_4',$data);
	}
	
	}
	?>