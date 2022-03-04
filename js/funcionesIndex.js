var tm = 99999999;
$("div[@name=time]").hide();

function timer1() {
	/*if(estado == true) {
		time.innerHTML = "<b>Se le Entregara un Registro Nuevo en : "+ tm +" Segundos</b>";
		if(tm<=0) {
			tm=9999999;
			time.innerHTML = " ";
			otroReg("domo_script.php?idForm=","<?php echo $_SESSION["Screen1"];?>");
		}
		else {
			tm--;
			DetenerCrono ();
		} 
	}
	else {
		$("div[@name=time]").hide();
	}*/
}

function loadBodyDosForms( url, idForm, url2 ,pagActual, url3 , idResp, url4, 
					idLlamada , url5, FormActivo ,url6, tipoResp ,url7, estadoScreen, idFormTitulo) {
	var d = new Date();
	$.get(url + url2 + pagActual + url3 + idResp + url4 + idLlamada + url5 + 
			FormActivo + url6 + tipoResp + url7 + estadoScreen +"&nocache=" + d, function (data) {
		$("#DOMO_Div_Body").html(data);
		
		popUpCal.init();
	});
	
	/*
	if(estadoScreen == 3 || estadoScreen == 9999) {
		estado=true;
		tm = <?php  echo $_SESSION["Aplicacion"]->getTiempoEspera();  ?>;
		$("div[@name=time]").show() ;
	}
	else {
		//$("div[@name=time]").hide();
	}
	
	*/
	
}

function startTime2() {
	/*
	var today2=new Date();
	var h2=today2.getHours();
	h2=h2+<?php echo $_SESSION["Aplicacion"]->getZonaHoraria(); ?>;
	var m2=today2.getMinutes();
	var s2=today2.getSeconds();
	h2=checkHora(h2);
	m2=checkTime2(m2);
	s2=checkTime2(s2);
	document.getElementById('spanTime2').innerHTML=h2+":"+m2+":"+s2;
	t2=setTimeout('startTime2()',500);
	
	*/
}

function HOLA(selecc) {
		
	}


/********* FUNCIONES FINNING**************/	

function onSelect_choice(selecc) {
		
	nombre = selecc.name;	
		if(nombre=="tipo_llamada")
		{
			document.getElementById('nombre_cliente').value = '';
			document.getElementById('id_cliente').value = '';
		}
		
	}
	
		

function FINNING_llenaCamposDerivado(a) {
	var d = new Dates();
	var valor = a.value;
	valor = valor.split("/");


$.get("Ajax_Finning_getEmail_Empleado.php?id="+valor[0]+"&tabla="+valor[1]+"&nocache=" + d, function (data) {



		
	try{
	document.getElementById('derivar_a_email').value = data;
	}
	catch(object)
	{
	document.getElementById('back_email_derivar').value = data;
	}
		
		
		
		
		
		
		popUpCal.init();
	});
}	



function FINNING_llenaCamposEscalado(a) {
	var d = new Date();
	var valor = a.value;
	valor = valor.split("/");


$.get("Ajax_Finning_getEmail_Empleado.php?id="+valor[0]+"&tabla="+valor[1]+"&nocache=" + d, function (data) {

		
	try{
	document.getElementById('email_escalar').value = data;
	}
	catch(object)
	{
	alert("Error: no existe campo email_escalar");
	}
		

		popUpCal.init();
	});
}		
	
function buscarCliente(tipo_cliente)
{
	try{
	objeto = document.getElementById("tipo_llamada");	
	tipo = objeto.value;
	}
	catch(object)
	{
		alert("GUARR NIN ! Campo Tipo Cliente debe ser asignado a este formulario");
		}
	if(tipo=='0')
		{
			alert("Seleccione Tipo de Llamada para poder buscar");
			objeto.focus();
		}
	else if (tipo=='22' || tipo=='37')	{ //cliente_finning
		
		pop_up('buscarRegistro.php?tabla=cliente_finning',800,600,'no','no','yes','no','yes');
		
		}
	
	else if (tipo=='23' || tipo=='38')	{ //empleados_finning
		
		pop_up('buscarRegistro.php?tabla=empleado_finning',800,600,'no','no','yes','no','yes');
	}
	else
	{
	alert("Solo se puede buscar clientes o empleados");
			objeto.focus();
	}
	

}
/*********FIN FUNCIONES FINNING**************/	
	// JavaScript Document