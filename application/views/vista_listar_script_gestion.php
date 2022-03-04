 
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
    $data["seccion"] = "script";
    $this->load->view('includes/menu_gestion.php',$data);
    ?>
	<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong>SCRIPTS DE LA  CAMPAÑA</strong></span> </div>
 
	</ul> 
	
</div> 


 


<?php echo validation_errors(); ?>





			<div class="full_width big"></div>
			<div id="demo">
            
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
               <tr>
                 <td  class=""><strong> [<a href="form_crear_script_campana">AGREGAR SCRIPT</a>] </strong></td>
                
              </tr>
 			</table>
 
			  <table cellpadding="0" cellspacing="0" border="0" class="display" id="grilla">
	<thead>
		<tr>
     
      		<th width="3%"></th>
            <th width="5%">ID</th>
			<th width="17%">NOMBRE</th>
			<th width="20%">DESCRIPCION</th>
			<th width="15%">ESTADO</th>
			
          
			<th width="40%">OPCION</th>
		</tr>
	</thead>
	<tbody>
		
     
 
       
        
        <?php 
		    $i = 1;
		    foreach($scripts as $item): ?>
        
             
      <tr id="<?php echo $item->id_script; ?>" class="activo1">
        <td><?php echo $i++; ?></td>
            <td><?php echo $item->id_script; ?></td>
			<td><?php echo $item->nombre; ?></td>
			<td><?php echo $item->descripcion; ?></td>
			 
			<td><?php 
	  
	  switch($item->estado)
	  {
	  case 0: 	echo "No Activo";
	  			break;
	   			
	  default:  echo "Activo";
	  }  
	  ?></td>
      	
         
    <td id="campo_<?php echo $item->id_script ?>"> <a href="form_editar_script_campana/<?php echo $item->id_script?>">Editar</a> |  <a href="<?php echo base_url() ?>index.php/script_gestion/eliminar_script_campana/<?php echo $item->id_script; ?>/ " onclick="return confirm('ESTA OPERACION NO SE PUEDE REVERTIR.\n\n ¿Esta seguro de querer eliminar este script de esta campa&ntilde;a?')" >Eliminar</a> </td>
			
		</tr>
	 
		  <?php endforeach;?> 
	  
       
      
        
       
		
	</tbody>
	<tfoot>
		<tr>
			<th></th>
            <th>ID</th>
			<th>NOMBRE</th>
			<th>DESCRIPCION</th>
			<th>ESTADO</th>
			
          
			<th >OPCION</th>
		</tr>
	</tfoot>
</table>

<table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
               <tr>
                <td  class=""><strong> [<a href="form_crear_script_campana">AGREGAR SCRIPT</a>] </strong></td>
               </tr>
 			</table>
            
            
		</div>
			<div class="spacer"></div>
	 
</body>
</html>





