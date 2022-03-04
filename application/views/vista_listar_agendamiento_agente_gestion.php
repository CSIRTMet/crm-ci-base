 
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
	z-index: 99999;
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
</style>
        
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/js/tablas/jquery.jeditable.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/js/tablas/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			
			
			$(document).ready(function() {
				/* Init DataTables */
				var oTable = $('#grilla').dataTable();
				$("input:checkbox").attr('checked', false);
				

				$('#grilla tbody tr').live('click', function () {
						
						/*var aData = oTable.fnGetData(this );
						var str= aData[1]; 
						var patt=/value="[0-9]*"/gi;
						var valor = aData[1].substr(50,4)
						alert(aData[1] +'\n\n'+ str.match(patt));
 						$("this:checkbox").attr('checked', true);
					     
						 $(this).toggleClass('row_selected');*/
	
					} );
				
				
				
				//POP UP
				//When you click on a link with class of poplight and the href starts with a # 
				$('a.poplight[href^=#]').click(function() {
					var popID = $(this).attr('rel'); //Get Popup Name
					var popURL = $(this).attr('href'); //Get Popup href to define size
				
					//Pull Query & Variables from href URL
					var query= popURL.split('?');
					var dim= query[1].split('&');
					var popWidth = dim[0].split('=')[1]; //Gets the first query string value
				
					//Fade in the Popup and add close button
					$('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="<?php echo base_url(); ?>/css/images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');
				
					//Define margin for center alignment (vertical   horizontal) - we add 80px to the height/width to accomodate for the padding  and border width defined in the css
					var popMargTop = ($('#' + popID).height() + 80) / 2;
					var popMargLeft = ($('#' + popID).width() + 80) / 2;
				
					//Apply Margin to Popup
					$('#' + popID).css({
						'margin-top' : -popMargTop,
						'margin-left' : -popMargLeft
					});
				
					//Fade in Background
					$('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
					$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 
				
					return false;
				});
				
				//Close Popups and Fade Layer
				$('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
					$('#fade , .popup_block').fadeOut(function() {
						$('#fade, a.close').remove();  //fade them both out
					});
					return false;
				});
				
				//FIN POP UP
				
 
				
				
			} );
			
			
			
			function set_checkeado()
			{
				$("input:checkbox").attr('checked', true);
				
				}
				
			function set_uncheckeado()
			{
				$("input:checkbox").attr('checked', false);
				
			}
			
			// Extender jQuery con un método personalizado:
			jQuery.fn.getCheckboxValues = function(){
				var values = [];
				var i = 0;
				this.each(function(){
					// guarda los valores en un array
					values[i++] = $(this).val();
				});
				// devuelve un array con los checkboxes seleccionados
				return values;
			} 
			
			
			
			function ver_seleccionados()
			{
				var arr = $("input:checked").getCheckboxValues();
				alert(arr); // esto muestra un pop-up con los checkboxes seleccionados	
			}
			
			function dejar_publicos(usuario_agendamiento)
			{
				
				
				if(confirm('Esta operacion solo afecta a registros sin usuario asignado (sin compromisos en el mes) \nNO SE PUEDE REVERTIR. \n\n ¿Esta seguro de querer hacer publico este agendamiento?'))
				{

					var arr = $("input:checked").getCheckboxValues();
					$('#esperar').html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');	
					 // esto muestra un pop-up con los checkboxes seleccionados	
					if(arr!= ""){
						//alert(arr);
						var r = new Date().getTime();
						var url='<?php echo base_url() ?>index.php/agenda/set_agendamiento_publico_gestion/';
						$.post(url + r, { 
							 agendamientos: arr, 
							 id_usuario: usuario_agendamiento
						}, function (data) { 
							$('#esperar').html('');
							alert(data);
							window.location.reload();
						
						});
					}
					else 
					{
						alert("No ha seleccionado agendamiento");
						$('#esperar').html('');
					}
			
			
				}
			
			}
		
		
		
			function cambiar_fecha(usuario_agendamiento)
			{

				if(confirm('NO SE PUEDE REVERTIR. \n\n ¿Esta seguro de querer cambiar la fecha de agendamiento?'))
				{
					
					var arr = $("input:checked").getCheckboxValues();
					var fecha = $("#fecha").val();
		 			var hora = $("#hora").val();
		 			var minuto = $("#minuto").val();					
					//alert(hora);
					if(fecha=='' || hora =='0')
					{
						alert('Debe ingresar la fecha y minutos para el agendamiento');	
					}
					else
					{
						$('#esperar').html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');	
						
						// esto muestra un pop-up con los checkboxes seleccionados	
						if(arr!= ""){
							//alert(arr);
							
							var r = new Date().getTime();
							var url='<?php echo base_url() ?>index.php/agenda/set_fecha_agendamiento_gestion/';
						    $.post(url + r, { 
								 agendamientos: arr, 
								 id_usuario: usuario_agendamiento,
								 fecha: fecha,
								 hora: hora,
								 minuto: minuto
								
							}, function (data) { 
								$('#esperar').html('');
								alert(data);
								window.location.reload();
							
							});
						}
						else 
						{
							alert("No ha seleccionado agendamiento");
							$('#esperar').html('');
						}
		 
					}
			
			
				
					
					
					
					
				}
			
			}
			
		
	 
			function asignar_otro_usuario(id_usuario)
			{

			 var arr = $("input:checked").getCheckboxValues();
			 var agendamientos = arr; 
			 
			 if (arr != '')
				{
				$('#esperar').html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');	
				 var r = new Date().getTime();
				 var url='<?php echo base_url() ?>index.php/agenda/form_asignar_otro_usuario_agenda_gestion/';
				  $.post(url + r, { 
						  id_usuario: id_usuario,
						  agendamientos: arr
						  
					}, function (data) { 
					  $('#popup_asignar_usuario').html(data);
					  $('#esperar').html('');	
					  $('#popup_asignar_usuario').prepend('<a href="#" class="close"><img src="<?php echo base_url(); ?>/css/images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');
					});
				}
			else
				{
					$('#popup_asignar_usuario').html('Debe seleccionar al menos un registro');	
				}
			//
			
			
			}
		
		
		    
			
			function ejecutar_asignar_otro_usuario(id_usuario, id_usuario_a_traspasar_agendamiento)
			{
			 var arr = $("input:checked").getCheckboxValues();
			 var agendamientos = arr; 
			 
			 if (arr != '' && id_usuario_a_traspasar_agendamiento > 0)
				{
				$('#esperar').html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');	
				 var r = new Date().getTime();
				 var url='<?php echo base_url() ?>index.php/agenda/asignar_otro_usuario_agenda_gestion/';
				  $.post(url + r, { 
						  id_usuario: id_usuario,
						  agendamientos: arr,
						  id_usuario_destino: id_usuario_a_traspasar_agendamiento
						  
					}, function (data) { 
					   $('.btn_close').click();
					   $('#esperar').html('');
					   alert(data);
					   window.location.reload();	
					});
				}
			else
				{
					alert('Debe seleccionar al menos un registro');	
				}
			//
			
			
			 } 
			
		</script>
	 

