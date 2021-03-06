<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" />
	
<title>KUBO - ADMINISTRACION</title> 
<!-- DEMO styles - specific to this page --> 
	
	<link rel="shortcut icon" href="<?php echo base_url() ?>css/images/favicon.ico" type="image/x-icon" />
	<link href="<?php echo base_url() ?>css/ext-all.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--

#encabezado_campana {

	position:relative;
	width:100%;
	text-align:justify;
	padding:0px;
	
	
}

#div_vista_principal_administracion {

	position:relative;
	width:95%;
	text-align: center;
	padding-bottom:1px;
	padding-left:7px;
	padding-right:7px;
	margin:0 auto 0 auto;
	
	
	
}

#div_vista_empresa_administracion {

	position:relative;
	width:95%;
	text-align: center;
	padding-bottom:1px;
	padding-left:7px;
	padding-right:7px;
	margin:0 auto 0 auto;
	
	
	
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
	*   
	*#######################
*/



function mostrar() {
  $("#pop").fadeIn('slow');
} //checkHover

function cerrarPop() {
 $("#pop").hide();
} 
</script>
</head> 
<body>
<div id="div_vista_principal_administracion">
<?php $this->load->view("includes/encabezado");?>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><div align="center"><strong>ADMINISTRACION DEL SISTEMA - Empresas del sistema</strong></div></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><strong> [<a href="<?php echo base_url() ?>index.php/empresa_admin/form_crear_empresa/">CREAR EMPRESA </a>] </strong></td>
    </tr>
  </table>
  
</div>
<div id="div_vista_empresa_administracion">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">
    <tr>
      <td nowrap="nowrap" class="titleFormBody">ID </td>
      <td nowrap="nowrap" class="titleFormBody">NOMBRE</td>
      <td nowrap="nowrap" class="titleFormBody">CODIGO </td>
      <td nowrap="nowrap" class="titleFormBody">OPCION </td>
    </tr>
    <?php 
		
	foreach($empresas as $empresa):
	?>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $empresa->id_empresa; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $empresa->nombre; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $empresa->codigo; ?> </td>
      <td nowrap="nowrap" class="x-grid3-row-over">[<a href="<?php echo base_url() ?>index.php/empresa_admin/form_editar_empresa/<?php echo $empresa->id_empresa; ?>">ver/editar</a>] [<a href="#">eliminar</a>] </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    <tr>
      <td  class=""><strong> [<a href="<?php echo base_url() ?>index.php/empresa_admin/form_crear_empresa/">CREAR EMPRESA </a>] </strong></td>
    </tr>
  </table>
</div>
</body> 
</html>