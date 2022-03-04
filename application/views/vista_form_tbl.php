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
	<link href="<?php echo base_url() ?>css/complex.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>css/ext-all.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>css/layout-default-latest.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-latest.js"></script> 



<style type="text/css">
<!--
#principal {

	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
	margin-left:1px;
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

<style type="text/css">
<!--
-->

.letra_1 {
	font-size: 1em;
}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#exportar').click(function() {
        	var fecha = $('#txt_fecha').val();
			var tabla = $('#tabla').val();
			if(fecha != ''){
				var r = new Date().getTime();
				var url='<?php echo base_url() ?>index.php/exportar_gestion/get_tbl_result/'+fecha+'/'+tabla+'/';
				$(location).attr('href',url);
				//window.frames['contenidoOculto'].location.href=url;
				//location.reload();
			}else{
				alert("Debes seleccionar una fecha");
			}
        });
    });
</script>
</head>
<body>

<fieldset>
			<legend>
				Exportar <?php echo $tabla?>
			</legend>
 			<label>
 				<span>Ingrese fecha: </span>
 				<input name="txt_fecha" id="txt_fecha" type="text"  class="date-picker" readonly="readonly"/>
 				<input name="tabla" id="tabla" type="hidden" "  value="<?php echo $tabla?>"/>
 			</label>
 			<label>
 				<img  align="absmiddle" src="<?php echo base_url() ?>css/images/Load.png" height="17" style="cursor:pointer" name="exportar" id="exportar"/>
				<div id="esperar"></div>
 			</label>
		
 			</fieldset>
   

<script type="text/javascript"> 

   $(".date-picker").datepicker({
   changeYear: true,
   changeMonth: true,
   dateFormat: 'yy-mm-dd'
   
   });

</script>
</body>
</html>