
<script type="text/javascript">IniciarCrono()</script>
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

#div_telefono , #div_direccion, #div_compromiso {

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

#div_agenda{
	position:relative;
	width:95%;
	text-align:justify;
	padding:0 7px 7px 7px;
}


#div_deuda {
	position:relative;
	width:95%;
	text-align:justify;
	padding-bottom:1px;
	padding-left:7px;
	padding-right:7px;
	padding-top:10px;
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

<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />


<style type="text/css">
<!--
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
#div_fcompromiso{
	position:relative;
	width:95%;

	text-align:justify;
	padding:0 7px 7px 7px;
}
#div_monto_pago{
	position:relative;
	width:95%;
	text-align:justify;
	padding:0 7px 7px 7px;
}
#div_convenio{
	position:relative;
	width:95%;
	text-align:justify;
	padding:0 7px 7px 7px;
}
#div_lugar_de_pago{
	position:relative;
	width:95%;
	text-align:justify;
	padding:0 7px 7px 7px;
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
		if(activeTab == "#div_compromiso")
		{
			var id_cl = "<?php echo $id_cliente; ?>";
			var url='<?php echo base_url() ?>index.php/cliente/get_compromiso_cliente/'+id_cl;
			$.post(url, function(data) {
					$(activeTab).html(data);
			});	
			
			
		}
		return false;
	});

 carga_div_telefonos(<?php echo $id_cliente; ?>);
 carga_div_direcciones(<?php echo $id_cliente; ?>);


});

</script>

<script type="text/javascript"> 

//muestra div_tpago	
function mostrar_div_monto_pago(){

	try{
		
		$("#div_convenio").css("display", "none");	
		$("#div_monto_pago").css("display", "");		
		
		
	}catch(e){
	}	
}
function mostrar_div_lugar_pago(){

	try{
		$("#div_lugar_de_pago").css("display", "");		
	}catch(e){
	}	
}
function ocultar_div_lugar_pago(){

	try{
		$("#div_lugar_de_pago").css("display", "none");		
	}catch(e){
	}	
}


function mostrar_div_convenio(){
	try{
		
		$("#div_convenio").css("display", "");	
		$("#div_monto_pago").css("display", "none");		
		
		
	}catch(e){
	}	
}
//oculta div_tpago		
function ocultar_monto_pago_y_convenio(){	 
	try{
					$("#div_monto_pago").css("display", "none");
			
					$("#div_convenio").css("display", "none");
					$("#div_lugar_de_pago").css("display", "none");
					
			
	}catch(e){
		//alert(e.description);
	}
}
//valida el monto del pago total

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
		
		
		
