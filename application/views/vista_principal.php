
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 

	<!-- uncomment 'base' to view this page without external files
	<base href="http://jquery-border-layout.googlecode.com/svn/trunk/" />
	--> 
 
	<title>Kubo ::: </title> 
 
	<!-- DEMO styles - specific to this page --> 
	
	<link rel="shortcut icon" href="<?php echo base_url() ?>css/images/favicon.ico" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/complex.css" /> 
	<link rel="StyleSheet" type="text/css" href="<?php echo base_url() ?>css/estiloskubo.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>js/jquery-treeview/jquery.treeview.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>js/jquery-treeview/demo/screen.css" />
	
	
	<!-- including the jQuery UI Datepicker and styles -->
	<link href="<?php echo base_url() ?>css/calendario/assets/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>css/ext-all.css" rel="stylesheet" type="text/css" />
 
 <!--[if lte IE 7]>
		<style type="text/css"> body { font-size: 85%; } </style>	<![endif]--> 
 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.layout-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/complex.js"></script> 

 

 
 
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>js/functionsfrmBody.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>js/jquery.Rut.min.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>js/functionsDomoIndex.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>js/functionFormSubmit.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>js/funcionesIndex.js'></script>

<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>js/onlyNumeric.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>js/onlyAlfa.js'></script>

 <!-- including the jQuery UI Datepicker and styles -->
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.ui.datepicker-es.js"></script>

 
<script src="<?php echo base_url() ?>js/jquery-treeview/jquery.treeview.js" type="text/javascript"></script>	
	
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
	var w = window.open( txtUrl, "popup", options);
	w.focus();
}
 

function pop_up_codigo_telefonico(txtUrl, txtWidth, txtHeight, txtToolbar, txtMenubar, 
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
	var w = window.open( txtUrl, "Codigos", options);
	w.focus();
}

//CRONOMETRO
//Autor: Ivan Nieto Perez
//Este script y otros muchos los puedes
//encontrar en
//MundoJavascript.com
var CronoID = null;
var CronoEjecutandose = false;
var decimas, segundos, minutos;




function DetenerCrono() {
	if(CronoEjecutandose)
		clearTimeout(CronoID);
	CronoEjecutandose = false;
}


function InicializarCrono() {
	//inicializa contadores globales
	decimas = 0;
	segundos = 0;
	minutos = 0;
	//limpia_alerta();
	//pone a cero los marcadores
	
	$('#cronometro').html('00:00:0');
	//document.crono.display.value = '00:00:0'
}

function MostrarCrono() {
	//incrementa el crono
	
	bandera=false;
	bandera2=false;
	limite=<?php echo "10";  //$tiempo;?>;
	
	cota_sup=limite + 1;
	cota_inf=limite - 1
	decimas++;
	if( decimas > 9 ) {
		decimas = 0;
		segundos++;
		
		
		if(segundos > 59) {
			segundos = 0;
			minutos++;
			
			
			
			
			if (minutos < cota_sup)
			{
				if(minutos >= cota_inf && bandera==false) {
				bandera=true;
					
					//alerta_amarilla();
					//DetenerCrono();
					//return true;
				}
				
				
				
				if(minutos >= limite && bandera2==false) {
				    bandera2=true;
					
					//alerta_roja();
					//DetenerCrono();
					//return true;
				}
				
			}
			if(minutos >99) {
			   
				alert('Fin de la cuenta');
				DetenerCrono();
				return true;
			}
			
			
		}
	}
	//configura la salida
	var ValorCrono = "";
	ValorCrono = (minutos < 10) ? "0" + minutos : minutos;
	ValorCrono += (segundos < 10) ? ":0" + segundos : ":" + segundos;
	ValorCrono += ":" + decimas ;
	$('#cronometro').html(ValorCrono);
	//document.crono.display.value = ValorCrono
	CronoID = setTimeout("MostrarCrono()", 100);
	CronoEjecutandose = true;
	return true;
}

