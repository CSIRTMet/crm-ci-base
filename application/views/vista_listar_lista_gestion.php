 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 
 
	<title>Kubo ::: </title> 
	<link rel="shortcut icon" href="<?php echo base_url() ?>css/images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/complex.css" /> 
	<link rel="StyleSheet" type="text/css" href="<?php echo base_url() ?>css/estiloskubo.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>js/jquery-treeview/jquery.treeview.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>js/jquery-treeview/demo/screen.css" />
    

	<!-- including the jQuery UI Datepicker and styles -->
    <link href="<?php echo base_url() ?>css/jquery_datepicker/assets/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    /* jQuery UI sizing override */
     .ui-widget {font-size:1em;}
	 .style1 {font-size: 15px}
	 table { 
	 	border-style:solid;
		border-width:1px;
		border-color:#9aaab4;
		padding:4pt;
		text-align:left;  
	 	background-color: #edf1f3 }
	   
    </style>
	<link href="<?php echo base_url() ?>/css/complex.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/css/layout-default-latest.css" rel="stylesheet" type="text/css" />
       
    <link href="../../../css/complex.css" rel="stylesheet" type="text/css">
    <link href="../../../css/ext-all.css" rel="stylesheet" type="text/css">
    <link href="../../../css/layout-default-latest.css" rel="stylesheet" type="text/css">
   

<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-latest.js"></script> 


<script>


$("tr").not(':first').hover(
  function () {
    $(this).css("background","yellow");
  }, 
  function () {
    $(this).css("background","");
  }
);


 
	
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
 

	function crear_lista(id_campana)
	{
	
	
	 pop_up('<?php echo base_url() ?>index.php/lista_gestion/form_crear_lista_gestion/'+id_campana, '500', '400', 'no', 'no', 
				'no', 'no', 'no');
	}
	
</script>




 <style type="text/css" >
			@import "<?php echo base_url() ?>/css/tablas/demo_page.css";
			@import "<?php echo base_url() ?>/css/tablas/demo_table.css";
			@import "../../../css/tablas/demo_page.css";
			@import "../../../css/tablas/demo_table.css";
		</style>
        
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/js/tablas/jquery.jeditable.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/js/tablas/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			
			$(document).ready(function() {
				/* Init DataTables */
				var oTable = $('#grilla').dataTable();
				
				
			} );
		</script>
	 

</head>
 

<body>



<div class="ui-layout-north"> 

	<?php $this->load->view('includes/barra_usuario_conectado'); ?>
    <?php 
    $data["seccion"] = "listas";
    $this->load->view('includes/menu_gestion.php',$data);
    ?>
	<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong>LISTAS DE LA CAMPA&Ntilde;A</strong></span> </div>
 
	</ul> 
	
</div> 


 


<?php echo validation_errors(); ?>
 

<div id="div_vista_lista_gestion">
   <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><strong> [<a href="#" onClick="crear_lista('<?php echo $this->session->userdata('campana'); ?>')">CREAR LISTA </a>] </strong></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">

    <tr>
      <td width="2%" nowrap="nowrap" class="titleFormBody">ID  </td>
      <td width="17%" nowrap="nowrap" class="titleFormBody">NOMBRE DE LA LISTA </td>
      <td width="16%" nowrap="nowrap" class="titleFormBody">TOTAL REGISTROS </td>
      <td width="17%" nowrap="nowrap" class="titleFormBody">ESTADO</td>
      <td width="9%" nowrap="nowrap" class="titleFormBody">VUELTAS</td>
      <td width="39%" nowrap="nowrap" class="titleFormBody">OPCION </td>
    </tr>
    
	<?php 
		
	foreach($listas as $lista):
	?>
	<tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $lista->id_lista; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $lista->nombre; ?> </td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $lista->total_registros; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php 
	  
	  switch($lista->estado_lista)
	  {
	  case 0: 	echo "Nueva";
	  			break;
	  case 1: 	echo "Establecida";
	  			break;	  
	 
	  default:  echo "NA";
	  
	  }
	 
	  
	  ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $lista->numero_gestiones; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over">
           
      <a title="Definir Lista" href="<?php echo base_url() ?>index.php/lista_gestion/form_crear_filtro_lista_gestion/<?php echo $lista->id_campana; ?>/<?php echo $lista->id_lista; ?>/ "><img border="0" align="absbottom" src="<?php echo base_url() ?>/css/images/definir_lista_icon.png" alt="" width="24" height="20" /></a>   
      
      <a title="Usuarios" href="<?php echo base_url() ?>index.php/lista_gestion/form_listar_usuario_lista_gestion/<?php echo $lista->id_campana; ?>/<?php echo $lista->id_lista; ?>/ "><img border="0" align="absbottom" src="<?php echo base_url() ?>/css/images/usuarios_icon.png" alt="" width="24" height="20" /></a>
	  
	  <?php if($lista->estado_lista<>2) {  ?>
      
      <a href="<?php echo base_url() ?>index.php/lista_gestion/form_segmentacion_rapida_lista_gestion/<?php echo $lista->id_campana; ?>/<?php echo $lista->id_lista; ?>/ "><?php echo ($lista->segmentacion_suma < 4)? '<img border="0" align="absbottom" src="'.base_url().'/css/images/segmentacion_simple_edit_icono.png" alt="" title="Editar segmentacion simple" width="22" height="20" />' : '<img border="0" align="absbottom" src="'.base_url().'/css/images/segmentacion_simple_on_icono.png" alt="" title="Agregar segmentacion simple" width="22" height="20" />'; ?></a> 
	   <?php }?>
       
     <a title="Resetear Agendamiento" href="<?php echo base_url() ?>index.php/lista_gestion/form_resetear_Registros_Agendados_Lista/<?php echo $lista->id_lista; ?>/ "><img border="0" align="absbottom" src="<?php echo base_url() ?>/css/images/reset_icon.png" alt="" width="18" height="20" /></a>
      
      <!-- [<a href="<?php //echo base_url() ?>index.php/lista_gestion/borrar_lista/<?php //echo $lista->id_lista; ?>/ " onClick="return confirm('Esta seguro de querer eliminar la lista?')">eliminar </a>] -->
      
 

	  
      
      <?php if($lista->segmentacion_suma == 4) {  ?>
      <a href="<?php echo base_url() ?>index.php/lista_gestion/form_editor_segmentador_lista_gestion/<?php echo $lista->id_campana; ?>/<?php echo $lista->id_lista; ?>/ "><?php echo ($lista->estado_lista==2)? '<img border="0" align="absbottom" src="'.base_url().'/css/images/segmentacion_avanzado_off_icono.png" alt="" title="Ver o resetear segmentacion avanzada" width="22" height="20" />' : '<img border="0" align="absbottom" src="'.base_url().'/css/images/segmentacion_avanzada_on_icono.png" alt="" title="Aplicar segmentacion avanzada" width="22" height="20" />'; ?></a>
      <?php }?>
  	 </td>
    </tr>
	  <?php endforeach; ?>
  </table>
  
  
  
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class=""><strong> [<a href="#" onClick="crear_lista('<?php echo $this->session->userdata('campana'); ?>')">CREAR LISTA </a>] </strong></td>
    </tr>
  </table>
  
</div>


  <div id="Layer3">

  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td width="26" class="header">&nbsp;</td>
      </tr>
  </table>
</div>



<div id="Layer7">
  <table border="0" style="width:100%">
    <tr>
      <td width="43%">&nbsp;</td>
      <td width="6%"  >&nbsp;</td>
      <td width="51%">&nbsp;</td>
    </tr>
  </table>
</div>
  
  

</body>
</html>






