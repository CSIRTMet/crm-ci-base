<table width="100%" border="0" cellpadding="0" cellspacing="0" class="ui-layout-pane">
    
	
	
	<tr style="display:none">
      <td width="16%" ><a href="#" name="nueva_direccion" id="nueva_direccion" onclick="mostrar_div_nueva_direccion();">+ Agregar Direccion</a></td>
      <td width="16%"> </td>

    </tr>
	
	
    <tr>
      <td width="16%" class="x-combo-list-hd">DIRECCION [verde = formato válido]</td>
      <td width="14%" class="x-combo-list-hd">CLASIFICAR</td>
    </tr>
    
     
<?php 
$direccion_correcta = 0;
foreach($direcciones as $direccion):

$color = '';
if ($direccion->tipificacion==1 && $direccion->id_comuna > 0 && $direccion->id_comuna < 700 ){
	$direccion_correcta = 1;
$color = 'bgcolor="#66CC33"';

};  ?>
<tr>

	 
	  <td nowrap="nowrap"<?php echo  $color ?> ><?php echo $direccion->direccion.", ".$direccion->nombre_comuna.", ".$direccion->nombre_ciudad.""; ?></td>
	  
	 
	<td><img src="<?php echo base_url() ?>/css/images/icono_direccion.gif" style="cursor:pointer" height="17"  align="absmiddle" onclick="validar_direccion('<?php echo $direccion->id_direccion; ?>','<?php echo $direccion->id_cliente; ?>'); " /></td>
    </tr>  
	 
 <?php endforeach;?> 
	  
	<input type="hidden" name="direccion_correcta" id="direccion_correcta" value="<?php echo $direccion_correcta ?>" />  
	  
      
  </table>
  
  
<div id="div_nueva_direccion" style="display:inline">
    
  <table width="100%" border="0" cellpadding="0" cellspacing="0" >
    <tr>
      <td width="9%" class="x-progress-text-back"><div align="center" class="style1">Region</div></td>
      <td width="15%" class="x-progress-text-back"><div align="center" class="style1">Ciudad(Provincia)</div></td>
      <td width="14%" class="x-progress-text-back"><div align="center" class="style1">Comuna</div></td>
      <td width="62%" class="x-progress-text-back"><div align="center" class="style1"></div></td>
    </tr>
    
    <tr>
      <td width="9%" class="x-box-mc">
	  <select name="select_region" id="select_region" >
        <option value="0">*Seleccione*</option>
        <?php foreach($regiones as $region):?>
        <option value="<?php echo $region->id_region; ?>"><?php echo $region->codigo." ".$region->nombre; ?></option>
        <?php endforeach; ?>
      </select></td>
      <td width="15%" class="x-box-mc"><select name="select_ciudad" id="select_ciudad">
        <option value="0">*Seleccione*</option>
        
      </select></td>
      <td width="14%" class="x-box-mc">
	<select name="select_comuna" id="select_comuna">
	      <option value="0">*Seleccione*</option>
	</select>	</td>
      <td width="62%" class="x-box-mc">
	<a href="#" id="agregar_nueva_direccion" name="agregar_nueva_direccion" onClick="guardar_direccion();">Guardar Direccion</a>
	-
	<!-- <a href="#" id="ocultar_div_nueva_direccion" name="ocultar_div_nueva_direccion" onClick="ocultar_div_nueva_direccion()">Cancelar</a>!-->
    </td>
    </tr>
	
	<tr>
      <td colspan="4" class="x-box-mc">Calle
        <input name="dir_calle" 	  type="text" id="dir_calle" 		size="30" maxlength="300" />
        Numero 
        <input name="dir_numero" 	  type="text" id="dir_numero" 		size="5" maxlength="5" /> 
        Complemento 
        <input name="dir_complemento" type="text" id="dir_complemento"  size="40" maxlength="300" /></td>
	</tr>
  </table>
</div> 
 <script type="text/javascript" > 
 $("#select_region").change(function(){
		 
				 $('#select_ciudad').html('<option value=0>Cargando...</option>');
				var id = $(this).val();
				var url='<?php echo base_url() ?>index.php/direccion/get_ciudad/';
				$.post(url, { 'id':id }, function(data) {
					$('#select_ciudad').html(data);
				});	  
			
			}); 
			
 $("#select_ciudad").change(function(){
		 
				 $('#select_comuna').html('<option value=0>Cargando...</option>');
				var id = $(this).val();
				var url='<?php echo base_url() ?>index.php/direccion/get_comuna/';
				$.post(url, { 'id':id }, function(data) {
					$('#select_comuna').html(data);
				});	  
			
			}); 
</script>