<?php
class Transaccion extends CI_Controller {
       	function __construct()
       	{
            parent::CI_Controller();
       	}
	
	function index()
	{
		$this->load->model('Transaccion_model');

		$data['title'] = "Mis Transacciones";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Transaccion->get_last_ten_entries();

		$this->load->view('transaccion', $data);
	}
}
?>

