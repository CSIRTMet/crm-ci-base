
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

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
<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<title>KUBO COBRAZA - ADMINISTRACION</title>

</head>
<body>

<div id="div_vista_principal_administracion">
<?php $this->load->view("includes/encabezado");?>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class="x-border-layout-ct"><strong>ADMINISTRACION DEL SISTEMA - Ver usuario [<a href="<?php echo base_url() ?>index.php/usuario_admin/form_listar_usuario/">Volver al listado</a>] </strong></td>
    </tr>
  </table>
</div>
<div id="div_vista_usuario_administracion">
  
  
  <?php echo form_open("usuario_admin/editar_usuario");?>
  <?php echo validation_errors();?>
  <?php if(isset($mensaje)) echo $mensaje; ?>
  
  
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">

    <tr>
      <td width="22%" nowrap="nowrap">ID  </td>
      <td width="78%" nowrap="nowrap" class="titleFormBody"> <input name="id_usuario" type="text" id="id_usuario" value="<?php echo $usuario->id_usuario; ?>"  readonly="readonly"/></td>
    </tr>
    
	 
	<tr>
	  <td nowrap="nowrap"><span class="titleFormBody">RUT</span></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><span class="titleFormBody">
	    <input name="rut" type="text" id="rut" value="<?php echo $usuario->rut; ?>" />
	  </span></td>
    </tr>
	<tr>
	  <td nowrap="nowrap"><span class="titleFormBody">NOMBRE USUARIO </span></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><span class="titleFormBody">
	    <input name="nombre_usuario" type="text" id="nombre_usuario" value="<?php echo $usuario->nombre_usuario; ?>"/>
	  </span></td>
    </tr>
	<tr>
	  <td nowrap="nowrap">CLAVE</td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><span class="titleFormBody">
	    <input name="clave" type="text" id="clave" value="<?php echo $usuario->clave; ?>"/>
	  </span></td>
    </tr>
	<tr>
	  <td nowrap="nowrap"><span class="titleFormBody">NOMBRE</span></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><span class="titleFormBody">
	    <input name="nombre" type="text" id="nombre" value="<?php echo $usuario->nombre; ?>" />
	  </span></td>
    </tr>
	<tr>
	  <td nowrap="nowrap"><span class="titleFormBody">TIPO</span></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"> 
	    <select name="tipo_usuario" id="tipo_usuario">
	      <option value="0">*Seleccione*</option>
		  <option value="1" <?php if($usuario->tipo_usuario==1) {echo 'selected="selected"';} ?>>Administrador</option>
		  <option value="2" <?php if($usuario->tipo_usuario==2) {echo 'selected="selected"';} ?>>Supervisor</option>
		  <option value="3" <?php if($usuario->tipo_usuario==3) {echo 'selected="selected"';} ?>>Agente</option>
		  <option value="4" <?php if($usuario->tipo_usuario==4) {echo 'selected="selected"';} ?>>Agente Back</option>
		  <option value="5" <?php if($usuario->tipo_usuario==5) {echo 'selected="selected"';} ?>>Agente Auditor</option>	  
        </select>      </td>
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
</body>
</html>