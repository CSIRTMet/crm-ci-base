/*
 * Funciones Javascript para DOMO
 *
 * Copyright (c) 2008 Datasoft Interactions
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * $Date: 2008-11-18 12:03:00 -0500 (Tue, 18 Nov 2008) $
 * $Rev: 1 $
 */

/* *********************************************************************************************************** */
function popUpInsertarModificarHtml(campo,accion) {
	/* Argumentos por defecto */
	var txtUrl = '';
	//alert(campo+' - '+accion);
	if (accion=='insert')
	{
		try
		{
			txtUrl = "SURE_editorHTML.php?campo="+campo+"&accion=insert";
		}
		catch(object)
		{
			alert("No se pudo mostrar la interfaz");
		    return false;	
		}

	}
	else if (accion=='update')
	{
		try
		{
			txtUrl = "SURE_editorHTML.php?campo="+campo+"&accion=update";
		}
		catch(object)
		{
			alert("No se pudo mostrar la interfaz");
		    return false;	
		}
	}
	else 
	{
		alert("No se ha configurado esta opción");
		return false;	
	}

	var txtWidth = "900px" ;
	var txtHeight = "600px";
	var txtToolbar = "yes";
	var txtMenubar = "yes";
	var txtResizable = "yes" ;
	var txtStatus = "no";
	var txtScrollbars = "no";
	var options = "location=no, top=100px, left=200px, ";
	options = options + "width="+txtWidth+", ";
	options = options + "height="+txtHeight+", ";
	options = options + "toolbar="+txtToolbar+", ";
	options = options + "menubar="+txtMenubar+", ";
	options = options + "resizable="+txtResizable+", ";
	options = options + "status="+txtStatus+", ";
	options = options + "scrollbars="+txtScrollbars+"";
	var window_sure = window.open( txtUrl, "pop_up_sure", options);
}
/* *********************************************************************************************************** */


/* *********************************************************************************************************** */


function Archivo(a){
   //alert(a);
		var x=0;
		var StrArray=a.split("/");
		var frm=StrArray[2];
		var div=StrArray[1];
		var file=StrArray[0];
		for(x=0; x < document.forms[frm].length-1; x++)
			{
				if(document.forms[frm].elements[x].name == StrArray[1])
				{
					document.forms[frm].elements[x].value = StrArray[0];
					$.post("AJAX_Archivo.php", { archivo: file } , function(data){
					$("#ARC_"+div).html(data);
					})
				}

			}
	}