function IniciarCrono () {
	DetenerCrono();
	InicializarCrono();
	MostrarCrono();
	//alert("Iniciar Croo");
}



 </script>	
 
	

<script type="text/javascript"> 
/*
 * complex.html
 *
 * This is a demonstration page for the jQuery layout widget
 *
 *	NOTE: For best code readability, view this with a fixed-space font and tabs equal to 4-chars
 */
 
	var outerLayout, innerLayout;
 
	/*
	*#######################
	*     ON PAGE LOAD
	*#######################
	*/
	
	function cargar_cliente() {
	
	     $('#mainContent').html("ESPERE UN MOMENTO, SE ESTA CARGANDO UN NUEVO REGISTRO.");
	 
	var url='<?php echo base_url() ?>index.php/cliente/get_cliente_a_gestionar/';

		$.post(url, function(data) {
		
		  $('#mainContent').html(data);
		  
		});	
	}
	 
	function cargar_mis_gestiones() {
	
	     $('#mainContent').html("ESPERE UN MOMENTO, SE ESTAN CARGANDO LOS REGISTROS.");
	 
	var url='<?php echo base_url() ?>index.php/cliente/get_gestiones_usuario/';

		$.post(url, function(data) {
		
		  $('#mainContent').html(data);
		  
		});	
	}
	function cargar_registro_buscado(id) {
	
	     //$('#mainContent').html("ESPERE UN MOMENTO, SE ESTA CARGANDO UN NUEVO REGISTRO.");
	
		 $.post('<?php echo base_url() ?>index.php/cliente/cargar_registro_buscado', { 'id':id }, function(data) {
		
		  
		   if (data.length <50)  //viene un error y lo muestro
			{
				alert(data);
			}
			else
			{
		  		$('#mainContent').html(data);
		  	}
		  
		});	
	}
	
	
	
	function cargar_buscador() {
	
	     
	
		$.post('<?php echo base_url() ?>index.php/buscador/listar_columnas', function(data) {

		  $('#columna_a_buscar').html(data);
		});	
	}
	
	/*
	 Modulo de calidad
	 * */
	function get_buscar_gestiones_campana_mkt(){
		$('#mainContent').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');	 
		var url='<?php echo base_url() ?>index.php/consulta_gestion/get_buscar_gestiones_campana_mkt/';

		$.post(url, function(data) {		
		  $('#mainContent').html(data);
		});
	}
	function traer_resumen_mensual_campana_mkt(){
		var fecha = new Date();
		var r = fecha.getTime();
		
		var anio_actual = fecha.getFullYear(); 
		var mes_actual  = fecha.getMonth() + 1;
		var dia_actual = fecha.getDate();
		if(mes_actual<10){
			mes_actual='0'+mes_actual;
		}
		
		$('#mainContent').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');	 
		var url='<?php echo base_url() ?>index.php/venta/get_resumen_mensual_campana_mkt/';

		$.post(url+r,{'anio_actual':anio_actual,'mes_actual':mes_actual}, function(data) {
		
		  $('#mainContent').html(data);
		});
		
	}
	function traer_resumen_auditoria_mensual_campana_mkt(){
		var fecha = new Date();
		var r = fecha.getTime();
		
		var anio_actual = fecha.getFullYear(); 
		var mes_actual  = fecha.getMonth() + 1;
		var dia_actual = fecha.getDate();
		if(mes_actual<10){
			mes_actual='0'+mes_actual;
		}
		
		$('#mainContent').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');	 
		var url='<?php echo base_url() ?>index.php/venta/traer_resumen_auditoria_mensual_campana_mkt/';

		$.post(url+r,{'anio_actual':anio_actual,'mes_actual':mes_actual}, function(data) {
		
		  $('#mainContent').html(data);
		});
		
	}
	function get_buscar_venta_mensual_campana_mkt(){
		var fecha = new Date();
		var r = fecha.getTime();
		$('#mainContent').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');	 
		var url='<?php echo base_url() ?>index.php/venta/get_buscar_venta_mensual_campana_mkt/';

		$.post(url+r, function(data) {		
		  $('#mainContent').html(data);
		});
	}
	//quita caracteres invalidos
	function validar(string) {  
		for (var i=0, output='', validos="0123456789"; i < string.length; i++)  
			if (validos.indexOf(string.charAt(i)) != -1){
				if((string.charAt(i) == '0' && i != 0) || (string.charAt(i) != '0')){
					output += string.charAt(i);
				}
			}
		return output;  
	}  
	
 	function llamar(cadena) { //usa xlite para llamar .- sip

		var aux = cadena.split("#"); 
		var numero = aux[0];
		var id = aux[1]; //id telefono
		var id_cliente = aux[2];
		numero = validar(numero);
		var val=entrega_fonollamar(numero);
		if(val == 0){
			alert("El numero ingresado es invalido");
		}else{
			
			var aux2 = val.split(",");
			var ruta = aux2[0];
			 
			var origen = "<?php echo $this->session->userdata('usuario_anexo')?>";
			var destino = aux2[1];
			var gestion = $("#txt_id_gestion").val();
			
			$("#txt_fono_llamado").val(destino);
                        $("#txt_fono_llamado_carrier").val(ruta+destino);
			$("#txt_id_telefono").val(id);
			var r = new Date().getTime();
			var url='<?php echo base_url() ?>index.php/telefono/llamar/';
			//alert("llamada al "+ruta+destino+" desde "+origen);
			
			$('#resultado_llamada').html("&nbsp;&nbsp;Comunicando... ");
			
			//var url="sip:"+ruta+destino+"@190.96.68.178";
			var url="sip:"+ruta+destino+"@192.9.200.200"; 
				//alert(url);
				
			window.frames['contenidoOculto'].location.href=url;
			/*
			$.post(url + r, {
					 
					destino: destino,
					ruta: ruta,
					id_cliente : id_cliente
					
					 
				}, function(data) {
					//alert(data);
					$('#resultado_llamada').html(data);
					
				});
			*/
			
pop_up('<?php echo base_url() ?>index.php/telefono/validar_telefono/'+numero+'/'+id+'/'+id_cliente, '300', '170', 'no', 'no', 'no', 'no', 'no');


		}
	}
	
	
	function llamar_alt(cadena) { //usa xlite para llamar .- sip
	// creada cuando los fonos no se sacan de la tabla telefono, sino que vienen directos en la tabla

		var aux = cadena.split("#"); 
		var id_numero = aux[0];
		var id = aux[1]; //id telefono
		var id_cliente = aux[2];
		
		var numero = $("#area"+id_numero).val() + $("#fono"+id_numero).val();
				
		numero = validar(numero);
		var val=entrega_fonollamar(numero);
		if(val == 0){
			alert("El numero ingresado es invalido");
		}else{
			
			var aux2 = val.split(",");
			var ruta = aux2[0];
			 
			var origen = "<?php echo $this->session->userdata('usuario_anexo')?>";
			var destino = aux2[1];
			var gestion = $("#txt_id_gestion").val();
			
			$("#txt_fono_llamado").val(destino);
			
			$("#txt_fono_llamado_carrier").val(ruta+destino);
			
			$("#txt_id_telefono").val(id);
			var r = new Date().getTime();
			var url='<?php echo base_url() ?>index.php/telefono/llamar/';
			//alert("llamada al "+ruta+destino+" desde "+origen);
			
			$('#resultado_llamada').html("&nbsp;&nbsp;Comunicando... ");
			
			//var url="sip:"+ruta+destino+"@190.96.68.178";
			var url="sip:"+ruta+destino+"@192.9.200.200"; 
				//alert(url);
				
			window.frames['contenidoOculto'].location.href=url;
			
			pop_up('<?php echo base_url() ?>index.php/telefono/validar_telefono_ibr/'+numero+'/'+id_numero+'/'+id_cliente, '300', '170', 'no', 'no', 'no', 'no', 'no');


			/*
			$.post(url + r, {
					 
					destino: destino,
					ruta: ruta,
					id_cliente : id_cliente
					
					 
				}, function(data) {
					//alert(data);
					$('#resultado_llamada').html(data);
					
				});
			*/
 

		}
	}
	
	//entrega el fono a llamar segun la compania
	function entrega_fonollamar(numero){
		<?php
		$prefijo_slm = "9";
		$prefijo_movil = "9";
		$prefijo_ldn = "9188";
		?>
		var area="";
		var fono="";
		var largo=0;
		var retorno=0;
		largo = numero.length;
		largo++;

		if(numero.length == 7){
			retorno = "<?php echo $prefijo_slm?>,"+"2"+numero;
		}else{
			if(numero.length == 8){
				area = numero.substring(0,2);
				if(area > 20 && area < 30){
					 
					retorno = "<?php echo $prefijo_slm?>,"+numero;
				}else{
					if(area in {39:1}){
						fono  = numero.substring(2,largo);
						//retorno = "<?php echo $prefijo_ldn?>,0"+area+fono;
						retorno = "<?php echo $prefijo_ldn?>,"+area+fono;
					}else if(area in {58:1,57:1,45:1,55:1,61:1,51:1,64:1,65:1,67:1,72:1,71:1,73:1,75:1,42:1,43:1,33:1,34:1,35:1,52:1,53:1,63:1}){
						fono  = numero.substring(2,largo);
						//retorno = "<?php echo $prefijo_ldn?>,0"+area+"2"+fono;  //nueva forma de marcar para arica
						retorno = "<?php echo $prefijo_ldn?>,"+area+"2"+fono;  //nueva forma de marcar para arica
					}else{

						retorno = "<?php echo $prefijo_movil?>,09"+numero;
					}
				}
			}else{
				if(numero.length == 9){
					area = numero.substring(0,2);
					if(area in {32:1,41:1,58:1,57:1,45:1,55:1,61:1,51:1,64:1,65:1,67:1,72:1,71:1,73:1,75:1,42:1,43:1,33:1,34:1,35:1,52:1,53:1,63:1}){
						fono  = numero.substring(2,largo);
						retorno = "<?php echo $prefijo_ldn?>,"+area+fono;
					}
					else if(area == 22){
						fono  = numero.substring(1,largo);
						retorno = "<?php echo $prefijo_slm?>,"+""+fono;
					}
					else{
						fono  = numero.substring(1,largo);
						retorno = "<?php echo $prefijo_movil?>,09"+fono;
					}
				}else{
					if(numero.length == 10){
						area = numero.substring(0,2);
						if(area == "09"){
							fono  = numero.substring(2,largo);
							retorno = "<?php echo $prefijo_movil?>,"+numero;
						}
					}
				}
			}
		}
		return retorno;
	}
	
		function validar_direccion(direccion, id_cliente) { 
		
		 
		 pop_up('<?php echo base_url() ?>/index.php/direccion/validar_direccion/'+direccion+'/'+id_cliente+'/', '640', '200', 'no', 'no', 
				'yes', 'no', 'yes');
		
		
		
	}
	
		function historial_gestiones(id_cliente, id_campana) 
	{
		 pop_up('<?php echo base_url() ?>/index.php/gestion/get_historial/'+id_cliente+'/'+id_campana+'/', '790', '200', 'no', 'no', 
				'yes', 'no', 'yes');
		
		
		
	}
	
		function consultar_codigo_telefonico()
	{	
		 pop_up_codigo_telefonico('<?php echo base_url() ?>/index.php/telefono/form_mostrar_codigo_area_telefono/', '600', '400', 'no', 'no', 
				'no', 'no', 'yes');	
	}
	
	function carga_div_telefonos(id_cliente)
	{
	
	var r = new Date().getTime();
	var url='<?php echo base_url() ?>index.php/telefono/form_carga_div_telefonos/'+id_cliente+'/';
					$.post(url + r, { 'id_cliente':id_cliente }, function(data) {
						$('#div_telefono').html(data);
					});	
	
	}
	
	function carga_div_direcciones(id_cliente)
	{
	var r = new Date().getTime();
	var url='<?php echo base_url() ?>index.php/direccion/form_carga_div_direcciones/'+id_cliente+'/';
					$.post(url + r, { 'id_cliente':id_cliente }, function(data) {
						$('#div_direccion').html(data);
					});	
	
	}

	function carga_div_email(id_cliente)
	{
	var r = new Date().getTime();
	var url='<?php echo base_url() ?>index.php/email/form_carga_div_email/'+id_cliente+'/';
					$.post(url + r, { 'id_cliente':id_cliente }, function(data) {
						$('#div_email').html(data);
					});	
	
	}

	
	function mostrar_div_agendamiento()
		{	 
		 	 try 
			 	{
				$("#div_agenda").css("display", "");
			 	}
			 catch(e)
			 	{
				
			 	}	
		}
		
	function ocultar_div_agendamiento()
		{	 
			try
				{
				$("#div_agenda").css("display", "none");
				}
			catch(e)
				{
				//alert(e.description);
				}
		}
	
