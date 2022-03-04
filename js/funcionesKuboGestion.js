 

function pop_up_simulador(txtUrl, txtWidth, txtHeight, txtToolbar, txtMenubar, 
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
	var w = window.open( txtUrl, "simulador", options);
	w.focus();
}

function pop_up_detalle_deuda(txtUrl, txtWidth, txtHeight, txtToolbar, txtMenubar, 

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

	var w = window.open( txtUrl, "detalle_deuda", options);

	w.focus();

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
        
		
			function historial_gestiones(id_cliente, id_campana) 

	{

		 pop_up('http://localhost/cencosud//index.php/gestion/get_historial/'+id_cliente+'/'+id_campana+'/', '790', '200', 'no', 'no', 

				'yes', 'no', 'yes');

	

	}



	

	function carga_div_telefonos(id_cliente)

	{

	

	var r = new Date().getTime();

	var url='http://localhost/cencosud/index.php/telefono/form_carga_div_telefonos/'+id_cliente+'/';

					$.post(url+ r, { 'id_cliente':id_cliente }, function(data) {

						$('#div_telefono').html(data);

					});	

	

	}

	

	function carga_div_direcciones(id_cliente)

	{

	var r = new Date().getTime();

	var url='http://localhost/cencosud/index.php/direccion/form_carga_div_direcciones/'+id_cliente+'/';

					$.post(url+ r, { 'id_cliente':id_cliente }, function(data) {

						$('#div_direccion').html(data);

					});	

	

	}



	function carga_div_email(id_cliente)

	{

	var r = new Date().getTime();

	var url='http://localhost/cencosud/index.php/email/form_carga_div_email/'+id_cliente+'/';

					$.post(url + r, { 'id_cliente':id_cliente }, function(data) {

						$('#div_email').html(data);

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


	