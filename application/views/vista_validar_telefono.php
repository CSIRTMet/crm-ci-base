
<html>
<head>

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

			var id_t = $("#id_telefono").val();
			var id_c = $("#select_clasificacion").val();
			var id_tp = $("#select_tipificacion").val();
			var id_cliente = <?php echo $id_cliente; ?>;
			var id_numero = <?php echo $id_numero; ?>;

			//aca va el llamado a guardar la gestion al fono
			$.post("<?php echo base_url() ?>index.php/telefono/ingresar_val_telefono", { 
				id_telefono: id_t
				,id_clasificacion: id_c
				,id_tipificacion: id_tp
				,id_numero: id_numero
				,id_cliente: id_cliente
				}, function (data) {
				    if (data.length >3){  //viene un error y lo muestro
					alert(data);
				    }else{
					//alert("calificacion exitosa");
					if(id_t>0){
					window.opener.carga_div_telefonos(id_cliente);
					}
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
    <td width="40%" class="ui-layout-resizer">Fono</td>
    <td width="60%" class="ui-layout-resizer-closed-hover"><?php echo $fono; ?></td>
  </tr>
  <tr>
    <td class="ui-layout-resizer">Tipificacion</td>
    <td class="ui-layout-resizer-closed-hover"><select name="select_tipificacion" id="select_tipificacion"  >
      <option value="0">*Seleccione*</option>
      <option value="1">No Valido</option>
      <option value="4">Contactado</option>
      <option value="3">No Contactado</option>
        </select></td>
  </tr>
  <tr>
    <td class="ui-layout-resizer">Clasificacion</td>
    <td class="ui-layout-resizer-closed-hover"> <select name="select_clasificacion" id="select_clasificacion">
      <option value="0">*Seleccione*</option>
      <option value="1">Particular</option>
      <option value="2">Comercial</option>
      <option value="3">Celular</option>
      <option value="4">Otro</option>
    </select></td>
  </tr>
  
  <tr>
    <td colspan="2" bgcolor="#666666"><label>
      <div align="center">
	    <input type="hidden" id="id_telefono" name="id_telefono" value="<?php echo $id_telefono;?>">
        <input name="Guardar" type="button" id="Guardar"  class="buttons" value="Guardar" onClick="enviar()">
        <input name="Cancelar" type="button" id="Cancelar" value="Cancelar" onClick="window.close();">
        </div>
    </label></td>
    </tr>
</table>




</form>
</body></html>
