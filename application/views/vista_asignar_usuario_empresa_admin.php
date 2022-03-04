



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
<html>
<head>
  <title>Asignar usuario a Empresa</title>
  <link rel="StyleSheet" href="CSS/estilosBUILDER.css" type="text/css">
  <script language="javascript" type="text/javascript" src="../JS/jquery.js"></script>
</head>  
<body class="popupBody">
<table class="popupTableBorder">
<tr><td width="286">
<div class="Div_popup_backgr">
<?php echo form_open("empresa_admin/add_usuario_empresa"); ?>
	<table width="90%" align="center">
		<tr style="text-align: left">
			
			<td width="37%">
				 
				<input type="hidden" name="id_empresa" id="id_empresa" value="<?php echo $empresa->id_empresa; ?>">
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
	<input type="submit" value=" Guardar " /> 
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" value=" Cancelar " onClick="window.opener.location = window.opener.location; window.close()" /> 
	</div>
</form>
</div>
</td></tr>
</table>
</body>
</html>