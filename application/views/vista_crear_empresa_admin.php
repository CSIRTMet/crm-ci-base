

<style type="text/css">
<!--

#encabezado_campana {

	position:relative;
	width:100%;
	text-align:justify;
	padding:0px;
	
	
}

#div_vista_principal_administracion {

	position:relative;
	width:95%;
	text-align: center;
	padding-bottom:1px;
	padding-left:7px;
	padding-right:7px;
	margin:0 auto 0 auto;
	
	
	
}

#div_vista_empresa_administracion {

	position:relative;
	width:95%;
	text-align: center;
	padding-bottom:1px;
	padding-left:7px;
	padding-right:7px;
	margin:0 auto 0 auto;
	
	
	
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


<script type="text/javascript"> 
/*
	*#######################
	*     ON PAGE LOAD
	*#######################
	*/
	
		$("#select_contactabilidad").change(function(){
		   $('#select_respuesta').html('<option value=0>Cargando...</option>');
		   $('#select_sub_respuesta').html('<option value=0>--</option>');
			var id = $(this).val();
			var url='<?php echo base_url() ?>index.php/respuesta/get_respuesta_por_contactabilidad/';
			
			$.post(url, { 'id':id }, function(data) {
					$('#select_respuesta').html(data);
			});			
		});
		
		
		
		$("#select_respuesta").change(function(){
		    $('#select_sub_respuesta').html('<option value=0>Cargando...</option>');
			var id = $(this).val();
			var url='<?php echo base_url() ?>index.php/sub_respuesta/get_sub_respuesta_por_respuesta/';
			$.post(url, { 'id':id }, function(data) {
				$('#select_sub_respuesta').html(data);
			});			
		
		});
	
	    /*
		*#######################
		* TRAE RESPUESTA DE CLIENTE DESDE CONTROLADOR
		*#######################*/



</script>


<script type="text/javascript"> 
/*
	*#######################
	*   
	*#######################
*/



function mostrar() {
  $("#pop").fadeIn('slow');
} //checkHover

function cerrarPop() {
 $("#pop").hide();
} 


function enviar_formulario() {}
	

</script>
<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<title>KUBO COBRAZA - ADMINISTRACION</title>



<div id="div_vista_principal_administracion">
<?php $this->load->view("includes/encabezado");?>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class="x-border-layout-ct"><strong>ADMINISTRACION DEL SISTEMA - Crear empresa [<a href="<?php echo base_url() ?>index.php/empresa_admin/form_listar_empresa/">Volver al listado</a>] </strong></td>
    </tr>
  </table>
</div>
<div id="div_vista_empresa_administracion">
  
  
  <?php echo form_open("empresa_admin/crear_empresa");?>
  <?php echo validation_errors();?>
  <?php if(isset($mensaje)) echo $mensaje; ?>
  
  
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">


    
	<tr>
	  <td width="22%" nowrap="nowrap"><span class="titleFormBody">NOMBRE</span></td>
	  <td width="78%" nowrap="nowrap" class="x-grid3-row-over"><span class="titleFormBody">
	    <input name="nombre" type="text" id="nombre" value="<?php echo set_value('nombre', ''); ?>" />
	  </span></td>
    </tr>
	<tr>
	  <td nowrap="nowrap"><span class="titleFormBody">CODIGO</span></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><span class="titleFormBody">
	    <input name="codigo" type="text" id="codigo" value="<?php echo set_value('codigo', ''); ?>"/>
	  </span></td>
    </tr>
	
	
	
	<tr>
	  <td nowrap="nowrap">&nbsp;</td>
	  <td nowrap="nowrap">&nbsp;</td>
    </tr>
	<tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap"><input name="Guardar" type="submit" id="Guardar" value="Guardar" /></td>
    </tr>
  </table>
</div>