/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
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
	var window_sure = window.open( txtUrl, "pop_up_sure", options);
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function loadBodyFormsTabs(div, idForm, rolId, tableId) {
	var url = 'DOMO_DisplayMenuTabs.php?';
	$(".DOMO_Relations").hide();
	$("#DOMO_Div_Body").show();
	$("#DOMO_Div_Body").css('height', '');
	
	$.get( url + "idForm=" + idForm + "&rolId=" + rolId + "&tablelId=" + tableId, function (data) {
		$(div).html(data);
	});
	
	ocultar_script(); //oculta el script de ayuda definido en functionsDomoIndex.js 
	
	a = $(div).attr("style");
	if(a["display"] == "none") {
		$(div).slideToggle();
	}
	else {
		$(div).slideDown();
	}
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function TabDivBodyShow() {

	var str_cmp = 'CSS/IMG_DEF/ICO_Contraer.gif';
	$("#DOMO_Div_Body").slideToggle();
	if($("#imgTabShow").attr('src') == str_cmp) {
		$("#imgTabShow").attr({ 
			src: "CSS/IMG_DEF/ICO_Contraer.gif",
			title: "",
			alt: "Mostrar"
		});
	}
	else {
		$("#imgTabShow").attr({ 
			src: "CSS/IMG_DEF/ICO_Contraer.gif",
			title: "",
			alt: "Ocultar"
		});
	}
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function loadDomoBodyTabs(id) {
	var div_relations_hide = "#DOMO_Relations_" + id;
	$("#DOMO_Div_Body").show();
	$(div_relations_hide).hide();
	
	loadBody("DOMO_body.php?idForm=", id );
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function showhide_relation(div) {
	a = $(div).attr("style");
	if(a["display"] == "none") {
		$(div).slideDown();
	}
	else {
		$(div).slideToggle();
	}
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function TdListForm(id_td) {
	var cls_id_td = "#tdMenuFormRelac_" + id_td;
	var txt_id_td = "#txtTdMenuFormRelac_" + id_td;
	$(".tdMenuFormRelac").css('background-color', '');
	$(".txtTdMenuFormRelac").css('color', '');
	$(txt_id_td).css('color', '#ffffff');
	$(cls_id_td).css('background-color', '#BCC7D6');
	$(".txtDOMOTituloForm").css('color', '#642021');
}
/* *********************************************************************************************************** */





function enviarDatos(dato)
{
	//recupera en un archivo el contenido de lo desplegado por el Form::diplayForm
	
	/*
		$.post("escribeArchivo.php", { datos: dato },
   function(data){
     alert("Data Loaded: " + data);
   });
*/
	
	}


/* *********************************************************************************************************** */
function loadBody(url, idForm) {
	var d = new Date();
	var var_class_A = "tdMenuInactivo";
	var var_class_B = "tdMenuActivo";
	var id_a_idform = "#a_idform_" + idForm;
	var img_id_form = "#imgIdForm_" + idForm;
	var id_td_inactivo = "#tdIdInactivo_" + idForm;
	
	var menuFormuarioActivo = "#menuFormulario_" + idForm;
	
	
	$(id_a_idform).css('color', 'navy');
	
	
	//revisar 
	$('.menuFormulario span').css({'background-color' : '#ffffff', 'font-weight' : ''});
	$('.menuFormulario .activo').addClass('file').removeClass('activo');

	$(menuFormuarioActivo+' .file').addClass('activo').removeClass('file');

	
	$(menuFormuarioActivo+' .activo').css({'background-color' : '#F5FBEF', 'font-weight' : '' });
	
	 //fin revisar 
	 
	 
	// .filetree span.file
	 
	 
	//$(menuFormuarioActivo+' span').css("background-color","#CEE3F6");
	//$(menuFormuarioActivo+' span').css({"background-color" : "#CEE3F6", 'background-image' : 'url(/myimage.jpg)' } );
	//$("ul >li > span").css("background-color","#CEE3F6");
  
	$("#DOMO_Div_Body").css('height', '');
	$("#DOMO_Div_Body").show();
	//$(".DOMO_aForm").css('color', '#333333');
	
	
	

	$(".txtDOMOTituloForm").css('color', '#000000');
	$("#DOMO_Div_Body_Relacion").hide();
	$("#DOMO_Div_Titulos_Relacion").hide();
	
	$.get(url + idForm  + "&nocache=" + d, function (data) {
		//alert(url + idForm );
		$("#DOMO_Div_Body").html(quitar_filtro(data));
		
		enviarDatos(quitar_filtro(data));

		
		popUpCal.init();
	});
	
	
	/*
	$.get("DOMO_Relacion.php?idForm=" + idForm + "&nocache=" + d, function (data) {
		$("#DOMO_Relations").html(data);
		popUpCal.init();
	});
	
	$.get("DOMO_Relacion_Form.php?idForm=" + idForm + "&nocache=" + d, function (data) {
		$("#DOMO_Div_Body_Relacion").html(data);
		popUpCal.init();
	});	
	*/
	
	tm=9999999;	
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
/*
 * loadBodyConRelaciones:: es llamada cuando se hace click en un view 
 * 						   y se muestra el viewrow *
 */
function loadBodyConRelaciones(url, idForm, url2, param, idFormDisplay) {
	
	var d = new Date();
	var div_display = "#DOMO_Relations_"+idFormDisplay;
	$(div_display).show();
	$("#DOMO_Div_Body_Relacion").show();
	
	$.get(url + idForm + url2 + param + "&nocache=" + d, function (data) {
		
		$("#DOMO_Div_Body").html(quitar_filtro(data));
		popUpCal.init();					
	});

	$.get("DOMO_Relacion.php?idForm=" + idForm + url2 + param + "&nocache=" + d, function (data) {
																						   
		if(data){
		$(div_display).html(quitar_filtro(data));
		}
		popUpCal.init();
	});
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function loadBodyRelacion(url , idForm , url2 , param , url3, tablaRelacion, url4 , tabla , url5, formularios, idFormTitulo) {
	if(idFormTitulo==null) {
		idFormTitulo=idForm;
	}
	$("#DOMO_Div_Titulos_Relacion").show();
	var d = new Date();
	$.get( url + idForm + url2 + param + url3 + tablaRelacion + url4 + tabla + url5 + formularios + "&nocache=" + d, function (data) {
		$("#DOMO_Div_Body_Relacion").html(data);
		$("#DOMO_Div_Body").slideUp(1000); // MARCA
		//$("#DOMO_Div_Body").slideDown(1000); // MARCA
		$("#DOMO_Div_Body_Relacion").show();
		
		popUpCal.init();
	});
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function otroReg( url, idForm) {
	var d = new Date();
	IniciarCrono ();
	$.get("DOMO_indicadores.php?nocache=" + d, function (data) {
		$("#DOMO_Div_Relations").html(data);
		popUpCal.init();
	})

	$.get(url + idForm  + "&nocache=" + d, function (data) {
		$("#DOMO_Div_Body").html(data);
		popUpCal.init();
	});
	
	$("div[@name=time]").hide();
	estado = false;
	tm=9999999;
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function tomarDescanso() {
	alert("En descanso Aprete Aceptar para Continuar");
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function loadBodyInicial(url2, tel) {
	var d = new Date();
	
	$.get(url2  + tel + "&nocache=" + d, function (data) {
		$("#DOMO_Div_CTI").html(data);
		popUpCal.init();
	});

}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function loadBodyDos(url, idForm, url2 ,pagActual, url3 , idResp, url4, idLlamada) {
	var d = new Date();
	$.get(url + idForm + url2 + pagActual + url3 + idResp + url4 + idLlamada + "&nocache=" + d, function (data) {
		$("#DOMO_Div_Body").html(quitar_filtro(data));
		popUpCal.init();
	});
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function FinCarga(url, idForm, url2 ,pagActual, url3 , idResp, url4, idLlamada , url5, FormActivo) {
	window.onload(loadBodyDosForms(url, idForm, url2 ,pagActual, url3 , idResp, url4, idLlamada , url5, FormActivo));
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function valida_single(valor) { 
    //valido el single 
	if(valor == 0) {
		alert("Debe seleccionar una opcion.")    
	} 
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function filtro_textarea (contenido) {
	//alert("entrada filtro: "+contenido);
	//CONVIERTO CARACTERES MAS COMUNES A ASCII
	contenido = contenido.replace( /\á/g,'&aacute;');
	contenido = contenido.replace( /\é/g,'&eacute;');
    contenido = contenido.replace( /\í/g,'&iacute;');
	contenido = contenido.replace( /\ó/g,'&oacute;');
	contenido = contenido.replace( /\ú/g,'&uacute;');
	contenido = contenido.replace( /\Á/g,'&Aacute;');
	contenido = contenido.replace( /\É/g,'&Eacute;');
    contenido = contenido.replace( /\Í/g,'&Iacute;');
	contenido = contenido.replace( /\Ó/g,'&Oacute;');
	contenido = contenido.replace( /\Ú/g,'&Uacute;');	
	contenido = contenido.replace( /\ñ/g,'&ntilde;');
	contenido = contenido.replace( /\Ñ/g,'&Ntilde;');
	
	contenido = contenido.replace( /\¿/g,'&iquest;');
	contenido = contenido.replace( /\¨/g,'&uml;');
	contenido = contenido.replace( /\¡/g,'&iexcl;');
	contenido = contenido.replace( /\°/g,'&deg;');
	contenido = contenido.replace( /\¬/g,'&not;');
	//FINALMENTE PASO TODO A -AND-
	contenido = contenido.replace( /\&/g,'#AND#');
	contenido = contenido.replace( /\'/g,'#C_S#');
	contenido = contenido.replace( /\"/g,'#C_D#');
	contenido = contenido.replace( /\+/g,'#_P_#'); //mas
	contenido = contenido.replace( /\´/g,'#A_C#'); //Acento
	
	//alert("salida filtro: "+contenido);
	
	return contenido;
}
/* *********************************************************************************************************** */




/* *********************************************************************************************************** */
function quitar_filtro(contenido) {
	//alert("quitar filtro");
	//CONVIERTO CARACTERES MAS COMUNES A ASCII
	
	
	contenido = contenido.replace( /\#AND#/g,'&');
	contenido = contenido.replace(/\&nbsp;/g,' ');
	contenido = contenido.replace(/\&aacute;/g,'á');
	contenido = contenido.replace(/\&eacute;/g,'é');
    contenido = contenido.replace(/\&iacute;/g,'í');
	contenido = contenido.replace(/\&oacute;/g,'ó');
	contenido = contenido.replace(/\&uacute;/g,'ú');
	contenido = contenido.replace(/\&Aacute;/g,'Á');
	contenido = contenido.replace(/\&Eacute;/g,'É');
    contenido = contenido.replace(/\&Iacute;/g,'Í');
	contenido = contenido.replace(/\&Oacute;/g,'Ó');
	contenido = contenido.replace(/\&Uacute;/g,'Ú');	
	contenido = contenido.replace( /\&ntilde;/g,'ñ');
	contenido = contenido.replace( /\&Ntilde;/g,'Ñ');
	contenido = contenido.replace( /\&iquest;/g,'¿');
	contenido = contenido.replace( /\&uml;/g,'¨');
	contenido = contenido.replace( /\&iexcl;/g,'¡');
	contenido = contenido.replace( /\&deg;/g,'°');
	contenido = contenido.replace( /\&not;/g,'¬');
	//FINALMENTE PASO TODO A -AND-
	
	contenido = contenido.replace( /\#C_S#/g,"'");
	contenido = contenido.replace( /\#C_D#/g,'"');
	contenido = contenido.replace( /\#A_C#/g,'´'); //Acento
	contenido = contenido.replace( /\#_P_#/g,'+'); //signo mas
	
	
	return contenido;
}
/* *********************************************************************************************************** */



/* *********************************************************************************************************** */
function formSubmitAgenda(url, frm, idForm) {
	var param = "";
	var x=0;
	var aux = 0;
	for(x=0; x < document.forms[frm].length-1; x++) {
		var strClass;
		strClass = $( "#" + document.forms[frm].elements[x].name).attr("clase");
		if( strClass == "calendario") {
			aaa = document.forms[frm].elements[x].value;
			if(aaa != "") {
				var now = new Date();
				nowdate = now.getFullYear() +''+ (now.getMonth()+1) +''+ now.getDate() 
				if(now.getDate() < 10) {
					nowdate = now.getFullYear() +''+ (now.getMonth()+1) +'0'+ now.getDate() 
				}
				else {
					nowdate = now.getFullYear() +''+ (now.getMonth()+1) +''+ now.getDate() 
				}
				aaadate = "20"+aaa.substring( 8, 10) + "" + aaa.substring( 3, 5) + "" + aaa.substring( 0, 2);
				if(aaadate >= nowdate) {
					param += "&" + document.forms[frm].elements[x].name + "=";
					param += aaa.substring( 8, 10) + "/" + aaa.substring( 3, 5) + "/" + aaa.substring( 0, 2);	
					aux=1;
				}
				else {
					alert('La fecha de Agendamiento debe ser mayor o igual a la del dia de hoy');
					document.forms[frm].elements[x].focus();
				}
			}
			else {
				alert('Debe ingresar una fecha de Agendamiento');
				document.forms[frm].elements[x].focus();
			}
		}
		else {
			param += "&" + document.forms[frm].elements[x].name + "=" + document.forms[frm].elements[x].value;	
		}
	}
	if(aux==1) {
		loadBodyDosForms( url + param, idForm, '' ,'', '' , '', '', '' ,'','' ,'', '' ,'', 3);
	}
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function viewMouseOver(var_id, var_class_A, var_class_B) {
	$("#" + var_id).removeClass(var_class_A);
	$("#" + var_id).addClass(var_class_B);
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function viewMouseOut(var_id, var_class_A, var_class_B) {
	$("#" + var_id).removeClass(var_class_B);
	$("#" + var_id).addClass(var_class_A);
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function viewClick(idData) {
	loadBody( "" );
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function loadAttributes(idForm) {
//alert('loadAttributes= ' + idForm);
	var d = new Date();
	var idForm_tmp = idForm.split("_");
	idForm = idForm_tmp[0];

	$.get("AJAX_DOMO_Search.php?act=attributes&id=" + idForm + "&nocache=" + d, function (data) {
		$("#divAttributesSearch").html( data );
	});   
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function search_data(idForm, idAttribute, Val, fechaIni, fechaTer) {
	var d = new Date();
	//alert("form: "+idForm);
	//alert("ID ATRIBUTE: "+idAttribute);
	//alert("Valor: "+Val);
	//alert(fechaIni);
	//alert(fechaTer);
	$.get("AJAX_DOMO_SearchResult.php?a=" + idForm + "&b=" + idAttribute + "&c=" + Val + "&d=" + fechaIni + "&e=" + fechaTer + "&nocache="+d,
    	function(data)
		{	
		    var aux = data.split("&");
			var aux2 = aux[1].split("="); 
			if(aux2[1] != 'noreg')
			{
		     	loadBody("DOMO_body.php?" + data ,idForm);
			//alert(data);
			}
		
		    else 
			{
				alert("No existen resultados para esta busqueda");	
			}		
		
		});
	
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function popupScreen(url) {
	var w = window.open( url, "", "toolbar=no, location=no, menubar=no, resize=no, width=250px, height=300px, top=100px, left=100px");		
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function popupFile( url ) {
	var w = window.open( url, "", "toolbar=no, location=no, menubar=no, resize=no, width=340px, height=160px, top=200px, left=400px");		
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function cambia_lookup(a,b) {
	
	var i=0;
	var j=1;
	var temp1= 0;
	var temp2 = 0;
	temp1 = '';
	var i=0;
	var j=1;
	var temp1= 0;
	var temp2 = 0;
	temp1 = '';
	//alert(b);//

$("#"+b+"").html("<option value='0'>Cargando:::::::</option>"); //jquery1.2.6
//$('select[@name="+b+"]').html("<option value='0'>Cargando:::::::</option>"); //jquery1.2.2 hacia atras
	
	$.post('ajax_lookup.php', { estado : a.value}, function(respuesta){
		//$('select[@name='+b+']').html(respuesta);//jquery1.2.2 hacia atras
		$("#"+b+"").html(respuesta); //jquery1.2.6
		//alert(respuesta);
	});
}
/* *********************************************************************************************************** */


function ocultar_script()
{
		try{
			cerrar_pop();
		}
		catch(object)
		{
		
		}
}


/* *********************************************************************************************************** */
function cambia_lookup_script(a,b)
{
	if(a.value!=0 || a.value !="")
	{
		//alert("el combo origianl : "+ a.value);
		//alert ("el combo siguiente " + b );
		var i=0;
		var j=1;
		var temp1= 0;
		var temp2 = 0;
		temp1 = '';
		var i=0;
		var j=1;
		var temp1= 0;
		var temp2 = 0;
		temp1 = '';
		//alert("a: "+a.value+" b:"+b)
		$('#html_script').show();
		$('#html_script').html('Cargando...');
		$.post('ajax_lookup_script.php',
			//{ estado : $(this).val() },
			{ estado : a.value},
			function(respuesta)
			{
				respuesta= quitar_filtro(respuesta);
				 
				
				if(respuesta.length>20){ //si el nivel2 tiene script
					$('#script_ayuda_cuerpo').html(respuesta);
					$('#html_script').hide();
					abrir_pop();
				}
				else{
					$('#script_ayuda_cuerpo').html('');
					$('#html_script').hide();
					cerrar_pop();
				}
				
				
				
				
			}
		);
	}
	else 
	{	
	
		ocultar_script();
		
	}
}

/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function popupMsj( url )
{	var w = window.open( url, "", "toolbar=no, location=no, menubar=no, resizable=no, width=390px, height=210px, top=200px, left=400px");		
}
/* *********************************************************************************************************** */


/* *********************************************************************************************************** */
function showhide(div) {
	a = $(div).attr("style");
	if (a["display"] == "none") {
		$(div).slideDown();
	}
	else {
		$(div).slideToggle();
	}
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function startTime() {
	var today=new Date();
	var h=today.getHours();
	var m=today.getMinutes();
	var s=today.getSeconds();
	m=checkTime(m);
	s=checkTime(s);
	document.getElementById('spanTime').innerHTML=h+":"+m+":"+s;
	t=setTimeout('startTime()',500);
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function checkTime(i) {
	if (i<10) {
		i="0" + i;
	}
	return i;
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function checkTime2(i) {
	if (i<10) {
		i="0" + i;
	}
	return i;
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function checkHora(i) {
	if (i>24) {
		i=i%24;
	}
	if(i==24)
		i="00";
	return i
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function start() {
	startTime();
	startTime2();
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function popup(url) {	
	var w = window.open( url, "", 
		"scrollbars = no,toolbar=no, location=no, menubar=no, resize=no, width=320px, height=420px, top=200px, left=200px");
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */

function validateForm(frm) {
	var ok = true;
	//alert(document.forms[ frm ].length-1);
	for(x=0; x < document.forms[ frm ].length-1; x++) {
		
		//alert( "entrando campo " + x + "nombre: "   document.forms[ frm ].elements[x].name   + "" );
		//alert(x);
		if( $("#" + document.forms[ frm ].elements[x].name).attr("class") != null) {
			//alert (  $("#" + document.forms[ frm ].elements[x].name).attr("class")  + "----"+$("#" + document.forms[ frm ].elements[x].name).attr("classCalendario")  );
			//alert("dad");
			if($("#" + document.forms[ frm ].elements[x].name).attr("class").match("required")) {
				//alert("requerido")
				if(document.forms[ frm ].elements[x].value == '') {
				   // alert(document.forms[ frm ].elements[x].name+ ":" + document.forms[ frm ].elements[x].value )
					ok = false;
					if($("#" + document.forms[ frm ].elements[x].name).attr("class2").match("single")) {
						strClass = $( "#" + document.forms[ frm ].elements[x].name).attr("clase");
						var pos;
						//alert ("aca toi"+strClass);
						pos = strClass.split("/");
						alert ("El campo \"" + document.forms[ frm ].elements[x].title + "\" debe tener una opcion seleccionada");
					}
					else {
						alert("El campo \"" + document.forms[ frm ].elements[x].title + "\" no puede estar en blanco");
					}
					try{
							document.forms[ frm ].elements[x].focus();
						}
						catch(object)
						{ 
							
						}
					break; 
				}
				var nombre_campo = document.forms[ frm ].elements[x].name;
				
				if(document.forms[ frm ].elements[x].value == 0 ) {	
					ok = false; 
					if($("#" + document.forms[ frm ].elements[x].name).attr("class2").match("single")) {
						strClass = $( "#" + document.forms[ frm ].elements[x].name).attr("clase");
						var pos;
						//alert ("aca toi"+strClass);
						pos = strClass.split("/");
						alert ("El campo \"" + document.forms[ frm ].elements[x].title + "\" debe tener una opcion seleccionada");
						try{
							document.forms[ frm ].elements[x].focus();
						}
						catch(object)
						{ 
							
						}
					}
					else {
					   //alert(document.forms[ frm ].elements[x].name);
						alert("El campo \"" + document.forms[ frm ].elements[x].title + "\" no puede estar en blanco");
					}
					try{
							document.forms[ frm ].elements[x].focus();
						}
						catch(object)
						{ 
							
						}
					
					break; 
				}
				
				
			}
			if($("#" + document.forms[ frm ].elements[x].name).attr("classCalendario") != null) {
				if($("#" + document.forms[ frm ].elements[x].name).attr("classCalendario").match("required")) {
					if(document.forms[ frm ].elements[x].value == '' ) {
						ok = false;
						alert("El campo \"" + document.forms[ frm ].elements[x].title + "\" no puede estar en blanco");
						
						try{
							document.forms[ frm ].elements[x].focus();
						}
						catch(object)
						{ 
							
						}
						
						break; 
					}
				}
			}
			if($("#" + document.forms[ frm ].elements[x].name).attr("class2").match("email")) {
				//alert (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.forms[ frm ].elements[x].value ));
				if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.forms[ frm ].elements[x].value))) {
					if(document.forms[ frm ].elements[x].value != "") {
						ok = false;	
						alert("El campo \"" + document.forms[ frm ].elements[x].title + "\" debe ser un e-mail válido");
						try{
							document.forms[ frm ].elements[x].focus();
						}
						catch(object)
						{ 
							
						}
						
						break; 
					}
				}
			}
		 
			if($("#" + document.forms[ frm ].elements[x].name).attr("class2").match("rut")) {
				//alert (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.forms[ frm ].elements[x].value ));
				//alert ( document.forms[ frm ].elements[x].value  );
				//alert ( Valida_Rut(document.forms[ frm ].elements[x]  )  ) ;
				//srubio se modifica  js para validacion de rut
				//alert ("hola- validando al rut"+document.forms[frm].elements[x].value );
				if(!(Valida_Rut(document.forms[frm].elements[x]))) {
					if(document.forms[frm].elements[x].value != "") {
						ok = false;	
						alert("Debe ingresar Rut Valido");
						
						try{
							document.forms[ frm ].elements[x].focus();
						}
						catch(object)
						{ 
							
						}
					
						break; 
					}
					else {
						
						ok = false;	
						alert("Debe ingresar un valor para el Rut");
						try{
							document.forms[ frm ].elements[x].focus();
						}
						catch(object)
						{ 
							
						}
						
						break; 
						}
				}
				//alert("saliendo con:"+ok);
				//$rutformato = formato(document.forms[ frm ].elements[x]);
				//alert ($rutformato);
				//document.forms[ frm ].elements[x].value = $rutformato;
				//break;
			}	
			//hasta aca
			
			
			
			///////////////PARCHE PARA FINNING RRHH
			if(document.forms[ frm ].elements[x].name == "especialista_asignado" 
				&& document.forms[ frm ].elements[x].value == 0 ) 
				{		
					try{
						if(document.forms[ frm ].gestion.value == '3/gestion/0'){
							alert ("Seleccione especialista para hacer la derivacion");
							ok = false;	
							try{
							document.forms[ frm ].elements[x].focus();
							}
							catch(object)
							{ 
								
							}
							
							break; 
						}
					}
					catch(object){ 
							break;
					}
				}
			///////////// FIN PARCHE
		} 
	}
	
	if (ok ===true){
	ocultar_script(); //oculta el div de script de ayuda si es que se esta mostrando.
	}
	
	return ok;
}

/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function formSubmitRelacion( url, frm, idForm, idFormTitulo){
	var param = "";
	var x=0;
	var html_post="";
	if(validateForm(frm)) {
		for(x=0; x < document.forms[frm].length-1; x++) {
			if(document.forms[frm].elements[x].type != 'button' && $("#" + document.forms[frm].elements[x].name).attr("clase") !=null ) {
				if(document.forms[frm].elements[x].type != 'checkbox') {
					var strClass;
					strClass = $( "#" + document.forms[frm].elements[x].name).attr("clase");
					var pos;
					pos = strClass.split("/");
					if(strClass) { 
						strClass = strClass.replace(' ','');
					}
					else {
						strClass = "";
					}
					if(strClass == "calendarSelectDate") {
						param += "&" + document.forms[frm].elements[x].name + "=";
						aaa = document.forms[frm].elements[x].value;
						param += aaa.substring( 8, 10) + "/" + aaa.substring( 3, 5) + "/" + aaa.substring( 0, 2);	
					}
					else {
						if(strClass == "single") {
							valida_single(document.forms[frm].elements[x].value );
						}
						else {
							if(strClass == "textarea_html") {
								html_post = document.forms[frm].elements[x].name + "=" + html_marco.html_contenido.document.body.innerHTML+"" ;	
								html_post= filtro_textarea (html_post);
								if(html_post.length<301) {
									param += "&" + html_post; 
								}
							}
							else {
								param += "&" + document.forms[frm].elements[x].name + "=" + document.forms[frm].elements[x].value;	
							}
						}
					}
				}
				else {
					if(document.forms[frm].elements[x].checked == true) {
						param += "&" + document.forms[frm].elements[x].name + "=" + document.forms[frm].elements[x].value;	
					}
				}
			}
		}
		var formularios = 1;
		html_post= filtro_textarea (html_post);
		if(html_post.length>300) {
			if(html_post.length>3500) {
				alert("El texto ("+html_post.length+" caracteres) excede el máximo permitido (3500 caracteres incluyendo espacios), editelo para poder guardar");
			}
			else {
				loadBodyRelacionPost(url+param , idForm , '' ,'' , '', '', '', '' , '&formularios=', formularios, idFormTitulo,html_post)
			}
		}
		else {
			loadBodyRelacion(url+param , idForm , '' ,'' , '', '', '', '' , '&formularios=', formularios, idFormTitulo);
		}
	}
	else
	{	/*alert("Algo paso... (index)");*/	}
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function resetFormSearch() {
	var formS = document.frmSearch;
	formS.desde.value = '';
	formS.hasta.value = '';
	formS.txtValueSearch.value = '';
	
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function ordenar(columna, idForm, url){
	$.post("DOMO_filtro.php?columna="+columna+"&idform="+idForm);		  
	loadBody(url, idForm);
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function Search(namefrm, frm, attr, attrvalue) {
	var txtAttSearch = frm + "/" + attr + "/" + attrvalue;
	if(frm == '' || attr == '' || attrvalue == '') {
		alert("Debe Ingresar un Valor en el Campo a Buscar");
	}
	else {
		$.post('AJAX_BusquedaAttr.php', { txtstrSearch : txtAttSearch}, function(respuesta){
			$('text[@name='+attr+']').html(respuesta);
			ResultArray = respuesta;
			ResultArray = ResultArray.split("/");
			for(i=2;i<= ResultArray.length-1;i++) {
				FieldValue = ResultArray[i].split("~");
				for(x=0; x < document.forms[namefrm].length-1; x++) {
					if(document.forms[namefrm].elements[x].name == FieldValue[0]) {
						document.forms[namefrm].elements[x].value = FieldValue[1];
						if(x!=0)
							document.forms[namefrm].elements[x].disabled = 'true';
					}
				}
			}
		});
		
	}
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function cerrar() {
	ventana.close();
	ventana = false;
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function cierraventana(){
	window.opener=self;
	window.close();
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function cierraventana_ie7(){
	window.open('','_parent','');
	window.close();
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function closeWindows(){
	window.opener=self;
	window.close;
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
function maximizar(){
	window.moveTo(0,0);
	window.resizeTo(screen.width,screen.height);
	/*window.focus();*/
	if (window != window.top) {
		top.location.href = location.href;
	}
}
/* *********************************************************************************************************** */

/* *********************************************************************************************************** */
var ieVer=/*@cc_on function(){ switch(@_jscript_version){ case 1.0:return 3; case 3.0:return 4; case 5.0:return 5; case 5.1:return 5; case 5.5:return 5.5; case 5.6:return 6; case 5.7:return 7; case 5.8:return 8; }}()||@*/0;
if(/MSIE 6.0/i.test(navigator.userAgent)) {ieVer=6;}
/* *********************************************************************************************************** */