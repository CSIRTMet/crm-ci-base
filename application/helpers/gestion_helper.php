<?php


	function is_supervisor_logged($is_logged_in,$user_type)
	{
		if(!isset($is_logged_in) || $is_logged_in != true){
			return false;	
		}
		else{
			if($user_type == 2)
				return true;
			else
				
				return false;
		}
	}
	
	function is_empresa_set($empresa)
	{
		if(!isset($empresa) || $empresa == null){
			return false;	
		}
		else{
			return true;
		}
	}
	
	function is_campana_set($camp)
	{
		if(!isset($camp) || $camp == null){
			return false;	
		}
		else{
			return true;
		}
	}
	

?>