// Selects one or more elements to assign a simpletip to

            
		
		$("#select_respuesta").change(function(){
		    $('#select_sub_respuesta').html('<option value=0>Cargando...</option>');
			$('#select_tipo_contacto').html('<option value=0>--</option>');
			var id = $(this).val();
			var url='<?php echo base_url() ?>index.php/sub_respuesta/get_sub_respuesta_por_respuesta/';
			$.post(url, { 'id':id }, function(data) {
				$('#select_sub_respuesta').html(data);
			});			
		
		});
	
		$("#select_sub_respuesta").change(function(){
		
				
				$('#select_tipo_contacto').html('<option value=0>Cargando...</option>');
				var id = $(this).val();
				var url='<?php echo base_url() ?>index.php/tipo_contacto/get_tipo_contacto_por_sub_respuesta/';
				$.post(url, { 'id':id }, function(data) {
					$('#select_tipo_contacto').html(data);
				});	
				
				if (id == "8" || id == "11" || id == "23")	
				{
				    ocultar_div_compromiso();
					mostrar_div_agendamiento();
					ocultar_monto_pago_y_convenio();
					
				}	
				else if (id == "29" || id == "30" || id == "31" || id =="32" || id == "33" || id =="34"  || id =="48")	
				{ //acepta del 1 al 6
					
					var tipo_campana = "<?php echo $this->session->userdata('campana_tipo'); ?>";
					if (tipo_campana == "1"){
					//alert('compago');
					mostrar_div_agendamiento();
					mostrar_div_compromiso();
					mostrar_div_monto_pago();
					mostrar_div_lugar_pago();
					
					}
				}	
				
				else
				{
					ocultar_div_agendamiento();
					ocultar_div_compromiso();
					ocultar_monto_pago_y_convenio();
					
				}
			
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


	
function guardar_telefono(){
	 $.post("<?php echo base_url() ?>index.php/telefono/ingresar_nuevo_telefono", { 
			  area: $("#txt_area_add").val()
			 ,numero: $("#txt_numero_add").val() 
			 ,tipo: $("#select_tipo_telefono_add").val()
			 ,id_cliente: <?php echo $id_cliente; ?>
	 
		}, function (data) {
		    if (data.length >3)  //viene un error y lo muestro
			{
				alert(data);
			}
			else 
			{
			ocultar_div_nuevo_telefono();
			carga_div_telefonos(<?php echo $id_cliente; ?>);
			}
		});
	 

}


function guardar_direccion(){
	 
	 $.post("<?php echo base_url() ?>index.php/direccion/ingresar_nueva_direccion", { 
			  direccion_region: $("#select_region").val()
			 ,direccion_ciudad: $("#select_ciudad").val()
			 ,direccion_comuna: $("#select_comuna").val()
			 ,direccion_calle: $("#dir_calle").val()
			 ,direccion_numero: $("#dir_numero").val()
			 ,direccion_complemento: $("#dir_complemento").val()

			 ,id_cliente: <?php echo $id_cliente; ?>
	 
		}, function (data) {
		    if (data.length >3)  //viene un error y lo muestro
			{
				alert(data);
			}
			else 
			{
			ocultar_div_nueva_direccion();
			carga_div_direcciones(<?php echo $id_cliente; ?>);
			}
		});
	 

}

function enviar_formulario() {

       $("#Grabar").attr("disabled","disabled");
	   
		$.post("<?php echo base_url() ?>index.php/gestion/ingresar_gestion_cobranza", { 
		
		
			  id_cliente: $("#txt_id_cliente").val()
			 ,id_gestion: $("#txt_id_gestion").val() 
			 ,id_deuda: $("#txt_id_deuda").val() 
			 ,id_usuario: $("#txt_id_usuario").val()
			 ,id_accion: $("#select_accion").val()
			 ,id_contactabilidad: $("#select_contactabilidad").val()
			 ,id_respuesta: $("#select_respuesta").val()
			 ,id_sub_respuesta: $("#select_sub_respuesta").val()
			 ,id_tipo_contacto: $("#select_tipo_contacto").val()
			 ,nombre_contacto: $("#txt_nombre_contacto").val()
			 ,apaterno_contacto: $("#txt_apaterno").val()
			 ,amaterno_contacto: $("#txt_amaterno").val()
			 ,rut_contacto: $("#txt_rut_contacto").val()
			 ,glosa: $("#txt_glosa").val()

			 //datos del agendamiento
			 ,tipo_agendamiento: $("#select_tipo_agendamiento").val()
			 ,fecha: $("#fecha").val()
			 ,hora: $("#hora").val()
			 ,minuto: $("#minuto").val() 
			 
			 
			  //datos compromiso pago
		
		
		
		
			 ,monto_documento: $("#txt_monto_documento").val()
			 ,fecha_compromiso: $("#txt_fecha_compromiso").val()
			 ,tipo_de_pago: $("#select_tpago").val()
			 ,forma_de_pago: $("#select_fpago").val()
			 ,monto: $("#txt_monto_pago").val()
			 
			 ,pie: $("#txt_monto_pie").val()
			 ,numero_cuotas: $("#select_ncuota").val()
			 ,monto_cuota: $("#txt_monto_cuota").val()
			 ,lugar_de_pago: $("#select_lpago").val()
			 
			 
		}, function (data) {
	

		    if (data.length >3)  //viene un error y lo muestro
			{
				alert(data);
				$("#Grabar").attr("disabled","");
			}
			else 
			{
			    
				cargar_cliente(); //sino viene error , cargo el cliente
			}
		});
 	}
	








// Muestra div según tipo de pago(total,abono,convenio)
$("#select_tpago").change(function(){
	var id = $("#select_tpago").val();
				if (id == "0"){
					ocultar_monto_pago_y_convenio();
				}else{
					if (id == "1" || id=="2"){
						mostrar_div_monto_pago();
						mostrar_div_lugar_pago();
					}
						else{
							if (id == "3"){
								mostrar_div_convenio();
								mostrar_div_lugar_pago();
							}
						}
					}
				
			
			});

</script>
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style8 {font-weight: bold}
-->
</style>
<form id="form_creacion" name="form_creacion" action="#" method="post"  >


 
<ul class="tabs">
    <li><a href="#div_telefono">TELEFONOS</a></li>
    <li><a href="#div_direccion">DIRECCIONES</a></li>
	<li><a href="#div_compromiso">COMPROMISOS</a></li>
	   
	  
</ul>
 

<div class="tab_container">
   
<?php foreach($clientes as $item):

?>




<div id="div_cliente">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="ui-layout-pane">
 
<input type="hidden" id="txt_id_gestion" name="txt_id_gestion" size="15" value="<?php echo $id_gestion; ?>" />   
<input type="hidden" id="txt_id_cliente" name="txt_id_cliente" size="15" value="<?php echo $item->id_cliente; ?>" /> 
<input type="hidden" id="txt_id_deuda" name="txt_id_deuda" size="15" value="<?php echo $id_deuda; ?>" />  
<input type="hidden" id="txt_id_usuario" name="txt_id_usuario" size="15" value="<?php echo $this->session->userdata('id_usuario'); ?>" />  

    <tr>
      <td width="138"><strong> RUT</strong></td>
      <td width="276"><strong>
	  
        <input name="txt_rut" type="text" class="x-form-field" id="txt_rut" size="15" maxlength="10" value="<?php echo $item->rut; ?>"  readonly="readonly" />
      </strong></td>
      <td colspan="3"><span class="style8">ULTIMA GESTION:  </span><a href='#' id='ultima_gestion' title="<?php 
	  if (count($ultima_gestion)==1)
	  {
	  echo "Fecha = [$ultima_gestion->fecha_contacto]"; 
	  echo "\n";
	  echo "Ejecutivo = [$ultima_gestion->nombre_usuario]"; 
	  echo "\n";
	  echo "Glosa = [$ultima_gestion->glosa]"; 
	  }
	  ?>">
	  <?php if (count($ultima_gestion)==1)
	  {
	  echo $ultima_gestion->nombre_sub_respuesta; 
	  }
	  else
	  {
	  	echo "--";
	  }
	  
	  ?>
	  
	  </a>	  <img src="<?php echo base_url() ?>/css/images/logo_historial.png"  title="Ver todas las gestiones" alt="Ver todas las gestiones" width="60" height="17"  align="absmiddle" style="cursor:pointer" onclick="historial_gestiones('<?php echo $item->id_cliente ?>', '<?php echo $this->session->userdata("campana") ?>')" /> </td>
      </tr>
    <tr>
      <td><strong>NOMBRE</strong></td>
      <td nowrap><?php echo $item->nombre; ?></td>
      <td width="144"><strong>EMAIL</strong></td>
      <td colspan="2" nowrap="nowrap"><?  
	  foreach($emails as $email):
	  echo $email->email;
	  endforeach;
?>
        <?php /* <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_email.gif" height="17" onclick="" /> */?>		</td>
    </tr>
	
	<?php if ($this->session->userdata('campana_id_campana') == 3 ){ //claro hfcc
	?>
	<tr>
      <td colspan="4" bgcolor="#FFCC33"><strong>OFERTA : <?php echo $item->oferta; ?></strong></td>
      <td bgcolor="#FFCC33"><strong>SEGMENTO : <?php echo $item->segmento; ?></strong></td>
      
      </tr>

	  <?php }?>
	  
	  
  </table>
</div>


<div id="div_telefono" class="tab_content">
    <div align="center"><img src="<?php echo base_url() ?>/css/images/ajax-loader.gif" />
    </div>
</div> 









<div id="div_direccion" class="tab_content">
  
  	 <div align="center"><img src="<?php echo base_url() ?>/css/images/ajax-loader.gif" />
    </div>
  
  
</div> 


<div id="div_compromiso" class="tab_content">
  
  	 <div align="center"><img src="<?php echo base_url() ?>/css/images/ajax-loader.gif" />
    </div>
  
  
</div>

<div id="div_deuda"  style="display:">
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid-page">

    <tr>
      <th nowrap="NOWRAP" class="titleFormBody">ID EN SISTEMA</th>
      <th nowrap="NOWRAP" class="titleFormBody">NUMERO DOCUMENTO</th>
	  
      <th nowrap="NOWRAP" class="titleFormBody">FEC. EMISION </th>
      <th nowrap="NOWRAP" class="titleFormBody">FEC.VENCIMIENTO</th>
      <th nowrap="NOWRAP" class="titleFormBody">MONTO DOCUMENTO</th>
      <th nowrap="NOWRAP" class="titleFormBody">DEUDA TOTAL CAPITAL</th>
      <th nowrap="NOWRAP" class="titleFormBody">DIAS MORA </th>
    </tr>
    
	<?php 
	$total_deuda = 0;
    


    
	foreach($deudas as $deuda):
	
	$dias_mora = 0;
	$monto_documento = $deuda->monto_documento;
	$hoy = date("Y-m-d");
	$f_vencimiento = $deuda->fecha_vencimiento_documento;
	if($f_vencimiento){
	
	$fecha_completa_vencimiento = (explode(" ",$f_vencimiento));	
	$fecha1 = (explode("-",$fecha_completa_vencimiento[0]));
	$fecha2 = (explode("-",$hoy));
	
	$ano1 = $fecha1[0];
	$mes1 = $fecha1[1];
	$dia1 = $fecha1[2];
	
	$ano2 = $fecha2[0];
	$mes2 = $fecha2[1];
	$dia2 = $fecha2[2];
	
	$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
	$timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2);
	
	$segundos_diferencia = $timestamp2 - $timestamp1;
	
	$dias_mora =  round($segundos_diferencia / (60 * 60 * 24));
	}
	if($dias_mora > 4000) {$dias_mora = 0; }
	?>
	<tr>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->id_deuda; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->numero_documento; ?></td>
	 
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->fecha_emision_documento; ?> </td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->fecha_vencimiento_documento; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><strong><?php echo $deuda->monto_documento; ?></strong></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $deuda->deuda_total_capital; ?></td>
      <td nowrap="nowrap" class="x-grid3-row-over"><?php echo $dias_mora; ?> </td>
    </tr>
	  <?php endforeach; ?>
  </table>
</div>



<div id="div_gestion" class="">

  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td width="14%" class="header">ACCION</td>
      <td width="15%" class="header">TIPIFICACION </td>
      <td width="15%" class="header">CONTACTO</td>
      <td colspan="2" class="header">DATOS DE CONTACTO </td>
      <td class="header">GLOSA</td>
    </tr>
    <tr>
      <td><select name="select_accion" id="select_accion"  disabled="disabled ">
        <option value="0">* Seleccione *</option>
        <?php foreach($accion as $acc):?>
        <option value="<?php echo $acc->id_accion; ?>" <?php if($acc->id_accion==1) echo "selected='selected'"; ?> ><?php echo $acc->nombre; ?></option>
        <?php endforeach;?>
      </select></td>
      <td><select name="select_contactabilidad" id="select_contactabilidad" tabindex="10">
        <option value="0">* Contactabilidad *</option>
        <?php foreach($contactabilidad as $cont):?>
        <option value="<?php echo $cont->id_contactabilidad; ?>"><?php echo $cont->nombre; ?></option>
        <?php endforeach; ?>
      </select></td>
      <td><select name="select_tipo_contacto" id="select_tipo_contacto" tabindex="13">
        <option value="0">* Tipo contacto *</option>
      </select></td>
      <td width="10%" class="x-date-mp-btns">NOMBRE</td>
      <td width="20%"  ><span >
        <input name="txt_nombre_contacto" type="text" id="txt_nombre_contacto" tabindex="14"/>
      </span></td>
	  
	  
      <td width="26%" rowspan="4" ><textarea name="txt_glosa" tabindex="18" cols="30" rows="5" class="ext-mb-textarea" id="txt_glosa"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><select name="select_respuesta" id="select_respuesta" tabindex="11">
        <option value="0">* Respuesta *</option>
      </select></td>
      <td>&nbsp;</td>
      <td class="x-date-mp-btns"><span >APATERNO</span></td>
      <td  ><input name="txt_apaterno" type="text" id="txt_apaterno" tabindex="15" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><select name="select_sub_respuesta" id="select_sub_respuesta" tabindex="12">
        <option value="0">* Sub Respuesta *</option>
      </select></td>
      <td>&nbsp;</td>
      <td class="x-date-mp-btns"><span >AMATERNO</span></td>
      <td ><input name="txt_amaterno" type="text" id="txt_amaterno" tabindex="16" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td class="x-date-mp-btns">RUT</td>
      <td ><input name="txt_rut_contacto" type="text" id="txt_rut_contacto" tabindex="17" /></td>
    </tr>
  </table>
</div>


<div id="div_agenda" style="display:none">

  <table width="100%" border="0" cellpadding="1" cellspacing="1" >
    
    
	
	
	 <tr>
	   <td width="17%" class="header">Agendar nueva llamada </td>
	   <td width="4%" class="header"><img src="<?php echo base_url() ?>/css/images/agendamiento_1.png" width="32" height="32" /></td>
	   <td width="28%" class="x-border-layout-ct"><input name="fecha" id="fecha" type="text"  class="date-picker" /> 
        (<em>a&ntilde;o/mes/dia</em>) </td>
     <td width="51%" class="x-border-layout-ct"><select name="hora" id="hora" >
       <option value="0">* Hora *</option>
       <?php foreach($horas as $hora):?>
       <option value="<?php echo $hora?>"><?php echo $hora?></option>
       <?php endforeach;?>
     </select>
       <strong>:</strong>
<select name="minuto" id="minuto">
  <option value="0">* Minutos *</option>
  <?php foreach($minutos as $minuto):?>
  <option value="<?php echo $minuto?>"><?php echo $minuto?></option>
  <?php endforeach;?>
</select> 
<select name="select_tipo_agendamiento" id="select_tipo_agendamiento">
  <option value="0">* Tipo de agendamiento *</option>
  <option value="2">P&uacute;blico</option>
  <option value="1">Privado</option>
</select></td>
     </tr>
  </table>
</div>

<div id="div_fcompromiso" style="display:none">
<table width="100%" border="0" cellpadding="1" cellspacing="1" >
	  <tr>
	   <td width="14%" nowrap="nowrap" class="header">Monto Documento:</td>
       <td width="8%" class="header"><input name="txt_monto_documento" type="text" id="txt_monto_documento" value="<?php echo $monto_documento ;?>" size="10" maxlength="10" readonly="readonly"/></td>
       <td width="14%" nowrap="nowrap" class="header">Fecha Compromiso </td>
       <td width="7%" class="header"><span class="x-border-layout-ct">
         <input name="txt_fecha_compromiso" type="text" id="txt_fecha_compromiso" class="date-picker"  size="10" />
       </span></td>
       <td width="10%" nowrap="nowrap" class="header">Tipo de pago </td>
       <td width="21%" class="header"><select name="select_tpago" id="select_tpago"  >
         <option value="0">*Seleccione Tipo Pago*</option>
         <option value="1" selected="selected">Total</option>
         <option value="2">Abono</option>
         <option value="3">Convenio</option>
       </select></td>
       <td width="12%" nowrap="nowrap" class="header">Forma de pago </td>
       <td width="14%" class="header"><select name="select_fpago" id="select_fpago">
         <option value="0">*Seleccione*</option>
         <option value="1" selected="selected">Efectivo</option>
         <option value="2">Cheque</option>
         <option value="3">Otro</option>
       </select></td>
	  </tr>
 </table>
 
</div>	 


<div id="div_monto_pago" style="display:none">
<table width="100%" border="0" cellpadding="1" cellspacing="1" > 
<tr>
    <td width="40%" class="ui-layout-resizer">Monto pago</td>
    <td width="60%" class="ui-layout-resizer-closed-hover"><input type="text" id="txt_monto_pago" maxlength="7"  name="txt_monto_pago"></td>
  </tr>
</table>
</div>

<div id="div_convenio" style="display:none">
<table width="100%" border="0" cellpadding="1" cellspacing="1" >
  
<tr>
    <td width="40%" class="ui-layout-resizer">Pie</td>
    <td width="60%" class="ui-layout-resizer-closed-hover"><input type="text" id="txt_monto_pie" name="txt_monto_pie" maxlength="7" value="" ></td>
  </tr>
<tr>
    <td class="ui-layout-resizer">Numero de cuotas</td>
    <td class="ui-layout-resizer-closed-hover"> <select name="select_ncuota" id="select_ncuota">
      <option value="0">*Seleccione*</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select></td>
  </tr>
<tr>
    <td width="40%" class="ui-layout-resizer">Monto cuota</td>
    <td width="60%" class="ui-layout-resizer-closed-hover"><input type="text" maxlength="7" id="txt_monto_cuota" name="txt_monto_cuota" value=""  ></td>
  </tr>
</table>
</div>
<div id="div_lugar_de_pago" style="display:none">

 <table width="100%" border="0" cellpadding="1" cellspacing="1" >
 <tr>
    <td class="ui-layout-resizer">Lugar de pago</td>
    <td class="ui-layout-resizer-closed-hover"> <select name="select_lpago" id="select_lpago">
      <option value="0">*Seleccione*</option>
      <option value="1">Cobratec</option>
      <option value="2">Sencillito</option>
      <option value="3">Sucursal</option>
      <option value="4">otro</option>
    </select></td>
  </tr>
</table>
</div>



<script type="text/javascript"> 

   $(".date-picker").datepicker({
   changeYear: true,
   changeMonth: true,
   dateFormat: 'yy/mm/dd'
   
   });

</script>











<div id="div_comando">
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
 
 <!-- EJECUCION DE LOS DIV DE CARGA -->
 

</script>
