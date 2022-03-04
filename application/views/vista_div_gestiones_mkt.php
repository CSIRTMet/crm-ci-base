 
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

</script>



 <style type="text/css" >
			@import "<?php echo base_url() ?>css/tablas/demo_page.css";
			@import "<?php echo base_url() ?>css/tablas/demo_table.css";
			@import "../../../css/tablas/demo_page.css";
			@import "../../../css/tablas/demo_table.css";
			
#fade { /*--Transparent background layer--*/
	display: none; /*--hidden by default--*/
	background: #000;
	position: fixed; left: 0; top: 0;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
.popup_block{
	display: none; /*--hidden by default--*/
	background: #fff;
	padding: 10px;
	border: 5px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 40%; left: 50%;
	z-index: 199999;
	/*--CSS3 Box Shadows--*/
	-webkit-box-shadow: 0px 0px 20px #000;
	-moz-box-shadow: 0px 0px 20px #000;
	box-shadow: 0px 0px 20px #000;
	/*--CSS3 Rounded Corners--*/
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
img.btn_close {
	float: right;
	margin: -40px -35px 0 0;
}
/*--Making IE6 Understand Fixed Positioning--*/
*html #fade {
	position: absolute;
}
*html .popup_block {
	position: absolute;
}
</style>
        
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>js/tablas/jquery.jeditable.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>js/tablas/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			jQuery('.numbersOnly').keyup(function () { 
				this.value = this.value.replace(/[^0-9]/g,'');	
			});			
		});
		
		function ejecutar_filtro(){
			var consulta_valida=0;
			var fecha = $('#txt_fecha').val();
			var rut = $('#txt_rut').val();
			
			if(rut !='' && rut>0){
				consulta_valida = 1;
			}else{
				if(fecha != ''){
					if(tipo_gestion == 1 && tipo_calificacion != ''){
						consulta_valida = 1;
					}else{
						consulta_valida = 0;
						alert("Seleccione tipo gestión igual a Venta y Tipo Calificación");
					}
				}
			}
			if(consulta_valida == 1){
				$('#detalle_venta').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');
			
				var r = new Date().getTime();
				var url='<?php echo base_url() ?>index.php/consulta_gestion/buscar_gestion/';
				$.post(url+r, { 
					'fecha' : fecha
					,'rut' : rut
				}, function(data) {
					$('#detalle_venta').html(data);
				});
				$('#esperar').html('');
			}
		}
		
		</script>
	 

</head>

<body>

<?php
	$tipo_usuario = $this->session->userdata('tipo_usuario');
	$tipo_campana = $this->session->userdata('campana_tipo');
	$id_campana = $this->session->userdata('campana_id_campana');
?>

<div class="ui-layout-north">    
<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong>Busqueda Gesti&oacute;n Campa&ntilde;a por rut</strong></span> </div>
 
	</ul> 
	
</div> 


<?php echo validation_errors(); ?>

			 <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
			   <tr><td>Filtro para buscar Gestiones</td>
			   </tr>
			   <tr>
			    <td>Rut cliente
					<input type="text" name="txt_rut" id="txt_rut" value="" size="10" maxlength="8" class="numbersOnly">(sin dv)
				</td>
				<td>Fecha Gesti&oacute;n<input name="txt_fecha" id="txt_fecha" type="text"  class="date-picker" readonly="readonly"/>(<em>a&ntilde;o-mes-dia</em>)</td>
				<td>
					<a href="#" onclick="ejecutar_filtro();" alt="Filtrar" title="Filtrar">
						<img  align="absmiddle" src="<?php echo base_url() ?>css/images/lupa.gif" height="17" style="cursor:pointer"/>
					</a><div id="esperar"></div></td>
				</tr>
			</table>

<div id="detalle_venta"></div>
 <!--       
 <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
 <tr>
 	<td class="" style="text-align:center"><strong>[<a href="#" onclick="aplicar_cambios()">APLICAR CAMBIOS</a>]</strong></td>
 </tr>
 </table>
 --> 
 <script type="text/javascript"> 

   $(".date-picker").datepicker({
   changeYear: true,
   changeMonth: true,
   dateFormat: 'yy-mm-dd'
   
   });

</script>             
</div>
			<div class="spacer"></div>

</body>
</html>