function onlyNumeric(e)
{	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8) return true;
	patron =/[0-9]/;
	tecla_final = String.fromCharCode(tecla);
	if (!patron.test(tecla_final))
	{ e.keyCode = 0;  }
}
var textoAnterior = '';
var id = '';


miExpRegular = /[0-9]+/g



function onlyMoney(e)
{
  //VARIABLE GLOBAL
    
	
	if (e.id!=id ){
	textoAnterior = '0';
	id=e.id;
	
	}
    
	revisaCadena(e);
    //ESTA FUNCIÓN DEFINE LAS REGLAS DEL JUEGO
    function cumpleReglas(simpleTexto)
        {
            //la pasamos por una poderosa expresión regular
            var expresion = new RegExp("^(|([0-9]+(\\.([0-9]{1,2})?)?))$");

            //si pasa la prueba, es válida
            if(expresion.test(simpleTexto))
                return true;
            return false;
        }//end function checaReglas

    //ESTA FUNCIÓN REVISA QUE TODO LO QUE SE ESCRIBA ESTÉ EN ORDEN
    function revisaCadena(textItem)
        {
            //si comienza con un punto, le agregamos un cero
            if(textItem.value.substring(0,1) == '.') 
                textItem.value = '0' + textItem.value;

            //si no cumples las reglas, no te dejo escribir
            if(!cumpleReglas(textItem.value))
               textItem.value = textoAnterior;
            else //todo en orden
                textoAnterior = textItem.value;
        }//end function revisaCadena
}