function mostrar_div_venta()
		{	 
		 	 try 
			 	{
				$("#div_venta").css("display", "inline");
			 	}
			 catch(e)
			 	{		
			 	}	
		}
function ocultar_div_venta()
		{	 
		 	 try 
			 	{
				$("#div_venta").css("display", "none");
			 	}
			 catch(e)
			 	{		
			 	}	
		}		
		

	function cagar_script()	
	{
 
		 $('#div_script').html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');	
		 $.post('<?php echo base_url() ?>index.php/script/form_cargar_script/', function(data) {
		 $('#div_script').html(data);
		 });				
	
	}
	
	 function cargar_script_particular(id_script)	
	{
 
		 $('#div_detalle_script').html('<div align="center"><img src="<?php echo base_url() ?>/css/images/ajax-loader.gif"/></div>');	
		 $.post('<?php echo base_url() ?>index.php/script/form_cargar_script_particular/',{'id_script':id_script}, function(data) {
		 $('#div_detalle_script').html(data);
		});				
	
	}
	

	function mostrar_div_nuevo_telefono()
		{	 
			try {
				
				//$("#div_nuevo_telefono").css("display", "");
				 $("#div_nuevo_telefono").show("fast");
				}
			catch(e)
				{
				//alert(e.description);
				}
		}	
		
	function ocultar_div_nuevo_telefono()
		{	 
			try { 
				$("#div_nuevo_telefono").css("display", "none"); 
			}
			catch(e){ //alert(e.description); 
			        }
		}	
	
	
	function mostrar_div_nueva_direccion()
		{	 
			try {
				
				//$("#div_nuevo_telefono").css("display", "");
				 $("#div_nueva_direccion").show("fast");
				}
			catch(e)
				{
				//alert(e.description);
				}
		}	
		
	function ocultar_div_nueva_direccion()
		{	 
			try { 
				$("#div_nueva_direccion").css("display", "none"); 
			}
			catch(e){ //alert(e.description); 
			        }
		}	
	function mostrar_div_nuevo_email(){	 
		try {
				
			//$("#div_nuevo_telefono").css("display", "");
			 $("#div_nuevo_email").show("fast");
			}
		catch(e){
			//alert(e.description);
		}
	}	
		
	function ocultar_div_nuevo_email(){	 
		try { 
			$("#div_nuevo_email").css("display", "none"); 
		}catch(e){ //alert(e.description); 
		}
	}
	
