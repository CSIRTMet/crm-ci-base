

<style type="text/css">
<!--

#encabezado_campana {

	position:relative;
	width:100%;
	text-align:justify;
	padding:0px;
	
	
}

#div_cliente {

	position:relative;
	width:95%;
	text-align:justify;

	padding-bottom:1px;
	padding-left:7px;
	padding-right:7px;
	padding-top:10px;
	
	
	
}

#div_telefono , #div_direccion {

	position:relative;
	width:95%;
	text-align:justify;
	padding-top:5px;
	padding-left:7px;
	padding-right:7px;
	
	
	
}
#div_gestion {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}


#div_deuda {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
	overflow: scroll;	
	
	max-height:150px;
}
#div_pago {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
	overflow: scroll;
	max-height:150px;	
}

#div_resumen {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}
#Layer6 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}
#div_comando {
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


function enviar_formulario() {
	
		$.post("<?php echo base_url() ?>index.php/gestion/ingresar_gestion", { 
		
		
			  id_cliente: $("#txt_id_cliente").val()
			 ,id_usuario: $("#txt_id_usuario").val()
			 ,id_accion: $("#select_accion").val()
			 ,id_contactabilidad: $("#select_contactabilidad").val()
			 ,id_respuesta: $("#select_respuesta").val()
			 ,id_sub_respuesta: $("#select_sub_respuesta").val()
			 ,nombre_contacto: $("#txt_nombre_contacto").val()
			 ,apaterno_contacto: $("#txt_apaterno").val()
			 ,amaterno_contacto: $("#txt_amaterno").val()
			 ,glosa: $("#txt_glosa").val()
			 
			 
		}, function (data) {
	
		    if (data.length >3)  //viene un error y lo muestro
			{
				alert(data);
			}
			else 
			{
				cargar_cliente(); //sino viene error , cargo el cliente
			}
		});
 	}
	

</script>
<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
.style6 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->






ul.tabs {
	margin: 0;
	padding: 0;
	float: left;
	list-style: none;
	height: 32px;
	border-bottom: 1px solid #999;
	border-left: 1px solid #999;
	width: 100%;
}
ul.tabs li {
	float: left;
	margin: 0;
	padding: 0;
	height: 31px;
	line-height: 31px;
	border: 1px solid #999;
	border-left: none;
	margin-bottom: -1px;
	overflow: hidden;
	position: relative;
	background: #e0e0e0;
}
ul.tabs li a {
	text-decoration: none;
	color: #000;
	display: block;
	font-size: 1.2em;
	padding: 0 20px;
	border: 1px solid #fff;
	outline: none;
}
ul.tabs li a:hover {
	background: #ccc;
}
html ul.tabs li.active, html ul.tabs li.active a:hover  {
	background: #fff;
	border-bottom: 1px solid #fff;
}




.tab_container {
	border: 1px solid #999;
	border-top: none;
	overflow: hidden;
	clear: both;
	float: left; width: 100%;
	background: #fff;
}
.tab_content {
	padding: 20px;
	font-size: 1.2em;
}



</style> 

<script type="text/javascript" >
$(document).ready(function()
{
	$(".tab_content").hide();
	$("ul.tabs li:first").addClass("active").show();
	$(".tab_content:first").show();

	$("ul.tabs li").click(function()
       {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();

		var activeTab = $(this).find("a").attr("href");
		$(activeTab).fadeIn();
		return false;
	});
});

</script>


<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<form id="form_creacion" name="form_creacion" action="#" method="post"  >







<ul class="tabs">
    <li><a href="#div_telefono">TELEFONOS</a></li>
    <li><a href="#div_direccion">DIRECCIONES</a></li>
	 <li><a href="#div_deuda">DEUDAS</a></li>
	  <li><a href="#div_pago">PAGOS</a></li>
	   <li><a href="#div_gestion">GESTIONES</a></li>
</ul>

<div class="tab_container">
   







<?php foreach($clientes as $item):?>




<div id="div_cliente">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="ui-layout-pane">
  
<input type="hidden" id="txt_id_cliente" name="txt_id_cliente" size="15" maxlength="10" value="<?php echo $item->id_cliente; ?>" />  
<input type="hidden" id="txt_id_usuario" name="txt_id_usuario" size="15" maxlength="10" value="<?php echo $this->session->userdata('id_cliente'); ?>" />  

  
    <tr>
      <td width="137"><strong> RUT</strong></td>
      <td width="276"><strong>
	  
        <input name="txt_rut" type="text" class="x-form-field" id="txt_rut" size="15" maxlength="10" value="<?php echo $item->rut; ?>" disabled="disabled" />
        <input name="txt_dv" type="text" class="x-form-field" id="txt_dv" size="5" maxlength="1" readonly="true" />
      </strong></td>
      <td width="72">&nbsp;</td>
      <td width="395">&nbsp;</td>
    </tr>
    <tr>
      <td><strong> NOMBRE</strong></td>
      <td><?php echo $item->nombre; ?></td>
      <td><strong>EMAIL</strong></td>
      <td nowrap="nowrap"><?  echo "usuario@email.com";//$item->email; 
