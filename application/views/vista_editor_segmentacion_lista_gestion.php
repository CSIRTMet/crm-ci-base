<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<title>KUBO :: Segmentador Online</title>
<LINK rel="StyleSheet" href="<?=base_url()?>/css/CSS/estilos.css" type="text/css"> 
<link rel="StyleSheet" href="<?=base_url()?>/css/CSS/style_campana.css" type="text/css"> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 	
<script language="javascript" type="text/javascript">	
var nameT;
var camp;
var largoQuery=6;

function viewMouseOver( id )
{  $("#" + id).addClass("viewHover");	}

function viewMouseOut( id )
{  $("#" + id).removeClass("viewHover");  }	

function ListaSelect(total){
	
	var lista = document.frm.lista;
	var campana = document.frm.campana;
	camp = campana.value;
	$("#query").html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');
	if(lista.length == null){
	
			$("#usuarios").html('PANEL INACTIVO PARA ESTE MODULO');	
			
			ViewQuery();
			document.frm.addcondition.disabled = false;
			$("#condiciones").html("");
			$("#query").html("");
		
	}
	else{
	//alert('vista_crear_filtro_lista_gestion linea 42 +- :: else');
		for(i=0;i<lista.length;i++)
		{
			if(lista[i].checked){ 
			
				nameT = lista[i].value;
				
				if(total == 0){
					var r = new Date().getTime();
					$.get("<?=base_url()?>index.php/lista_gestion/ajax_lista_condiciones/"+nameT+"/"+r, function(data)
					{	$("#condiciones").html( data );});
					ViewQuery();
					document.frm.addcondition.disabled = false;
				}
				else{
					document.frm.addcondition.disabled = true;
					$("#condiciones").html("");
					$("#query").html("");
				}
			} 
		}
	}
}

function popup(){
	var query=$("#query").html();
	query =jQuery.trim( query.replace(/<[^>]+>/g,''))
	largoQuery = query.length; //es de 19 cuando esta vacio el div 
	
	var campana = document.frm.campana;
	var lista = document.frm.lista;
	var flag = false;
	if(lista.length == null && lista.value!='' && lista.checked /*&& largoQuery > 16*/){
		flag = true;
	}
	else{
		for(i=0;i<lista.length;i++)
		{
			if(lista[i].checked){ 
				flag = true;
			}	 
		}
	}
	if(flag == true){
		window.open ('<?=base_url()?>index.php/lista_gestion/open_popup_condiciones_segmentador/'+lista.value+'', '', 'width=750, height=350, menubar=no, toolbar=no, location=no,scrollbars=yes,resizable = yes');
		
	}
	else{
		alert('Debe elegir una lista');
	}
}

function ViewQuery(){
	
	var r = new Date().getTime();
	$.get("<?=base_url()?>index.php/lista_gestion/load_consulta/"+r, function(data)
	{	$("#query").html(data);
		
		//parche para evitar exportar excel con error sql 
		var query=$("#query").html();
		query =jQuery.trim(query.replace(/<[^>]+>/g,''))
		largoQuery = query.length; //es de 19 cuando esta vacio el div
		if(largoQuery < 19){
			alert('Escoja nuevamente una lista. Si el problema persiste vuelva a iniciar sesion');
		}
		// fin parche
	});
}

function ViewConditions(){
	
	var r = new Date().getTime();
	$.ajax({url: "<?=base_url()?>index.php/lista_gestion/ajax_lista_condiciones/"+r, async: false, success: function(data) {
		$("#condiciones").html(data);  
		ViewQuery();
		}
	});
}

function DelCondition(indice){
	
	$("#condiciones").html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');
	DelAndOr(indice);

	var var_url = "<?=base_url()?>index.php/lista_gestion/del_condiciones/"+indice+"/";
	var r = new Date().getTime();
	$("#query").html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>'); $.ajax({url: var_url + r, async: false, success: function(data) {
		
		
		ViewConditions(); 
		
		//ViewQuery();
		}
	});
	
	
}

function DelAndOr(indice){
	
	var var_url = "<?=base_url()?>index.php/lista_gestion/del_and_or/"+indice+"/";
	var r = new Date().getTime();
	$.ajax({url: var_url + r, async: false, success: function(data) {
		//ViewQuery();
		}
	});
	
}

