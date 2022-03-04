<?php 
class Email_modelo extends CI_Model {

    var $clasificacion   = '';
    var $tipificacion = '';
   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('email', 10);
        return $query->result();
    }
	
	function get_email_cliente($id_cliente, $tipo_campana)
    {
        $this->db->where('id_cliente', $id_cliente); 
    	 
		$this->db->order_by('tipo', 'desc');
    	$this->db->limit(1);
		
		if($tipo_campana == 1){
			$query = $this->db->get('email');
		}else{
			$query = $this->db->get('email_mkt');
		}
        return $query->result();
    }


	function get_columnas()
		{
			//DEBE APUNTAR A LOS CAMPOS DE LA VISTA DEL CLIENTE Y NO A LA TABLA CLIENTE
			$query = $this->db->list_fields('email');
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
	
	
	
	function set_calificacion($id_telefono,$id_clasificacion,$id_tipificacion)
    {
	//return  "$id_direccion,$id_clasificacion,$id_tipificacion";
	$data = array(
               'clasificacion' => $id_clasificacion,
               'tipificacion' => $id_tipificacion,
            );
	
	return $this->db->update('telefono', $data, array('id_telefono' => $id_telefono));
    }	
	
	function ingresar_nuevo_email($id_cliente,$email,$tipo,$rut){
		$data["id_cliente"] = $id_cliente;
		$data["email"] = $email; 
		$data["tipo"] = $tipo;
		$data["rut"] = $rut;	
		$tipo_campana = $this->session->userdata('campana_tipo');
		
		if($tipo_campana == 2) //marketing
		{
			return $this->db->insert('email_mkt', $data);
		}
		else
		{
			return $this->db->insert('email', $data);
		}
	}


}