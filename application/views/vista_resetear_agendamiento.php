 
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
	 	background-color: #edf1f3}
	   
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

	function enviar_formulario(estado_registro,id_lista) {
     
	  $.post("<?php echo base_url() ?>index.php/lista_gestion/resetear_Registros_Agendados_Lista", { 


	  	fecha_inicio_reseteo: $("#fecha_inicio_reseteo").val(),
		id_lista: id_lista,
		estado_registro:estado_registro
		
		}, function (data) {


		    if (data.length >3)  //viene un error y lo muestro
		    {
		    	alert(data);


		    }
		    else 
		    {
		    	alert("Reseteo finalizado");
			}
		});
}


function consultar(id_lista) {
     
	  $.post("<?php echo base_url() ?>index.php/lista_gestion/consultar_registros_candidatos_agendados_para_resetear", { 


	  	fecha_inicio_reseteo: $("#fecha_inicio_reseteo").val(),
		id_lista: id_lista
		
		}, function (data) {
 
		    	alert(data);
 
		});
}
						
			
		
function volver()
{

   var url = '<?php echo base_url(); ?>index.php/lista_gestion/index/';
   $(location).attr('href',url);
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
		
	 

</head>

<body>



<div class="ui-layout-north"> 

	<?php $this->load->view('includes/barra_usuario_conectado'); ?>
    <?php 
    $data["seccion"] = "listas";
    $this->load->view('includes/menu_gestion.php',$data);
    ?>
	<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center">
        <p> <h1 style="color:#FFF">Resetear lista <?php echo $id_lista?> </h1></p>
      </div>
 
	</ul> 
	
</div> 


<?php echo validation_errors(); ?>


<script type="text/javascript"> 

$(".date-picker").datepicker({
	yearRange: "-90:+1",
	changeYear: true,
	changeMonth: true,
	dateFormat: 'yy/mm/dd'

});

</script>
<form id="form_creacion" name="form_creacion" action="#" method="post"  >
			
			<div id="demo">
            
            
 
		

<table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner"  >
               <tr>
               <td width="10%" class="header"><img src="<?php echo base_url() ?>/css/images/agendamiento_1.png" width="32" height="32" style="padding-right:10px" />Fecha inicio de reseteo</td>
			<td width="28%" class="x-border-layout-ct"><input name="fecha_inicio_reseteo" id="fecha_inicio_reseteo" type="text"  class="date-picker" /> 
				(<em>a&ntilde;o/mes/dia</em>) </td>

			<td width="6%"  ><input name="Consultar candidatos" type="button" class="btnForm" id="Consultar candidatos" value="Consultar candidatos" onclick="consultar('<?php echo $id_lista?>');" /></td>
               <td width="6%"  ><input name="Resetar_Agendamiento_Publico" type="button" class="btnForm" id="Resetar_Agendamiento_Publico" value="Resetear Agendamiento Publico" onclick="enviar_formulario(2,'<?php echo $id_lista?>');" /></td>
               <td width="6%"  ><input name="Resetar_Agendamiento_Privado" type="button" class="btnForm" id="Resetar_Agendamiento_Privado" value="Resetear Agendamiento Privado" onclick="enviar_formulario(1,'<?php echo $id_lista?>');" /></td>
			   
               </tr>
 			</table>
          
            
		</div>
        </form>
        <script type="text/javascript"> 

$(".date-picker").datepicker({
	yearRange: "-90:+1",
	changeYear: true,
	changeMonth: true,
	dateFormat: 'yy/mm/dd'

});

</script>
			<div class="spacer"></div>
	 
</body>
</html>





