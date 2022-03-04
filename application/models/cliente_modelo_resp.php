<?php 
class Cliente_modelo extends CI_Model {

    var $cuenta_corriente   = '';
    var $suma_del_importe = '';
    var $rut    = '';
    var $nombre    = '';
    var $calle    = '';
    var $numero    = '';
    var $comuna    = '';
    var $ciudad    = '';
    var $complemento    = '';
    var $folio    = '';
    var $rol    = '';
    var $telefono1    = '';
    var $telefono2    = '';
    var $telefono3    = '';
    var $telefono4    = '';
    var $telefono5    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('cliente', 10);
        return $query->result();
    }
	
	
	function get_cliente_a_llamar($usuario,$lista,$num_gestiones,$tipo_campana)
	{
	//get_cliente_a_llamar(IN param_usuario INT(11), IN param_lista INT(11), IN param_gestiones INT(11), OUT salida INT(11))
		
 
$db2 = $this->load->database('default2', TRUE);
		
		$query = $db2->query("call get_cliente_a_llamar(".$usuario.",".$lista.",".$num_gestiones.",".$tipo_campana.",@salida);");
		
		
		if ($tipo_campana == 1) {
			foreach($query->result() as $row):
			$cliente_o_deuda =  $row->id_deuda;
			
			endforeach;
		}else
		{
			foreach($query->result() as $row):
			$cliente_o_deuda =  $row->id_cliente;
			
			endforeach;
		}
		
		
		
		return $cliente_o_deuda;
		
	}
	
	
	function get_cliente_from_deuda($id_deuda){
		
		$sql = "select id_cliente from deuda where id_deuda = ".$id_deuda;
		$consulta = $this->db->query($sql);
		$row = $consulta->row();
		return $row->id_cliente;
		
	}



	function get_cliente($id_campana,$id_cliente,$tipo_campana){

	if ($tipo_campana == 1) { //cobranza
				$consulta =  "select * from campana_cliente where id_campana = ".$id_campana." and id_cliente = ".$id_cliente."  Limit 1; ";
			}
			else { //marketing
				$consulta =  "select id_cliente, fecha_carga, estado_registro, rut, dv, rutdv, nombre,oferta,segmento from campana_cliente_mkt where id_campana = ".$id_campana." and id_cliente = ".$id_cliente."  Limit 1; ";
			}

	$query = $this->db->query($consulta);
        return $query->result();


	}

	

	
	function get_cliente_a_gestionar($usuario, $lista, $num_gestiones,$tipo_campana)
        {	
	
		$id_cliente = $this->get_cliente_a_llamar($usuario,$lista,$num_gestiones,$tipo_campana);



		return $id_cliente; //echo "cliente".$cliente;
		 
    }



function get_estado_cliente_a_gestionar_buscador($id_lista,$id_cliente_o_deuda,$tipo_campana)
    {	   
		
		if ($tipo_campana == 1) { //cobranza	
				 
				
				$sql = "select count(id_lista) as num from lista_deuda 
					    where id_lista = ".$id_lista." 
						and id_deuda = ".$id_cliente_o_deuda." 
						and estado_actual = 0";
		}
		else { //marketing	
				$sql = "select count(id_lista) as num from lista_cliente_mkt 
					    where id_lista = ".$id_lista." 
						and id_cliente = ".$id_cliente_o_deuda." 
						and estado_actual = 0";
		}
		
		
		$consulta = $this->db->query($sql);
		$row = $consulta->row();
		return $row->num;

    }








	function get_columnas()
		{
			//DEBE APUNTAR A LOS CAMPOS DE LA VISTA DEL CLIENTE Y NO A LA TABLA CLIENTE
			$query = $this->db->list_fields('cliente');
			return $query;
		}








