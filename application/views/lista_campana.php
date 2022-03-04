<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 

	<!-- uncomment 'base' to view this page without external files
	<base href="http://jquery-border-layout.googlecode.com/svn/trunk/" />
	--> 
 
	<title>Kubo ::: </title> 
 
	<!-- DEMO styles - specific to this page --> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>CSS/complex.css" /> 
	
	<link rel="stylesheet" href="<?php echo base_url() ?>JS/jquery-treeview/jquery.treeview.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>JS/jquery-treeview/demo/screen.css" />
	
	<link rel="StyleSheet" type="text/css" href="<?php echo base_url() ?>CSS/estilosKUBO.css">
 
	<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-cold-1" />
<style type="text/css" media="screen,projection">
@import url(<?php echo base_url() ?>JS/calendar.css);
</style>

	<!--[if lte IE 7]>
		<style type="text/css"> body { font-size: 85%; } </style>	<![endif]--> 
 
<script type="text/javascript" src="<?php echo base_url() ?>JS/jquery-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>JS/jquery-ui-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>JS/jquery.layout-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>JS/complex.js"></script> 
 
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>JS/functionsfrmBody.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>JS/validarut.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>JS/functionsDomoIndex.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>JS/functionFormSubmit.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>JS/funcionesIndex.js'></script>

