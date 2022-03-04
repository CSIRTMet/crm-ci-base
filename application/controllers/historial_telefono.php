<?php
class Historial_telefono extends CI_Controller {
       	function __construct()
       	{
            parent::CI_Controller();
       	}
	
	function index()
	{
		$this->load->model('Historial_telefono_model');

		$data['title'] = "Mis Historiales telefonicos";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Historial_telefono->get_last_ten_entries();

		$this->load->view('historial_telefono', $data);
	}
}
?>