function parentesisbalanceado(){
	var arrayParentesis=new Array();
	var valueParentesis="";
	var largoArray=document.frm.ocCheckbox.length;
	
	for(i=0;i<document.frm.ocCheckbox.length;i++){
		
		if ( document.frm.ocCheckbox[i].checked ){
			arrayParentesis[i]=1;	
			document.frm.ocCheckbox[i].value=1;
			valueParentesis+="1";
		}else{
			arrayParentesis[i]=0;
			document.frm.ocCheckbox[i].value=0;
			valueParentesis+="0";
		}
		i++;
		if ( document.frm.ocCheckbox[i].checked ){
			arrayParentesis[i]=1;
			document.frm.ocCheckbox[i].value=1;
			valueParentesis+="1";
		}else{
			arrayParentesis[i]=0;
			document.frm.ocCheckbox[i].value=0;
			valueParentesis+="0";
		}				
	}

	$("#query").html('<div align="center"><img src="<?php echo base_url(); ?>/css/images/ajax-loader.gif"/></div>');
	var var_url = "<?=base_url()?>index.php/lista_gestion/add_parentesis/"+valueParentesis+"/";
	var r = new Date().getTime();
	$.ajax({url: var_url + r, async: false, success: function(data) {
		ViewQuery();
		}
	});
	
	
}



function Preview()
{
    var parentesis= $("#ocCheckbox").length;
	var balanceado = true; //para el preview asumo que esta balanceado
	if(parentesis > 0){balanceado = es_balancedo();}
  
	if (balanceado == true)
	{		 
 
	var lista = document.frm.lista;
	var flag = false;
	if(lista.length == null){
		if(lista.length == null && lista.value!='' && lista.checked)
			window.open ('<?=base_url()?>index.php/lista_gestion/load_preview_segmentacion/<?php echo $id_lista; ?>', '', 'width=750, height=650, menubar=no, toolbar=no, location=no, scrollbars=yes, resizable = yes');
		else
			alert('Debe elegir una lista');
	}
	else{
		for(i=0;i<lista.length;i++)
		{
			if(lista[i].checked)
				flag = true;
		}
		if(flag==true)
			window.open ('<?=base_url()?>index.php/lista_gestion/load_preview_segmentacion/<?php echo $id_lista; ?>', '', 'width=750, height=650, menubar=no, toolbar=no, location=no, scrollbars=yes, resizable = yes');
		else
			alert('Debe elegir una lista');
	}
	
	}	
}

function formsubmit()
{
	
	
	var parentesis= $("#ocCheckbox").length;
	var balanceado = false
	if(parentesis > 0){balanceado = es_balancedo();}
	
	 
	if (balanceado == true)
	{	
		 document.frm.submit();	
		 return true;	 
	}
	else
	{
		return false;	
	} 
	 
	 
}
function es_balancedo()
{
	var arrayParentesis=new Array();
	var valueParentesis="";
	var largoArray=document.frm.ocCheckbox.length;
	
	for(i=0;i<document.frm.ocCheckbox.length;i++){
		
		if ( document.frm.ocCheckbox[i].checked ){
			arrayParentesis[i]=1;				
			valueParentesis+="1";
		}else{
			arrayParentesis[i]=0;			
			valueParentesis+="0";
		}
		i++;
		if ( document.frm.ocCheckbox[i].checked ){
			arrayParentesis[i]=1;			
			valueParentesis+="1";
		}else{
			arrayParentesis[i]=0;			
			valueParentesis+="0";
		}				
	}
	//alert(valueParentesis.split(""));
	var contador = 0;
	for(i=0;i<valueParentesis.length;i++){
	 
		 if (i%2==0){
			  contador = contador + parseInt(valueParentesis[i],10);
		 }
		 else{
			  contador = contador - parseInt(valueParentesis[i],10);
		 }
		 
		 if(contador < 0)
		 {	 
			break;	 
		 }
	}
	
	if(contador != 0)
	{
		alert("Parentesis desbalanceados (codErr:"+contador+")");
		return false;
	}
	else{ 
		return true;
	}
			
	 
} 

 
 

function resetear_segmentacion(id_lista)
{
 
  
  var url = '<?php echo base_url(); ?>index.php/lista_gestion/form_procesar_reseteo_segmentacion_lista/';
  $("#frm").attr("action", url)
  $('#frm').submit();
  

}
/* *********************************************************************************************************** */
function maximizar(){
	window.moveTo(0,0);
	window.resizeTo(screen.width,screen.height);
	/*window.focus();*/
	if (window != window.top) {
		top.location.href = location.href;
	}
}

