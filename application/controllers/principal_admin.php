<?php

class Principal_admin extends CI_Controller {

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
	
    //$this->output->cache(3);
		$this->load->view('vista_principal_admin');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
