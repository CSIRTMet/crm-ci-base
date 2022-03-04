<?php

class Principal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		
	}



function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			
			redirect(base_url().'index.php/usuario/login', 'refresh');
			die();	
		}		
	}	






	function index()
	{
	
         $tipo_usuario = $this->session->userdata('tipo_usuario');
		if($tipo_usuario != 4 && $tipo_usuario != 5){
			 $id_lista = $this->session->userdata('lista_id_lista');
			 if($id_lista == 0 or $id_lista == NULL){
				redirect(base_url().'index.php/usuario/login', 'refresh');
			 }else{
				//$this->output->cache(3);
				$this->load->view('vista_principal');
			}
		}else{
			if($tipo_usuario == 4 || $tipo_usuario == 5){
				//$this->output->cache(3);
				$this->load->view('vista_principal');
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
