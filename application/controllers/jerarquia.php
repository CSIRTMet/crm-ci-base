<?php
class Jerarquia extends CI_Controller {
       	function __construct()
       	{
            parent::CI_Controller();
       	}
	
	function index()
	{
		$this->load->model('Jerarquia_model');

		$data['title'] = "Mis jerarquias";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Jerarquia->get_last_ten_entries();

		$this->load->view('jerarquia', $data);
	}
}
?>

