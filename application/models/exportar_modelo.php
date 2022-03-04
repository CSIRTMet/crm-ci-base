<?php

class Exportar_modelo extends CI_Model
{	
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function index()
	{
		
	}
	function get_registros($id_campana,$tipo_campana,$dia)
    {
		date_default_timezone_set("America/Santiago");
		if($dia== "hoy"){
			$fecha = time ();  
			$fecha  = date ( "Y-m-d" , $fecha );
		}else{
			if($dia == "ayer"){
				$fecha = date("Y-m-d", strtotime("yesterday"));		
			}
		}
		
		//$fecha = "2011-03-19";
           //   $this->db->where('fecha', $fecha);
		$this->db->where('id_campana', $id_campana);

		if($tipo_campana == 1){
			if($dia =="ayer"){
				$query = $this->db->get('vista_gestion_cob_ayer');
			}else{
				if($dia =="hoy"){
					$query = $this->db->get('vista_gestion_cob_hoy');
				}else{
					if($dia =="todo"){
						$query = $this->db->get('vista_gestion_cob_hoy');
					}
				}
			}
		}else{
			if($dia == "ayer"){
				$query = $this->db->get('vista_gestion_mkt_ayer');
			}else{
				if($dia == "hoy"){
					$query = $this->db->get('vista_gestion_mkt_hoy');
				}else{
					if($dia == "todo"){
						$query = $this->db->get('vista_gestion_mkt_todo');
					}else{
						if($dia == "venta"){
							$query = $this->db->get('vista_gestion_mkt_ventas'); 
						}
					}
				}
			}			
		}
		return $query->result();
	}
	function get_tbl_result($id_campana,$tipo_campana,$tabla,$fecha)
    {
    	if($tipo_campana == 2){
    		$sql="select * from ".$tabla." where date_format(fecha_venta,'%Y%m%d')=date_format('".$fecha."','%Y%m%d') and id_campana=".$id_campana;
			$query = $this->db->query($sql);
	   		return $query->result();
    	}
    }
}
?>
