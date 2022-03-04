 
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
			function mostrar_detalle_por_dia(tipo_calificacion,todo){
			$('#mainContent').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');
			
			var r = new Date().getTime();
			var url='<?php echo base_url() ?>index.php/venta/mostrar_detalle_por_dia/';
			$.post(url+r, { 
				'todo':todo
				,'tipo_calificacion':tipo_calificacion
			}, function(data) {
				$('#mainContent').html(data);
			});
			$('#esperar').html('');
		}
		function traer_resumen_mensual_campana_mkt(){
			var r = new Date().getTime();
			var anio_actual = $('#select_anio').val();
			var mes_actual  = $('#select_mes').val();
			if(mes_actual<10){
				mes_actual='0'+mes_actual;
			}
			$('#mainContent').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');	 
			var url='<?php echo base_url() ?>index.php/venta/get_resumen_mensual_campana_mkt/';

			$.post(url+r,{'anio_actual':anio_actual,'mes_actual':mes_actual}, function(data) {
			
			  $('#mainContent').html(data);
			});
			//*/
		}
		</script>
	 

</head>

<body>

<?php
	$tipo_usuario = $this->session->userdata('tipo_usuario');
	$tipo_campana = $this->session->userdata('campana_tipo');
	$id_campana = $this->session->userdata('campana_id_campana');
?>
<form>
<select name="select_anio" id="select_anio">
		<option value="2011" <?php if ($anio_actual == 2011){ echo "selected='selected'";} ?>>2011</option>
		<option value="2012" <?php if ($anio_actual == 2012){ echo "selected='selected'";} ?>>2012</option>
		<option value="2013" <?php if ($anio_actual == 2013){ echo "selected='selected'";} ?>>2013</option>
		<option value="2014" <?php if ($anio_actual == 2014){ echo "selected='selected'";} ?>>2014</option>
		<option value="2015" <?php if ($anio_actual == 2015){ echo "selected='selected'";} ?>>2015</option>
		<option value="2016" <?php if ($anio_actual == 2016){ echo "selected='selected'";} ?>>2016</option>
	</select>
	<select name="select_mes" id="select_mes">
		<option value="1" <?php if ($mes_actual == "01"){ echo "selected='selected'";} ?>>Enero</option>
		<option value="2" <?php if ($mes_actual == "02"){ echo "selected='selected'";} ?>>Febrero</option>
		<option value="3" <?php if ($mes_actual == "03"){ echo "selected='selected'";} ?>>Marzo</option>
		<option value="4" <?php if ($mes_actual == "04"){ echo "selected='selected'";} ?>>Abril</option>
		<option value="5" <?php if ($mes_actual == "05"){ echo "selected='selected'";} ?>>Mayo</option>
		<option value="6" <?php if ($mes_actual == "06"){ echo "selected='selected'";} ?>>Junio</option>
		<option value="7" <?php if ($mes_actual == "07"){ echo "selected='selected'";} ?>>Julio</option>
		<option value="8" <?php if ($mes_actual == "08"){ echo "selected='selected'";} ?>>Agosto</option>
		<option value="9" <?php if ($mes_actual == "09"){ echo "selected='selected'";} ?>>Septiembre</option>
		<option value="10" <?php if ($mes_actual == "10"){ echo "selected='selected'";} ?>>Octubre</option>
		<option value="11" <?php if ($mes_actual == "11"){ echo "selected='selected'";} ?>>Noviembre</option>
		<option value="12" <?php if ($mes_actual == "12"){ echo "selected='selected'";} ?>>Diciembre</option>
	</select>
	<input type="submit" name="enviar"  onclick="traer_resumen_mensual_campana_mkt()"   id="enviar" value="Cambiar Filtro" />
</form>
<div class="ui-layout-north">

<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong>Resumen Mensual Ventas Por Campa&ntilde;a</strong></span> </div>
 
	</ul> 
	
</div> 


<?php echo validation_errors(); ?>
			<div class="full_width big"></div>
			<div id="demo">

			  <table cellpadding="0" cellspacing="0" border="0" class="display" id="grilla">
	<thead>
		<tr>
      		<th width="3%"></th>
      		<th width="7%">FECHA_GESTION</th>
			<th width="7%">CANTIDAD</th>
			<th width="12%">TIPO CALIFICACION</th>
		</tr>
	</thead>
	<tbody>
         <?php 
		    $i = 1;
		    $calificacion="";
			$total = 0;
			foreach($ventas as $item):
			$total = $total+$item->cantidad;
			switch($item->calificacion_auditoria){
				case  0: $calificacion = "sin calificacion";
					break;
				case  1: $calificacion = "venta valida";
					break;
				case  2: $calificacion = "venta rechazada";
					break;
				default: $calificacion = "sin calificacion";
			}
?>		
      <tr id="<?php echo $item->calificacion_auditoria; ?>" class="activo1">
		<td><?php echo $i++; ?></td>
		<td><?php echo $anio_mes; ?></td>
		<td><a href="#" onClick="mostrar_detalle_por_dia('<?php echo $item->calificacion_auditoria; ?>','<?php echo $todo?>')"><?php echo $item->cantidad; ?></a></td>
		<td><?php echo $calificacion; ?></td>
		</tr>
		  <?php endforeach;?>
		<tr>
		<td>&nbsp;</td>
		<td><strong>TOTAL</strong></td>
		<td><strong><?php echo $total;?></strong></td>
		<td><strong>TODOS</strong></td>
		</tr>
		</tbody>
	<tfoot>
		<tr>
      		<th width="3%"></th>
      		<th width="7%">FECHA_GESTION</th>
			<th width="7%">CANTIDAD</th>
			<th width="12%">TIPO CALIFICACION</th>
		</tr>
	</tfoot>
</table>
 
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
   dateFormat: 'yy/mm/dd'
   
   });

</script>             
</div>
			<div class="spacer"></div>

</body>
</html>