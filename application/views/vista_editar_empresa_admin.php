
<html >
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<head>
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

#div_vista_usuario_administracion {
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

	function pop_up(txtUrl, txtWidth, txtHeight, txtToolbar, txtMenubar, 
				txtResizable, txtStatus, txtScrollbars) {
	/* Argumentos por defecto */
	var txtWidth = (txtWidth == null) ? "400px" : txtWidth;
	var txtHeight = (txtHeight == null) ? "400px" : txtHeight;
	var txtToolbar = (txtToolbar == null) ? "no" : txtToolbar;
	var txtMenubar = (txtMenubar == null) ? "no" : txtMenubar;
	var txtResizable = (txtResizable == null) ? "no" : txtResizable;
	var txtStatus = (txtStatus == null) ? "no" : txtStatus;
	var txtScrollbars = (txtScrollbars == null) ? "no" : txtScrollbars;
	var options = "location=no, top=100px, left=200px, ";
	options = options + "width="+txtWidth+", ";
	options = options + "height="+txtHeight+", ";
	options = options + "toolbar="+txtToolbar+", ";
	options = options + "menubar="+txtMenubar+", ";
	options = options + "resizable="+txtResizable+", ";
	options = options + "status="+txtStatus+", ";
	options = options + "scrollbars="+txtScrollbars+"";
	var w = window.open( txtUrl, "", options);
}


	function asignar_usuario(id_empresa)
	{
	
	
	 pop_up('<?php echo base_url() ?>index.php/empresa_admin/form_asignar_usuario/'+id_empresa, '500', '400', 'no', 'no', 
				'no', 'no', 'no');
	}
	
	

</script>
<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<title>KUBO COBRAZA - ADMINISTRACION</title>

</head>
<body>

<div id="div_vista_principal_administracion">
<?php $this->load->view("includes/encabezado");?>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class="x-border-layout-ct"><strong>ADMINISTRACION DEL SISTEMA - Ver empresa [<a href="<?php echo base_url() ?>index.php/empresa_admin/form_listar_empresa/">Volver al listado</a>] </strong></td>
    </tr>
  </table>
</div>
<div id="div_vista_empresa_administracion">
  
  
  <?php echo form_open("empresa_admin/editar_empresa");?>
  <?php echo validation_errors();?>
  <?php if(isset($mensaje)) echo $mensaje; ?>
  
  
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">


    <tr>
      <td width="22%" nowrap="nowrap">ID  </td>
      <td width="78%" nowrap="nowrap" class="titleFormBody"> <input name="id_empresa" type="text" id="id_empresa" value="<?php echo $empresa->id_empresa; ?>"  readonly="readonly"/></td>
    </tr>
	<tr>
	  <td width="22%" nowrap="nowrap"><span class="titleFormBody">NOMBRE</span></td>
	  <td width="78%" nowrap="nowrap" class="x-grid3-row-over"><span class="titleFormBody">
	    <input name="nombre" type="text" id="nombre" value="<?php echo $empresa->nombre; ?>" />
	  </span></td>
    </tr>
	<tr>
	  <td nowrap="nowrap"><span class="titleFormBody">CODIGO</span></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><span class="titleFormBody">
	    <input name="codigo" type="text" id="codigo" value="<?php echo $empresa->codigo; ?>"/>
	  </span></td>
    </tr>
	
	
	
	<tr>
	  <td nowrap="nowrap">&nbsp;</td>
	  <td nowrap="nowrap">&nbsp;</td>
    </tr>
	<tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap"><input name="Guardar" type="submit" id="Guardar" value="Guardar" /></td>
    </tr>
  </table>
</div>


<div id="div_vista_usuario_administracion">
   <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><strong> [<a href="#" onClick="asignar_usuario('<?php echo $empresa->id_empresa; ?>')">ASIGNAR USUARIO</a>] </strong></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">

    <tr>
      <td nowrap="nowrap" class="titleFormBody">ID  </td>
      <td nowrap="nowrap" class="titleFormBody">RUT</td>
	  
      <td nowrap="nowrap" class="titleFormBody">NOMBRE USUARIO </td>
      <td nowrap="nowrap" class="titleFormBody">NOMBRE</td>
      <td nowrap="nowrap" class="titleFormBody">TIPO</td>
      <td nowrap="nowrap" class="titleFormBody">OPCION </td>
    </tr>
    
	<?php 
		
	foreach($usuarios as $usuario):
	?>
	<tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $usuario->id_usuario; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $usuario->rut; ?></td>
	 
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $usuario->nombre_usuario; ?> </td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $usuario->nombre; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php 
	  
	  switch($usuario->tipo_usuario)
	  {
	  case 1: 	echo "Administrador";
	  			break;
	  case 2: 	echo "Supervidor";
	  			break;	  
	  case 3: 	echo "Agente";
	  			break;
	  case 4: 	echo "Agente Back";
	  			break;
	  case 5: 	echo "Agente Auditor";
	  			break;
	  default:  echo "NA";
	  
	  }
	 
	  
	  ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over">[<a href="<?php echo base_url() ?>index.php/empresa_admin/eliminar_usuario_empresa/<?php echo $empresa->id_empresa; ?>/<?php echo $usuario->id_usuario; ?>/ ">eliminar</a>] </td>
    </tr>
	  <?php endforeach; ?>
  </table>
  
  
  
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><strong> [<a href="#" onClick="asignar_usuario('<?php echo $empresa->id_empresa; ?>')">ASIGNAR USUARIO</a>] </strong></td>
    </tr>
  </table>
  
</div>
</body>
</html>