
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="ui-layout-pane">
    
	
	
	
	
	
	
	<!-- borrar !-->
	<tr>
      <td width="16%" ><a href="#" name="nuevos_emails" id="nuevos_emails" onclick="mostrar_div_nuevo_email();">+ Agregar Email</a></td>
      <td width="16%"> </td>
      <td width="18%"> </td>
      <td width="18%"> </td>
    </tr>
	
	
	
	
	
    <tr>
      <td width="16%" class="x-combo-list-hd">Email </td>
      <td width="16%" class="x-combo-list-hd">Tipo email </td>
    </tr>
	   
<?php foreach($emails as $email):
		$color = '';
		  
?>
<tr>
	  <td  class = "x-grid3-row-over" nowrap="nowrap"<?php echo  $color ?> ><?php echo $email->email;?> </td>
	 <td class = "x-grid3-row-over" nowrap="nowrap" ><?php 
	  
	  switch($email->tipo)
	  {
	  case 1: 	echo "Personal";
	  			break;
	  case 2: 	echo "Trabajo";
	  			break;
	  default:  echo "NA";
	  
	  }
?>
</td>
  </tr>
      <?php endforeach;?> 
</table>
  
  
<div id="div_nuevo_email" style="display:none">
    
  <table width="100%" border="0" cellpadding="0" cellspacing="0" >
    <tr>
      <td width="9%" class="x-progress-text-back"><div align="center" class="style1">Email</div></td>
      <td width="15%" class="x-progress-text-back"><div align="center" class="style1">Tipo</div></td>
      <td width="14%" class="x-progress-text-back"><div align="center" class="style1"></div></td>
      <td width="62%" class="x-progress-text-back"><div align="center" class="style1"></div></td>
    </tr>
    <tr>
      <td width="9%" class="x-box-mc"><input name="txt_email" type="text" id="txt_email" size="50" maxlength="200"></td>
      <td width="15%" class="x-box-mc">
	<select name="select_tipo_email_add" id="select_tipo_email_add">
	      <option value="0">*Seleccione*</option>
	      <option value="1">Personal</option>
	      <option value="2">Trabajo</option>
	</select>	</td>
      <td width="14%" class="x-box-mc"></td>
      <td width="62%" class="x-box-mc">
	<a href="#" id="agregar_nuevo_email" name="agregar_nuevo_email" onClick="guardar_email();">Guardar Email</a>
	-
	<a href="#" id="ocultar_div_nuevo_email" name="ocultar_div_nuevo_email" onClick="ocultar_div_nuevo_email()">Cancelar</a></td>
    </tr>
  </table>
</div> 
  
  
  
 
  
