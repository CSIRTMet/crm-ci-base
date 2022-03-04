<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <title>KUBO - CONDICIONES
  </title>
	
   
    <link rel="StyleSheet" href="<?=base_url()?>/css/CSS/style_campana.css" type="text/css"> 
	<link href="<?php echo base_url() ?>css/calendario/assets/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
	<script language='javascript' type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 
    <script language='javascript' type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-latest.js"></script> 	
	<script language='javascript' type='text/javascript' src='<?php echo base_url()?>/js/onlyNumeric.js'></script>
	<script language='javascript' type='text/javascript' src='<?php echo base_url()?>/js/onlyAlfa.js'></script>
	<script language='javascript' type="text/javascript" src="<?php echo base_url() ?>js/jquery.ui.datepicker-es.js"></script>
	
<script language="javascript" type="text/javascript">
	
var nameT = '<?php echo $vista; ?>';
	
function viewMouseOver( id )
{  $("#" + id).addClass("viewHover");	}
	
function viewMouseOut( id )
{  $("#" + id).removeClass("viewHover");  }
	
function Hidedatefield(){
	$("#text_number").show("fast");
	$("#datetime").hide("fast");
}
	
function Fillvalorber(valor){
	document.frm.valor.value = valor;
}
	
function Datatype(){
	var type_array;
	var nameT = '<?php echo $vista; ?>';
	type_array = document.frm.columna.value.split("/");
	if(type_array[0].search('date')!=-1){
		//alert('tipo fecha');
		$("#text_number").hide("fast");
		$("#datetime").show("fast");
		document.frm.valor.value = '';
	}
	else{
		//alert('tipo texto');
		$("#text_number").show("fast"); 
		$("#datetime").hide("fast");
		document.frm.valor.value = '';
	}
	
	
	
}
	
	
function validate(){

	var type_array;
	var valor = $("#valor").val();
	var date = $("#fecha").val();
	type_array = document.frm.columna.value.split("/");
		
	if($("#columna").val()   == ''){ alert("debe escoger una columna"); return false;}
	if($("#condicion").val() == ''){ alert("debe escoger una condicion"); return false;}
	if(valor == '' && date   == ''){ alert("El campo de comparacion no puede ser vacio"); return false;}
	
	
	if( 
		(
			   type_array[0].search('int')!=-1 
			|| type_array[0].search('date')!=-1
		)
		&& 
		(
			   $("#condicion").val().search('LIKE')!=-1 
			|| $("#condicion").val().search('NO_LIKE')!=-1   
			|| $("#condicion").val().search('COM_CON')!=-1
			|| $("#condicion").val().search('TER_CON')!=-1
			|| $("#condicion").val().search('NO_COM_CON')!=-1
			|| $("#condicion").val().search('NO_TER_CON')!=-1
			|| $("#condicion").val().search('AGRUPA')!=-1
		)
		){
			alert('El operador no funciona para la columna seleccionada.');
			return false;
	}
	else{
		
		 return true;
		 
	}
}
	
function validaCondiciones(){
	var i,chequeado="no";
	
	for(i=0;i<document.frm.oRadio.length;i++){
		if ( document.frm.oRadio[i].checked ){
			document.frm.vRadio.value=document.frm.oRadio[i].value;
			chequeado="si";
		}	
	}
	
}	
</script>

</head>
<body onLoad="Hidedatefield();" style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">

<div class="DOMO_Div_Body" id="DOMO_Div_Body">
<form name='frm' action='<?=base_url();?>index.php/lista_gestion/add_condiciones/' onSubmit="return validate();" method="POST"><br>
<b><?php echo validation_errors();?></b>
<br>
<h2>&nbsp;&nbsp;&nbsp;&nbsp;Condiciones</h2>

<input type="hidden" name="campana" id="campana" value="<?=$campana;?>">
<input type="hidden" name="lista" 	id="lista" 	 value="<?=$lista;?>">
<input type="hidden" name="modulo" 	id="modulo"  value="<?=$modulo;?>">
<table border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
	<td>&nbsp;&nbsp;</td>
	<td ><div align="center">Valor</div></td>
	<td>&nbsp;&nbsp;</td>

	<td  ><div align="center">Operador</div></td>
	<td>&nbsp;&nbsp;</td>
	<td ><div align="center">Expresion</div></td>
	
</tr>
<tr>
<td nowrap>AND
<input type="radio" name="oRadio" id="oRadio" value="and" checked>
OR
<input type="radio" name="oRadio" id="oRadio" value="or">
</td>
<td>
<select name="columna"  id="columna" onChange="Datatype();">
<?php
	////////////////////////////////// imprimir las columnas /////////////////////////////////
	echo "<option value=''>-- seleccione campo --</option>";
	foreach($fields as $field)
	{
		echo "<option value='".$field->Type."/".$field->Field."'>".$field->Field."</option>";
	}
?>
</select>
</td>
<td>&nbsp;&nbsp;</td>
<td>
	<select name="condicion" id="condicion" >
		<option value=""> </option>
		<option value="IGUAL"><b>IGUAL</b></option>
		<option value="DISTINTO"><b>DISTINTO</b></option>
		<option value="MAY_O_IGUAL"><b>MAYOR O IGUAL</b></option>
		<option value="MEN_O_IGUAL"><b>MENOR O IGUAL</b></option>
		<option value="MAY"><b>MAYOR</b></option>
		<option value="MEN"><b>MENOR</b></option>
		<option value="COM_CON"><b>COMIENZA CON</b></option>
		<option value="TER_CON"><b>TERMINA CON</b></option>
		<option value="NO_COM_CON"><b>NO COMIENZA CON</b></option>
		<option value="NO_TER_CON"><b>NO TERMINA CON</b></option>
		<option value="LIKE"><b>CONTIENE</b></option>
		<option value="NO_LIKE"><b>NO CONTIENE</b></option>
		<option value="AGRUPA"><b>AGRUPA</b></option>
	</select>
</td>
<td>&nbsp;&nbsp;</td>
<td>
<div name="text_number" id="text_number">
	<input type="text" name="valor" id="valor" value="" maxlength="20" size="30">
</div>
<div name="datetime" id="datetime">
 	<input name="fecha" id="fecha" type="text"  value="" class="date-picker" />  
</div>
</td>
</tr>
<tr><td colspan="5"><input type="hidden" id="vRadio" name="vRadio"></td></tr>
<tr><td colspan="5"></td></tr>
<tr><td colspan="5"></td></tr>
<tr><td colspan="5"><center><input type="submit" value=" Agregar" onClick="validaCondiciones()"></center></td></tr>
</table>
<br><br><br><br><br><br><br><br>
</td>
</tr>
</table>
</table>
</form>
<script type="text/javascript"> 
  
   $(".date-picker").datepicker({
   changeYear: true,
   changeMonth: true,
   dateFormat: 'dd/mm/yy'
   });

</script>
</div>

</body>
</html>
 