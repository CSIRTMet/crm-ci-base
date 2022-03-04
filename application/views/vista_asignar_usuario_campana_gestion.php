



<?php 

function traduce_usuario($tipo)
{
      
	 
	 switch($tipo)
	  {
	  case 1: 	return "Administrador";
	  			break;
	  case 2: 	return "Supervidor";
	  			break;	  
	  case 3: 	return "Agente";
	  			break;
	   case 4: 	return "Agente Back";
	  			break;
	  case 5: 	return "Agente Auditor";
	  			break;
	  default:  return "NA";
	  
	  } 
}

?>
<?php $this->load->view('includes/header'); ?>

<title>KUBO :: COBRANZA </title>
<div id="asignar_usuario_form">

	<h1>Asignar usuario</h1>
	<?php echo validation_errors();?>


<?php echo form_open("usuario_gestion/asignar_usuario_gestion"); ?>
	<table width="90%" align="center">
		<tr style="text-align: left">
			
			<td width="37%">
				 
				<input type="hidden" name="id_campana" id="id_campana" value="<?php echo $this->session->userdata('campana'); ?>">
			</td>
		</tr>
		
		
		<tr style="text-align: left">
			<td width="37%">
				Usuarios:			</td>
			<td width="63%">
			
			 <select name="usuarios[]" size="10" multiple id="usuarios[]" >
			 <?php 	
				foreach($usuarios as $usuario):
				 
				 echo "<option value='".$usuario->id_usuario."'>".$usuario->nombre_usuario." - [".traduce_usuario($usuario->tipo_usuario)."] </option>";
				
				endforeach; 
				?>
 
 
				 
			 </select>
			
			</td>
		</tr>
	</table> 
	<br><br><br>
	
	<div align="center">
	<?php echo form_submit('submit', 'Guardar'); 
	 	  $js = 'onClick="window.close()"';
		  echo form_reset('cancelar', 'Cancelar', $js);
		  echo form_close(); ?>
	</div>
</form>
</div>


<?php $this->load->view('includes/footer'); ?>