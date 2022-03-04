<?php
class Fonos extends CI_Controller {

	function Fonos()
	{
		parent::CI_Controller();
	}

	function index()
	{
		$this->output->enable_profiler(TRUE);
		//Query the data table for every record and row
		$this->load->model('fonos_model');
		$query = $this->db->get('fonos');
		foreach ($query->result() as $row)
		{
		    echo $row->fono;
		}


		$this->load->view('fonos_view');
		/*
		$this->output->enable_profiler(TRUE);
		$this->load->helper('url');
		$this->load->model('Fonos_model');
		$data['result'] = $this->fonos_model->getData();
   		$data['page_title'] = "CI Hello World App!";
 
   		$this->load->view('fonos_view',$data);
		*/
		//$this->load->view('fonos_view',$data);
	}
}
?>