function guardar_telefono(){}
function guardar_direccion(){}
function guardar_email(){}
	
	$(document).ready( function() {
	
	

 
 		//comienza treeview
		$("#browser").treeview({});
		//fin treeview
		
		
		
		// create the OUTER LAYOUT
		outerLayout = $("body").layout( layoutSettings_Outer );
 
		// BIND events to hard-coded buttons in the NORTH toolbar
		outerLayout.addToggleBtn( "#tbarToggleNorth", "north" );
		outerLayout.addOpenBtn( "#tbarOpenSouth", "south" );
		outerLayout.addCloseBtn( "#tbarCloseSouth", "south" );
		outerLayout.addPinBtn( "#tbarPinWest", "west" );
		outerLayout.addPinBtn( "#tbarPinEast", "east" );
 
		// save selector strings to vars so we don't have to repeat it
		// must prefix paneClass with "body > " to target ONLY the outerLayout panes
		var westSelector = "body > .ui-layout-west"; // outer-west pane
		var eastSelector = "body > .ui-layout-east"; // outer-east pane
 
		 // CREATE SPANs for pin-buttons - using a generic class as identifiers
		$("<span></span>").addClass("pin-button").prependTo( westSelector );
		$("<span></span>").addClass("pin-button").prependTo( eastSelector );
		// BIND events to pin-buttons to make them functional
		outerLayout.addPinBtn( westSelector +" .pin-button", "west");
		outerLayout.addPinBtn( eastSelector +" .pin-button", "east" );
 
		 // CREATE SPANs for close-buttons - using unique IDs as identifiers
		$("<span></span>").attr("id", "west-closer" ).prependTo( westSelector );
		$("<span></span>").attr("id", "east-closer").prependTo( eastSelector );
		// BIND layout events to close-buttons to make them functional
		outerLayout.addCloseBtn("#west-closer", "west");
		outerLayout.addCloseBtn("#east-closer", "east");
 
 
		$("a").each(function () {
			var path = document.location.href;
			if (path.substr(path.length-1)=="#") path = path.substr(0,path.length-1);
			if (this.href.substr(this.href.length-1) == "#") this.href = path +"#";
		});
 
 

    /*
	*#######################
	* TRAE REGISTRO DE CLIENTE DESDE CONTROLADOR
	*#######################*/
 <?php  if($this->session->userdata('tipo_usuario')!=5) { ?> 

	 cargar_cliente();

     cargar_buscador();
 <?php  } ?> 

 
	});
 
 
	/*
	*#######################
	* INNER LAYOUT SETTINGS
	*#######################
	*
	* These settings are set in 'list format' - no nested data-structures
	* Default settings are specified with just their name, like: fxName:"slide"
	* Pane-specific settings are prefixed with the pane name + 2-underscores: north__fxName:"none"
	*/
	layoutSettings_Inner = {
		applyDefaultStyles:				true // basic styling for testing & demo purposes
	,	minSize:						20 // TESTING ONLY
	,	spacing_closed:					14
	,	north__spacing_closed:			8
	,	south__spacing_closed:			8
	,	north__togglerLength_closed:	-1 // = 100% - so cannot 'slide open'
	,	south__togglerLength_closed:	-1
	,	fxName:							"slide" // do not confuse with "slidable" option!
	,	fxSpeed_open:					1000
	,	fxSpeed_close:					2500
	,	fxSettings_open:				{ easing: "easeInQuint" }
	,	fxSettings_close:				{ easing: "easeOutQuint" }
	,	north__fxName:					"none"
	,	south__fxName:					"drop"
	,	south__fxSpeed_open:			500
	,	south__fxSpeed_close:			1000
	//,	initClosed:						true
	,	center__minWidth:				200
	,	center__minHeight:				200
	};
 
 
	
	var layoutSettings_Outer = {
		name: "outerLayout" // NO FUNCTIONAL USE, but could be used by custom code to 'identify' a layout
		// options.defaults apply to ALL PANES - but overridden by pane-specific settings
	,	defaults: {
			size:					"auto"
		,	minSize:				50
		,	paneClass:				"pane" 		// default = 'ui-layout-pane'
		,	resizerClass:			"resizer"	// default = 'ui-layout-resizer'
		,	togglerClass:			"toggler"	// default = 'ui-layout-toggler'
		,	buttonClass:			"button"	// default = 'ui-layout-button'
		,	contentSelector:		".content"	// inner div to auto-size so only it scrolls, not the entire pane!
		,	contentIgnoreSelector:	"span"		// 'paneSelector' for content to 'ignore' when measuring room for content
		,	togglerLength_open:		35			// WIDTH of toggler on north/south edges - HEIGHT on east/west edges
		,	togglerLength_closed:	35			// "100%" OR -1 = full height
		,	hideTogglerOnSlide:		true		// hide the toggler when pane is 'slid open'
		,	togglerTip_open:		"Ocultar"
		,	togglerTip_closed:		"Abrir"
		,	resizerTip:				"Cambiar tama????o"
		//	effect defaults - overridden on some panes
		,	fxName:					"slide"		// none, slide, drop, scale
		,	fxSpeed_open:			750
		,	fxSpeed_close:			1500
		,	fxSettings_open:		{ easing: "easeInQuint" }
		,	fxSettings_close:		{ easing: "easeOutQuint" }
	}
	,	north: {
			spacing_open:			1			// cosmetic spacing
		,	togglerLength_open:		0			// HIDE the toggler button
		,	togglerLength_closed:	-1			// "100%" OR -1 = full width of pane
		,	resizable: 				false
		,	slidable:				false
		//	override default effect
		,	fxName:					"none"
		}
	,	south: {
			maxSize:				700
		,	spacing_closed:			0			// HIDE resizer & toggler when 'closed'
		,	slidable:				false		// REFERENCE - cannot slide if spacing_closed = 0
		,	initClosed:				true
		//	CALLBACK TESTING...
		,	onhide_start:			function () { }
		,	onhide_end:				function () { }
		,	onshow_start:			function () { }
		,	onshow_end:				function () { }
		,	onopen_start:			function () { }
		,	onopen_end:				function () { }
		,	onclose_start:			function () { }
		,	onclose_end:			function () { }
		//,	onresize_start:			function () { return confirm("START South pane resize \n\n onresize_start callback \n\n Allow pane to be resized?)"); }
		,	onresize_end:			function () { }
		}
	,	west: {
			size:					200
		,	spacing_closed:			21			// wider space when closed
		,	togglerLength_closed:	21			// make toggler 'square' - 21x21
		,	togglerAlign_closed:	"top"		// align to top of resizer
		,	togglerLength_open:		0			// NONE - using custom togglers INSIDE west-pane
		,	togglerTip_open:		"Ocultar Menu"
		,	togglerTip_closed:		"Abrir Menu"
		,	resizerTip_open:		"Cambiar tama????o "
		,	slideTrigger_open:		"click" 	// default
		,	initClosed:				false
		//	add 'bounce' option to default 'slide' effect
		,	fxSettings_open:		{ easing: "easeOutBounce" }
		}
	,	east: {
			size:					250
		,	spacing_closed:			0			// wider space when closed
		,	togglerLength_closed:	21			// make toggler 'square' - 21x21
		,	togglerAlign_closed:	"top"		// align to top of resizer
		,	togglerLength_open:		0 			// NONE - using custom togglers INSIDE east-pane
		,	togglerTip_open:		"Ocultar Opciones"
		,	togglerTip_closed:		"Abrir Opciones"
		,	resizerTip_open:		"Cambiar tama????o"
		//,	slideTrigger_open:		"mouseover"
		,	initClosed:				true
		//	override default effect, speed, and settings
		,	fxName:					"drop"
		,	fxSpeed:				"normal"
		,	fxSettings:				{ easing: "" } // nullify default easing
		}
	,	center: {
			paneSelector:			"#mainContent" 			// sample: use an ID to select pane instead of a class
		//,	onresize:				"innerLayout.resizeAll"	// resize INNER LAYOUT when center pane resizes
		,	minWidth:				200
		,	minHeight:				200
		}
	};
 
	

	
  	
