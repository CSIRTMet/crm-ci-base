<?php
$id_usuario = $this->session->userdata('id_usuario');
$usuarios_habilitados = array(2);
$tipo_usuario = $this->session->userdata('tipo_usuario');
$tipo_campana = $this->session->userdata('campana_tipo');
$id_campana = $this->session->userdata('campana_id_campana');
?> 
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
    <style type="text/css" media="all">
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
	.boton { 
		background:url('<?php echo base_url() ?>/css/images/Load.png') no-repeat; 
		border:none;
		cursor:pointer
	 } 
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
audio {
	width:80px;
	height:30px;
}

</style>
        
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>js/tablas/jquery.jeditable.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>js/tablas/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
		//background-color: #95B9C7;
			function realizar_calificacion(i){
		
				var calificacion_auditoria = $('#select_calificacion_auditoria'+i).val();
				var observacion_calificacion_auditoria = $('#txt_observacion_calificacion_auditoria'+i).val();
				var id_gestion = $('#txt_id_gestion'+i).val();
				var id_nivel4 = $('#txt_id_nivel4'+i).val();
				var id_cliente = $('#txt_id_cliente'+i).val();
				//alert(calificacion_auditoria+","+observacion_calificacion_auditoria+","+id_gestion+","+id_cliente+","+id_usuario+","+id_campana+","+id_sub_respuesta+","+fecha_inicio+","+fecha_termino+","+numero_carga);	
				
				if(calificacion_auditoria == 0 ){
					alert("Debe calificar la venta");
					return false;
				}else{
					$("#parabloquear"+i).attr("disabled","disabled");
					$("#parabloquear"+i).css("cursor","progress");
					var url='<?php echo base_url() ?>index.php/venta/set_califica_venta/';			
					$.post(url, { 
					'calificacion_auditoria':calificacion_auditoria,
					'observacion_calificacion_auditoria':observacion_calificacion_auditoria,
					'id_gestion':id_gestion,
					'id_cliente':id_cliente,
					'id_nivel4':id_nivel4
					}, function(data) {
						$('#detalle_venta').html(data);
						//alert(data);
					});
					//alert(calificacion_auditoria+",+observacion_calificacion_auditoria+","+id_gestion+","+id_cliente+","+id_usuario+","+id_campana+","+id_sub_respuesta+","+fecha_inicio+","+fecha_termino+","+numero_carga);	
				}
				//*/
			}
			function modificar_calificacion(i){
				var id_gestion = $('#txt_id_gestion'+i).val();
				var id_cliente = $('#txt_id_cliente'+i).val();
				var id_lista = $('#txt_id_lista'+i).val();
				var calificacion_auditoria = $('#select_calificacion_auditoria'+i).val();
				
				if(calificacion_auditoria == 0 ){
					$("#parabloquear"+i).attr("disabled","disabled");
					$("#parabloquear"+i).css("cursor","progress");
					var url='<?php echo base_url() ?>index.php/venta/set_modifica_calificacion_venta/';			
					$.post(url, { 
					'id_gestion':id_gestion,
					'id_cliente':id_cliente,
					'id_lista' : id_lista
					}, function(data) {
						$('#detalle_venta').html(data);
						//alert(data);
					});
				}else{
					alert("No a modificado el estado de la venta");
					return false;
				}
			}
			function get_fonos_clientes(id_cliente){
				var r = new Date().getTime();
				pop_up('<?php echo base_url() ?>index.php/telefono/form_carga_div_telefonos_cliente/'+id_cliente+'/'+r, '300', '170', 'no', 'no', 'no', 'no', 'no');
			}
		</script>
	 

</head>

<body>
<?php
header("Content-type: application/force-download");
?>
<div class="ui-layout-north">    
<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong><?php echo "Ventas realizadas el d&iacute;a ".$dia;?></strong></span> </div>
 
	</ul> 
	
</div> 


