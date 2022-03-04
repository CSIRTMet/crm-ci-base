<?php

class Usuario_gestion extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('gestion');
		$this->load->model('usuario_gestion_modelo','user');
		
		if(!is_supervisor_logged($this->session->userdata('is_logged_in'),$this->session->userdata('tipo_usuario'))){
			redirect(base_url().'index.php/usuario/logout', 'refresh');
		}
		if(!is_campana_set($this->session->userdata('campana'))){
			redirect(base_url().'index.php/campana_gestion/index', 'refresh');
		}
	}
	
	function index()
	{
		$data["usuarios"] = $this->listar_usuario_gestion();
		$this->load->view('vista_listar_usuario_gestion',$data);
	}
	
	function listar_usuario_gestion()
	{
		$campana = $this->session->userdata('campana');
		$query = $this->user->get_usuario_gestion($campana);
		return $query;
	}
	
	function form_asignar_usuario_gestion()
	{
		$campana = $this->session->userdata('campana');
		$empresa = $this->session->userdata('empresa');
		$data['usuarios'] = $this->user->get_usuarios_no_gestion($campana , $empresa);
		$this->load->view('vista_asignar_usuario_campana_gestion',$data);
	}
	
	function asignar_usuario_gestion()
	{
		$campana = $this->session->userdata('campana');
		$usuarios = $this->input->get_post("usuarios");
		
		foreach($usuarios as $usuario)
		{ 
			$this->user->add_usuario_gestion($campana,$usuario);
		}
		echo '<body onload="opener.location.reload(); window.close();"></body>';
	}
	
	function eliminar_usuario_campana($id_agente)
	{
		$id_campana = $this->session->userdata('campana_id_campana');
		$id_usuario = $this->session->userdata('id_usuario');
		
		$resultado = $this->user->eliminar_usuario_campana_gestion($id_agente, $id_usuario , $id_campana);
		
		if($resultado == "ok")
		{
			redirect('usuario_gestion/index');
		}
		else
		{
			echo "NO SE PUDO ELIMINAR EL USUARIO, VUELVA A INTENTAR MAS TARDE LA OPERACION";
		}
		
	}
	
	
	function get_agendamiento_usuario_gestion(){
	  
	   $id_usuario =  $this->input->get_post("id_usuario");
	   $id_campana = $this->session->userdata('campana_id_campana');
	    
	   $agendamientos = $this->user->get_agendamiento_usuario_gestion($id_usuario, $id_campana);
	   echo $agendamientos;
	}
	
	
	
	
	
	
	 
	
}
?>
