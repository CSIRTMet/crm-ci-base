<?php 
class Usuario_modelo extends CI_Model {

     
    var $rut   = '';
    var $nombre_usuario = '';
    var $clave    = '';
    var $nombre    = '';
    var $tipo_usuario    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    


   function validar_usuario($usuario,$clave,$anexo,$ip_usuario)
	{
		$this->db->where('nombre_usuario',$usuario);// $this->input->post('username'));
		$this->db->where('clave', $clave);// md5($this->input->post('password')));
		
		$query = $this->db->get('usuario');
		
		
		
		if($query->num_rows == 1)
		{
		
			 foreach ($query->result() as $row)
			{
   				$data = array(
					'id_usuario' => $row->id_usuario,
					'nombre_usuario' => $row->nombre_usuario,
					'tipo_usuario' => $row->tipo_usuario,
					'nombre' => $row->nombre,
					'is_logged_in' => true,
					'usuario_anexo' => $anexo,
					'usuario_ip' => $ip_usuario
				);
			} 
			
			$this->session->set_userdata($data);
			return true;
		}
		else 
		{
			return false;
		}
	}

    
    function get_last_ten_entries()
    {
        $query = $this->db->get('cliente', 10);
        return $query->result();
    }

	
	function get_usuario($id_usuario, $num, $offset)
    {
	if($id_usuario == 0){
        	$query = $this->db->get('usuario', $num, $offset);
	}else{
		$this->db->where('id_usuario', $id_usuario);
		$query = $this->db->get('usuario'); 
	}
	return $query->result();
    }

    function set_usuario($id_usuario,$rut,$nombre_usuario,$clave,$nombre,$tipo_usuario)
    {
        $this->rut   = $rut; // please read the below note
        $this->nombre_usuario = $nombre_usuario;
        $this->clave = $clave;
        $this->nombre = $nombre;
	$this->tipo_usuario = $tipo_usuario;

	if($id_usuario == 0)	return $this->db->insert('usuario', $this);
        else	return $this->db->update('usuario', $this, array('id_usuario' => $id_usuario));
    }
    


}