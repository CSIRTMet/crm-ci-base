<?php class Registro_modelo extends CI_Model {

 	var $id_usuario = '';
	var $id_status = '';
	var $id_tipificacion_fraude = '';
	var $bloqueo_pf = '';
	var $dia_retiro_pf = '';
	var $numero_tarjeta = '';
	var $nombre_cliente = '';
	var $obs_llamado_1 = ''; 
	var $obs_llamado_2 = ''; 
	var $obs_llamado_3 = ''; 
	var $ultima_gestion = ''; 
	var $se_saco_pf = ''; 
	var $quien = ''; 
	var $titular_contactado = ''; 
	var $dejar_mensaje = ''; 
	var $enviar_carta = ''; 
	var $telefono_erroneo= '';
		 
				 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }
	
	 function get_registros($tipo)
    {
	
       
	   if(!empty($tipo) and $tipo =='fraude')
	   
	   {
		   $query = $this->db->query('
			
			SELECT  id_registro, `se_saco_pf` ,  `nombre_cliente` ,  `numero_tarjeta` ,  `bloqueo_pf` , DATE( fecha_gestion ) AS fecha_gestion,  (select s.status from status s where s.id_status  = r.`id_status`) as id_status ,  (select u.nombre_usuario from usuario u where u.id_usuario  = r.`id_usuario`) as id_usuario, telefono,anexo,grabacion
	FROM  `registro` r WHERE r.id_status = 4 
			
			'); 
		}
		else  if(!empty($tipo) and $tipo =='pendiente')
		{
		
			$query = $this->db->query('
			
			SELECT  id_registro, `se_saco_pf` ,  `nombre_cliente` ,  `numero_tarjeta` ,  `bloqueo_pf` , DATE( fecha_gestion ) AS fecha_gestion,  (select s.status from status s where s.id_status  = r.`id_status`) as id_status ,  (select u.nombre_usuario from usuario u where u.id_usuario  = r.`id_usuario`) as id_usuario, telefono,anexo,grabacion
	FROM  `registro` r WHERE r.id_status = 5 
			
			'); 

		}
		
		else  if(!empty($tipo) and $tipo =='otro')
		{
		
			$query = $this->db->query('
			SELECT  id_registro, `se_saco_pf` ,  `nombre_cliente` ,  `numero_tarjeta` ,  `bloqueo_pf` , DATE( fecha_gestion ) AS fecha_gestion,  (select s.status from status s where s.id_status  = r.`id_status`) as id_status ,  (select u.nombre_usuario from usuario u where u.id_usuario  = r.`id_usuario`) as id_usuario, telefono,anexo,grabacion
	FROM  `registro` r WHERE r.id_status in (1,2,3) 
			
			'); 

		}
		else  if(!empty($tipo) and $tipo =='exportar')
		{
		
			$query = $this->db->get('vista_registro'); 

		}
		else 
		{
		
			$query = $this->db->query('
			
			SELECT  id_registro, `se_saco_pf` ,  `nombre_cliente` ,  `numero_tarjeta` ,  `bloqueo_pf` , DATE( fecha_gestion ) AS fecha_gestion,  (select s.status from status s where s.id_status  = r.`id_status`) as id_status ,  (select u.nombre_usuario from usuario u where u.id_usuario  = r.`id_usuario`) as id_usuario, telefono,anexo,grabacion
	FROM  `registro` r
			
			'); 

		}
		
		
		
		    
        return $query->result();
    }

   
   
 	 function get_registro($registro)
    {

		   $query = $this->db->query('
			
			SELECT  * FROM  `registro` r WHERE r.id_registro = '.$registro.' 
			
			'); 
 
 
        return $query->result();
    }  
   
   
   
   
   
   
   
   
   
   
   function set_registro($id_registro, $id_usuario, $id_status, $id_tipificacion_fraude, $bloqueo_pf, $dia_retiro_pf, 				 $numero_tarjeta, $nombre_cliente, $obs_llamado_1, $obs_llamado_2, $obs_llamado_3, $ultima_gestion, $se_saco_pf, 		
				 $quien, $titular_contactado, $dejar_mensaje, $enviar_carta, $telefono_erroneo,$telefono,$anexo)
    {
		

	$this->id_usuario =  $id_usuario;
	$this->id_status = $id_status;
	$this->id_tipificacion_fraude = $id_tipificacion_fraude;
	$this->bloqueo_pf = $bloqueo_pf;
	$this->dia_retiro_pf = $dia_retiro_pf;
	$this->numero_tarjeta = $numero_tarjeta;
	$this->nombre_cliente = $nombre_cliente;
	$this->obs_llamado_1 = $obs_llamado_1; 
	$this->obs_llamado_2 = $obs_llamado_2; 
	$this->obs_llamado_3 = $obs_llamado_3; 
	$this->ultima_gestion = $ultima_gestion; 
	$this->se_saco_pf = $se_saco_pf; 
	$this->quien = $quien; 
	$this->titular_contactado = $titular_contactado; 
	$this->dejar_mensaje = $dejar_mensaje; 
	$this->enviar_carta = $enviar_carta; 
	$this->telefono_erroneo = $telefono_erroneo;
	$this->telefono = $telefono;
	$this->anexo = $anexo;



        if($id_registro == 0)	
		{
		/* 
		
		
		    //**ACA VA A BUSCAR LA GRABACION AL CDR DEL ASTERISK**
			
		    //$DB2 = $this->load->database('asterisk', TRUE);
			
			
			$query = $DB2->query("select * from cdr where src = '".$anexo."' and dst like '%".$telefono."%' order by calldate desc, LIMIT 1");
			
			
			//** LUEGO EL NOMBRE DE LA GRABACION LO ASIGNA A LA VARIABLE
			
			foreach ($query->result() as $row)
			{
			   $this->grabacion = $row->grabacion;
			
			} 
			
			*/
			
			
			
			//SI NO TE FUNCIONA ESTO
			
			//$DB1 = $this->load->database('default', TRUE);
			//$DB2 = $this->load->database('asterisk', TRUE);
			//$DB1->query();
            //$DB1->result();
			//VE LA DOCUMENTACION EN http://codeigniter.com/user_guide/database/connecting.html
			
			
		    $resultado = $this->db->insert('registro', $this);	
			return $resultado;
			}
	    else	
			return $this->db->update('registro', $this, array('id_registro' => $id_registro));
    }



  function buscar_registros($columna_a_buscar,$valor_a_buscar)
  {
  
   $query = $this->db->query("select r.id_registro, r.`se_saco_pf` ,  r.`nombre_cliente` ,  r.`numero_tarjeta` ,
   r.`bloqueo_pf` , DATE( r.fecha_gestion ) AS fecha_gestion,  
   (select s.status from status s where s.id_status  = r.`id_status`) as id_status ,
   (select u.nombre_usuario from usuario u where u.id_usuario  = r.`id_usuario`) as id_usuario, 
   r.telefono,
   r.anexo,
   r.grabacion 
   from registro r where r.id_registro in (SELECT  v.id_registro FROM  vista_registro  v WHERE v.".$columna_a_buscar." like '%".$valor_a_buscar."%' )"); 
 
        return $query->result();
  
  }





}