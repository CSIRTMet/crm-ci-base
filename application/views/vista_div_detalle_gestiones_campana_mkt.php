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
audio {
	width:200px;
	height:30px;
}

</style>
        
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>js/tablas/jquery.jeditable.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>js/tablas/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
		//background-color: #95B9C7;
		function get_fonos_clientes(id_cliente){
			var r = new Date().getTime();
			pop_up('<?php echo base_url() ?>index.php/telefono/form_carga_div_telefonos_cliente/'+id_cliente+'/'+r, '300', '170', 'no', 'no', 'no', 'no', 'no');
		}	
		</script>
	 

</head>

<body>


<div class="ui-layout-north">    
<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong><?php echo "Gestiones realizadas al rut=".$rut; ?></strong></span> </div>
 
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
			<td width="1">FONOS_CL</td>
			<th width="7%">EJECUTIVO</th>	
			<th width="1%">RUT</th>
			<th width="1%">CLIENTE</th>     
			<th width="1%">SUBRESPUESTA</th>
			<th width="1%">GlOSA</th>
			<th width="2%">FECHA GESTION</th>
			<th width="2%">FONO LLAMADO</th>
			<th width="3%">GRABACION</th>
			<th width="3%">DESCARGAR</th>
			<th width="1%">DETALLE</th>
		</tr>
	</thead>
	<tbody>
        <?php $i=1; foreach($gestiones as $item):
		$cadena = "<?php echo $item->grabacion;?>";
		$buscar = ".wav";
		$resultado = strpos($cadena, $buscar);
	  ?>
		<tr>
		  <td width="1" height="1" nowrap="nowrap"><?php echo $i; ?></td>
		  <td><?php echo $item->id_gestion?></td>
		  <td><?php echo $item->anexo?></td>
		  <td width="1" height="1" nowrap="nowrap">
	  		<img  align="absmiddle" src="<?php echo base_url() ?>css/images/ico_telefono.gif" height="10" style="cursor:pointer" onclick="get_fonos_clientes(<?php echo $item->id_cliente;?>)"  />
        	  </td>
		  <td><?php echo $item->ejecutivo; ?></td>
		  <td><?php echo $item->rut_cliente."-".$item->dv; ?></td>
		  <td><a href='#' title="<?php echo "Nombre Cliente = [$item->nombre_cliente]"; echo "\n";?>">ver</a></td>
		  <td><a href='#' title="<?php echo "SubRespuesta = [$item->sub_respuesta]"; echo "\n";?>">ver</a></td>
		  <td><a href='#' title="<?php echo "Glosa = [$item->glosa]"; echo "\n";?>">ver</a></td>
		  <td><?php echo $item->fecha_termino; ?></td>
		  <td><?php echo $item->numero_llamado; ?></td>
		  <td>
			<?php
			if($resultado === false){
				echo $item->grabacion;
			}else{
			?>
			<audio controls="controls" >
				<source src="<?php echo $item->grabacion; ?>" type="audio/wav" alt="<?php echo $item->grabacion; ?>"/>
			</audio>
			<?php
			}
		    ?>
		  </td>
		  <td>
			<?php
			if($resultado === false){
				echo $item->grabacion;
			}else{
			?>
			<a href="<?php echo $item->grabacion; ?>" title="Para descargar el audio, presione boton derecho, luego guardar enlace como...">
			<img src="<?php echo base_url() ?>/css/images/download.gif"></a>
			<?php
			}
		  	?>
		  <td>
		  <td><a href='#' title="<?php 
			  echo "RUT_CONTACTO = [$item->rut_contacto]";
			  echo "\n";
			  echo "NOMBRE_CONTACTO = [$item->nombre_contacto]";
			  echo "\n";
			  echo "APATERNO_CONTACTO = [$item->apaterno_contacto]";
			  echo "\n";
			  echo "AMATERNO_CONTACTO = [$item->amaterno_contacto]";
			  echo "\n";
	  ?>">
	  <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/lupa.gif" height="17" style="cursor:pointer" name="img_desc" id="img_desc"/>
	  </a></td>
	  </tr>
 <?php $i++; endforeach;?>
		</tbody>
	<tfoot>
		<tr>
      		<th width="1%">ID</th>
			<th width="1%">CODGESTION</th>
			<th width="1%">ANEXO</th>
			<td width="1">FONOS_CL</td>
			<th width="7%">EJECUTIVO</th>	
			<th width="1%">RUT</th>
			<th width="1%">CLIENTE</th>     
			<th width="1%">SUBRESPUESTA</th>
			<th width="1%">GlOSA</th>
			<th width="2%">FECHA GESTION</th>
			<th width="2%">FONO LLAMADO</th>
			<th width="3%">GRABACION</th>
			<th width="3%">DESCARGAR</th>
			<th width="1%">DETALLE</th>
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