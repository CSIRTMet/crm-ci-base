<?php
class Grupo extends CI_Controller {
       	function __construct()
       	{
            parent::CI_Controller();
       	}
	
	function index()
	{
		$this->load->model('Grupo_model');

		$data['title'] = "Mis Grupos";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Agenda->get_last_ten_entries();

		$this->load->view('grupo', $data);
	}
}
?>