function volver()
{

   var url = '<?php echo base_url(); ?>index.php/lista_gestion/index/';
   $(location).attr('href',url);
}

</script>
</head>

<body alink="#ee0000" link="#0000ee" vlink="#551a8b">
<div class="DOMO_Div_Body" id="DOMO_Div_Body">

<form name='frm' id="frm" action='<?php echo base_url(); ?>index.php/lista_gestion/form_procesar_segmentacion_lista/' method="POST">

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" class='DOMO_view'>

<tr>
	<td width="20" height="100%" >&nbsp;</td>
	<td align="left" valign="top">
	<br>

	 

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<input type="hidden" name="campana" id="campana" value="<?php echo $this->uri->segment(3); ?>" />
    <input type="hidden" name="id_lista" id="id_lista" value="<?php echo $id_lista; ?>" />
	<table border="0" cellspacing="2" cellpadding="2" align="center">
	<tr>
		<td>
		<div class="Div_tablas" name="tablas" id="tablas">
		
        <table border='0' cellspacing='5'>
		<tr><td><strong>Listas:</strong>
		</td></tr>
		</table>
        <table border="1" cellspacing="2" cellpadding="4" align="center" width="100%">
        <thead>
        <tr>
		<th width="9%">&nbsp;</th>
		<th width="9%" class="path" style="width:5%"><small>ID</small></th>
		<th width="19%" class="path"><small>Nombre</small></th>
		<th width="30%" class="path"><small>Estado</small></th>
		<th width="33%" class="path"><small>Registros</small></th>
		</tr> 
		</thead>
	
		<?php
		foreach($listas as $lista)
		{  ?>
			<tr>
			<td><INPUT type='radio' name='lista' id='lista' value="<?php echo $lista->id_lista ?>" onClick="ListaSelect('<?php echo $lista->total_registros ?>')" ></td>
			<td><?php echo $lista->id_lista ?></td>
			<td><?php echo $lista->nombre ?></td>
			<td><?php 
			
			switch ($lista->estado_lista) {
			case 0:
				echo "Nuevo";
				break;
			case 1:
				echo "Iniciada";
				break;
			case 2:
				echo "Segmentada";
				break;
			default:
			   echo "No definido";
			}

			?></td>
			<td ><?php echo $lista->total_registros ?></td>
			</tr>
		<?php } ?>
		</table>
        
        
     	</div>
     	</td>
      	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      	<td>


  		<div class="Div_tablas" name="usuarios" id="usuarios">
  		PANEL INACTIVO PARA ESTE MODULO</div></td>
  		</tr>
  		<tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
  		</tr>
      <tr>
        <td>
        <div class="Div_tablas" name="condiciones" id="condiciones">CONDICIONES&nbsp;</div>
         </td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>
              <div class="Div_tablas" name="query" id="query">QUERY&nbsp;</div>
          </td>
      </tr>
      <tr>
      <td align="center" <?php if($estado_lista == 2) echo 'style="display:none"'; ?>><center><input type="button" value="Agregar Condicion" name="addcondition" id="addcondition" onClick="popup('condiciones.php');"></center></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    </table>  
    <center>
    <br><input type="button" class ='boton' value=" Vista Previa " name="preview" id="preview" onClick="return Preview();">
    <?php if($estado_lista == 2) { //Preview(); ?>  
     
    
   
    
    &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class ='boton' value="Resetear Segmentacion" name="resetear" onClick="resetear_segmentacion(<?php echo $id_lista; ?>)" id="resetear" />
   
     
     
    <?php } else { ?>  
    &nbsp;&nbsp;&nbsp;&nbsp;
    
    
  
     <input type="submit" class ='boton' value="Aplicar Cambios" name="export" id="export" onClick="return formsubmit();">
    
    
    <?php }  ?> 
    
     &nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" class ='boton' value=" Volver a las listas" name="vol_ver" id="vol_ver" onClick="return volver();">
   
    </center>
    </td>
        <td width="20" height="20" bgcolor="#333333">&nbsp;</td>
    </tr>
    <tr>
        <td width="20" height="20" bgcolor="#333333">&nbsp;</td>
        <td bgcolor="#333333">&nbsp;</td>
        <td width="20" height="20" bgcolor="#333333">&nbsp;</td>
    </tr>
    </table>
    </form> 
    </div>


</body>
</html>