</script> 
<style type="text/css">
<!--
.style1 {font-size: 15px}



-->
</style>
</head> 
<body> 



<div class="ui-layout-north"> 






		<div style="float:left; padding-left:10px"> 
		<img src="<?php echo base_url() ?>css/login/imagenes/kubocrm2.jpg"     >
		</div>
		 
		 <div style="position:absolute; margin-left:390px; margin-top:5px;"> 
		<img src="<?php echo base_url() ?>css/images/agente.png"   height="48">
		</div>
		  <div style="position:absolute; margin-left:440px; margin-top:35px;"> <strong><?php echo $this->session->userdata('nombre'); ?> </strong>:: <span class="style1"><?php  echo $this->session->userdata('campana_nombre'); ?> </span>  </div>
		  <div style="position:absolute; margin-left: 70%; margin-top:20px; z-index:1000;"> 
		    <img src="<?php echo base_url() ?>css/images/reloj.png"   >
  </div>
		   <div style="position:absolute; margin-left:74%; margin-top:35px;"> 
		   
		   <strong><div id='cronometro' name='cronometro'>00:00</div></strong>	
		  
		  
		  
		  
		  </div>
		 
		 
		<div  style="float:right; margin-top:20px; margin-right:30px">
	    Soporte | <?php echo anchor('usuario/logout', 'Salir');?>   
		</div>

	
	<ul class="toolbar"> 
		<li id="tbarToggleNorth" class="first"><span></span>Cabecera</li> 
		<li id="tbarOpenSouth"><span></span>Mostrar opciones</li> 
		<li id="tbarCloseSouth"><span></span>Ocultar opciones</li> 
		<li id="tbarPinWest"><span></span>Men&uacute; principal</li> 
		<li id="tbarPinEast" class="last"><span></span>Buscador </li> 
		
	</ul> 
	
	