function insert_entry()
    {
        $this->cuenta_corriente   = $_POST['cuenta_corriente']; // please read the below note
        $this->suma_del_importe = $_POST['suma_del_importe'];
        $this->nombre = $_POST['nombre'];
        $this->calle = $_POST['calle'];
        $this->numero = $_POST['numero'];
        $this->comuna = $_POST['comuna'];
        $this->ciudad = $_POST['ciudad'];
        $this->complemento = $_POST['complemento'];
        $this->folio = $_POST['folio'];
        $this->rol = $_POST['rol'];
        $this->telefono1 = $_POST['telefono1'];
        $this->telefono2 = $_POST['telefono2'];
        $this->telefono3 = $_POST['telefono3'];
        $this->telefono4 = $_POST['telefono4'];
        $this->telefono5 = $_POST['telefono5'];

        $this->date    = time();

        $this->db->insert('cliente', $this);
    }

    function update_entry()
    {
        $this->cuenta_corriente   = $_POST['cuenta_corriente']; // please read the below note
        $this->suma_del_importe = $_POST['suma_del_importe'];
        $this->nombre = $_POST['nombre'];
        $this->calle = $_POST['calle'];
        $this->numero = $_POST['numero'];
        $this->comuna = $_POST['comuna'];
        $this->ciudad = $_POST['ciudad'];
        $this->complemento = $_POST['complemento'];
        $this->folio = $_POST['folio'];
        $this->rol = $_POST['rol'];
        $this->telefono1 = $_POST['telefono1'];
        $this->telefono2 = $_POST['telefono2'];
        $this->telefono3 = $_POST['telefono3'];
        $this->telefono4 = $_POST['telefono4'];
        $this->telefono5 = $_POST['telefono5'];
        $this->date    = time();

        $this->db->update('cliente', $this, array('id_cliente' => $_POST['id_cliente']));
    }
	
	
	
	
	
	
	function buscar_registros($columna_a_buscar,$valor_a_buscar,$tipo_campana,$id_lista)
  {
  
  
    if ($columna_a_buscar == "telefono")
  	{
 		$columna_a_buscar = "t.".$columna_a_buscar ;
 	}
	else if ($columna_a_buscar == "numero_documento")
  	{
 		$columna_a_buscar = "d.".$columna_a_buscar ;
 	}
	else 
	{
		$columna_a_buscar = "c.".$columna_a_buscar;
	}
	
	
	
	if($tipo_campana == 2){
   $sql ="
		select 
		lc.id_lista AS id_lista
		,lc.id_cliente AS id_cliente
		,c.rut AS rut
		,c.nombre AS nombre
	
		,lc.estado_registro AS estado_registro
		,t.telefono AS telefono
		,(select sr.nombre from sub_respuesta sr where sr.id_sub_respuesta = 
		(select g.id_sub_respuesta from gestion_mkt  g where g.id_cliente = lc.id_cliente order by fecha_termino desc limit 1)
		) AS ultima_gestion
   
   		,(select u.nombre from usuario u where u.id_usuario = 
		(select g.id_usuario from gestion_mkt  g where g.id_cliente = lc.id_cliente order by fecha_termino desc limit 1)
		) AS usuario
		
		from lista_cliente_mkt lc
		LEFT JOIN telefono_mkt t on t.id_cliente = lc.id_cliente
		LEFT JOIN cliente_mkt  c on c.id_cliente = lc.id_cliente
		where lc.id_lista = $id_lista and $columna_a_buscar like '%".$valor_a_buscar."%' limit 20";
		}
		else{
		
		
		$sql ="
		select 
		ld.id_lista AS id_lista
		,ld.id_deuda AS id_deuda
		,c.id_cliente AS id_cliente
		,c.rut AS rut
		,c.nombre AS nombre
		,d.numero_documento as numero_documento
		,ld.estado_registro AS estado_registro
		,t.telefono AS telefono
		,(select sr.nombre from sub_respuesta sr where sr.id_sub_respuesta = 
		(select g.id_sub_respuesta from gestion  g where g.id_deuda = ld.id_deuda order by fecha_termino desc limit 1)
		) AS ultima_gestion
   
   		,(select u.nombre from usuario u where u.id_usuario = 
		(select g.id_usuario from gestion  g where g.id_deuda = ld.id_deuda order by fecha_termino desc limit 1)
		) AS usuario
		
		from lista_deuda ld
		LEFT JOIN telefono t on t.id_cliente = ld.id_cliente
		LEFT JOIN cliente  c on c.id_cliente = ld.id_cliente
		LEFT JOIN deuda  d on d.id_deuda = ld.id_deuda
		where ld.id_lista = $id_lista and $columna_a_buscar like '%".$valor_a_buscar."%' limit 20";
		}
	
	
	
	
   

        $query = $this->db->query($sql);
 		return $query->result();
  		//return $sql;
  }
	
	
	
	
	
	function get_compromiso_cliente($id_cliente, $id_campana){
	   $query_aux = "select id_compromiso, (select numero_documento from deuda where deuda.id_deuda = c.id_deuda ) as numero_documento, id_gestion, id_cliente, id_deuda,monto,fecha_compromiso,lugar_de_pago,
	   tipo_de_pago,forma_de_pago, numero_cuotas, pie, monto_cuota from compromiso c where id_cliente = ".$id_cliente." 
	   and id_deuda in (select id_deuda from deuda where id_campana = ".$id_campana."  )";
	   $query = $this->db->query($query_aux);
	   return $query;
	 }
	 function get_compromiso_usuario($id_usuario, $id_campana){
	   $query_aux = "select u.nombre as nombre_usuario, c.id_compromiso, (select numero_documento from deuda where deuda.id_deuda = c.id_deuda ) as numero_documento, c.id_gestion, c.id_cliente, c.id_deuda, c.monto, c.fecha_compromiso, c.lugar_de_pago,
	   c.tipo_de_pago,c.forma_de_pago, c.numero_cuotas, c.pie, c.monto_cuota,c.glosa,(select fecha_de_pago from deuda where deuda.id_deuda = c.id_deuda ) as fecha_de_pago
	   from compromiso c ,usuario u where  u.id_usuario = ".$id_usuario." 
       and u.id_usuario = c.id_usuario
	   and c.id_deuda in (select deuda.id_deuda from deuda where deuda.id_campana = ".$id_campana." 
	   and year(c.fecha_compromiso) = year(now()) and month(c.fecha_compromiso) = month(now()) )
	   order by c.fecha_compromiso desc ";
	   $query = $this->db->query($query_aux);
	   return $query;
	 }
	 function get_gestiones_usuario($id_usuario, $id_campana, $tipo_campana){
		if($tipo_campana == 1){
			$query_aux = "SELECT COUNT( gestion.id_sub_respuesta ) AS cantidad, (SELECT nombre FROM sub_respuesta WHERE sub_respuesta.id_sub_respuesta = gestion.id_sub_respuesta) AS sub_respuesta
			FROM  `gestion` WHERE id_campana = ".$id_campana." AND id_usuario = ".$id_usuario." and ( CAST(  gestion.fecha_termino AS DATE ) = cast((cast(now() as date)) as date))
			group by  gestion.id_sub_respuesta";
		}else{
			$query_aux = "SELECT COUNT( gestion_mkt.id_sub_respuesta ) AS cantidad, (SELECT nombre FROM sub_respuesta WHERE sub_respuesta.id_sub_respuesta = gestion_mkt.id_sub_respuesta) AS sub_respuesta
			FROM  `gestion_mkt` WHERE id_campana = ".$id_campana." AND id_usuario = ".$id_usuario." and ( CAST(  gestion_mkt.fecha_termino AS DATE ) = cast((cast(now() as date) ) as date))
			group by  gestion_mkt.id_sub_respuesta";
		}
	   $query = $this->db->query($query_aux);
	   return $query;
	 }
}
