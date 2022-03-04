<?php
class Campana_grupo extends CI_Controller {
       	function __construct()
       	{
            parent::CI_Controller();
       	}
	
	function index()
	{
		$this->load->model('campana_grupo');

		$data['title'] = "Mis Campana_grupo";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Campana_grupo->get_last_ten_entries();

		$this->load->view('campana_grupo', $data);
	}
}
?>

