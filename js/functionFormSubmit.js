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
					
					//alert(pos[0]+" = "+document.forms[frm].elements[x].value);
					
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
							if(pos[0] == "text_html") {
								//alert("hay text_html : " + document.forms[frm].elements[x].value);
								html_post = document.forms[frm].elements[x].name + "=" + document.forms[frm].elements[x].value+"" ;	
								html_post= filtro_textarea(html_post);
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
			
			if(html_post.length > 3500){
				alert("El texto ("+html_post.length+" caracteres) excede el máximo permitido (3500 caracteres incluyendo espacios), editelo para poder guardar");
			}
			else{
				
				try{
				
				//el html_post viene filtrado y se agrega al param.
							
				loadBodyDosForms( url + param, idForm, '' , '' ,'', '' , '', '', '' ,'','' ,'', '' ,'&estadoScreen='+ estadoScreen, idFormTitulo,html_post);
				}catch(o) {
					
					alert("condoro 2 Error: " + o.description +" " +o.number +" "+ o.message +"\n\n");
				}
			
			
			
			}
		}
		else {
			
			loadBodyDosForms( url + param, idForm, '' , '' ,'', '' , '', '', '' ,'','' ,'', '' ,'&estadoScreen=', estadoScreen, idFormTitulo);
		
		}
		
		ocultar_script(); //oculta el script de ayuda definido en functionsDomoIndex.js
	
	}
	else
	{	/*alert("Algo paso... (index)");*/	}
}
/* *********************************************************************************************************** */