?>
        <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_email.gif" height="17" onclick="" /></td>
    </tr>
  </table>
</div>

<div id="div_telefono" class="tab_content">
  
  	
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="ui-layout-pane">
    
    <tr>
      <td width="16%" class="x-combo-list-hd">TELEFONO 1</td>
      <td width="16%" class="x-combo-list-hd">TELEFONO 2 </td>
      <td width="18%" class="x-combo-list-hd">TELEFONO 3 </td>
   
    </tr>
    <tr>
     
<?php foreach($telefonos as $telefono):

$color = '';
if ($telefono->tipificacion==1){
$color = 'bgcolor="#66CC33"';

};  ?>


	 
	  <td nowrap="nowrap"<?php echo  $color ?> ><?php echo $telefono->numero;?>  <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" onclick="llamar('<?php echo $telefono->numero; ?>')"  />	  </td>
	  
	 
	  
	 
 <?php endforeach;?> 
	  
	  
	  
     
    </tr>
  </table>
</div> 


<div id="div_direccion" class="tab_content">
  
  	
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="ui-layout-pane">
    
    <tr>
      <td width="16%" class="x-combo-list-hd">DIRECCION</td>
      <td width="14%" class="x-combo-list-hd">CLASIFICAR</td>
    </tr>
    
     
<?php foreach($direcciones as $direccion):

$color = '';
if ($direccion->tipificacion==1){
$color = 'bgcolor="#66CC33"';

};  ?>
<tr>

	 
	  <td nowrap="nowrap"<?php echo  $color ?> ><?php echo $direccion->calle.", ".$direccion->numero.", ".$direccion->complemento." ".$direccion->nombre_comuna.", ".$direccion->nombre_ciudad.", ".$direccion->nombre_region; ?></td>
	  
	 
	<td><img src="<?php echo base_url() ?>/css/images/icono_direccion.gif" height="17"  align="absmiddle" onclick="validar_direccion('<?php echo $direccion->id_direccion; ?>'); " /></td>
    </tr>  
	 
 <?php endforeach;?> 
	  
	  
	  
      
  </table>
</div> 


  




 <div align="center" style="padding-top:10px"><span class="style6">GESTION
    </span>
</div>





<div id="div_gestion">

  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td width="14%" class="header">ACCION</td>
      <td width="30%" class="header">TIPIFICACION </td>
      <td colspan="2" class="header">CONTACTO</td>
      <td class="header">GLOSA</td>
    </tr>
    <tr>
      <td><select name="select_accion" id="select_accion"  disabled="disabled ">
        <option value="0">*Seleccione*</option>
        <?php foreach($accion as $acc):?>
        <option value="<?php echo $acc->id_accion; ?>" <?php if($acc->id_accion==1) echo "selected='selected'"; ?> ><?php echo $acc->nombre; ?></option>
        <?php endforeach;?>
      </select></td>
      <td><select name="select_contactabilidad" id="select_contactabilidad">
        <option value="0">*Seleccione*</option>
        <?php foreach($contactabilidad as $cont):?>
        <option value="<?php echo $cont->id_contactabilidad; ?>"><?php echo $cont->nombre; ?></option>
        <?php endforeach; ?>
      </select></td>
      <td width="12%" class="x-date-mp-btns">NOMBRE</td>
      <td width="17%"  ><span >
        <input name="txt_nombre_contacto" type="text" id="txt_nombre_contacto" />
      </span></td>
	  
	  
      <td width="27%" rowspan="3" ><textarea name="textarea" cols="30" rows="3" class="ext-mb-textarea" id="textarea"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><select name="select_respuesta" id="select_respuesta">
        <option value="0">Seleccionar</option>
      </select></td>
      <td class="x-date-mp-btns"><span >APATERNO</span></td>
      <td  ><input name="txt_apaterno" type="text" id="txt_apaterno" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><select name="select_sub_respuesta" id="select_sub_respuesta">
        <option value="0">Seleccionar</option>
        
      </select></td>
      <td class="x-date-mp-btns"><span >AMATERNO</span></td>
      <td ><input name="txt_amaterno" type="text" id="txt_amaterno" /></td>
    </tr>
  </table>
</div>




