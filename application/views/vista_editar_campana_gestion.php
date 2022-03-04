 
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





<?php echo  form_open("campana_gestion/editar_campana_gestion"); ?>


<?php echo validation_errors(); ?> 



<div class="ui-layout-north"> 

	<?php $this->load->view('includes/barra_usuario_conectado'); ?>
    <?php 
    $data["seccion"] = "campana";
    $this->load->view('includes/menu_gestion.php',$data);
    ?>
	<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong>INFORMACION DE CAMPA&Ntilde;A</strong></span> </div>
 
	</ul> 
	
</div> 
 
 
<div id="Layer1">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-border-layout-ct">
    

    <tr>
      <td colspan="4" class="header"><div align="center"> </div></td>
      </tr>
    <tr>
      <td class="x-grid3-row-over">&nbsp;</td>
      <td class="x-grid3-row-selected">&nbsp;</td>
      <td width="159" rowspan="14" class="x-grid3-row-over">&nbsp;</td>
      <td width="308" rowspan="14" class="x-grid3-row-selected">&nbsp;</td>
    </tr>
    <tr>
      <td width="137" class="x-grid3-row-over"><strong>ID CAMPAÑA </strong></td>
 
      <td width="276" class="x-grid3-row-selected"><input name="id_campana" type="text" id="id_campana" value="<?php echo $campana->id_campana; ?>" readonly="readonly"></td>
    </tr>
    <tr>
      <td class="x-grid3-row-over"><strong> NOMBRE </strong></td>
      <td class="x-grid3-row-selected"><input name="nombre" type="text" id="nombre"  value="<?php echo $campana->nombre; ?>" ></td>
      </tr>
    <tr>
      <td class="x-grid3-row-over"><strong>CODIGO</strong></td>
      <td class="x-grid3-row-selected"><input name="codigo" type="text" id="codigo"  value="<?php echo $campana->codigo; ?>" ></td>
    </tr>
    <tr>
      <td class="x-grid3-row-over"><strong>FECHA INICIO </strong></td>
      <td class="x-grid3-row-selected"><input name="fecha_inicio" type="text" id="fecha_inicio"  value="<?php echo $campana->fecha_inicio; ?>" ></td>
      </tr>
    <tr>
      <td class="x-grid3-row-over"><strong>FECHA TERMINO </strong></td>
      <td class="x-grid3-row-selected"><input name="fecha_termino" type="text" id="fecha_termino" value="<?php echo $campana->fecha_termino; ?>"></td>
    </tr>
    <tr>
      <td class="x-grid3-row-over"><strong>TIPO </strong></td>
      <td class="x-grid3-row-selected">
	  
	  
	   <?php  $options2 = array(
                  '0'   => 'Seleccione Tipo',
                  '1'   => 'Cobranza',
                  '2'   => 'Telemarkeing'
                 
                );
	echo form_dropdown('tipo', $options2, set_value('tipo', $campana->tipo));
	?>	  </td>
      </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><strong>ESTADO </strong></td>
      <td nowrap="nowrap" class="x-grid3-row-selected">
	    
	   <?php   
		$options = array(
                  '0'  => 'Seleccione Estado',
                  '1'    => 'Activa',
                  '2'   => 'No Activa'      
                );
	echo form_dropdown('estado', $options, set_value('estado', $campana->estado));
		?>	  </td>
      </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><strong>EMPRESA </strong></td>
      <td nowrap="nowrap" class="x-grid3-row-selected"><?php echo $campana->nombre_empresa; ?></td>
    </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over">&nbsp;</td>
      <td nowrap="nowrap" class="x-grid3-row-selected">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over">&nbsp;</td>
      <td nowrap="nowrap" class="x-grid3-row-selected">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over">&nbsp;</td>
      <td nowrap="nowrap" class="x-grid3-row-selected">&nbsp;</td>
    </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over">&nbsp;</td>
      <td nowrap="nowrap" class="x-grid3-row-selected">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over">&nbsp;</td>
      <td nowrap="nowrap" class="x-grid3-row-selected">&nbsp;</td>
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
      <td width="6%"  ><input name="Grabar" type="submit" class="btnForm" id="Grabar" value="Grabar" /></td>
      <td width="51%">&nbsp;</td>
    </tr>
  </table>
</div>
  
  
</form>



 
  </body>
</html>





