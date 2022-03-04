<?php 
class Telefono_modelo extends CI_Model {

    var $clasificacion   = '';
    var $tipificacion = '';
   /*
   NUMERO =  AREA + TELEFONO
   
   */

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
	
	function get_telefonos_cliente($id_cliente, $tipo_campana)
    {
	
		if($tipo_campana == 1){
			$sql = "select id_telefono, id_cliente, rut, telefono, area, numero, tipo, tipificacion, clasificacion from telefono where id_cliente = ".$id_cliente." and (tipificacion is null or tipificacion <> 1) order by tipo asc ";
		}else{
			$sql = "select id_telefono, id_cliente, rut, telefono, area, numero, tipo, tipificacion, clasificacion , compania, segundos_ldn , segundos_ldi from telefono_mkt where id_cliente = ".$id_cliente." and (tipificacion is null or tipificacion <> 1)  order by tipo asc  ";
		}
	
		$query = $this->db->query($sql);
	  
		
        return $query->result();
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



	function ingresar_nuevo_telefono($id_cliente,$numero,$area,$tipo,$rut)
	{
	
	$data["id_cliente"] = $id_cliente;
	$data["numero"] = $area.$numero; 
	$data["telefono"] = $numero;
	$data["area"] = $area;
	$data["tipo"] = $tipo;
	$data["rut"] = $rut;
	$tipo_campana = $this->session->userdata('campana_tipo');
		
		if($tipo_campana == 2) //marketing
		{
			return $this->db->insert('telefono_mkt', $data);
		}
		else
		{
			return $this->db->insert('telefono', $data);
		}
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
	
	
	
	function set_calificacion($id_telefono,$id_clasificacion,$id_tipificacion, $tipo_campana, $id_numero, $id_cliente = 0)
    {
	//return  "$id_direccion,$id_clasificacion,$id_tipificacion";
	$data = array(
               'clasificacion' => $id_clasificacion,
               'tipificacion' => $id_tipificacion,
            );
	
	if($tipo_campana==1)
	{
		return $this->db->update('telefono', $data, array('id_telefono' => $id_telefono));
	}
	else
	{
		if($id_numero==0 || $id_numero=="0"){
			return $this->db->update('telefono_mkt', $data, array('id_telefono' => $id_telefono));
		}
		else
		{
			$id_campana = $this->session->userdata("campana_id_campana");
			$sql = "update tmp_base_oficial_camp_$id_campana set tipificacion_fono$id_numero = $id_tipificacion 
			where id_cliente = $id_cliente ";
			return $this->db->query($sql);
		}
		
	}
	
	
    }
    function getRutCliente($id_campana,$tipo_campana,$id_cliente){
		if($tipo_campana == 2){
			$this->db->select('rut,dv');
			$this->db->from('campana_cliente_mkt');
			$array = array('campana_cliente_mkt.id_campana' => $id_campana,'campana_cliente_mkt.id_cliente' => $id_cliente);
			$this->db->where($array);
		}else{
			$this->db->select('rut,dv');
			$this->db->from('campana_cliente');
			$array = array('campana_cliente.id_campana' => $id_campana,'campana_cliente.id_cliente' => $id_cliente);
			$this->db->where($array);
		}
		$query = $this->db->get();
		return $query->result();
    }
}