<?php
class Campana extends CI_Controller {
       	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->load->helper('gestion');
		$this->load->model('campana_gestion_modelo','camp');
	}

	function index()
	{	
		$data = $this->listar_campana();
		$this->load->view('vista_seleccion_campana_gestion',$data); 	
	}

	function set_campana_selected($id_campana)
	{
	    $id_usuario = $this->session->userdata('id_usuario');
		$this->session->set_userdata('campana',$id_campana);		
		$this->setea_session($id_usuario,$id_campana);
		
		$tipo_usuario = $this->session->userdata('tipo_usuario');
		
		if($tipo_usuario == 4 ||$tipo_usuario == 5){
			redirect(base_url().'index.php/principal/index', 'refresh');
		}
		//redirect(base_url().'index.php/principal/index', 'refresh');
	}
	
	function listar_campana()
	{
		$empresa = $this->session->userdata('empresa');
		$usuario = $this->session->userdata('id_usuario');
		$data["campanas_usuario"] = $this->camp->list_campana_agente($empresa,$usuario);
		return $data;
	}
	
	function setea_session($id_usuario,$id_campana)
	{
		$lista_id_lista = 0;
		$lista_nombre = '';
		$lista_numero_gestiones = 0;
		
		$campana_id_empresa = 0;
		$campana_id_campana = 0;
		$campana_nombre 	= '';
		$campana_estado 	= 0;
		$campana_tipo   	= 0;

		$this->load->model('Campana_gestion_modelo');
		$resultado = $this->Campana_gestion_modelo->get_campanas($id_campana);
		foreach($resultado as $result):
			$campana_id_empresa = $result->id_empresa;
			$campana_id_campana = $result->id_campana;
			$campana_nombre = $result->nombre;
			$campana_estado = $result->estado;
			$campana_tipo = $result->tipo;
			$empresa_nombre = $result->nombre_empresa;
		endforeach;
		
		$this->session->set_userdata('campana_id_empresa',$campana_id_empresa);
		$this->session->set_userdata('campana_id_campana',$campana_id_campana);
		$this->session->set_userdata('campana_nombre',$campana_nombre);
		$this->session->set_userdata('campana_estado',$campana_estado);
		$this->session->set_userdata('campana_tipo',$campana_tipo);
		$this->session->set_userdata('empresa_nombre',$empresa_nombre);
		
		/* echo "</br>".$this->session->userdata("campana_id_empresa");
		echo "</br>".$this->session->userdata("campana_id_campana");
		echo "</br>".$this->session->userdata("campana_nombre");
		echo "</br>".$this->session->userdata("campana_estado");
		echo "</br>".$this->session->userdata("campana_tipo");
		echo "</br>".$this->session->userdata("empresa_nombre"); */
		//recupero los valores de la campa?a
		
		
		$this->form_seleccionar_lista_activa($id_usuario,$id_campana);
		
		
		
		
	}







function form_seleccionar_lista_activa($id_usuario,$id_campana)
	{	   

		$this->load->model('Lista_gestion_modelo');
		$data["listas"] = $this->Lista_gestion_modelo->get_lista_activa_del_usuario($id_usuario,$id_campana);
		$this->load->view('vista_seleccion_lista_activa',$data); 	
	}
	
function set_lista_selected($id_lista)
	{
	    $this->load->model('Lista_gestion_modelo');
		$resultado = $this->Lista_gestion_modelo->get_lista_result($id_lista);
		foreach($resultado as $result):
			$lista_id_lista = $result->id_lista;
			$lista_nombre = $result->nombre;
			$lista_numero_gestiones = $result->numero_gestiones;
		endforeach;
		
		$this->session->set_userdata('lista_id_lista',$lista_id_lista);
		$this->session->set_userdata('lista_nombre',$lista_nombre);
		$this->session->set_userdata('lista_numero_gestiones',$lista_numero_gestiones);
		redirect(base_url().'index.php/principal/index', 'refresh');
		
		//redirect(base_url().'index.php/principal/index', 'refresh');
	}

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
