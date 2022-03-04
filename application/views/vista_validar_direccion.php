
<html>
<head>
<meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 



<link href="<?php echo base_url() ?>/css/estiloskubo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 

<style type="text/css">

.DOMO_view_value_vista {
font-family:   sans-serif;
	font-size: 11pt;
        font-weight:  bold;
	color: #004F75  ;
	vertical-align: text-top;
	text-align: left;

	background-color:#BECEEF;
	/* background-color: #BCC7D6; */
}



</style>


 <script>
function enviar()
{
			var id_d = $("#id_direccion").val();
			var id_c = $("#select_clasificacion").val();
			var id_tp = $("#select_tipificacion").val();
			var id_cliente = <?php echo $id_cliente; ?>;
			//aca va el llamado a guardar la gestion al fono
			//alert(id_c+"..."+ id_tp);
			$.post("<?php echo base_url() ?>index.php/direccion/ingresar_val_direccion", { 
				 id_direccion: id_d
				,id_clasificacion: id_c
				,id_tipificacion: id_tp
				}, function (data) {
				
				    if (data.length >3){  //viene un error y lo muestro
					alert(data);
				    }else{
					
					window.opener.carga_div_direcciones(id_cliente);
					window.close();
				    }
				}
			);
}


 </script>




 <link href="../../css/layout-default-latest.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>/css/layout-default-latest.css" rel="stylesheet" type="text/css">
</head>
<body ><form name="form" action="#" method="post">


<table width="100%" border="0" cellpadding="2" cellspacing="3" class="ui-layout-pane">
  <tr>
    <td colspan="7" class="DOMO_view_value_vista"></td>
    </tr>
  
  
  <tr>
    <td class="ui-layout-resizer-open-hover">Region </td>
    <td class="ui-layout-resizer-open-hover">Ciudad</td>
    <td class="ui-layout-resizer-open-hover">Comuna</td>
    <td class="ui-layout-resizer-open-hover">Calle</td>
    <td class="ui-layout-resizer-open-hover">Numero</td>
    <td class="ui-layout-resizer-open-hover">Complemento</td>
    <td width="34%" class="ui-layout-resizer-open-hover">Clasificacion</td>
  </tr>
  
  
  <?php foreach($direcciones as $direccion):?>

  
  <tr>
    <td width="6%" nowrap class="ui-layout-resizer"> <?php echo $direccion->nombre_region ?></td>
    <td width="6%" nowrap class="ui-layout-resizer"> <?php echo $direccion->nombre_ciudad ?></td>
    <td width="7%" nowrap class="ui-layout-resizer"> <?php echo $direccion->nombre_comuna ?></td>
    <td width="4%" nowrap class="ui-layout-resizer"> <?php echo $direccion->calle ?></td>
    <td width="6%" nowrap class="ui-layout-resizer"> <?php echo $direccion->numero ?></td>
    <td width="37%" nowrap class="ui-layout-resizer"><?php echo $direccion->complemento ?></td>
    <td class="ui-layout-resizer-closed-hover">
	<select id="select_tipificacion" name="select_tipificacion">
      <option value="0">*Seleccione*</option>
      <option value="1">Valida</option>
      <option value="2">Descartar</option>
	</select></td>
  </tr>
   <?php endforeach;?>
  
  
  
  <tr>
    <td colspan="7" bgcolor="#666666"><label>
      <div align="center">
	    <input type="hidden" id="id_direccion" name="id_direccion" value="<?php echo $direccionID;?>">
        <input name="Guardar" type="button" id="Guardar"  class="buttons" value="Guardar" onClick="enviar()">
        <input name="Cancelar" type="button" id="Cancelar" value="Cancelar" onClick="window.close();">
        </div>
    </label></td>
    </tr>
</table>




</form>
</body></html>
