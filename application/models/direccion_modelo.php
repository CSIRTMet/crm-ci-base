<?php 
class Direccion_modelo extends CI_Model {

   
	var $clasificacion    = '';
	var $tipificacion    = ''; 
	var $direccion;
	var $rut;
	var $nombre_comuna;
  

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
	
	function get_direcciones_cliente($id_cliente,$tipo_campana)
    {
        $this->db->where('id_cliente', $id_cliente); 

		if($tipo_campana == 1){
			$this->db->where('tipificacion', 1);
			$query = $this->db->get('direccion');
			}else{
			$this->db->where('tipificacion', 1);
			$query = $this->db->get('direccion_mkt');
			}
 	
        return $query->result();
    }
	
	
	
	function get_mejor_direccion_cliente($id_cliente)
    {
		$sql = "select d.*, c.regi_codigo, c.ciud_codigo, c.comu_codigo 
		from direccion_mkt d
		inner join comuna c on c.id_comuna = d.id_comuna
		where id_cliente = ? 
		and tipificacion = 1 
		and d.id_comuna < 700 
		order by id_direccion desc 
		limit 1";
		$query = $this->db->query($sql, array($id_cliente)); 
        return $query->row();
    }



	function get_direccion($id_direccion,$tipo_campana)
    {
        $this->db->where('id_direccion', $id_direccion); 
    	
		if($tipo_campana == 1){
		$query = $this->db->get('direccion');
        }else{
	    $query = $this->db->get('direccion_mkt');
	    }
	   
	    return $query->result();
    }


	function get_columnas()
		{
			//DEBE APUNTAR A LOS CAMPOS DE LA VISTA DEL CLIENTE Y NO A LA TABLA CLIENTE
			$query = $this->db->list_fields('cliente');
			return $query;
		}


	
	function set_calificacion($id_direccion,$id_clasificacion,$id_tipificacion,$tipo_campana)
    {
	//return  "$id_direccion,$id_clasificacion,$id_tipificacion";
	$data = array(
               'clasificacion' => $id_clasificacion,
               'tipificacion' => $id_tipificacion,
            );
	
	        
	
		if($tipo_campana==1)
		{
			return $this->db->update('direccion', $data, array('id_direccion' => $id_direccion));
		}
		else
		{
			return $this->db->update('direccion_mkt', $data, array('id_direccion' => $id_direccion));
		}
	
    }	
	
	
	
	/*********************************************/
	/*	REGION	 CIUDAD	 COMUNA	*/
	/*********************************************/
	
	function get_regiones()
    {
		$this->db->where('id_region <>', 700); 
		$query = $this->db->get('region');	   
	    return $query->result();
    }
	function get_ciudades($id_region)
    {
		$this->db->where('id_region', $id_region); 
		//$this->db->where('id_ciudad <>', 700); 
		$query = $this->db->get('ciudad');	   
	    return $query->result();
    }
	function get_comunas($id_ciudad)
    {
		$this->db->where('id_ciudad', $id_ciudad); 
		$query = $this->db->get('comuna');	   
	    return $query->result();
    }
	/*********************************************/
	/*********************************************/
	
	
function ingresar_nueva_direccion($id_cliente,$id_region,$id_ciudad,$id_comuna,$calle,$numero,$complemento,$rut)

{
	$data["id_cliente"] = $id_cliente;
	$data["id_region"] = $id_region; 
	$data["id_ciudad"] = $id_ciudad;
	$data["id_comuna"] = $id_comuna;
	$data["calle"] = $calle;
	$data["numero"] = $numero;
	$data["complemento"] = $complemento;
	$data["direccion"] = $calle." ".$numero." ".$complemento;
	$data["rut"] = $rut;
	
	$sqla = "select nombre from region where id_region = ".$id_region;
	$sqlb = "select nombre from ciudad where id_ciudad = ".$id_ciudad;
	$sqlc = "select nombre from comuna where id_comuna = ".$id_comuna;
	
	$consultaa = $this->db->query($sqla);
	$rowa = $consultaa->row();
	$nombre_region = $rowa->nombre;
		
	$consultab = $this->db->query($sqlb);
	$rowb = $consultab->row();
	$nombre_ciudad = $rowb->nombre;
	
	$consultac =$this->db->query($sqlc);
	$rowc = $consultac->row();
	$nombre_comuna = $rowc->nombre;
	
	$data["nombre_region"] = $nombre_region; 
	$data["nombre_ciudad"] = $nombre_ciudad;
	$data["nombre_comuna"] = $nombre_comuna;
	
	$tipo_campana = $this->session->userdata('campana_tipo');
		
		if($tipo_campana == 2) //marketing
		{
			return $this->db->insert('direccion_mkt', $data);
		}
		else
		{
			return $this->db->insert('direccion', $data);
		}
	}





	
	

}