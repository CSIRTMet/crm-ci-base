<?php 
class Tipificacion_modelo extends CI_Model {

     
     
    function __construct()
    {
        parent::__construct();
    }
    
	
	
	function getNivel1($campana=0)
	{
		$nivel1 = $this->db->get("nivel1")->result();
		return $nivel1;
	}
	
	function getNivel2($id_nivel1,$campana=0)
	{
		$sql = "select id_nivel2 as id_nivel, nombre
		 		from nivel2 where id_nivel2 
				in (select id_nivel2 from nivel1_nivel2 where id_nivel1  = ? ) 
		 		order by nombre ";
		$query = $this->db->query($sql, $id_nivel1);
        return $query->result();
	}
	
	function getNivel3($id_nivel2,$campana=0)
	{
		$sql = "select id_nivel3 as id_nivel, nombre
		 		from nivel3 where id_nivel3 
				in (select id_nivel3 from nivel2_nivel3 where id_nivel2  = ? ) 
		 		order by nombre ";
		$query = $this->db->query($sql, $id_nivel2);
        return $query->result();
	}
	
		function getNivel4($id_nivel3,$campana=0)
	{
		$sql = "select id_nivel4 as id_nivel, nombre
		 		from nivel4 where id_nivel4 
				in (select id_nivel4 from nivel3_nivel4 where id_nivel3  = ? ) 
		 		order by nombre ";
		$query = $this->db->query($sql, $id_nivel3);
        return $query->result();
	}
	
		function getRowNivel4($id_nivel4,$campana=0)
	{
		$this->db->where("id_nivel4", $id_nivel4);
		$res = $this->db->get("nivel4")->row();
        return $res;
	}
    
 
	

    //se rescatan las sub respuestas para ser usadas en el dropdown, ordenadas por peso de la respuesta asc
	//podria ser filtrada por la campania o por accion - repsuesta 
    function llenar_dropdown()
	{
		$query = $this->db->query('select id_nivel1 as id_nivel, nombre from nivel1 order by peso desc');
		$data = array();
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[$row['id_sub_respuesta']]= $row['nombre'];
			}
			return $data;
		}
	}
	
	
	
	
	
	


}