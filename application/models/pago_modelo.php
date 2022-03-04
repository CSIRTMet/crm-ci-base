<?php 
class Pago_modelo extends CI_Model {

    var $region   = '';
    var $ciudad = '';
    var $comuna    = '';
    var $calle    = '';
    var $numero    = '';
    var $complemento    = '';
	var $rut    = '';
  

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
	
	function get_pagos_cliente($id_cliente)
    {
        $this->db->where('id_cliente', $id_cliente); 
     
		
		$query = $this->db->get('pago');
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
	
	
	
	

}