</head>

<body>



<div class="ui-layout-north"> 

	<?php //$this->load->view('includes/barra_usuario_conectado'); ?>
   
<ul class="toolbar" style="width:100%; padding-left:0px; padding-right:0px"> 

      <div align="center"><span style="color:#FFF" ><strong>AGENDAMIENTOS DEL USUARIO: &nbsp;&nbsp; <?php echo $nombre_agente; ?></strong></span> </div>
 
	</ul> 
	
</div> 


<?php echo validation_errors(); ?>


			<div class="full_width big"></div>
			<div id="demo">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
               <tr>
                <td width="33%"  class=""><a href="#" onclick="set_checkeado()">[seleccionar todos] - </a> <a href="#" onclick="set_uncheckeado()">[ninguno]  </a> <div id="esperar"></div> </td><td width="67%"  class="">&nbsp;</td>
               </tr>
 			</table>
 
			  <table cellpadding="0" cellspacing="0" border="0" class="display" id="grilla">
	<thead>
		<tr>
     
      		<th width="4%"></th>
      		<th width="7%" nowrap="nowrap">&nbsp;</th>
            <th width="19%">LISTA</th>
			<th width="11%">FECHA</th>
			<th width="12%">GESTION</th>
			<th width="13%">RUT</th>
			<th width="16%">NUM. DOCUMENTO</th>
            <th width="8%">MONTO</th>
            <th width="10%">GLOSA</th>
		</tr>
	</thead>
	<tbody>
		
     
 
       
        
        <?php 
		    $i = 1;
			$usuario_agendamiento = 0;
		    foreach($agendamientos as $item): 
			$usuario_agendamiento = $item->usuario_agendamiento; ?>
        
             
      <tr id="<?php echo $item->id_cliente; ?>" >
        <td><?php echo $i++; ?></td>
        <td nowrap="nowrap"><input name="agendamiento[]" type="checkbox" id="agendamiento[]" value="<?php echo $item->id_cliente; ?>" /></td>
            <td nowrap="nowrap"><?php echo $item->lista; ?></td>
			<td nowrap="nowrap"><?php echo $item->fecha_agendada; ?></td>
            <td nowrap="nowrap"><?php echo $item->ultima_gestion; ?></td>
			<td><?php echo $item->rut; ?></td>
			<td><?php echo $item->numero_documento; ?></td>
			<td><?php echo $item->monto; ?></td>
      		<td><a href="#" title="<?php echo $item->glosa;?>">ver</a></td>
		</tr>
	 
		  <?php endforeach;?> 
	  
       
      
        
       
		
	</tbody>
	<tfoot>
		<tr>
		  <th></th>
		  <th>&nbsp;</th>
		  <th>LISTA</th>
		  <th>FECHA</th>
		  <th>GESTION</th>
		  <th>RUT</th>
		  <th>NUM. DOCUMENTO</th>
		  <th>MONTO</th>
		  <th>GLOSA</th>
	  </tr>
	</tfoot>
</table>

<table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
               <tr>
                <td  class="" style="text-align:center"><strong>[<a href="#" onclick="dejar_publicos(<?php echo $usuario_agendamiento; ?>)">HACER PUBLICO </a>]&nbsp;&nbsp;&nbsp; [<a href="#?w=500" rel="popup_asignar_usuario" class="poplight" onclick="asignar_otro_usuario('<?php echo $usuario_agendamiento; ?>')">ASIGNAR A OTRO USUARIO</a>]&nbsp;&nbsp;&nbsp;  [<a href="#" onclick="cambiar_fecha(<?php echo $usuario_agendamiento; ?>);">CAMBIAR FECHA</a>] </strong></td>
    </tr>
 			</table>
            
            
            
    
    
    
    

<div id="div_agenda" style="display:">

  <table width="100%" border="0" cellpadding="1" cellspacing="1" >
	 <tr>
	   <td width="17%" class="header">Cambiar fecha llamada </td>
	   <td width="4%" class="header"><img src="<?php echo base_url() ?>/css/images/agendamiento_1.png" width="32" height="32" /></td>
	   <td width="28%" class="x-border-layout-ct"><input name="fecha" id="fecha" type="text"  class="date-picker" readonly="readonly" /> 
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
</td>
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
 
 
   

<div id="popup_asignar_usuario" class="popup_block">
    
</div>




           
            
</div>
			<div class="spacer"></div>
	 
</body>
</html>





