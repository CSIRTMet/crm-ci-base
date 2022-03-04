<?php 
class Venta_modelo extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
	function get_resumen_mensual_campana_mkt($id_campana, $tipo_campana, $todo){
		/*
		
		*/
		if($tipo_campana == 2){
			$query_aux = "select count(*) as cantidad,calificacion_auditoria from gestion_mkt
			WHERE id_nivel1=2 and id_nivel2=9 and id_nivel3=9 and id_nivel4=9 and id_campana = ".$id_campana." and date_format(fecha_termino,'%Y%m')= ".$todo." group by calificacion_auditoria order by calificacion_auditoria asc";
			
			$query = $this->db->query($query_aux);
			return $query;
		}
		
		//return $query_aux;
	}
	function get_resumen_auditoria_mensual_campana_mkt($id_campana, $tipo_campana, $todo){
		/*
		
		*/
		if($tipo_campana == 2){
			$query_aux = "select count(*) as cantidad,id_usuario_calificacion,
				(select nombre from usuario where id_usuario = gestion_mkt.id_usuario_calificacion) as agente_auditor from gestion_mkt
				WHERE id_nivel1=2 and id_nivel2=9 and id_nivel3=9 and id_nivel4=9 and id_campana=".$id_campana." and date_format(fecha_termino,'%Y%m')= ".$todo." and id_usuario_calificacion > 0
				group by id_usuario_calificacion order by id_usuario_calificacion asc";
			
			$query = $this->db->query($query_aux);
			return $query;
		}
		//return $query_aux;
	}
	function get_resumen_diario_campana_mkt($id_campana, $tipo_campana, $todo, $tipo_calificacion){
		/*
		
		*/
		if($tipo_campana == 2){
			$query_aux = "select count(*) as cantidad,date_format(fecha_termino,'%Y-%m-%d') as dia from gestion_mkt
			WHERE id_nivel1=2 and id_nivel2=9 and id_nivel3=9 and id_nivel4=9 and id_campana = ".$id_campana." and calificacion_auditoria=".$tipo_calificacion." and date_format(fecha_termino,'%Y%m')= ".$todo." group by dia order by dia asc";
			
			$query = $this->db->query($query_aux);
			return $query;
		}
		
		//return $query_aux;
	}
	function get_resumen_auditoria_diario_campana_mkt($id_campana, $tipo_campana, $todo, $id_usuario_auditor){
		
		if($tipo_campana == 2){
			$query_aux = "select count(*) as cantidad,date_format(fecha_termino,'%Y-%m-%d') as dia from gestion_mkt
			WHERE id_nivel1=2 and id_nivel2=9 and id_nivel3=9 and id_nivel4=9 and id_campana = ".$id_campana." and id_usuario_calificacion=".$id_usuario_auditor." and date_format(fecha_termino,'%Y%m')= ".$todo." group by dia order by dia asc";
			
			$query = $this->db->query($query_aux);
			return $query;
		}
		
		//return $query_aux;
	}
	function mostrar_detalle_del_dia($id_campana, $tipo_campana, $dia, $tipo_calificacion){
		$select = "";
		$inner_join = "";
		
		if($id_campana == 1){
		$select = "
			t.rut_venta,
			t.primamensual,
			t.primapesos, 
			concat(t.nombre1,' ',t.apepat1) as nombre1,
			concat(t.nombre2,' ',t.apepat2) as nombre2,
			t.codigo_venta  as plan,
			";
		$inner_join =" inner join tmp_base_oficial_camp_1 t on t.id_cliente = gmkt.id_cliente ";	
	  
		}
		
		$query_aux = "select 
			gmkt.id_gestion,
			gmkt.id_cliente,
			gmkt.id_lista,
			ccmkt.rut as rut_cliente,
			ccmkt.dv,
			ccmkt.nombre as nombre_cliente,
			gmkt.fecha_termino as fecha_venta,
			gmkt.fecha_termino,
			gmkt.grabacion,
			gmkt.numero_llamado,
			gmkt.anexo,
			gmkt.id_nivel1,
			gmkt.id_nivel2,
			gmkt.id_nivel3,
			gmkt.id_nivel4,
			n1.nombre as nivel1,
			n2.nombre as nivel2,
			n3.nombre as nivel3,
			n4.nombre as nivel4,
			u.nombre as ejecutivo,
			(select nombre from lista where id_lista= gmkt.id_lista limit 1) as lista,
			gmkt.glosa,
			gmkt.fecha_nacimiento,
			gmkt.estado_civil,
			gmkt.sexo,
			$select 
			gmkt.calificacion_auditoria,
			gmkt.observacion_calificacion_auditoria,
			gmkt.id_usuario_calificacion,
			(select nombre from usuario where id_usuario = gmkt.id_usuario_calificacion limit 1) as agente_auditor
			from gestion_mkt as gmkt 
			inner join campana_cliente_mkt as ccmkt on (gmkt.id_cliente = ccmkt.id_cliente)
			inner join nivel1 as n1 on (gmkt.id_nivel1 = n1.id_nivel1)
			inner join nivel2 as n2 on (gmkt.id_nivel2 = n2.id_nivel2)
			inner join nivel3 as n3 on (gmkt.id_nivel3 = n3.id_nivel3)
			inner join nivel4 as n4 on (gmkt.id_nivel4 = n4.id_nivel4)
			inner join usuario as u on (gmkt.id_usuario = u.id_usuario)
			$inner_join 
			where gmkt.id_nivel1=2 and gmkt.id_nivel2=9 and gmkt.id_nivel3=9 and gmkt.id_nivel4=9 and gmkt.id_campana= ".$id_campana." 
		   and date_format(gmkt.fecha_termino,'%Y%m%d')= ".$dia." and gmkt.calificacion_auditoria=".$tipo_calificacion." and ccmkt.id_campana=".$id_campana."
		   order by gmkt.id_gestion asc";
	   $query = $this->db->query($query_aux);
	   return $query;
	   //return $query_aux;
	}
	function mostrar_detalle_auditoria_del_dia($id_campana, $tipo_campana, $dia, $id_usuario_calificacion){
		
		$select = "";
		$inner_join ="";

		
		if($id_campana == 1){
		$select = "
			t.rut_venta,
			t.primamensual,
			t.primapesos, 
			concat(t.nombre1,' ',t.apepat1) as nombre1,
			concat(t.nombre2,' ',t.apepat2) as nombre2,
			t.codigo_venta  as plan,
			";
		$inner_join =" inner join tmp_base_oficial_camp_1 t on t.id_cliente = gmkt.id_cliente ";	
	  
		}
		
		
		$query_aux = "select 
			gmkt.id_gestion,
			gmkt.id_cliente,
			gmkt.id_lista,
			ccmkt.rut as rut_cliente,
			ccmkt.dv,
			ccmkt.nombre as nombre_cliente,
			gmkt.fecha_termino as fecha_venta,
			gmkt.fecha_termino,
			gmkt.grabacion,
			gmkt.numero_llamado,
			gmkt.anexo,
			gmkt.id_nivel1,
			gmkt.id_nivel2,
			gmkt.id_nivel3,
			gmkt.id_nivel4,
			n1.nombre as nivel1,
			n2.nombre as nivel2,
			n3.nombre as nivel3,
			n4.nombre as nivel4,
			u.nombre as ejecutivo,
			(select nombre from lista where id_lista= gmkt.id_lista limit 1) as lista,
			gmkt.glosa,
			gmkt.fecha_nacimiento,
			gmkt.estado_civil,
			gmkt.sexo,
			
			$select 
			 
			gmkt.calificacion_auditoria,
			gmkt.observacion_calificacion_auditoria,
			gmkt.id_usuario_calificacion,
			(select nombre from usuario where id_usuario = gmkt.id_usuario_calificacion limit 1) as agente_auditor
			from gestion_mkt as gmkt 
			inner join campana_cliente_mkt as ccmkt on (gmkt.id_cliente = ccmkt.id_cliente)
			inner join nivel1 as n1 on (gmkt.id_nivel1 = n1.id_nivel1)
			inner join nivel2 as n2 on (gmkt.id_nivel2 = n2.id_nivel2)
			inner join nivel3 as n3 on (gmkt.id_nivel3 = n3.id_nivel3)
			inner join nivel4 as n4 on (gmkt.id_nivel4 = n4.id_nivel4)
			inner join usuario as u on (gmkt.id_usuario = u.id_usuario)
			$inner_join
			where  gmkt.id_nivel4=9 and gmkt.id_campana= ".$id_campana." 
		   and date_format(gmkt.fecha_termino,'%Y%m%d')= ".$dia." and gmkt.id_usuario_calificacion=".$id_usuario_calificacion." and ccmkt.id_campana=".$id_campana."
		   order by gmkt.id_gestion asc";
	   $query = $this->db->query($query_aux);
	   return $query;
	   //return $query_aux;
	}
	function buscar_gestion_o_venta($id_campana, $tipo_campana, $fecha, $rut, $tipo_gestion, $tipo_calificacion, $anexo, $lista_a_buscar, $ejecutivo){
		$condicion='';
		if($fecha != ''){
			$condicion = $condicion." and date_format(gmkt.fecha_termino,'%Y%m%d')=".$fecha;
		}
		if($rut != ''){
			$condicion = $condicion." and ccmkt.rut=".$rut;
		}
		if($tipo_gestion != ''){
			if($tipo_gestion == 1){
				$condicion = $condicion." and gmkt.id_nivel1=2 and gmkt.id_nivel2=9 and gmkt.id_nivel3=9 and gmkt.id_nivel4=9 ";
			}
		}
		if($tipo_calificacion != ''){
			if($tipo_gestion == 1){
				$condicion = $condicion." and gmkt.calificacion_auditoria = ".$tipo_calificacion;
			}
		}
		if($anexo != '' && $anexo > 0){
			$condicion = $condicion." and gmkt.anexo = ".$anexo;
		}
		if($lista_a_buscar != '' && $lista_a_buscar >0){
			$condicion = $condicion." and gmkt.id_lista = ".$lista_a_buscar;
		}
		if($ejecutivo != '' && $ejecutivo > 0){
			$condicion = $condicion." and gmkt.id_usuario = ".$ejecutivo;
		}
		
		$select = "";
		$inner_join ="";

		
		if($id_campana == 1){
		$select = "
			t.rut_venta,
			t.primamensual,
			t.primapesos, 
			concat(t.nombre1,' ',t.apepat1) as nombre1,
			concat(t.nombre2,' ',t.apepat2) as nombre2,
			t.codigo_venta  as plan,
			";
		$inner_join =" inner join tmp_base_oficial_camp_1 t on t.id_cliente = gmkt.id_cliente ";	
	  
		}
		
		$query_aux = "select 
			gmkt.id_gestion,
			gmkt.id_cliente,
			gmkt.id_lista,
			ccmkt.rut as rut_cliente,
			ccmkt.dv,
			ccmkt.nombre as nombre_cliente,
			gmkt.fecha_termino as fecha_venta,
			gmkt.fecha_termino,
			gmkt.grabacion,
			gmkt.numero_llamado,
			gmkt.anexo,
			gmkt.id_nivel1,
			gmkt.id_nivel2,
			gmkt.id_nivel3,
			gmkt.id_nivel4,
			n1.nombre as nivel1,
			n2.nombre as nivel2,
			n3.nombre as nivel3,
			n4.nombre as nivel4,
			u.nombre as ejecutivo,
			(select nombre from lista where id_lista= gmkt.id_lista limit 1) as lista,
			gmkt.glosa,
			gmkt.fecha_nacimiento,
			gmkt.estado_civil,
			gmkt.sexo,
			
			$select 
			
			gmkt.calificacion_auditoria,
			gmkt.observacion_calificacion_auditoria,
			gmkt.id_usuario_calificacion,
			(select nombre from usuario where id_usuario = gmkt.id_usuario_calificacion limit 1) as agente_auditor
			from gestion_mkt as gmkt 
			inner join campana_cliente_mkt as ccmkt on (gmkt.id_cliente = ccmkt.id_cliente)
			inner join nivel1 as n1 on (gmkt.id_nivel1 = n1.id_nivel1)
			inner join nivel2 as n2 on (gmkt.id_nivel2 = n2.id_nivel2)
			inner join nivel3 as n3 on (gmkt.id_nivel3 = n3.id_nivel3)
			inner join nivel4 as n4 on (gmkt.id_nivel4 = n4.id_nivel4)
			inner join usuario as u on (gmkt.id_usuario = u.id_usuario)
			$inner_join   
			where gmkt.id_campana= ".$id_campana." and ccmkt.id_campana=".$id_campana." ".$condicion."  
		   order by gmkt.id_gestion asc";
	   $query = $this->db->query($query_aux);
	    return $query;
	  //echo  $query_aux;
	}
	function crea_ventas_mkt($id_ventas_mkt,$id_gestion, $id_cliente, $tipo_campana, $id_campana,$id_nivel4, $id_usuario_califica, $calificacion_auditoria, $observacion_calificacion_auditoria){
		$resultado = "";
		if($tipo_campana == 2){
			
			$tabla = "tmp_base_oficial_camp_$id_campana";
			
			$data["id_gestion"] = $id_gestion;
			$data["id_cliente"] = $id_cliente;
			$data["id_campana"] = $id_campana;
			$data["id_usuario_calificacion"] = $id_usuario_califica;
			$data["id_nivel4"] = $id_nivel4;
			
			if($id_ventas_mkt == 0){				
				$ida = $this->db->insert('tbl_asegurado', $data);
				$id_inserta = $this->db->insert_id();
				
				$idb = $this->db->insert('tbl_beneficiario', $data);
				$id_insertb = $this->db->insert_id();
				
				$idh = $this->db->insert('tbl_hogar', $data);
				$id_inserth = $this->db->insert_id();
				
				$idhp = $this->db->insert('tbl_hogar_preguntas', $data);
				$id_inserthp = $this->db->insert_id();
				
				$idt = $this->db->insert('tbl_titular', $data);
				$id_insertt = $this->db->insert_id();
				
				$sql_asegurado = "update tbl_asegurado,".$tabla." 
					set tbl_asegurado.t_rut = ".$tabla.".rut_rut_venta,
					    tbl_asegurado.t_cod_plan = ".$tabla.".codigo_venta,
					    tbl_asegurado.t_secuencial = '',
					    tbl_asegurado.a_rut = ".$tabla.".rut_rut_venta, 
					    tbl_asegurado.a_dgv = ".$tabla.".rut_dv_venta,
					    tbl_asegurado.a_ap_pat = ".$tabla.".apepat1,
		  			    tbl_asegurado.a_ap_mat = ".$tabla.".apemat1,
					    tbl_asegurado.a_nombres = ".$tabla.".nombre1,
					    tbl_asegurado.a_fec_nac = ".$tabla.".fechanacimiento,
					    tbl_asegurado.a_parentesco = ".$tabla.".parentesco1,
						tbl_asegurado.a_sexo = ".$tabla.".sexo,
						tbl_asegurado.a_est_civil = ".$tabla.".estadocivil,
						tbl_asegurado.a_dir = ".$tabla.".dir_calle,
						tbl_asegurado.a_dir_nro = ".$tabla.".dir_nro,
						tbl_asegurado.a_dir_comp = ".$tabla.".dir_comp,						
						tbl_asegurado.a_comuna = ".$tabla.".cod_comuna,
						tbl_asegurado.a_ciudad = ".$tabla.".cod_ciudad,
						tbl_asegurado.a_area_part = ".$tabla.".disc_at1,
						tbl_asegurado.a_fono_part = ".$tabla.".fono_at1,
						tbl_asegurado.a_area_of = ".$tabla.".disc_at2,
						tbl_asegurado.a_fono_of = ".$tabla.".fono_at2,
						tbl_asegurado.a_area_rec = ".$tabla.".disc_at3,
						tbl_asegurado.a_fono_rec = ".$tabla.".fono_at3,
						tbl_asegurado.a_pref_movil = ".$tabla.".ddd_cel,
						tbl_asegurado.a_fono_movil = ".$tabla.".num_celular,
						tbl_asegurado.a_ocupacion = '',
						tbl_asegurado.a_secuencial = '',
						tbl_asegurado.fecha_venta = (select fecha_termino from gestion_mkt where id_gestion=".$id_gestion." limit 1)					
					    where tbl_asegurado.id_cliente = ".$tabla.".id_cliente and tbl_asegurado.id_gestion = ? and tbl_asegurado.id_cliente=?";
				
				$sql_beneficiario = "update tbl_beneficiario,".$tabla." 
					set tbl_beneficiario.t_rut = ".$tabla.".rut_rut_venta,
					    tbl_beneficiario.t_cod_plan = ".$tabla.".codigo_venta,
					    tbl_beneficiario.t_secuencial = '',
					    tbl_beneficiario.a_rut = '',
					    tbl_beneficiario.b_nro = '',
					    tbl_beneficiario.b_rut = '',
		  			    tbl_beneficiario.b_dgv = '',
					    tbl_beneficiario.b_ap_pat = ".$tabla.".apepat1,
					    tbl_beneficiario.b_ap_mat = ".$tabla.".apemat1,
					    tbl_beneficiario.b_nombres = ".$tabla.".nombre1,
						tbl_beneficiario.b_fec_nac = ".$tabla.".fechanacimiento,
						tbl_beneficiario.b_parentesco = ".$tabla.".parentesco1,
						tbl_beneficiario.b_sexo = ".$tabla.".sexo,
						tbl_beneficiario.b_pctje = ".$tabla.".porcentaje1,
						tbl_beneficiario.fecha_venta = (select fecha_termino from gestion_mkt where id_gestion=".$id_gestion." limit 1)									
					    where tbl_beneficiario.id_cliente = ".$tabla.".id_cliente and tbl_beneficiario.id_gestion = ? and tbl_beneficiario.id_cliente=?";
				
				$sql_hogar = "update tbl_hogar,".$tabla." 
					set tbl_hogar.t_rut = ".$tabla.".rut_rut_venta,
					    tbl_hogar.t_cod_plan = ".$tabla.".codigo_venta,
					    tbl_hogar.t_secuencial = '',
					    tbl_hogar.a_rut = '',
					    tbl_hogar.h_mat_aseg = '1',
					    tbl_hogar.h_dir = ".$tabla.".dir_calle,
		  			    tbl_hogar.h_dir_nro = ".$tabla.".dir_nro,
					    tbl_hogar.h_dir_comp = ".$tabla.".dir_comp,
					    tbl_hogar.h_region = ".$tabla.".cod_region,
					    tbl_hogar.h_comuna = ".$tabla.".cod_comuna,
						tbl_hogar.h_ciudad = ".$tabla.".cod_ciudad,
						tbl_hogar.h_area = ".$tabla.".disc_at1,
						tbl_hogar.h_telefono = ".$tabla.".fono_at1,
						tbl_hogar.h_val_edif_uf = '',
						tbl_hogar.h_val_cont_uf = '',						
						tbl_hogar.h_val_robo_uf = '',
						tbl_hogar.h_obs = '',
						tbl_hogar.hog_tipo = '',
						tbl_hogar.fecha_venta = (select fecha_termino from gestion_mkt where id_gestion=".$id_gestion." limit 1)
					    where tbl_hogar.id_cliente = ".$tabla.".id_cliente and tbl_hogar.id_gestion = ? and tbl_hogar.id_cliente=?";
				
				$sql_hogar_preguntas = "update tbl_hogar_preguntas,".$tabla." 
					set tbl_hogar_preguntas.t_rut = ".$tabla.".rut_rut_venta,
					    tbl_hogar_preguntas.t_cod_plan = ".$tabla.".codigo_venta,
					    tbl_hogar_preguntas.t_secuencial = '',
					    tbl_hogar_preguntas.a_rut = '',
					    tbl_hogar_preguntas.criterio = '',
					    tbl_hogar_preguntas.valor = '',
						tbl_hogar_preguntas.fecha_venta = (select fecha_termino from gestion_mkt where id_gestion=".$id_gestion." limit 1)
					    where tbl_hogar_preguntas.id_cliente = ".$tabla.".id_cliente and tbl_hogar_preguntas.id_gestion = ? and tbl_hogar_preguntas.id_cliente=?";
				
				$sql_titular = "update tbl_titular,".$tabla." 
					set tbl_titular.t_idi_ori = ".$tabla.".id,
					    tbl_titular.t_rut = ".$tabla.".rut_rut_venta,
					    tbl_titular.t_cod_plan = ".$tabla.".codigo_venta,
					    tbl_titular.t_secuencial = '1',
					    tbl_titular.t_dgv = ".$tabla.".rut_dv_venta,
					    tbl_titular.t_ap_pat = ".$tabla.".apepat1,
		  			    tbl_titular.t_ap_mat = ".$tabla.".apemat1,
					    tbl_titular.t_nombres = ".$tabla.".nombre1,
					    tbl_titular.t_fec_nac = ".$tabla.".fechanacimiento,
					    tbl_titular.t_est_civil = ".$tabla.".estadocivil,
						tbl_titular.t_sexo = ".$tabla.".sexo,
						tbl_titular.t_ocupacion = '',
						tbl_titular.t_dir = ".$tabla.".dir_calle,
						tbl_titular.t_dir_nro = ".$tabla.".dir_nro,
						tbl_titular.t_dir_comp = ".$tabla.".dir_comp,						
						tbl_titular.t_comuna = ".$tabla.".cod_comuna,
						tbl_titular.t_ciudad = ".$tabla.".cod_ciudad,
						tbl_titular.t_area_part = ".$tabla.".disc_at1,
						tbl_titular.t_fono_part = ".$tabla.".fono_at1,
						tbl_titular.t_area_of = ".$tabla.".disc_at2,
						tbl_titular.t_fono_of = ".$tabla.".fono_at2,
						tbl_titular.t_area_rec = ".$tabla.".disc_at3,
						tbl_titular.t_fono_rec = ".$tabla.".fono_at3,
						tbl_titular.t_pref_movil = ".$tabla.".ddd_cel,
						tbl_titular.t_fono_movil = ".$tabla.".num_celular,
						tbl_titular.t_nro_aseg = '1',
						tbl_titular.t_fec_ini_vig = ".$tabla.".ini_vig,
						tbl_titular.t_prima = ".$tabla.".primamensual,
						tbl_titular.t_forma_pago = ".$tabla.".cod_forma_pago,
						tbl_titular.t_fec_proc = '',
						tbl_titular.t_nro_solicitud = '',
						tbl_titular.t_estado = 'G',
						tbl_titular.t_intento_nro = '',
						tbl_titular.t_fec_ini_vig_ori = '',
						tbl_titular.t_productor = '1',
						tbl_titular.t_agencia = '50',
						tbl_titular.t_intermediario = '',
						tbl_titular.t_ejecutivo = '1',
						tbl_titular.t_grabado = '1',
						tbl_titular.t_regrabado = '0',
						tbl_titular.t_grabacion = '',
						tbl_titular.t_organizador = '87364',
						tbl_titular.t_contacto_rut = '',
						tbl_titular.t_contacto_nombre = '',
						tbl_titular.t_contacto_agen = '',
						tbl_titular.fecha_venta = (select fecha_termino from gestion_mkt where id_gestion=".$id_gestion." limit 1)					
					    where tbl_titular.id_cliente = ".$tabla.".id_cliente and tbl_titular.id_gestion = ? and tbl_titular.id_cliente=?";
				
				$sql_gestion_mkt ="update gestion_mkt
					set calificacion_auditoria = ?,
					observacion_calificacion_auditoria = ?,
					id_usuario_calificacion = ?
					where id_gestion = ?";
				//return $sql." -- ".$sql2." -- ".$sql4;
				
				$this->db->trans_begin();
					$this->db->query($sql_asegurado, array($id_gestion,$id_cliente));
					$this->db->query($sql_beneficiario, array($id_gestion,$id_cliente));
					$this->db->query($sql_hogar, array($id_gestion,$id_cliente));
					$this->db->query($sql_hogar_preguntas, array($id_gestion,$id_cliente));
					$this->db->query($sql_titular, array($id_gestion,$id_cliente));
					$this->db->query($sql_gestion_mkt, array($calificacion_auditoria,$observacion_calificacion_auditoria,$id_usuario_califica,$id_gestion));
					
					if ($this->db->trans_status() == FALSE){
						$this->db->trans_rollback();
						$resultado = "error";
					}else{
						$this->db->trans_commit();
						$resultado = "ok";   
					}
				//*/
				
			}
			return $resultado;
		}
	}
	function libera_ventas_mkt($id_gestion, $id_cliente, $tipo_campana, $id_campana, $id_usuario_califica, $calificacion_auditoria, $observacion_calificacion_auditoria){
		if($tipo_campana == 2){
			$sql = "update lista_cliente_mkt,gestion_mkt
					set lista_cliente_mkt.estado_registro=3,
					    lista_cliente_mkt.prioridad=17,
					gestion_mkt.calificacion_auditoria = ?,
					gestion_mkt.observacion_calificacion_auditoria= ? 
					where lista_cliente_mkt.id_cliente = gestion_mkt.id_cliente and 
						  lista_cliente_mkt.id_cliente = ? and gestion_mkt.id_gestion = ?";
			$res = $this->db->query($sql, array($calificacion_auditoria,$observacion_calificacion_auditoria,$id_cliente, $id_gestion));
			return $res;
		}
	}
	function set_modifica_calificacion_venta($id_gestion, $id_cliente, $id_lista, $tipo_campana, $id_campana){
		$resultado = "";
		if($tipo_campana == 2){
			$sql = "update lista_cliente_mkt,gestion_mkt
					set estado_registro = 4,
					prioridad = 0
					where lista_cliente_mkt.id_cliente = gestion_mkt.id_cliente and 
						  lista_cliente_mkt.id_cliente = ? and lista_cliente_mkt.id_lista = ? and gestion_mkt.id_gestion = ?";
			$sql1 = "update gestion_mkt
					set 
					calificacion_auditoria = 0,
					id_usuario_calificacion = 0 
					where id_gestion = ?
					";
			
			$sql2 = "delete from tbl_asegurado where id_gestion =? and id_cliente = ?";
			$sql3 = "delete from tbl_beneficiario where id_gestion =? and id_cliente = ?";
			$sql4 = "delete from tbl_hogar where id_gestion =? and id_cliente = ?";
			$sql5 = "delete from tbl_hogar_preguntas where id_gestion =? and id_cliente = ?";
			$sql6 = "delete from tbl_titular where id_gestion = ? and id_cliente = ?";
			
			$this->db->trans_begin();
				$this->db->query($sql, array($id_cliente,$id_lista, $id_gestion));
				$this->db->query($sql1, array($id_gestion));
				$this->db->query($sql2, array($id_gestion,$id_cliente));
				$this->db->query($sql3, array($id_gestion,$id_cliente));
				$this->db->query($sql4, array($id_gestion,$id_cliente));
				$this->db->query($sql5, array($id_gestion,$id_cliente));
				$this->db->query($sql6, array($id_gestion,$id_cliente));
				
				if ($this->db->trans_status() == FALSE){
					$this->db->trans_rollback();
					$resultado = "error";
				}else{
					$this->db->trans_commit();
					$resultado = "ok";   
				}
		//*/
		}
		return $resultado;
	}
	
}
