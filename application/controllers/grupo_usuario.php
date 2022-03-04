<?php
class Grupo_usuario extends CI_Controller {
       	function __construct()
       	{
            parent::CI_Controller();
       	}
	
	function index()
	{
		$this->load->model('Grupo_usuario_model');

		$data['title'] = "Mis Grupos";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Grupo_usuario->get_last_ten_entries();

		$this->load->view('grupo_usuario', $data);
	}
}
?>