<?php echo validation_errors(); ?>
			<div class="full_width big"></div>
			<div id="demo">

			  <table cellpadding="0" cellspacing="0" border="0" class="display" id="grilla">
	<thead>
		<tr>
      		<th width="1%">ID</th>
			<th width="1%">CODGESTION</th>
			<th width="1%">ANEXO</th>
			<th width="1%">FONOS_CL</th>
			<th width="1%">LISTA</th>
			<th width="7%">EJECUTIVO</th>	
			<th width="1%">RUT</th>
			<th width="1%">CLIENTE</th> 
			<th width="1%">NIVEL 4</th>
			<th width="1%">GlOSA</th>
			<th width="2%">FECHA VENTA</th>
			<th width="2%">NUMERO LLAMADO</th>
			<th width="3%">GRABACION</th>
			<th width="3%">DESCARGAR</th>
			<th width="1%">DETALLE</th>
			<?php  
			if($tipo_usuario == 5){
			?>
			<th width="1%">CALIFICACION</th>
			<th width="1%">OBSERVACION_CALIFICACION</th>
			<th width="1%">ACCI&Oacute;N</th>
			<?php
			}
			if( in_array( $id_usuario, $usuarios_habilitados )){
			?>
			<th width="1%">MODIFICAR CALIFICACION</th>
			<th width="1%">ACCI&Oacute;N</th>
			<?php
			}
			?>
		</tr>
	</thead>
	<tbody>
        <?php $i=1; foreach($ventas as $item):
			$cadena = "<?php echo $item->grabacion;?>";
			$buscar = ".wav";
			$resultado = strpos($cadena, $buscar);
			if($resultado === false){
				$grabacion = $item->grabacion;
			}else{
				$grb = $item->grabacion;
				$patron = "/monitor/";
				$sustitucion = "monitor";
				$grabacion = preg_replace($patron, $sustitucion, $grb);
			}
	  ?>
		<tr>
		  <td width="1" height="1" nowrap="nowrap"><?php echo $i; ?></td>
		  <td><?php echo $item->id_gestion?></td>
		  <td><?php echo $item->anexo?></td>
		  <td width="1" height="1" nowrap="nowrap">
	  		<img  align="absmiddle" src="<?php echo base_url() ?>css/images/ico_telefono.gif" height="17" style="cursor:pointer" onclick="get_fonos_clientes(<?php echo $item->id_cliente;?>)"  />
	  	  </td>
		  <td><a href='#' title="<?php echo "Lista = [$item->lista]"; echo "\n";?>">ver</a></td>
		  <td><?php echo $item->ejecutivo; ?></td>
		  <td><?php echo $item->rut_cliente."-".$item->dv; ?></td>
		  <td><a href='#' title="<?php echo "Nombre Cliente = [$item->nombre_cliente]"; echo "\n";?>">ver</a></td>
		  <td><a href='#' title="<?php echo "Nivel 4 = [$item->nivel4]"; echo "\n";?>">ver</a></td>
		  <td><a href='#' title="<?php echo "Glosa = [$item->glosa]"; echo "\n";?>">ver</a></td>
		  <td><?php echo $item->fecha_venta; ?></td>
		  <td><?php echo $item->numero_llamado; ?></td>
		  <td>
          
        
          <?php echo $grabacion; ?>
          <audio controls="controls" preload="auto">
				<source src="<?php echo $grabacion; ?>" type="audio/wav" alt="<?php echo $grabacion; ?>"/>
			</audio>
		  </td>
		  <td><a href="<?php echo $grabacion; ?>" title="Para descargar el audio, presione boton derecho, luego guardar enlace como...">
			<img src="<?php echo base_url() ?>css/images/download.gif"></a>
		  </td>
		  <td><a href='#' title="<?php
			  echo "Nombre Cliente = [$item->nombre_cliente]";
			  echo "\n";
			  echo "Glosa = [$item->glosa]";
			  echo "\n";
			  echo "fecha_nacimiento = [$item->fecha_nacimiento]";
			  echo "\n";
			  echo "estado_civil = [$item->estado_civil]";
			  echo "\n";
			  echo "nivel1 = [$item->nivel1]";
			  echo "\n";
			  echo "nivel2 = [$item->nivel2]";
			  echo "\n";
			  echo "nivel3 = [$item->nivel3]";
			  echo "\n";
			  echo "Nivel4 = [$item->nivel4]"; 
			  echo "\n";
			  echo "sexo = [$item->sexo]";
			  echo "\n";
			  
			  
			  if($id_campana ==1){
			  echo "Rut = [$item->rut_venta]";
			  echo "\n";
			  echo "Plan venta = [$item->plan]";
			  echo "\n";
			  echo "Prima mensual = [$item->primamensual]";
			  echo "\n";
			  echo "Prima pesos = [$item->primapesos]";
			  echo "\n";
			  echo "Nombre1 = [$item->nombre1]";
			  echo "\n";
			  echo "Nombre2 = [$item->nombre2]";
			  echo "\n";
                          echo "Nombre3 = [$item->nombre3]";
			  echo "\n";
                          echo "Nombre4 = [$item->nombre4]";
			  echo "\n";
                          echo "Nombre5 = [$item->nombre5]";
			  echo "\n";
                          echo "% Total = [$item->suma_porcentaje]";
			  echo "\n";
			  }
			  
			  
			  
			  ?>">
			  <img  align="absmiddle" src="<?php echo base_url() ?>css/images/lupa.gif" height="17" style="cursor:pointer" name="img_desc" id="img_desc"/>
			  </a>
		</td>
	  <?php  
	  	if($tipo_usuario == 5){
	  ?>
	  <td width="1" height="1">
		<select name="select_calificacion_auditoria<?php echo $i;?>" id="select_calificacion_auditoria<?php echo $i;?>" <?php if($tipo_calificacion!=0) echo "disabled"?>>
			<option value='0' <?php if($item->calificacion_auditoria == 0) echo "selected"?> >Pendiente de calificaci&oacute;n</option>
			<option value='1' <?php if($item->calificacion_auditoria == 1) echo "selected"?> >Venta v&aacute;lida</option>
			<option value='2' <?php if($item->calificacion_auditoria == 2) echo "selected"?> >Venta rechazada</option>
		</select>
		</td>
	  <td width="1" height="1">
	  <textarea name="txt_observacion_calificacion_auditoria<?php echo $i;?>" tabindex="18" cols="30" rows="5" class="ext-mb-textarea" id="txt_observacion_calificacion_auditoria<?php echo $i;?>" <?php if($tipo_calificacion!=0) echo "disabled"?>><?php echo $item->observacion_calificacion_auditoria; ?></textarea>
	  <?php
	  	}
	  ?>
	  </td>
	  
	<?php  
		if($tipo_usuario == 5 && $tipo_calificacion == 0){
	?>
		<td width="1" height="1">
		<button type="button" class="boton" name="parabloquear_<?php echo $i;?>" id="parabloquear<?php echo $i;?>" 
			onClick="realizar_calificacion(<?php echo $i;?>)" ></button>
		<!--
		<a href="#" onClick="realizar_calificacion(<?php echo $i;?>)">
			<img  align="absmiddle" src="<?php echo base_url() ?>/css/images/Load.png" height="17" style="cursor:pointer"/>
		</a> -->
		</td>
	<?php
		}
	?>
	  
		<?php
		if( in_array( $id_usuario, $usuarios_habilitados ) && $tipo_usuario == 2 &&( $tipo_calificacion == 1 || $tipo_calificacion == 2)){
		?>
		<td width="1" height="1">
		<select name="select_calificacion_auditoria<?php echo $i;?>" id="select_calificacion_auditoria<?php echo $i;?>" <?php if($tipo_calificacion==0) echo "disabled"?>>
			<?php
			if($item->calificacion_auditoria == 1){?>
				<option value='0'>Pendiente de calificaci&oacute;n</option>
				<option value='1' <?php if($item->calificacion_auditoria == 1) echo "selected"?> >Venta v&aacute;lida</option>
			<?php
			}
			if($item->calificacion_auditoria == 2){?>
				<option value='0'>Pendiente de calificaci&oacute;n</option>
				<option value='2' <?php if($item->calificacion_auditoria == 2) echo "selected"?> >Venta rechazada</option>
			<?php
			}
			?>
		</select>
		</td>
		<td width="1" height="1">
		<button type="button" class="boton" name="parabloquear_<?php echo $i;?>" id="parabloquear<?php echo $i;?>" 
			onClick="modificar_calificacion(<?php echo $i;?>)" ></button>
		</td>
		<?php
		}
		?>
		</tr>
		<input type="hidden" id="txt_id_gestion<?php echo $i;?>" name="txt_id_gestion<?php echo $i;?>" size="15" value="<?php echo $item->id_gestion; ?>" />
		<input type="hidden" id="txt_id_lista<?php echo $i;?>" name="txt_id_lista<?php echo $i;?>" size="15" value="<?php echo $item->id_lista; ?>" />
		<input type="hidden" id="txt_id_cliente<?php echo $i;?>" name="txt_id_cliente<?php echo $i;?>" size="15" value="<?php echo $item->id_cliente; ?>" />
		<input type="hidden" id="txt_id_nivel4<?php echo $i;?>" name="txt_id_nivel4<?php echo $i;?>" size="15" value="<?php echo $item->id_nivel4; ?>" />
 <?php $i++; endforeach;?>
		</tbody>
	<tfoot>
		<tr>
      		<th width="1%">ID</th>
			<th width="1%">CODGESTION</th>
			<th width="1%">ANEXO</th>
			<th width="1%">FONOS_CL</th>
			<th width="1%">LISTA</th>
			<th width="7%">EJECUTIVO</th>	
			<th width="1%">RUT</th>
			<th width="1%">CLIENTE</th>     
			<th width="1%">NIVEL 4</th>
			<th width="1%">GlOSA</th>
			<th width="2%">FECHA VENTA</th>
			<th width="2%">NUMERO LLAMADO</th>
			<th width="3%">GRABACION</th>
			<th width="3%">DESCARGAR</th>
			<th width="1%">DETALLE</th>
			<?php  
			if($tipo_usuario == 5){
			?>
			<th width="1%">CALIFICACION</th>
			<th width="1%">OBSERVACION_CALIFICACION</th>
			<th width="1%">ACCI&Oacute;N</th>
			<?php
			}
			if( in_array( $id_usuario, $usuarios_habilitados )){
			?>
			<th width="1%">MODIFICAR CALIFICACION</th>
			<th width="1%">ACCI&Oacute;N</th>
			<?php
			}
			?>
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