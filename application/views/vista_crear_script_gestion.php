 
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
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.validate.kubo.js"></script> 

<script type="text/javascript"> 
 $(document).ready(function(){  
    $("#formulario").validate({
		
	      					success: function(label) {
		      				label.addClass("valid").append("<img src=\"<?php echo base_url() ?>css/images/checked.gif\"/>")
   							},
							rules: {
							nombre: {required: true, minlength: 6, maxlength: 30},
							descripcion: {required: true, maxlength: 50}
							}
 
							}); 
 });  
 
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
 
			<div class="full_width big"></div>
			<div id="demo">
            
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
               <tr>
                 <td  class=""><strong>CREAR SCRIPT</strong></td>
                
              </tr>
 			</table>
 
  <div id="Layer1">
  
    <?php 
	$atributors= array('id' => 'formulario');
	echo form_open("script_gestion/crear_script", $atributors);?>
  <?php echo validation_errors();?>
  <?php if(isset($mensaje)) echo $mensaje; ?>
  
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-border-layout-ct">
    
    <tr>
      <td width="162" class="x-grid3-row-over"><strong> NOMBRE </strong></td>
      <td width="910" class="x-grid3-row-selected"><p><input name="nombre" type="text" id="nombre" size="50" maxlength="30" class="label" ></td>
    </tr>
    <tr>
      <td class="x-grid3-row-over"><strong>DESCRIPCION</strong></td>
      <td class="x-grid3-row-selected"><input name="descripcion" type="text" id="descripcion"  value="" size="50" maxlength="50" class="label" ></td>
    </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><strong>ESTADO </strong></td>
      <td nowrap="nowrap" class="x-grid3-row-selected"><select name="estado" id="estado">
        <option value="1" selected="selected">Activo</option>
        <option value="0">No Activo</option>
      </select></td>
    </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><strong>CUERPO</strong></td>
      <td nowrap="nowrap" class="x-grid3-row-selected"><?php echo $text_area ?></td>
    </tr>
    <tr>
      <td nowrap="nowrap" class="x-grid3-row-over">&nbsp;</td>
      <td nowrap="nowrap" class="x-grid3-row-selected"><input type="submit" name="guardar" id="guardar" value="Guardar"  /></td>
    </tr>
    </table>
    
      <?php echo form_close();?>
  
</div>

<table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
               <tr>
                <td  class=""><strong>[<?php echo anchor('script_gestion/index', 'LISTAR  SCRIPTS', 'title="LISTAR  SCRIPTS"'); ?> ] </strong></td>
               </tr>
 			</table>
            
            
		</div>
        
        
        
        
  
        

      
        
			<div class="spacer"></div>
	 
</body>
</html>





