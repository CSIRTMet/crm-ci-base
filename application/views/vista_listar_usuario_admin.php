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
<title>KUBO - ADMINISTRACION</title>

</head>
<body>
<div id="div_vista_principal_administracion">
<?php $this->load->view("includes/encabezado");?>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><div align="center"><strong>ADMINISTRACION DEL SISTEMA - Usuarios del sistema</strong></div></td>
    </tr>
  </table>
 
  
</div>
<div id="div_vista_usuario_administracion">
   <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><strong> [<a href="<?php echo base_url() ?>index.php/usuario_admin/form_crear_usuario/">CREAR USUARIO</a>] </strong></td>
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
      <td nowrap="nowrap" class="x-grid3-row-over">[<a href="<?php echo base_url() ?>index.php/usuario_admin/form_editar_usuario/<?php echo $usuario->id_usuario; ?>">ver/editar</a>] [<a href="#">eliminar</a>] </td>
    </tr>
	  <?php endforeach; ?>
  </table>
  
  
  
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><strong> [<a href="<?php echo base_url() ?>index.php/usuario_admin/form_crear_usuario/">CREAR USUARIO</a>] </strong></td>
    </tr>
  </table>
  
</div>

</body>
</html>