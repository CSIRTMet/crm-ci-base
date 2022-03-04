 <script type="text/javascript" >
$(document).ready(function()
{
  jQuery('.numbersOnly').keyup(function () { 
	this.value = this.value.replace(/[^0-9]/g,'');
	
 });

});

</script>
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="ui-layout-pane">
    
	
	
	
	
	
	
	<!-- borrar !-->
	
	<tr>
      <td width="16%" ><a href="#" name="nuevos_telefonos" id="nuevos_telefonos" onclick="mostrar_div_nuevo_telefono();">+ Agregar Fono</a></td>
      <td width="16%"> </td>
      <td width="18%"> </td>
      <td width="18%"> </td>
    </tr>
	
	
	
	
	
    <tr>
      <td width="16%" class="x-combo-list-hd">TELEFONO </td>
   
    </tr>
	   
<?php foreach($telefonos as $telefono):
		$color = '';
		if ($telefono->tipificacion==1){
		$color = 'bgcolor="#66CC33"';
		};  
?>
<tr>
	  <td  class = "x-grid3-row-over" nowrap="nowrap"<?php echo  $color ?> ><?php echo $telefono->numero;?>  <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" onclick="llamar('<?php echo $telefono->numero."#".$telefono->id_telefono."#".$telefono->id_cliente; ?>')"  /></td>
	   
  </tr>
      <?php endforeach;?> 
</table>
  
  
<div id="div_nuevo_telefono" style="display:none">
    
  <table width="100%" border="0" cellpadding="0" cellspacing="0" >
    <tr>
      <td width="9%" class="x-progress-text-back"><div align="center" class="style1">Area</div></td>
      <td width="15%" class="x-progress-text-back"><div align="center" class="style1">Numero</div></td>
      <td width="14%" class="x-progress-text-back"><div align="center" class="style1">Tipo</div></td>
      <td width="62%" class="x-progress-text-back"><div align="center" class="style1"></div></td>
    </tr>
    <tr>
      <td width="9%" class="x-box-mc"><input name="txt_area_add" type="text" id="txt_area_add" size="10" maxlength="2"  class="numbersOnly"></td>
      <td width="15%" class="x-box-mc"><input name="txt_numero_add" type="text" id="txt_numero_add" size="20" maxlength="12"  class="numbersOnly"></td>
      <td width="14%" class="x-box-mc">
	<select name="select_tipo_telefono_add" id="select_tipo_telefono_add">
	      <option value="0">*Seleccione*</option>
	      <option value="1">Fijo</option>
	      <option value="2">Movil</option>
	</select>	</td>
      <td width="62%" class="x-box-mc">
	<a href="#" id="agregar_nuevo_telefono" name="agregar_nuevo_telefono" onClick="guardar_telefono();">Guardar Fono</a>
	-
	<a href="#" id="ocultar_div_nuevo_telefono" name="ocultar_div_nuevo_telefono" onClick="ocultar_div_nuevo_telefono()">Cancelar</a></td>
    </tr>
  </table>
</div> 
  
  
  
 
  