<div id="div_deuda" class="tab_content">
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">

    <tr>
      <td nowrap="nowrap" class="titleFormBody">NRO SAP</td>
      <td nowrap="nowrap" class="titleFormBody">NRO</td>
	  
      <td nowrap="nowrap" class="titleFormBody">FEC. EMISION </td>
      <td nowrap="nowrap" class="titleFormBody">FEC.VENC</td>
      <td nowrap="nowrap" class="titleFormBody">DEUDA</td>
      <td nowrap="nowrap" class="titleFormBody">SALDO</td>
      <td nowrap="nowrap" class="titleFormBody">DIAS MORA </td>
      <td nowrap="nowrap" class="titleFormBody">TASA ORI </td>
      <td nowrap="nowrap" class="titleFormBody">TASA DESC </td>
      
    </tr>
    
	<?php 
	$total_deuda = 0;
	$num_documentos = 0;
	
	
	
	foreach($deudas as $deuda):
	$total_deuda = $total_deuda + (int)$deuda->importe;
	$num_documentos = $num_documentos + 1;
	?>
	<tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->n_docto_sap; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->num_docto; ?></td>
	 
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->fec_generac; ?> </td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->fecha_ven; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->importe; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->saldo; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over">$dias_mora </td>
      <td nowrap="nowrap" class="x-grid3-row-over">--</td>
      <td nowrap="nowrap" class="x-grid3-row-over">--</td>
       
    </tr>
	  <?php endforeach; ?>
	
	
  </table>
</div>

<div id="div_pago" class="tab_content">
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">

    <tr>
      <td class="titleFormBody">NRO SAP</td>
	  <td nowrap="nowrap" class="titleFormBody">CC</td>
      <td class="titleFormBody">FEC. EMISION </td>
	  <td nowrap="nowrap" class="titleFormBody">FEC. VENC</td>
     
      <td nowrap="nowrap" class="titleFormBody">FEC. PAGO</td>
       <td nowrap="nowrap" class="titleFormBody">CLASE DCTO</td>
      <td class="titleFormBody">IMPORTE</td>
      <td nowrap="nowrap" class="titleFormBody">MONEDA</td>
      
      <td nowrap="nowrap" class="titleFormBody">% COMISION</td>
	   <td nowrap="nowrap" class="titleFormBody">$ COMISION</td>
      
    </tr>
    
	<?php 
	
	$total_pago = 0;
	foreach($pagos as $pago):
	
	$total_pago = $total_pago + (int)$pago->importe;
	
	?>
	<tr>
      <td class="x-grid3-row-over"><?php echo $pago->n_docto_sap; ?></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $pago->cc; ?></td>
      <td class="x-grid3-row-over"><?php echo $pago->f_generac; ?></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $pago->f_vto; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $pago->f_facturac; ?></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $pago->clase_docto; ?> </td>
      
      
      <td class="x-grid3-row-over"><?php echo $pago->importe; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $pago->clase_mon; ?></td>
      
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $pago->porc_comision; ?></td>
	  <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $pago->monto_comision; ?></td>
       
    </tr>
	  <?php endforeach; ?>
	  
  </table>
</div>



<div align="center" class="style6"> RESUMEN OBLIGACION</div>

<div id="div_resumen">
 

  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="BackgroundBarra">
    <tr>
      <td width="11%" bgcolor="#FFCC99" class="x-grid3-row-selected">DOCTOS</td>
      <td width="15%" class="x-grid3-row-over"><?php echo $num_documentos; ?></td>
      <td width="13%" nowrap="nowrap" bgcolor="#FFCC99" class="x-grid3-row-selected">TOTAL MORA </td>
      <td width="15%" nowrap="nowrap" class="x-grid3-row-over">$total_mora</td>
      <td width="13%" nowrap="nowrap" bgcolor="#FFCC33">TOTAL DEUDA </td>
      <td width="12%" nowrap="nowrap" class="x-grid3-row-over"><?php echo $total_deuda ?></td>
      <td width="11%" bgcolor="#FFCC99" class="x-grid3-row-selected">GASTOS COBRANZA </td>
      <td width="10%" class="x-grid3-row-over">$gastos_cobranza</td>
    </tr>
    <tr>
      <td bgcolor="#FFCC99" class="x-grid3-row-selected">DESCUENTOS U OFERTA </td>
      <td class="x-grid3-row-over">$descuentos</td>
      <td nowrap="nowrap" bgcolor="#FFCC99" class="x-grid3-row-selected">TOTAL ABONO </td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $total_pago ?></td>
      <td nowrap="nowrap" bgcolor="#FFCC33">SALDO DEUDA </td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $total_deuda - $total_pago; ?></td>
      <td bgcolor="#FFCC99" class="x-grid3-row-selected">&nbsp;</td>
      <td class="x-grid3-row-over">&nbsp;</td>
    </tr>
  </table>

</div>

<div id="div_comando" >
  <table border="0" style="width:100%">
    <tr>
      <td width="43%">&nbsp;</td>
      <td width="6%"  ><input name="Grabar" type="button" class="btnForm" id="Grabar" value="Grabar" onclick="enviar_formulario();" /></td>
      <td width="51%">&nbsp;</td>
    </tr>
  </table>
</div>
 
 
 
</div>




 <?php endforeach;?>
 
 </form>