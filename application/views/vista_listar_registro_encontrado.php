

<style type="text/css">
<!--
#Layer1 {

	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
	
	
}

#Layer2 {

	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
	
}
#Layer3 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}


#Layer4 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
	overflow: scroll;	

	
}
#Layer5 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}
#Layer6 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}
#Layer7 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}
table { 

border-style:solid;
    border-width:1px;
    border-color:#9aaab4;
    padding:4pt;
    text-align:left;
    margin-left:10px;
    margin-right:6px;
 background-color: #edf1f3 }
 
 H1 {
    font-size:150%;
    padding-left: 10px;
    text-align: left;
}
H2 {
    font-size:150%;
    padding-left: 10px;
    text-align: left;
}
H3 {
    padding-left: 10px;
    text-align: left;
}

H4 {
    padding-left: 10px;
    text-align: left;
}
H5 {
    padding-left: 10px;
    text-align: left;
}

-->
</style>


<script type="text/javascript"> 
/*
	*#######################
	*     ON PAGE LOAD
	*#######################
	*/
		
		function ver_detalle_registro(registro)
		{
		  ver_registro(registro);
		
		}
		
		function actualizar_registro(registro)
		{
		  editar_registro(registro);
		
		}
		

</script>


<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/layout-default-latest.css" rel="stylesheet" type="text/css" />
<link href="../../css/complex.css" rel="stylesheet" type="text/css" /><form id="form_creacion" name="form_creacion" action="#" method="post"  >

<?php 
 $tipo_campana = $this->session->userdata("campana_tipo");
if ($tipo_campana == 2) { ?>

<div id="Layer1">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-border-layout-ct">
    <tr>
      <td colspan="6" class="header"><div align="center">LISTADO DE CLIENTES - SOLO CLIENTES ASIGNADOS A LA LISTA </div></td>
    </tr>
    <tr>
	
      <td width="11%" class="x-grid3-row-over"><strong>ID</strong></td>
      <td width="11%" class="x-grid3-row-over"><strong>RUT</strong></td>
	  <td width="14%" class="x-grid3-row-over"><strong>NOMBRE</strong></td>
      <td width="17%" class="x-grid3-row-over"><strong>TELEFONO</strong></td>
      <td width="17%" class="x-grid3-row-over"><strong>ULTIMA GESTION</strong></td>
      <td width="24%" class="x-grid3-row-over"><strong>ULTIMO EJECUTIVO </strong></td>
      <td width="17%" class="x-grid3-row-over"><strong>ACCION</strong></td>
    </tr>
    <?php foreach($clientes as $item):?>
    <tr>
      <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->id_cliente; ?></td>
	  <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->rut; ?></td>
	  <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->nombre; ?></td>
      <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->telefono; ?></td>
      <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->ultima_gestion; ?></td>
      <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->usuario; ?></td>
      <td   nowrap="nowrap" bgcolor="#FFFFFF"><img src="<?php echo base_url() ?>css/images/ico_telefono.gif" alt="GESTIONAR" width="24"   height="22" onClick="cargar_registro_buscado(<?php echo $item->id_cliente; ?>)" >    </tr>
    <?php endforeach;?>
    <tr>
      <td colspan="6" nowrap="nowrap" class="x-grid3-row-over">&nbsp;</td>
    </tr>
  </table>
</div>


<?php } else
{ ?>



<div id="Layer1">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-border-layout-ct">
    <tr>
      <td colspan="6" class="header"><div align="center">LISTADO DE CLIENTES - SOLO CLIENTES ASIGNADOS A LA LISTA </div></td>
    </tr>
    <tr>
	
      <td width="11%" class="x-grid3-row-over"><strong>NUM DOCUMENTO</strong></td>
      <td width="11%" class="x-grid3-row-over"><strong>RUT</strong></td>
	  <td width="14%" class="x-grid3-row-over"><strong>NOMBRE</strong></td>
      <td width="17%" class="x-grid3-row-over"><strong>TELEFONO</strong></td>
      <td width="17%" class="x-grid3-row-over"><strong>ULTIMA GESTION</strong></td>
      <td width="24%" class="x-grid3-row-over"><strong>ULTIMO EJECUTIVO </strong></td>
      <td width="17%" class="x-grid3-row-over"><strong>ACCION</strong></td>
    </tr>
    <?php foreach($clientes as $item):?>
    <tr>
      <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->numero_documento; ?></td>
	  <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->rut; ?></td>
	  <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->nombre; ?></td>
      <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->telefono; ?></td>
      <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->ultima_gestion; ?></td>
      <td   nowrap="nowrap" class="x-grid3-row-selected"><?php echo $item->usuario; ?></td>
      <td   nowrap="nowrap" bgcolor="#FFFFFF"><img src="<?php echo base_url() ?>css/images/ico_telefono.gif" alt="GESTIONAR" width="24"   height="22" onClick="cargar_registro_buscado(<?php echo $item->id_deuda; ?>)" >    </tr>
    <?php endforeach;?>
    <tr>
      <td colspan="6" nowrap="nowrap" class="x-grid3-row-over">&nbsp;</td>
    </tr>
  </table>
</div>


<?php }

?>





  <div id="Layer7">
  <table border="0" style="width:100%">
    <tr>
      <td width="40%">&nbsp;</td>
      <td width="14%"  >&nbsp;</td>
      <td width="46%">&nbsp;</td>
    </tr>
  </table>
</div>
  
</form>

