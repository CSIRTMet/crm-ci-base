 
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


</script>








<script type="text/javascript"> 

	
	function pop_up(txtUrl, nombre, txtWidth, txtHeight, txtToolbar, txtMenubar, 
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
	var w = window.open( txtUrl, nombre, options);
}


	function asignar_usuario(id_campana)
	{
	
	
	 pop_up('<?php echo base_url() ?>index.php/usuario_gestion/form_asignar_usuario_gestion/'+id_campana,'ver_agendamiento', '500', '400', 'no', 'no', 
				'no', 'no', 'no');
	}
	
	
	
	
	function ver_agendamiento(id_usuario)
	{
	
	
	 pop_up('<?php echo base_url() ?>index.php/agenda/form_agendamiento_agente_gestion/'+id_usuario, 'asignar','850', '550', 'no', 'no', 
				'yes', 'no', 'yes');
	}
	
	
	function get_agendamientos(id_usuario){
	
	 
	     $('#campo_'+id_usuario).html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');	
		 $.post("<?php echo base_url() ?>index.php/usuario_gestion/get_agendamiento_usuario_gestion", { 
			  id_usuario: id_usuario
		}, function (data) { 
		  $('#campo_'+id_usuario).html(data);
		});

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
    $data["seccion"] = "usuarios";
    $this->load->view('includes/menu_gestion.php',$data);
    ?>
	<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong>USUARIOS DE LA CAMPA&Ntilde;A</strong></span> </div>
 
	</ul> 
	
</div> 


 


<?php echo validation_errors(); ?>





			<div class="full_width big"></div>
			<div id="demo">
            
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
               <tr>
                <td  class=""><strong> [<a href="#" onClick="asignar_usuario('<?php echo $this->session->userdata('campana'); ?>')">ASIGNAR USUARIO</a>] </strong></td>
               </tr>
 			</table>
 
			  <table cellpadding="0" cellspacing="0" border="0" class="display" id="grilla">
	<thead>
		<tr>
     
      		<th width="3%"></th>
            <th width="4%">ID</th>
			<th width="7%">RUT</th>
			<th width="12%">NOMBRE USUARIO</th>
			<th width="25%">NOMBRE</th>
			<th width="9%">TIPO</th>
            <th width="9%">ESTADO</th>
            <th width="10%">AG. PRIVADOS</th>
			<th width="21%">OPCION</th>
		</tr>
	</thead>
	<tbody>
		
     
 
       
        
        <?php 
		    $i = 1;
		    foreach($usuarios as $item): ?>
        
             
      <tr id="<?php echo $item->id_usuario; ?>" class="activo1">
        <td><?php echo $i++; ?></td>
            <td><?php echo $item->id_usuario; ?></td>
			<td><?php echo $item->rut; ?></td>
			<td><?php echo $item->nombre_usuario; ?></td>
			<td><?php echo $item->nombre; ?></td>
			<td><?php 
	  
	  switch($item->tipo_usuario)
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
	  default:  echo "N/A";
	  
	  }
	 
	  
	  ?></td>
      		<td>
			<?php 
	  
			  switch($item->estado)
			  {
			  case 1: 	echo "Activo";
						break;				
			  default:  echo "No activo";
			  } 
		  	?>
 	</td>
    <td id="campo_<?php echo $item->id_usuario ?>"> <a href="#"  onmouseover="get_agendamientos(<?php echo $item->id_usuario?>)">Ver</a> </td>
			<td > [<a href="<?php echo base_url() ?>index.php/usuario_gestion/eliminar_usuario_campana/<?php echo $item->id_usuario; ?>/ " onclick="return confirm('Solo se elimina de esta campa&ntilde;a.  \nSe desasignan las deudas, compromisos y agendamientos. \nNO SE PUEDE REVERTIR. \n\n ??Esta seguro de querer eliminar al usuario de esta campa&ntilde;a?')" >Eliminar</a>] &nbsp;&nbsp;
            [<a href="#" onclick="ver_agendamiento(<?php echo $item->id_usuario; ?>)" >Ver Agendamientos</a>] </td>
		</tr>
	 
		  <?php endforeach;?> 
	  
       
      
        
       
		
	</tbody>
	<tfoot>
		<tr>
			<th width="3%"></th>
            <th width="4%">ID</th>
			<th width="7%">RUT</th>
			<th width="12%">NOMBRE USUARIO</th>
			<th width="25%">NOMBRE</th>
			<th width="9%">TIPO</th>
            <th width="9%">ESTADO</th>
            <th width="10%">AG. PRIVADOS</th>
			<th width="21%">OPCION</th>
		</tr>
	</tfoot>
</table>

<table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
               <tr>
                <td  class=""><strong> [<a href="#" onClick="asignar_usuario('<?php echo $this->session->userdata('campana'); ?>')">ASIGNAR USUARIO</a>] </strong></td>
               </tr>
 			</table>
            
            
		</div>
			<div class="spacer"></div>
	 
</body>
</html>