</div> 


<div class="ui-layout-west"> 
	<div class="header">Men&uacute;</div> 
	<div class="content">  
		<ul id="browser" class="filetree treeview-famfamfam">
	
		<?php 
			$this->load->view('menuTreeVistaPrincipal.php')
		?>
	    </ul>
	</div> 
 
 
 
 
<?php 
$tipo_usuario = $this->session->userdata('tipo_usuario'); 
if($tipo_usuario!=5){ //auditor
?>
<div class="footer">C A M P A &Ntilde; A</div>
	<div class="content">  
		<ul >
	
		<li><strong><?php  echo $this->session->userdata('campana_nombre'); ?></strong></li>
		<li>Lista: <?php echo $this->session->userdata('lista_nombre'); ?>	</li>
	    </ul>

	</div> 
<?php 
}
?>



	
	
<div class="footer">CLIENTE</div> 
 

 <img src="<?php echo base_url() ?>css/images/logo_cencosud.jpg"   height="76"  width="138"/>
 			
</div> 




<div class="ui-layout-east"> 



	<div class="header">OPCIONES</div> 
 	<div class="subhead">BUSCADOR</div> 
	
	
<?php 
$tipo_usuario = $this->session->userdata('tipo_usuario');
if($tipo_usuario != 5){
 
	$this->load->view('vista_buscador'); 
}
?>

    <div class="subhead">SMS</div>
			<li><span  
			onClick="alert('sms')">
			<a class="aChangePass" href="#">ENVIAR SMS</a>
			</span></li>
 	
	<div class="content"> 	
	
	
	</div> 

</div> 

 

 
 
 
 
 
 
 <!-- CONTENEDOR DE LA SECCION PRINCIPAL-->
 
<div id="mainContent" class="BackgroundFicha"> 

</div> 
 
 <!-- FIN CONTENEDOR DE LA SECCION PRINCIPAL-->
  
 
  <!-- CONTENEDOR DE LA SECCION PIE-->
 <div class="ui-layout-south"> 
	<div class="header">Opciones</div> 
	<div id="div_script" class="content"> 
		
			
	    <a href="#" onclick="cagar_script();">Haga clic para cargar Script
	    </a>
	    
		
		<div id="visualization" style="width: 800px; height: 400px;"></div>


	</div> 
 </div> 
  <!-- FIN CONTENEDOR DE LA SECCION PIE-->
 <IFRAME name="contenidoOculto" width="1" height="1" src="content.html" frameborder="0" margintop="0" marginbottom="0"
marginheight="0" marginwidht="0" scroll="NO"></IFRAME>


</body> 
</html> 