<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>JS/calendar.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>JS/onlyNumeric.js'></script>
<script language='javascript' type='text/javascript' src='<?php echo base_url() ?>JS/onlyAlfa.js'></script>
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/calendar-es.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
 
 
<script src="<?php echo base_url() ?>JS/jquery-treeview/jquery.treeview.js" type="text/javascript"></script>	
	
	
 <script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load('visualization', '1', {packages: ['motionchart']});

    function drawVisualization() {
    var data = new google.visualization.DataTable();
      data.addRows(6);
      data.addColumn('string', 'Fruit');
      data.addColumn('date', 'Date');
      data.addColumn('number', 'Sales');
      data.addColumn('number', 'Expenses');
      data.addColumn('string', 'Location');
      data.setValue(0, 0, 'Apples');
      data.setValue(0, 1, new Date (1988,0,1));
      data.setValue(0, 2, 1000);
      data.setValue(0, 3, 300);
      data.setValue(0, 4, 'East');
      data.setValue(1, 0, 'Oranges');
      data.setValue(1, 1, new Date (1988,0,1));
      data.setValue(1, 2, 950);
      data.setValue(1, 3, 200);
      data.setValue(1, 4, 'West');
      data.setValue(2, 0, 'Bananas');
      data.setValue(2, 1, new Date (1988,0,1));
      data.setValue(2, 2, 300);
      data.setValue(2, 3, 250);
      data.setValue(2, 4, 'West');
      data.setValue(3, 0, 'Apples');
      data.setValue(3, 1, new Date(1988,1,1));
      data.setValue(3, 2, 1200);
      data.setValue(3, 3, 400);
      data.setValue(3, 4, "East");
      data.setValue(4, 0, 'Oranges');
      data.setValue(4, 1, new Date(1988,1,1));
      data.setValue(4, 2, 900);
      data.setValue(4, 3, 150);
      data.setValue(4, 4, "West");
      data.setValue(5, 0, 'Bananas');
      data.setValue(5, 1, new Date(1988,1,1));
      data.setValue(5, 2, 788);
      data.setValue(5, 3, 617);
      data.setValue(5, 4, "West");
    
      var motionchart = new google.visualization.MotionChart(
          document.getElementById('visualization'));
      motionchart.draw(data, {'width': 800, 'height': 400});
    }
    

    google.setOnLoadCallback(drawVisualization);
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
	
	
	
	
	$(document).ready( function() {
	
	
	 
 
 
 		//comienza treeview
		$("#browser").treeview({});
		//fin treeview
		
		
		
		// create the OUTER LAYOUT
		outerLayout = $("body").layout( layoutSettings_Outer );
 
		/*******************************
		 ***  CUSTOM LAYOUT BUTTONS  ***
		 *******************************
		 *
		 * Add SPANs to the east/west panes for customer "close" and "pin" buttons
		 *
		 * COULD have hard-coded span, div, button, image, or any element to use as a 'button'...
		 * ... but instead am adding SPANs via script - THEN attaching the layout-events to them
		 *
		 * CSS will size and position the spans, as well as set the background-images
		 */
 
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
 
 
 
		/* Create the INNER LAYOUT - nested inside the 'center pane' of the outer layout
		 * Inner Layout is create by createInnerLayout() function - on demand
		 *
			innerLayout = $("div.pane-center").layout( layoutSettings_Inner );
		 *
		 */
 
 
		// DEMO HELPER: prevent hyperlinks from reloading page when a 'base.href' is set
		$("a").each(function () {
			var path = document.location.href;
			if (path.substr(path.length-1)=="#") path = path.substr(0,path.length-1);
			if (this.href.substr(this.href.length-1) == "#") this.href = path +"#";
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
		,	resizerTip:				"Cambiar tamaño"
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
		,	resizerTip_open:		"Cambiar tamaño "
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
		,	resizerTip_open:		"Cambiar tamaño"
		//,	slideTrigger_open:		"mouseover"
		,	initClosed:				true
		//	override default effect, speed, and settings
		,	fxName:					"drop"
		,	fxSpeed:				"normal"
		,	fxSettings:				{ easing: "" } // nullify default easing
		}
	,	center: {
			paneSelector:			"#mainContent" 			// sample: use an ID to select pane instead of a class
		,	onresize:				"innerLayout.resizeAll"	// resize INNER LAYOUT when center pane resizes
		,	minWidth:				200
		,	minHeight:				200
		}
	};
 

 
</script> 
</head> 
<body> 



<div class="ui-layout-north"> 






		<div style="float:left; padding-left:10px"> 
		<img src="<?php echo base_url() ?>CSS/images/logo_cobratec.png"   height="59">
	    
		</div>
		 
		<div  style="float:right; margin-top:20px; margin-right:30px">
	    Soporte | Salir  
		</div>

	
	<ul class="toolbar"> 
		<li id="tbarToggleNorth" class="first"><span></span>Cabecera</li> 
		<li id="tbarOpenSouth"><span></span>Mostrar opciones</li> 
		<li id="tbarCloseSouth"><span></span>Ocultar opciones</li> 
		<li id="tbarPinWest"><span></span>Menú principal</li> 
		<li id="tbarPinEast" class="last"><span></span>Buscador / SMS</li> 
	</ul> 
	
	
</div> 


<div class="ui-layout-west"> 
	<div class="header">Menú</div> 
	<div class="content">  
		<ul id="browser" class="filetree treeview-famfamfam">
	
		<?php 
			$this->load->view('menuTreeVistaPrincipal.php')
		?>
	    </ul>
	</div> 
 
 
 
<div class="footer">CLIENTE</div> 
 
 <img src="<?php echo base_url() ?>CSS/images/logo_vespucio_norte.jpg"   height="80" />
 
	
 			
</div> 




<div class="ui-layout-east"> 
	<div class="header">OPCIONES</div> 
 	<div class="subhead">BUSCADOR</div> 
	

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
 



<?php $this->load->view('listado_campana'); ?>




 
</div> 
 
 <!-- FIN CONTENEDOR DE LA SECCION PRINCIPAL-->
 	
 
 
 
  <!-- CONTENEDOR DE LA SECCION PIE-->
 <div class="ui-layout-south"> 
	<div class="header">Opciones</div> 
	<div class="content"> 
		<p>seccion de opciones varias</p> 
			
	<div id="visualization" style="width: 800px; height: 400px;"></div>


	</div> 
 </div> 
  <!-- FIN CONTENEDOR DE LA SECCION PIE-->
 
</body> 
</html> 
