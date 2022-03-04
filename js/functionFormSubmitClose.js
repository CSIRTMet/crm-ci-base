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
function formSubmit( url, frm, idForm ,estadoScreen, idFormTitulo) {
	var param = "";
	var x=0;
	var html_post = "";
	if(validateForm(frm)){
		for (x=0; x < document.forms[frm].length-1; x++) {
			if(document.forms[frm].elements[x].type != 'button' && $("#" + document.forms[frm].elements[x].name).attr("clase") !=null ) {
				if( document.forms[frm].elements[x].type != 'checkbox' ) {
					var strClass;
					strClass = $( "#" + document.forms[frm].elements[x].name).attr("clase");
					var pos;
					pos = strClass.split("/");
					if ( strClass ) 
					{  strClass = strClass.replace(' ',''); }
					else
					{ strClass = ""; }
					if ( strClass == "calendarSelectDate") {
						param += "&" + document.forms[frm].elements[x].name + "=";
						aaa = document.forms[frm].elements[x].value;
						param += aaa.substring( 8, 10) + "/" + aaa.substring( 3, 5) + "/" + aaa.substring( 0, 2);	
					}
					else {
						if (strClass == "single") {
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
					if ( document.forms[frm].elements[x].checked == true){
						param += "&" + document.forms[frm].elements[x].name + "=" + document.forms[frm].elements[x].value;	
					}
				}
			}
		}
		if(html_post.length>300) {
			if(html_post.length>3500){
				alert("El texto ("+html_post.length+" caracteres) excede el máximo permitido (3500 caracteres incluyendo espacios), editelo para poder guardar");
			}
			else{
				//FILTRADO DEL POST PARA EVITAR & DENTRO DEL CONTENIDP;
				html_post= filtro_textarea (html_post);
				loadBodyDosFormsPost( url + param, idForm, '' , '' ,'', '' , '', '', '' ,'','' ,'', '' ,'&estadoScreen='+ estadoScreen, idFormTitulo,html_post);
			}
		}
		else {

			loadBodyDosForms( url + param, idForm, '' , '' ,'', '' , '', '', '' ,'','' ,'', '' ,'&estadoScreen=', estadoScreen, idFormTitulo);
			alert("Ticket Guardado se cerrara la ventana");
			cierraventana();
		}
	}
	else
	{	/*alert("Algo paso... (index)");*/	}
}
/* *********************************************************************************************************** */