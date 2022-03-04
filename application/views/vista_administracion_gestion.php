 
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
    

 <!--[if lte IE 7]>
<style type="text/css"> body { font-size: 85%; } </style>	<![endif]--> 
<script type="text/javascript" src="<?php echo base_url() ?>js/funcionesKuboGestion.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.layout-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/complex.js"></script> 
<script type='text/javascript' src='<?php echo base_url() ?>js/functionsfrmBody.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>js/functionsDomoIndex.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>js/functionFormSubmit.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>js/funcionesIndex.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>js/onlyNumeric.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>js/onlyAlfa.js'></script>
<!-- including the jQuery UI Datepicker and styles -->
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.ui.datepicker-es.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-treeview/jquery.treeview.js"></script>	


<script type="text/javascript"> 
/*
 *
 *	NOTE: For best code readability, view this with a fixed-space font and tabs equal to 4-chars
 */


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
	
	
	
	//REPORTES
 
	function get_reporte_diario_campana_mkt(tipo){
		var fecha = new Date();
		var r = fecha.getTime();
		$('#mainContent').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');	 
		
		//resumen cantidad de ventas por dia
		if(tipo=="resumen" || tipo==""){
			var url='<?php echo base_url() ?>index.php/reporte/resumen_cantidad_de_gestiones_del_dia/';
		}
		else if(tipo=="total_por_horario"){		
			var url='<?php echo base_url() ?>index.php/reporte/cantidad_gestiones_totales_por_rango_horario/';
		}
		else if(tipo=="total_usuario_por_dia"){		
			var url='<?php echo base_url() ?>index.php/reporte/cantidad_gestiones_por_usuarios_por_dia/';
		}
		else 
		{ 
			return false;
		}		
 
		$.post(url+r, function(data) {		
		  $('#mainContent').html(data);
		});
	}
	
	
	
	
	//FIN REPORTES
	
	
	
	function get_tbl(tabla) {
		$('#mainContent').html('Espere un momento, se estan generando la consulta.<img src="<?php echo   base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;" />');	 
		var url='<?php echo base_url() ?>index.php/exportar_gestion/get_tbl/';

		$.post(url,{'tabla': tabla},function(data) {		
		  $('#mainContent').html(data);
		});
	}
	var outerLayout, innerLayout;
	$(document).ready( function() {
 		//comienza treeview
		$("#browser").treeview({});
		//fin treeview
		// create the OUTER LAYOUT
		outerLayout = $("body").layout( layoutSettings_Outer );
		/*******************************
		 ***  CUSTOM LAYOUT BUTTONS  ***
		 *******************************
		 */
		// BIND events to hard-coded buttons in the NORTH toolbar
		//outerLayout.addToggleBtn( "#tbarToggleNorth", "north" );
		outerLayout.addOpenBtn( "#tbarOpenSouth", "south" );
		//outerLayout.addCloseBtn( "#tbarCloseSouth", "south" );
		//outerLayout.addPinBtn( "#tbarPinWest", "west" );
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
		// DEMO HELPER: prevent hyperlinks from reloading page when a 'base.href' is set
		$("a").each(function () {
			var path = document.location.href;
			if (path.substr(path.length-1)=="#") path = path.substr(0,path.length-1);
			if (this.href.substr(this.href.length-1) == "#") this.href = path +"#";
		});
		jQuery('.numbersOnly').keyup(function () { 
			this.value = this.value.replace(/[^0-9]/g,'');
		});

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
	/*
	*#######################
	* OUTER LAYOUT SETTINGS
	*#######################
	*
	* This configuration illustrates how extensively the layout can be customized
	* ALL SETTINGS ARE OPTIONAL - and there are more available than shown below
	*
	* These settings are set in 'sub-key format' - ALL data must be in a nested data-structures
	* All default settings (applied to all panes) go inside the defaults:{} key
	* Pane-specific settings go inside their keys: north:{}, south:{}, center:{}, etc
	*/
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
		,	resizerTip:				"Cambiar tama&ntilde;o"
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
		,	spacing_closed:			5			// HIDE resizer & toggler when 'closed'
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
		,	resizerTip_open:		"Cambiar tama&ntilde;o"
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
		,	resizerTip_open:		"Cambiar tama&ntilde;o"
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

<div class="ui-layout-north"> 

	<?php $this->load->view('includes/barra_usuario_conectado'); ?>
    <?php 
    $data["seccion"] = "administracion";
    $this->load->view('includes/menu_gestion.php',$data);
    ?>
	<ul class="toolbar"> 
		<!--<li id="tbarToggleNorth" class="first"><span></span>Cabecera</li>  -->
		<li id="tbarOpenSouth"><span></span>Ayuda</li> 
		<!--<li id="tbarCloseSouth"><span></span>Ocultar opciones</li> -->
		<!--<li id="tbarPinWest"><span></span>Men&uacute; principal</li>  -->
		<li id="tbarPinEast" class="last"><span></span>Nomenclatura</li> 	
	</ul> 
	
</div> 

<div class="ui-layout-west"> 
	<div class="header">Men&uacute;</div> 
	<div class="content">  
		 <ul id="browser" class="filetree treeview-famfamfam">
		 	<?php $this->load->view('menuTreeVistaAdministracion_gestion.php'); ?>
	     </ul>
	</div> 
	<div class="footer">PURIBE.CL
    </div> 			
</div> 


<div class="ui-layout-east"> 
</div> 

<!-- CONTENEDOR DE LA SECCION PRINCIPAL-->
 
<div id="mainContent" class="BackgroundFicha"> 

</div> 
 
<!-- FIN CONTENEDOR DE LA SECCION PRINCIPAL-->
 	
 
<!-- CONTENEDOR DE LA SECCION PIE-->
<div class="ui-layout-south"> 
	<div class="header">Ayuda</div> 
	<div id="div_script" class="content"> 
	     <a href="#" onClick="cagar_script();">Tema 1</a>&nbsp; | &nbsp;
	     <a href="#" onClick="cagar_script();">Tema 2</a>&nbsp; | &nbsp;
         <a href="#" onClick="cagar_script();">Tema 3 </a>	
		<div id="visualization" style="width: 800px; height: 400px;"></div>
	</div> 
</div> 

</body> 
</html> 
