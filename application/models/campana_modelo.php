<?php
class Campana_modelo extends CI_Model {

    var $id_empresa   = '';
    var $nombre = '';
    var $fecha_inicio    = '';
    var $fecha_termino    = '';
    var $codigo	    = '';
    var $estado    = '';
    var $tipo    = '';

   function __construct(){
      parent::__construct();
    }     	
   function get_campana($id_campana, $num, $offset)
    {
	if($id_campana == 0){
        	$query = $this->db->get('campana', $num, $offset);
	}else{
		$this->db->where('id_campana', $id_campana);
		$query = $this->db->get('campana'); 
	}
	return $query->result();
    }

   function set_campana($id_campana, $id_empresa, $nombre, $fecha_inicio, $fecha_termino, $codigo, $estado, $tipo)
    {
	$this->id_campana   = $id_campana; // please read the below note
        $this->id_empresa   = $id_empresa;
        $this->nombre = $nombre;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_termino = $fecha_termino;
        $this->codigo = $codigo;
        $this->estado = $estado;
	$this->tipo = $tipo;

        if($id_campana == 0)	return $this->db->insert('campana', $this);
	else	return $this->db->update('campana', $this, array('id_campana' => $id_campana));
    }


}
?>
