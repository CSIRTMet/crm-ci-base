var aaaa = 0

function Reload_att_formula(type_Entity,nameatt,typeEntityFrom,vista,filtros){
strelem = get_resp(filtros);
if(vista=='')	vista = 0;
if(filtros=='')	strelem='';
if(type_Entity=='' && vista!='attribs' ){
	var objxx = "document.frmBody.tp_entidad"+nameatt+"[document.frmBody.tp_entidad"+nameatt+".selectedIndex].value"
	var strtype_Entity = eval(objxx)
}else
	strtype_Entity = type_Entity

var re1 = /__1/g
var re2 = /__2/g
var re3 = /__3/g
var re4 = /__4/g
var re5 = /__5/g
var re6 = /__6/g
strelem = strelem.replace(re1,"")
strelem = strelem.replace(re2,"")
strelem = strelem.replace(re3,"")
strelem = strelem.replace(re4,"")
strelem = strelem.replace(re5,"")
strelem = strelem.replace(re6,"")
var ParamExtras="";
if (type_Entity=1126088 && nameatt=='Cobertura'){
	if(document.frmBody.Producto){
		ParamExtras ="&IdProd="+document.frmBody.Producto.value
	}
}



if (vista=='attribs')
	StrIframe = 'document.all.Sel'+nameatt+'.src="../../h2_sales/asp/ComboBox_Attributes.asp?att='+nameatt+'&typeent=' + strtype_Entity + '&typeEntityFrom=' + typeEntityFrom + ParamExtras + '"';
else
	StrIframe = 'document.all.Sel'+nameatt+'.src="../../h2_sales/aspx/ComboBox_Type_Entity.aspx?att='+nameatt+'&typeent=' + strtype_Entity + '&typeEntityFrom=' + typeEntityFrom + '&IntView=' + vista + strelem + '&identity="+document.frmBody.IdEntity.value+ ParamExtras';

eval(StrIframe);
}
	
function get_resp(filtros){
var strelem, strval;
var arr_element;
var typeEntityFrom, str_tipo;
var bln_flag=0;

    strelem = '';
    strval  = '';	
    if(filtros!=''){
    //rescata respuesta que mandar como parametros	
    	arr_element = filtros.split(',');
    	for(i=0; i<(arr_element.length); i++){
    	    if (eval('document.frmBody.txt_' + arr_element[i])){
		    str_tipo = eval('document.frmBody.txt_' + arr_element[i] + '.type');
		    bln_flag=1;
	   	    if (str_tipo.indexOf("select-multiple")==-1){
			strval = eval('document.frmBody.txt_' + arr_element[i] + '.value');
			//Cheque si es fecha para agregar time
			if (typeof(eval('document.frmBody.timestamp_' +  arr_element[i])) != 'undefined')
				strval = strval + ' ' + eval('document.frmBody.timestamp_' +  arr_element[i] + '.value')
		    }else{
			str_tipo = eval('document.frmBody.txt_' + arr_element[i]);
			for (var j = 0; j < str_tipo.length; j++){
				if (strval=='')
					strval = str_tipo.options[j].text;
				else
					strval = strval + ',' + str_tipo.options[j].text;
			}
		    }
	    }
	    if (strval=='' && bln_flag==0){
	      if (typeof(eval('document.frmBody.' + arr_element[i])) != 'undefined'){
	    	str_tipo = eval('document.frmBody.' + arr_element[i] + '.type');

	   	if (str_tipo.indexOf("select")==-1){
			strval = eval('document.frmBody.' + arr_element[i] + '.value')
			if (typeof(eval('document.frmBody.timestamp_' +  arr_element[i])) != 'undefined')
				strval = strval + ' ' + eval('document.frmBody.timestamp_' +  arr_element[i] + '.value')
		}else{
			str_tipo = eval('document.frmBody.' + arr_element[i]);
			for (var j = 0; j < str_tipo.length; j++){
				if (str_tipo.options[j].selected == true)
					strval = str_tipo.options[j].text;
			}
		}
	      }
	    }
	    if (strelem.indexOf(arr_element[i])==-1)
	    	strelem += '&' + arr_element[i] + '=' + strval
	    
	    strval = ""
	}
    }
    return(strelem)
}	
function set_focus(){
if(document.frmBody.objtextactive.value!=0 && document.frmBody.objtextactive.value!='')
   return true
else
   return false
}
function vv(obj,NL)
{
  swOC = 1
  sw  = 1
  if(obj){
	if (obj.length < 11 && obj.length > 1)
	    obj.size = obj.length  
  }	    
  HideAll(NL)
  MM_showHideLayers('document.layers[\''+NL+'\']','document.all[\''+NL+'\']','show');
}  

function dd(obj,NL)
{
  swOC = 1
  sw   = 0
  MM_showHideLayers('document.layers[\''+NL+'\']','document.all[\''+NL+'\']','hide');
}  

function asigna(a)
{
	var oOption = document.createElement("OPTION");
	oOption.text=a;
	oOption.value=a;
	document.all.select1.add(oOption);
}
function agrega(b){
var obj,obj2,obj3,obj4,aa
var indice = document.frmBody.objactive.value
var zz = "document.frmBody."+document.frmBody.objtextactive.value+".tabIndex"
var NameLayer = 'DD'+document.frmBody.objtextactive.value
var Nametxt = document.frmBody.objtextactive.value
Nametxt = Nametxt.substr(4, Nametxt.length-4)

swOC = 0
   obj = b
   obj2 = "document.frmBody."+document.frmBody.objtextactive.value
   obj3 = "document.frmBody."+Nametxt


if(!b || obj.selectedIndex==-1)
  return
  
  

StrIframeVal = eval('document.all.pags'+Nametxt+'.src="nothing.htm"')

if(b.length==0)
   return

   obj2 = eval(obj2)
   obj3 = eval(obj3)
   
   obj2.value = obj[obj.selectedIndex].text
   
   var str_cambio=0;
   if(obj3){
      if (obj3.value!=obj[obj.selectedIndex].value){//cambio
      	AddAttribModif(Nametxt);
      	str_cambio=1;
      }	
      obj3.value = obj[obj.selectedIndex].value   
      
   }else{
      Nametxt = Nametxt.substr(0, Nametxt.length-2)
      obj3 = "document.frmBody."+Nametxt
      obj3 = eval(obj3)
      obj3[indice].value = obj[obj.selectedIndex].value
   }
Striframe = "document.all.Desc"+Nametxt+".src='../../h2_sales/asp/carga_desc.asp?id_entity=" + obj[obj.selectedIndex].value +"'"   
StriframeVer = "document.all.Desc"+Nametxt
if (eval(StriframeVer))
    eval(Striframe)

   //dd(obj)
   aa = dd(obj,NameLayer)
   
   obj2.focus()
   obj2.select()
  
  if (str_cambio==1){ 
    pre_formulas()
  }
}
function pre_formulas(){
var ObjName;
var Nametxt = document.frmBody.objtextactive.value;
   Nametxt = Nametxt.substr(4, Nametxt.length-4);
   var Nametxt_lo = document.frmBody.objtextactive.value;
   Nametxt_lo = Nametxt_lo.substr(4, Nametxt_lo.length-4);
   Nametxt_lo = 'hdn_' + Nametxt_lo + '_nlookup';

   var RowActiva = document.frmBody.objtextactive.value;
   var RowNoActiva = "";
   var ObjName = "";
   RowActiva = RowActiva.substr(RowActiva.length-3,RowActiva.length);
   if (RowActiva.search("__")==-1){
    	RowActiva = "_";
    	RowNoActiva = "__";
   }
		for (jj=1;jj<document.frmBody.length;jj++)
		{
			ObjName = document.frmBody.elements[jj].name
			var tmp_cfrmBody = document.frmBody.elements[jj].name
			var tmp_cfrmBody_resto = tmp_cfrmBody.substr(8,tmp_cfrmBody.length)
			tmp_cfrmBody = tmp_cfrmBody.substr(0,8)
			if (tmp_cfrmBody == 'formula_' && ObjName.search(RowActiva) != -1 && (ObjName.search(RowNoActiva)== -1 || ObjName.search(RowNoActiva)== 0))
			{
				var tmp_valor_cfrmBody=document.frmBody.elements[jj].value
				tmp_valor_cfrmBody = tmp_valor_cfrmBody.toUpperCase();

				midstring = " contains ";   
			}
		}		

}

function busca(indice,a,b,NL,att,type_entity,vista, filtros){
var obj,obj2,aa,i,StrIframe,StrTexto
var typeEntityFrom,StrTexto2,StrIframeVal,StrObj,Strtype_entity
var strelem;


if(document.frmBody.objtextactive.value==0 && window.event.keyCode==13){
  return
}  


StrObj = 'document.frmBody.tp_entidad'+att+'.value'
Strtype_entity = type_entity
typeEntityFrom = document.frmBody.type_entity.value;

if (Strtype_entity.search(",")!=-1)
   type_entity = eval(StrObj)

StrIframeVal = 'document.all.pags'+att+'.src'
if(eval(StrIframeVal)=='nothing.htm')
   aaaa = 0
else
   aaaa = 1   

aaaa = 0




if(window.event.keyCode==13){
   agrega(b)
   return 
}

if(window.event.keyCode==13 || window.event.keyCode==40){
   strelem = get_resp(filtros);
   
   if(vista=='')	vista=0;
   if(filtros=='')	strelem='';

   StrTexto  = 'document.frmBody.txt_'+att+'.value'
   StrTexto2  = 'document.frmBody.txt_'+att+'.focus()'

   //Parche para multiple	
   var re1 = /__1/g
   var re2 = /__2/g
   var re3 = /__3/g
   var re4 = /__4/g
   var re5 = /__5/g
   var re6 = /__6/g
   strelem = strelem.replace(re1,"")
   strelem = strelem.replace(re2,"")
   strelem = strelem.replace(re3,"")
   strelem = strelem.replace(re4,"")
   strelem = strelem.replace(re5,"")
   strelem = strelem.replace(re6,"")
   StrIframe = 'document.all.pags'+att+'.src="../../h2_sales/aspx/ComboBox_Type_Entity.aspx?typeent=' + type_entity + '&palabra=' + eval(StrTexto) + '&typeEntityFrom=' + typeEntityFrom + '&IntView=' + vista + strelem + '"'
   eval(StrIframe)
   eval(StrTexto2)
   aaaa = 1
}


if(aaaa==0)
   return

//if(a.tabIndex==0){
   obj = b
   obj2 = a
/*}*/


document.frmBody.objtextactive.value = obj2.name
document.frmBody.objactive.value     = indice

if(window.event.keyCode==13 || window.event.keyCode==40){
  aa = vv(obj,NL)
  return
}


total = obj.length

if (obj2.value=='')	obj.selectedIndex = 0

aa = vv(obj,NL)
document.frmBody.objtextactive.value = obj2.name
document.frmBody.objactive.value     = indice


var inicio = 0
var palabra = obj2.value + String.fromCharCode(window.event.keyCode)
var palabra2 = obj2.value + String.fromCharCode(window.event.keyCode+1)
palabra  = palabra.toUpperCase()
palabra2 = palabra2.toUpperCase()


if(inicio>0)
	inicio = obj.selectedIndex - 1
	
var StrTexto = ""
for (i=inicio; i < total; i++){
	StrTexto = obj[i].text
	StrTexto = StrTexto.toUpperCase( )
			
	if (palabra <= StrTexto.substr(0, palabra.length) && palabra2 > StrTexto.substr(0, palabra2.length)){
	     obj.selectedIndex = i + 11
	     obj.selectedIndex = i
	     if(palabra.length==1){
	        aa = "Num"+ palabra + " = " + i
	        eval(aa)
	     }
	     break    
      	}
}  

if(window.event.keyCode==40){
	obj.selectedIndex = i
	obj.focus()
}
}

function HideAll(NL){
var Alldivs,StrDiv
 Alldivs = document.getElementsByTagName('DIV')
 for(i=0; i<Alldivs.length;i++){
     StrDiv = Alldivs[i].id
     StrDiv = StrDiv.substr(0, 2)
     if(StrDiv=='DD'&& Alldivs[i].id != NL){
         Alldivs[i].style.visibility = "hidden"
     }
 }
} 

function check_id(indice,obj,name){
   return	
   var txtobj = "document.frmBody."+name+".value"
   var txtobj2 = "document.frmBody."+name+".value=''"
   var txtobj3 = "document.frmBody."+name+".tabIndex"
   var Nametxt

		if(eval(txtobj)=='')
		  obj.value = ''
	
		if(obj.value=='')
			  eval(txtobj2)
}

function change_att(dominio,nameiframe,name,id_orig){
  var objxx = "document.frmBody.tp_entidad"+name+"[document.frmBody.tp_entidad"+name+".selectedIndex].value"
  var Striframe = "document.all."+nameiframe+".src='browsercache/Cache_lookup_"+eval(objxx)+"_"+dominio+".htm'"
  eval(Striframe)
}

function change_att2(nameiframe){
  var Striframe = "document.all."+nameiframe+".src='nothing.htm'"
  eval(Striframe)
}

function Carga(type_entity,name,dominio){
    var objxx = "document.frmBody.tp_entidad"+name
    if(type_entity!=''){
            for (i=0; i < eval(objxx).length; i++){	    
            	if(eval(objxx)[i].value==type_entity){
            	   eval(objxx).selectedIndex = i
            	   eval(Striframe)
            	   break
            	}
            }
    }
}	

function MM_showHideLayers() { //v2.0
  var i, visStr, args, theObj;
  var posX=0, posY=0;
  
  args = MM_showHideLayers.arguments;
 
  for (i=0; i<(args.length-2); i+=3) { //with arg triples (objNS,objIE,visStr)
    visStr   = args[i+2];
    if (navigator.appName == 'Netscape' && document.layers != null) {
      theObj = eval(args[i]);
      if (theObj) theObj.visibility = visStr;
    } else if (document.all != null) { //IE
      if (visStr == 'show') visStr = 'visible'; //convert vals
      if (visStr == 'hide') visStr = 'hidden';
      theObj = eval(args[i+1]);
      if (theObj) theObj.style.visibility = visStr;
  } }
}


//mostrar(0,document.frmBody.txt_NombreSolicitante,window.frames['pagsNombreSolicitante'].document.all.sel_cache,'DDtxt_NombreSolicitante','1125870','NombreSolicitante','1341738','Origen')

function mostrar(indice,a,b,NL,type_Entity,nameatt,vista,filtros){
var obj,obj2
var aa,x
var strelem;
var typeEntityFrom;

//Parche para Interamericana
if(document.frmBody.tp_entidadOrigen){
  if(document.frmBody.tp_entidadOrigen[document.frmBody.tp_entidadOrigen.selectedIndex].value==1125853){ //Empresa Contratante
  	if(vista=='1341738' && filtros=='Origen'){
  		vista="1341739"
	}	
  }  	
}	

//Parche para Interamericana

    typeEntityFrom = document.frmBody.type_entity.value;
	obj  = b
	obj2 = a
    
    if(obj2.name != document.frmBody.objtextactive.value){sw = 0}
	
    if(sw==1 && x!=1){
	aa = dd(obj,NL) 
	x=1
    }
    strelem = get_resp(filtros);
    if(vista=='')	vista=0;
    if(filtros=='')	strelem='';
    if(sw==0 && x!=1){
		aa = vv(obj,NL)
		var strtype_Entity = type_Entity
		
		var StrIframeVal = 'document.all.pags'+nameatt+'.src'
		var re1 = /__1/g
		var re2 = /__2/g
		var re3 = /__3/g
		var re4 = /__4/g
		var re5 = /__5/g
		var re6 = /__6/g
		strelem = strelem.replace(re1,"")
		strelem = strelem.replace(re2,"")
		strelem = strelem.replace(re3,"")
		strelem = strelem.replace(re4,"")
		strelem = strelem.replace(re5,"")
		strelem = strelem.replace(re6,"")
		StrIframe = 'document.all.pags'+nameatt+'.src="../../h2_sales/aspx/ComboBox_Type_Entity.aspx?typeent=' + strtype_Entity + '&typeEntityFrom=' + typeEntityFrom + '&IntView=' + vista + strelem + '"'
		var StrIFrameAux = eval(StrIframeVal)
	        eval(StrIframe)     
		document.frmBody.objtextactive.value = obj2.name
		document.frmBody.objactive.value     = indice
		x=1
	}
}
	function moveelements(fromelem, toelem) 
	{
		
		if (fromelem && toelem) 
		{			
			for (var i = 0; i < fromelem.length; ++i) 
			{								
				if (fromelem[i].selected) 
				{ 		
					var nopcion = new Option();					
					nopcion.text = fromelem[i].text;
					nopcion.value = fromelem[i].value;
					toelem[toelem.length] = nopcion;					
				}
			}
			for (var i = fromelem.length - 1 ; i >= 0 ; i--) 
			{
				if (fromelem.options[i].selected) fromelem.options[i] = null;
			}
			if(typeof(calcula)=='function'){
				if (calcula) calcula()
			}
			
			return true;
		} 
		else return false;
	}
	function moveallelements(fromelem, toelem) 
	{
		if (fromelem && toelem) 
		{
			for (var i = 0; i < fromelem.length; ++i) 
			{
				var nopcion = new Option();
				nopcion.text = fromelem[i].text;
				nopcion.value = fromelem[i].value;
				toelem[toelem.length] = nopcion;
			}
			for (var i = fromelem.length - 1 ; i >= 0 ; i--) 
			{
				fromelem.options[i] = null;
			}
			if(typeof(calcula)=='function'){
				if (calcula) calcula()
			}
			

		}
		return false;
	}
	function moveselectedup(elem) 
	{
		if (elem){
			if (elem.length > 1){
				for (var i = 0; i < elem.length; ++i){				
					if (elem[i].selected)
					{
						if (i > 0) 
						{				
							var topcion = new Option();
							topcion.text = elem[i-1].text;
							topcion.value = elem[i-1].value;					
							elem[i-1].text = elem[i].text;
							elem[i-1].value = elem[i].value;
							elem[i].text = topcion.text;
							elem[i].value = topcion.value;
							elem[i-1].selected = true;
							elem[i].selected = false;
						} else return true;
					}
				}				
			}
		} 
		else return false;
	}
	function moveselecteddown(elem) 
	{
		if (elem) 
		{
			if (elem.length > 1) 
			{
				for (var i = elem.length - 1 ; i >= 0 ; --i) 
				{
					if (elem[i].selected)
					{
						if (i < elem.length - 1) 
						{				
							var topcion = new Option();
							topcion.text = elem[i+1].text;
							topcion.value = elem[i+1].value;					
							elem[i+1].text = elem[i].text;
							elem[i+1].value = elem[i].value;
							elem[i].text = topcion.text;
							elem[i].value = topcion.value;					
							elem[i+1].selected = true;
							elem[i].selected = false;					
						} 
						else return true;
					}
				}
			}				
		} else return false;
	}

function selectall(elem){
	var sw = 0
	if (elem){
		for (var i = 0; i < elem.length; ++i){
			elem[i].selected = true;
		}	
		return true;
	} 
	else return false;		
}


function porcentajes(Objform) {
//	Objform:  Objeto frmBody
var campo;
var i, valor;
var int_valor;
	
	for (var i=0;i<Objform.elements.length;i++)
	{
	   if (Objform.elements[i].type=='hidden'){
	   	campo = Objform.elements[i].name;
	   	if (campo.substr(0,8)=='percent_'){
	   		campo = 'document.' + Objform.name + '.' + Objform.elements[i].value + '.value'
			valor = eval(campo)
			if (valor != '' && !isNaN(parseInt(valor))){
				int_valor = parseFloat(valor.replace(",", "."))
				if (int_valor > 1){
					eval(campo + '=' + int_valor/100)
				}
			}
			else
				eval(campo + '=""')
		}
	   }		
	}
}
function dates(Objform) {
var campo;
var name_att;
var valor;
var str_valor;
var strtime;
	for (var i=0;i<Objform.elements.length;i++)
	{
	   if (Objform.elements[i].type=='hidden'){
	   	campo = Objform.elements[i].name;
	   	if (campo.substr(0,5)=='date_'){
	   		name_att = campo.substr(5,campo.length);
	   		campo = 'document.' + Objform.name + '.' + name_att + '.value';
	   		campo1 = 'document.' + Objform.name + '.' + name_att
	   		campo1 = eval(campo1)
	   		if(campo1){
				valor = eval(campo);
				strtime = eval('document.' + Objform.name + '.timestamp_' + name_att + '.value');
				strtime1 = eval('document.' + Objform.name + '.timestamp_' + name_att);
				if(strtime1){
					if (valor != ''){
					   if (strtime != '')
					   	valor = valor + ' ' + strtime
					   str_valor=Conver_dateSQL(valor, Objform.elements[i].value, "");
					   eval(campo + '="' + str_valor + '"');
					}
				}
			}	

		}
	   }
	   
	   if (Objform.elements[i].type=='text'){
	   	campo = Objform.elements[i].name;
	   	if (campo.substr(0,11)=='comparTime_'){
			valor = Objform.elements[i].value;
			if (valor != ''){
			   str_valor=Conver_dateSQL(valor, 'dd/mm/yyyy', '');
			   Objform.elements[i].value = str_valor;
			}
		}
	   }
	   
	}
}
function times(Objform) {
var campo;
var Objselect;
var name_att, nameTypeAtt;
var i, valor;
var int_valor;
	
	for (var i=0;i<Objform.elements.length;i++){
	   if (Objform.elements[i].type=='hidden' || Objform.elements[i].type=='select-one'){
	   	campo = Objform.elements[i].name;
	   	if (campo.substr(0,5)=='time_' || campo.substr(0,6)=='time2_'){
	   		if (campo.substr(0,6)=='time2_'){
	   			nameTypeAtt = campo.substr(0,6);
	   			name_att = campo.substr(6,campo.length);
	   		}
	   		if (campo.substr(0,5)=='time_'){
	   			nameTypeAtt = campo.substr(0,5);
	   			name_att = campo.substr(5,campo.length);
	   		}
			nameTypeAtt = nameTypeAtt.toString(); 
	   		
	   		campo = 'document.' + Objform.name + '.' + name_att + '.value'
	   		
			valor = eval(campo)
			if (valor != ''){//Convertir al formato hh:mm:ss
				if (nameTypeAtt=='time_')
					str_valor=Conver_timeSQL(valor, Objform.elements[i].value, "");
				else{
					/*Objselect = Objform.elements[i];
					int_valor = Objselect.selectedIndex;*/
					str_valor=Conver_tick2SQL(valor, Objform.elements[i].value, "");
				}
			   	eval(campo + '="' + str_valor + '"');
			}
			else
				eval(campo + '=""')
		}
	   }		
	}
}

function Go_Entity(name_att,typeEntity){
}

function EntitySearchLookupobj(obj,entityfrom, att5, att6, filtros)
{
var strelem, vista;
var typeEntityFrom;
var strsearch;

	typeEntityFrom = document.frmBody.type_entity.value;
	strelem = get_resp(filtros);
	if(att5=='')	att5=0;
	if(filtros=='')	strelem='';

	if (eval('document.frmBody.txt_'+obj))
		strsearch = eval('document.frmBody.txt_'+obj+'.value');
	else
		strsearch = eval('document.frmBody.'+obj+'.value');

	var strCaracter=/,/gi;
	var posic = att6.search(strCaracter)
	if (posic != -1)
		att6 = 	eval('document.frmBody.tp_entidad_' + obj + '.value');

	if(att6==''){
	   var StrObj = 'document.frmBody.tp_entidad'+obj+'[document.frmBody.tp_entidad'+obj+'.selectedIndex].value'
	   var strURL='../../h2_sales/asp/Index_NewEntitySearch_2.asp?entityfrom=' + entityfrom+ '&typeEntityFrom=' + typeEntityFrom + '&strSearchMode=LookUp&obj=' + obj+ '&intEntityType=' + eval(StrObj) + '&IntView=' + att5 + strelem + "&strSearchedText=" + strsearch;
	}else
	   var strURL='../../h2_sales/asp/Index_NewEntitySearch_2.asp?entityfrom=' + entityfrom + '&typeEntityFrom=' + typeEntityFrom + '&strSearchMode=LookUp&obj=' + obj + '&intEntityType=' + att6+'&IntView=' + att5 + strelem + "&strSearchedText=" + strsearch;
	
	window.open(strURL,'buscar','resizable=yes,menubar=no,location=no,toolbar=no,status=no,scrollbars=yes,directories=no,width=650,height=550');

}


function EntitySearchLookupobj2(obj,entityfrom, att5, att6, filtros)
{
var strelem, vista;
var typeEntityFrom;
var strsearch;

if(att6==''){
    	if(MsgAlertLookup)
    	   alert(MsgAlertLookup)
    	else
    	   alert("Revisar relación")

	return	
}



	typeEntityFrom = document.frmBody.type_entity.value;
	strelem = get_resp(filtros);
	if(att5=='')	att5=0;
	if(filtros=='')	strelem='';


	
	if (eval('document.frmBody.txt_'+obj))
		strsearch = eval('document.frmBody.txt_'+obj+'.value');
	else
		strsearch = eval('document.frmBody.'+obj+'.value');
	var strCaracter=/,/gi;
	var posic = att6.search(strCaracter)

	if (posic != -1)
		att6 = 	eval('document.frmBody.tp_entidad_' + obj + '.value');
	
	if(att6==''){
	   //var StrObj = 'document.frmBody.tp_entidad'+obj+'[document.frmBody.tp_entidad'+obj+'.selectedIndex].value'
	   //var strURL='../../h2_sales/asp/NewEntitySearch.asp?entityfrom=' + entityfrom+ '&typeEntityFrom=' + typeEntityFrom + '&strSearchMode=LookUp&obj=' + obj+ '&intEntityType=' + eval(StrObj) + '&IntView=' + att5 + strelem + "&strSearchedText=" + strsearch;
	   var strURL='../../h2_sales/aspx/Show_Multiple_Lookup.aspx?sw=entityfrom=' + entityfrom+ '&typeEntityFrom=' + typeEntityFrom + '&strSearchMode=LookUp&obj=' + obj+ '&intEntityType=' + eval(StrObj) + '&IntView=' + att5 + strelem + "&Texto1=" + strsearch;
	}else{
	   //var strURL='../../h2_sales/asp/NewEntitySearch.asp?entityfrom=' + entityfrom + '&typeEntityFrom=' + typeEntityFrom + '&strSearchMode=LookUp&obj=' + obj + '&intEntityType=' + att6+'&IntView=' + att5 + strelem + "&strSearchedText=" + strsearch;
	   var strURL='../../h2_sales/aspx/Show_Multiple_Lookup.aspx?entityfrom=' + entityfrom + '&typeEntityFrom=' + typeEntityFrom + '&strSearchMode=LookUp&obj=' + obj + '&intEntityType=' + att6+'&IntView=' + att5 + strelem + "&Texto1=" + strsearch;
	} 

	
	window.open(strURL,'buscar','resizable=yes,menubar=no,location=no,toolbar=no,status=no,scrollbars=yes,directories=no,width=700,height=550');


}

function AddValorLookupobj(login,intEntityId,name){
var nopcion = new Option();					
var strDoc = '';
var strobj = 'document.frmBody.'+name+'.value';
var strobjaux = 'document.frmBody.'+name+'.type';

if (eval(strobj) == '' || eval(strobjaux)=="hidden")
{
    var strobj2 = strobj + '=' + intEntityId ;
    eval(strobj2) ;
    
    var strobj8 = 'document.frmBody.txt_'+name+'.value="'+ login + '"';
    eval(strobj8)


    AddAttribModif(name);
    
    var Striframe = "document.all.Desc"+name+".src='../../h2_sales/asp/carga_desc.asp?id_entity=" + intEntityId +"'"   
    StriframeVer = "document.all.Desc"+name
    if (eval(StriframeVer))
    	eval(Striframe)

    nopcion.text  = login;
    nopcion.value = intEntityId;
	
    var strobj3   = 'document.frmBody.txt_'+name+'[document.frmBody.txt_'+name+'.length]= nopcion' ;
    eval(strobj3)
}
else
{
    var auxid = ',' + eval(strobj) + ',';
    re = eval('/,'+intEntityId+',/g');
    if (auxid.search(re) != -1){
    	midstring = ' contains ';
	return false;
    }else{
	var strobj4 = 'document.frmBody.'+name+'.value = '+intEntityId;
	eval(strobj4)
	    
	nopcion.text = login;
	nopcion.value = intEntityId;
		
	var strobj5 = 'document.frmBody.txt_'+name+'[document.frmBody.txt_'+name+'.length]= nopcion' ;
	eval(strobj5)
	midstring = ' does not contain ';		
	auxid = auxid  +  intEntityId
	auxid = auxid.substring(1,auxid.length)
    	var stroldvalor = 'document.frmBody.'+name+'.value';
    	stroldvalor = eval(stroldvalor)
	if (stroldvalor != auxid) //Cambio valor
	   AddAttribModif(name);
	var strobj6 = 'document.frmBody.'+name+'.value ="' + auxid + '"';
	var strobj7 = 'document.frmBody.'+name
	if (eval(strobj7)) //SI existe el objeto
	   eval(strobj6)
    }
}	 	
}

function eliminarLookupobj(name){
    var StrIframeVal = 'document.all.Desc'+name+'.src="nothing.htm"'
    var StrIframeVal0 = 'document.all.Desc'+name
    var StrObj1 = 'document.frmBody.txt_'+name+'.length'
    var StrObj2 = ""
    var StrObj3 = ""
    var StrObj4 = 'document.frmBody.'+name+'.value'
    var StrObj5 = ""
    var StrObj6 = ""
    if (eval(StrIframeVal0))
        eval(StrIframeVal)
    
	for (var i = eval(StrObj1) - 1 ; i >= 0 ; i--) 
	{
	    StrObj2 = 'document.frmBody.txt_'+name+'['+i+'].selected'
		if (eval(StrObj2)) 
		{
			var auxiddrop = 'document.frmBody.txt_'+name+'.options['+i+'].value';
			auxiddrop = eval(auxiddrop)
			StrObj3 = 'document.frmBody.txt_'+name+'.options['+i+'] = null';
			eval(StrObj3)
			var auxid = ',' + eval(StrObj4) + ',';
			auxid=auxid.toString();
		    	var stroldvalor = eval(StrObj4)
		    	
		    	if (stroldvalor != auxid) //Cambio valor
		    		AddAttribModif(name);
			
			re = eval('/,' + auxiddrop + ',/g');
		     	auxid = auxid.replace(re, '');
		     	auxid = auxid.substring(1,auxid.length)

		     	StrObj5 = 'document.frmBody.'+name+'.value = "' + auxid + '"';
		     	eval(StrObj5)
		}
	}
								
}
function del_s_fileOld(nameatt){
	if (confirm('Esta seguro que desea eliminar')){
		var Objatt = 'document.frmBody.'+nameatt+'.value=""'
		eval(Objatt)
		var nameLayer = 'DivFile'+nameatt
		change_content(nameLayer,' ')
		AddAttribModif(nameatt)
		var ObjImgatt = 'document.frmBody.'+nameatt+'_img.src="../../gfx/1x1.gif"'
		eval(ObjImgatt)
	}
}
function del_s_file(nameatt){
	if (confirm('Esta seguro que desea eliminar')){
		var Objatt = 'document.frmBody.'+nameatt+'.value=""'
		eval(Objatt)
		change_content('DivFile'+nameatt,'')
		AddAttribModif(nameatt)
		var ObjImgatt = 'document.frmBody.'+nameatt+'_img.src="../../gfx/1x1.gif"'
		eval(ObjImgatt)
	}
}
function change_AttLookup(name_att,IntView,typeEntityFrom){
	var objxx = "document.frmBody.tp_entidad"+name_att+"[document.frmBody.tp_entidad"+name_att+".selectedIndex].value"
	var Striframe = "document.all.Sel"+name_att+".src='../aspx/ComboBox_Type_Entity.aspx?typeent="+eval(objxx)+"&typeEntityFrom="+typeEntityFrom+"&IntView="+IntView+"&att="+name_att+"'"
	eval(Striframe)
}	

function show_desc(name_att){
}	

function ReloadClass(Objvalue){
     var TE = document.frmBody.type_entity.value 
	
    if(TE==26 || TE==80 || TE==17 || TE==32 || TE==49 || TE==44 || TE==48 || TE==12 || TE==39 || TE==204 || TE==115 || TE==78){
	var Nametxt = document.frmBody.objtextactive.value
	Nametxt = Nametxt.substr(4, Nametxt.length-4)
	var StrUrl = ''
	StrUrl = window.location.href
	var PosTypeEntity = StrUrl.search("TypeEntityRule=")
	
	if(PosTypeEntity==-1){
		StrUrl	= StrUrl + '&TypeEntityRule='
	}else{
		StrUrl = StrUrl.substr(0,PosTypeEntity+15)
	}
	  
		if(Objvalue!='' && Objvalue!='0')
		   window.location.href = StrUrl + Objvalue
    }
}

function updateIt(e)
{
	if (ie&&!opr6)
	{
		var x = window.event.clientX;
		var y = window.event.clientY;

		if (x > rightX || x < leftX) hideAll();
		else if (y > rightY) hideAll();
	}
	if (n||ns6)
	{
		var x = e.pageX;
		var y = e.pageY;

		if (x > rightX || x < leftX) hideAll();
		else if (y > rightY) hideAll();
	}
}	

function AddAttribModif(str_nameatt)
{
var str_val;
	if (typeof(document.frmBody) == 'undefined')
		return;
		
	str_val = document.frmBody.hdn_atribmodif.value;
	if (str_val != ""){
		str_val = "," + str_val + ",";
		var int_posic = str_val.search("," + str_nameatt + ",")
		if (int_posic == -1) //Atributo no esta en la lista
			document.frmBody.hdn_atribmodif.value = document.frmBody.hdn_atribmodif.value + "," + str_nameatt;
	} else
		document.frmBody.hdn_atribmodif.value=str_nameatt;
	
	//alert(document.frmBody.hdn_atribmodif.value);
	return;
	
}	

function Clear_dropdown(name_att){
 var obj = 'document.frmBody.txt_'+name_att
 obj = eval(obj)
 if(obj){
   for (var i = obj.length - 1 ; i >= 0 ; i--){
      obj.options[i] = null;
   }
 }
}

function SetIdEntity(id){}


function emailCheck (obj){
var emailStr=obj.value
var emailPat=/^(.+)@(.+)$/
var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
var validChars="\[^\\s" + specialChars + "\]"
var quotedUser="(\"[^\"]*\")"
var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
var atom=validChars + '+'
var word="(" + atom + "|" + quotedUser + ")"
var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
var matchArray=emailStr.match(emailPat)

	if (emailStr==''){
		return true;
		}
	
	if (matchArray==null) {
		
		alert("Dirección Email está incorrecta. Verifique que este bien escrita.")
		obj.value='';
		obj.focus();
		return false;
	}
	var user=matchArray[1]
	var domain=matchArray[2]
	
	if (user.match(userPat)==null) {
	    alert("Username no valido.")
	    obj.value = '';
	    obj.focus();
	    return false;
	}
	
	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) {
		  for (var i=1;i<=4;i++) {
		    if (IPArray[i]>255) {
		        alert("Dirección IP no Valida!")
		        obj.value='';
		        obj.focus();
			return false;
		    }
	    }
	    return true;
	}
	var domainArray=domain.match(domainPat)
	if (domainArray==null) {
		alert("El dominio indicado no existe.")
		obj.value = '';
		obj.focus();
	    	return false;
	}
	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length
	if (domArr[domArr.length-1].length<2 || 
	    domArr[domArr.length-1].length>3) {
	
	   alert("La dirección debe finalizar con 3 letras (ej: com, net, org, gov, mil) o 2 letras (ej: cl, de, br, ar)")
	   obj.value = '';
	   obj.focus();
	   return false
	}
	if (len<2) {
	   var errStr="Dirección incompleta"
	   alert(errStr)
	   obj.value = '';
	   obj.focus();
	   return false
	   
	}
	return true;
}


function borrar_id_new(obj,name_aux)
{
  var obj_aux =eval('document.frmBody.' + name_aux)
  if (obj && obj_aux){
	if (obj.value == '' ){
	 obj_aux.value = ''
	 AddAttribModif(obj_aux.name)
	}
}	
}


function borrar_comuna()
{
	document.frmBody.txt_Comuna.value = "";
}

function borrar_comunasostenedor()
{
	document.frmBody.txt_ComunaSostenedor.value = "";
}

function borrar_comunacomercial()
{
	document.frmBody.txt_ComunaComercial.value = "";
}

function check_unique(obj,id_attrbute,type_attribute,id_domain,id_entity,type_entity)
{
	if (obj.value != '')
	{
		var h2methodpublic
		h2methodpublic = RSGetASPObject("../../h2_sales/asp/rs_h2_method.asp");
		if (h2methodpublic != null)
		{
	    		context = obj.value +','+ obj.name + ','+ id_entity + ',' + type_entity	    			
	    		co = h2methodpublic.key_entity(obj.value,id_attrbute,type_attribute,id_domain,type_entity,show_result_rs,context);
	 	}
 	}
}


	function AttributeFocus(str_valor)
	{
		oldValue = str_valor;
	}


	function Save_attribmodif(type, Obj)
	{
		//document.frmBody.objtextactive.value = Obj.name;
		document.frmBody.objtextactive.value = "____" + Obj.name;
		switch (type) 
		{		
			case "s_img":
				//Este trabajo se hace en funciones propias de subir archivo
				break;
			
			case "s_file":
				//Este trabajo se hace en funciones propias de subir archivo
				break;
			
			case "m_lookup":
				//Este trabajo se hace en funciones propias de lookup.
				break;
			
			case "s_html":
				break;
				
			case "s_popup":
			var int_ind;
				int_ind = Obj.selectedIndex;
				if (int_ind != -1 && Obj[int_ind].value!=oldValue){
					//Gatilla formulas
					AddAttribModif(Obj.name);
					pre_formulas();
				}
				break;
			
			case "s_radio", "m_check":
				break;
			
			default:
				if (Obj.value!=oldValue){
					//Gatilla formulas
					AddAttribModif(Obj.name);
					pre_formulas();
				}
				break;
			
		}
	}

/*var oPopup = window.createPopup();


function Popup_New(TypeEntityActive,num,type_entIni,strcampo){
	var StrAcum = ""
	var StrX="'"
        StrAcum = '<table width="100%" cellspacing="1" cellpadding="0">'
	for(i=0; i<(document.frames['FrameTempLoad'].AA.length); i++){
		StrAcum += '<tr><td onclick="javascript:parent.New_Win('+TypeEntityActive+','+type_entIni+','+StrX+strcampo+StrX+','+StrX+document.frames['FrameTempLoad'].AA[i][1]+StrX+')" width="100%" onmouseout="javascript:parent.changeBgcolorAA(this)" onmouseover="javascript:parent.changeBgcolorBB(this)" style="cursor:hand"><small>' + document.frames['FrameTempLoad'].AA[i][0] + '</small></td></tr>'
	}
	StrAcum += '<table>'
    	var oPopBody                   = oPopup.document.body;
    	oPopBody.style.backgroundColor = "#D6D3CE";
    	oPopBody.style.border          = "solid black 1px";
    	oPopBody.innerHTML             = StrAcum
    	ShowNew(num)
    	oPopup.show((XL-document.body.scrollLeft)+235,(XT-document.body.scrollTop)-3,150,70, document.body);
}
	
	*/
function New_Win(TypeEntityActive,type_entIni,strcampo,intEntityAttributesClassId){
	var StrParanNew = "&XRutString="
	var AttNow = "document.frmBody.txt_" + strcampo 
	AttNow = eval(AttNow)
	
   
	if( (strcampo == 'PruebaRUT' ||  strcampo == 'RUT') && (type_entIni == '349' || type_entIni == '349')){
		if(AttNow)
		   StrParanNew += AttNow.value
	}

	if (TypeEntityActive==1)
	   window.open('/h2/asp/view_entity-10001.asp?windowclose=yes&proceso_entity=1&Action=Guardar&type_entity='+TypeEntityActive+'&type_entIni='+type_entIni+'&intEntityAttributesClassId='+intEntityAttributesClassId+'&strcampo='+strcampo+StrParanNew,'Nuevo_Objeto','resizable=yes,scrollbars=yes,width=600,height=385')	
	else
  	   window.open('/h2_sales/aspx/showview_class_structured.aspx?SWResponse=1&ModeInterfaz=view&windowclose=yes&proceso_entity=1&Action=Guardar&type_entity='+TypeEntityActive+'&type_entIni='+type_entIni+'&intEntityAttributesClassId='+intEntityAttributesClassId+'&strcampo='+strcampo+StrParanNew,'Nuevo_Objeto','resizable=yes,scrollbars=yes,width=600,height=385')
}	

function show_result_rs(co)
	{
		
		var tmparray,array_temp,i,txttmp,str_val,str_search
		tmparray = co.context
		array_temp = tmparray.split(',')
		
		if (co.return_value != '0')
		{
		
			/*
			alert("CALLBACK\n\n" +	
				"status = " + co.status + "\n\n" +
				"message = " + co.message + "\n\n" +
				"context = " + co.context + "\n\n" +
				"data = " + co.data + "\n\n" +
				"return_value = " + co.return_value);*/
			
			str_val = ',' + array_temp[2] + ',';
			str_search = ',' + co.return_value + ','
			var int_posic = str_val.search(str_search);
	
			if ((array_temp[2] != '') && (int_posic >= 0))
			{
				//alert('mismo')
			}	
			else
			{
				alert('El valor ""' + array_temp[0] + '"" ya se encuentra en el sistema\n'+
				      'y no puede ser repetido\n'+		
			      	'Ingrese otro valor\n');		
			      	txttmp = eval('document.frmBody.'+array_temp[1])
				txttmp.value = '' 
			}
			
		}	
		else
		{
		/*	alert('Problemas con el envio de parametros')
			txttmp = eval('document.frmBody.'+array_temp[1])
			txttmp.value = '' 
			alert(co.return_value)
			alert("CALLBACK\n\n" +
					"status = " + co.status + "\n\n" +
					"message = " + co.message + "\n\n" +
					"context = " + co.context + "\n\n" +
					"data = " + co.data + "\n\n" +
					"return_value = " + co.return_value);*/
		}	
	} 
	
	
	function check_validateRut_End(obj)
{

rut = obj.value
if (rut=='')
    return
objname = obj.name

  var tmpstr = "";
  for ( i=0; i < rut.length ; i++ )
    if ( rut.charAt(i) != ' ' && rut.charAt(i) != '.' && rut.charAt(i) != '-' )
      tmpstr = tmpstr + rut.charAt(i);
  rut = tmpstr;
  largo = rut.length;
// [VARM+]
  tmpstr = "";
  for ( i=0; rut.charAt(i) == '0' ; i++ );
  for (; i < rut.length ; i++ )
     tmpstr = tmpstr + rut.charAt(i);
  rut = tmpstr;
  largo = rut.length;
// [VARM-]
  if ( largo < 2 )
  {
    alert("Debe ingresar el rut completo.");
    eval('document.frmBody.'+ objname + '.focus()');
    eval('document.frmBody.'+ objname + '.value=""');
    return false;
  }
  
  
  for (i=0; i < largo ; i++ )
  {
    if( (rut.charAt(i) != '0') && (rut.charAt(i) != '1') && (rut.charAt(i) !='2') && (rut.charAt(i) != '3') && (rut.charAt(i) != '4') && (rut.charAt(i) !='5') && (rut.charAt(i) != '6') && (rut.charAt(i) != '7') && (rut.charAt(i) != '8') && (rut.charAt(i) != '9') && (rut.charAt(i) !='k') && (rut.charAt(i) != 'K') )
    {
      alert("El valor ingresado no corresponde a un R.U.T valido.");
      eval('document.frmBody.'+ objname + '.focus()');
      eval('document.frmBody.'+ objname + '.value=""');
      return false;
    }
  }
  var invertido = "";
  for ( i=(largo-1),j=0; i>=0; i--,j++ )
    invertido = invertido + rut.charAt(i);
  var drut = "";
  drut = drut + invertido.charAt(0);
  drut = drut + '-';
  cnt = 0;
  for ( i=1,j=2; i<largo; i++,j++ )
    {
    if ( cnt == 3 )
    {
      drut = drut + '.';
      j++;
      drut = drut + invertido.charAt(i);
      cnt = 1;
    }
    else
    {
      drut = drut + invertido.charAt(i);
      cnt++;
    }
  }
  invertido = "";
  for ( i=(drut.length-1),j=0; i>=0; i--,j++ )
  {
    invertido = invertido + drut.charAt(i);
  }
  var strut = 'document.frmBody.' + objname + '.value = "' + invertido + '"';
  eval(strut);

  if(!checkDV_End(rut,objname))
    return false;

  return true;
}

function checkCDV_End(dvr,obj2)
{
  dv = dvr + "";
  if(dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K'){
    alert("Debe ingresar un digito verificador valido.");
    eval('document.frmBody.' + obj2 +'.focus()');
    return false;
  }
  return true;
}

function checkDV_End(crut,obj)
{
  largo = crut.length;
  if(largo < 2){
    alert("Debe ingresar el rut completo.");
    eval('document.frmBody.'+ obj +'.focus()');
    return false;
  }
  if(largo > 2){
    rut = crut.substring(0, largo - 1);
  }
  else{
    rut = crut.charAt(0);
  }
  dv = crut.charAt(largo-1);
  if(!checkCDV_End(dv,obj))
     return false;
  if(rut == null || dv == null){
      return false;
  }
  var dvr = '0';
  suma = 0;
  mul  = 2;
  for (i= rut.length -1 ; i >= 0; i--){
    suma = suma + rut.charAt(i) * mul;
    if(mul == 7){
      mul = 2;
    }
    else{
      mul++;
    }
  }
  res = suma % 11;
  if (res==1){
    dvr = 'k';
  }
  else{
    if(res==0){
      dvr = '0';
    }
    else{
      dvi = 11-res;
      dvr = dvi + "";
    }
  }
  if(dvr != dv.toLowerCase()){
    alert("EL rut es incorrecto.");
    eval('document.frmBody.'+ obj +'.focus()');
    eval('document.frmBody.' + obj + '.value=""');
    
    return false;
  }
  return true;
}


function EditLookup(IdType,NameAtt,intEntityAttributesClassId){
      var obj =eval("document.frmBody."+NameAtt)
      
      var IdEnt = ''
      if(obj){
      	IdEnt = obj.value
      }
      
      if(IdEnt=='')
         return
         
      var objWin = open ('', 'NewWindow','toolbar=no,width=600,height=800,status=yes,scrollbars=yes');   
      
      if(document.frmBody.objactive)
         document.frmBody.objactive.value=NameAtt
      
      //objWin.document.location.href="../aspx/showview_class_structured.aspx?SWResponse=1&amp;ModeInterfaz=view&amp;proceso_entity=1&amp;Action=Guardar&amp;type_entity="+IdType+"&amp;IdEntity="+IdEnt
      objWin.document.location.href="../asp/view_entity-10002.asp?SWResponse=1&amp;ModeInterfaz=view&amp;proceso_entity=1&amp;Action=edit&amp;type_entity="+IdType+"&amp;intEntityAttributesClassId="+intEntityAttributesClassId+"&amp;IdEntity="+IdEnt+"&amp;EditLookup=yes"
}


function SetValueLoginLookup(idEnt,Login){
	
  if(document.frmBody.objactive){	
  	var obj =eval("document.frmBody."+document.frmBody.objactive.value)
  	var objtxt =eval("document.frmBody.txt_"+document.frmBody.objactive.value)
  	if(obj && objtxt){
  		if(obj.value=idEnt){
  			if(objtxt.value!=Login){
  			   objtxt.value=Login
  			}
  		}
  	}
	
  }	
}




	 
function isDate(p_Expression){
	return !isNaN(new Date(p_Expression));		// <<--- this needs checking
}


// REQUIRES: isDate()
function dateAdd(p_Interval, p_Number, p_Date){
	if(!isDate(p_Date)){return "invalid date: '" + p_Date + "'";}
	if(isNaN(p_Number)){return "invalid number: '" + p_Number + "'";}	

	p_Number = new Number(p_Number);
	var dt = new Date(p_Date);
	switch(p_Interval.toLowerCase()){
		case "yyyy": {// year
			dt.setFullYear(dt.getFullYear() + p_Number);
			break;
		}
		case "q": {		// quarter
			dt.setMonth(dt.getMonth() + (p_Number*3));
			break;
		}
		case "m": {		// month
			dt.setMonth(dt.getMonth() + p_Number);
			break;
		}
		case "y":		// day of year
		case "d":		// day
		case "w": {		// weekday
			dt.setDate(dt.getDate() + p_Number);
			break;
		}
		case "ww": {	// week of year
			dt.setDate(dt.getDate() + (p_Number*7));
			break;
		}
		case "h": {		// hour
			dt.setHours(dt.getHours() + p_Number);
			break;
		}
		case "n": {		// minute
			dt.setMinutes(dt.getMinutes() + p_Number);
			break;
		}
		case "s": {		// second
			dt.setSeconds(dt.getSeconds() + p_Number);
			break;
		}
		case "ms": {		// second
			dt.setMilliseconds(dt.getMilliseconds() + p_Number);
			break;
		}
		default: {
			return "invalid interval: '" + p_Interval + "'";
		}
	}
	return dt;
}



// REQUIRES: isDate()
// NOT SUPPORTED: firstdayofweek and firstweekofyear (defaults for both)
function dateDiff(p_Interval, p_Date1, p_Date2, p_firstdayofweek, p_firstweekofyear){
	if(!isDate(p_Date1)){return "invalid date: '" + p_Date1 + "'";}
	if(!isDate(p_Date2)){return "invalid date: '" + p_Date2 + "'";}
	var dt1 = new Date(p_Date1);
	var dt2 = new Date(p_Date2);

	// get ms between dates (UTC) and make into "difference" date
	var iDiffMS = dt2.valueOf() - dt1.valueOf();
	var dtDiff = new Date(iDiffMS);

	// calc various diffs
	var nYears  = dt2.getUTCFullYear() - dt1.getUTCFullYear();
	var nMonths = dt2.getUTCMonth() - dt1.getUTCMonth() + (nYears!=0 ? nYears*12 : 0);
	var nQuarters = parseInt(nMonths/3);	//<<-- different than VBScript, which watches rollover not completion
	
	var nMilliseconds = iDiffMS;
	var nSeconds = parseInt(iDiffMS/1000);
	var nMinutes = parseInt(nSeconds/60);
	var nHours = parseInt(nMinutes/60);
	var nDays  = parseInt(nHours/24);
	var nWeeks = parseInt(nDays/7);


	// return requested difference
	var iDiff = 0;		
	switch(p_Interval.toLowerCase()){
		case "yyyy": return nYears;
		case "q": return nQuarters;
		case "m": return nMonths;
		case "y": 		// day of year
		case "d": return nDays;
		case "w": return nDays;
		case "ww":return nWeeks;		// week of year	// <-- inaccurate, WW should count calendar weeks (# of sundays) between
		case "h": return nHours;
		case "n": return nMinutes;
		case "s": return nSeconds;
		case "ms":return nMilliseconds;	// millisecond	// <-- extension for JS, NOT available in VBScript
		default: return "invalid interval: '" + p_Interval + "'";
	}
}



// REQUIRES: isDate(), dateDiff()
// NOT SUPPORTED: firstdayofweek and firstweekofyear (does system default for both)
function datePart(p_Interval, p_Date, p_firstdayofweek, p_firstweekofyear){
	if(!isDate(p_Date)){return "invalid date: '" + p_Date + "'";}

	var dtPart = new Date(p_Date);
	switch(p_Interval.toLowerCase()){
		case "yyyy": return dtPart.getFullYear();
		case "q": return parseInt(dtPart.getMonth()/3)+1;
		case "m": return dtPart.getMonth()+1;
		case "y": return dateDiff("y", "1/1/" + dtPart.getFullYear(), dtPart);			// day of year
		case "d": return dtPart.getDate();
		case "w": return dtPart.getDay();	// weekday
		case "ww":return dateDiff("ww", "1/1/" + dtPart.getFullYear(), dtPart);		// week of year
		case "h": return dtPart.getHours();
		case "n": return dtPart.getMinutes();
		case "s": return dtPart.getSeconds();
		case "ms":return dtPart.getMilliseconds();	// millisecond	// <-- extension for JS, NOT available in VBScript
		default: return "invalid interval: '" + p_Interval + "'";
	}
}


// REQUIRES: isDate()
// NOT SUPPORTED: firstdayofweek (does system default)
function weekdayName(p_Date, p_abbreviate){
	if(!isDate(p_Date)){return "invalid date: '" + p_Date + "'";}
	var dt = new Date(p_Date);
	var retVal = dt.toString().split(' ')[0];
	var retVal = Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday')[dt.getDay()];
	if(p_abbreviate==true){retVal = retVal.substring(0, 3)}	// abbr to 1st 3 chars
	return retVal;
}
// REQUIRES: isDate()
function monthName(p_Date, p_abbreviate){
	if(!isDate(p_Date)){return "invalid date: '" + p_Date + "'";}
	var dt = new Date(p_Date);	
	var retVal = Array('January','February','March','April','May','June','July','August','September','October','November','December')[dt.getMonth()];
	if(p_abbreviate==true){retVal = retVal.substring(0, 3)}	// abbr to 1st 3 chars
	return retVal;
}



// ====================================

// bootstrap different capitalizations
function IsDate(p_Expression){
	return isDate(p_Expression);
}
function DateAdd(p_Interval, p_Number, p_Date){
	return dateAdd(p_Interval, p_Number, p_Date);
}
function DateDiff(p_interval, p_date1, p_date2, p_firstdayofweek, p_firstweekofyear){
	return dateDiff(p_interval, p_date1, p_date2, p_firstdayofweek, p_firstweekofyear);
}
function DatePart(p_Interval, p_Date, p_firstdayofweek, p_firstweekofyear){
	return datePart(p_Interval, p_Date, p_firstdayofweek, p_firstweekofyear);
}
function WeekdayName(p_Date){
	return weekdayName(p_Date);
}
function MonthName(p_Date){
	return monthName(p_Date);
}
	 
	 
	 
	 
        function valiDateNoMayor(obj){
	var d;
	d = new Date();
	
	var Mes  = d.getMonth() + 1;
	var Dia  = d.getDate();
	var Agno = d.getYear();
	
	dateStr1 = obj.value;
	if (dateStr1=="")
	   return
	
	
	var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;
	var matchArray1 = dateStr1.match(datePat);
	
	var month1 = matchArray1[3];
	var day1   = matchArray1[1];
	var year1  = matchArray1[4];
	
	if (year1>Agno){
		alert("Fecha debe ser menor a la fecha actual")
		obj.value=""
		obj.focus()
		return
	}			
	
	
	if (year1==Agno){
		if (month1>Mes){
			alert("Fecha debe ser menor a la fecha actual")
			obj.value=""
			obj.focus()
			return
		}	
	}			
	
	
	if (year1==Agno){
		if (month1==Mes){
			if (day1>Dia){
				alert("Fecha debe ser menor a la fecha actual")
				obj.value=""
				obj.focus()
				return						
			}
		}
	}			
}	


function valiDateNoMenor(obj){
	var DateCurrent;
	DateCurrent = new Date();
	
	dateStr1 = obj.value;
	if (dateStr1=="")
	   return
	
	var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;
	var matchArray1 = dateStr1.match(datePat);
	
	var month1 = matchArray1[3];
	var day1   = matchArray1[1];
	var year1  = matchArray1[4];	
	
	DateGet = new Date(month1 +"/"+day1+"/"+year1);
	
	DiasDiff=DateDiff("d", DateCurrent, DateGet)


if(DiasDiff>6){
  alert("Rango de fecha no válido. Debe seleccionar 7 dias antes o 7 dias despues de la fecha actual.")
}
	
if(DiasDiff<-6){
  alert("Rango de fecha no válido. Debe seleccionar 7 dias antes o 7 dias despues de la fecha actual.")
}
	
}



function valiDateNoMenorFechaActual(obj){
	var DateCurrent;
	DateCurrent = new Date();
	
	dateStr1 = obj.value;
	if (dateStr1=="")
	   return
	
	var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;
	var matchArray1 = dateStr1.match(datePat);
	
	var month1 = matchArray1[3];
	var day1   = matchArray1[1];
	var year1  = matchArray1[4];	
	
	DateGet = new Date(month1 +"/"+day1+"/"+year1);
	
	DiasDiff=DateDiff("d", DateCurrent, DateGet)


if(DiasDiff<0){
  alert("La fecha de ser mayor o igual a la fecha actual.")
}
	
	
}



function valiDateRangoFechas(obj,Param,DateMenor,DateMayor){
	var DateCurrent;
	var DateMenorTemp
	var DateMayorTemp
	var title = "dias"
	
	DateMenorTemp = DateMenor
	DateMayorTemp = DateMayor
	
	DateCurrent = new Date();
	var CHours=DateCurrent.getHours()
	var CMinutes=DateCurrent.getMinutes()
	var CSeconds=DateCurrent.getSeconds()
	var CMilliseconds=DateCurrent.getMilliseconds()
	
	dateStr1 = obj.value;
	if (Param=='y'){
		Param = "yyyy"
		title = "años"
	}	
	if (Param=='m'){
		title = "meses"	
	}

	if (Param=='d'){
		title = "dias"	
	}

	
	
	if (dateStr1=="")
	   return
	var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;
	var matchArray1 = dateStr1.match(datePat);
	var month1 = matchArray1[3];
	var day1   = matchArray1[1];
	var year1  = matchArray1[4];	
	DateGet = new Date(month1 +"/"+day1+"/"+year1+' '+CHours+':'+CMinutes+':'+CSeconds);
	DiasDiff=DateDiff(Param, DateCurrent, DateGet)


	DateMenor,DateMayor
	
	var Msg=""
	
	if(DateMenor>0 && DateMayor>0){
		Msg="Rango de fecha no válido. Debe seleccionar " + DateMenorTemp + " " + title + " antes o " + DateMayorTemp + " " + title + " despues de la fecha actual."
	}
	
	if(DateMenor==0 && DateMayor>0){
		Msg="Rango de fecha no válido. Debe seleccionar a partir de la fecha actual hasta " + DateMayorTemp + " " + title + " despues."
	}
	
	if(DateMenor>0 && DateMayor==0){
		Msg="Rango de fecha no válido. Debe seleccionar a partir de la fecha actual hasta " + DateMenorTemp + " " + title + " antes."
	}
	
	if(DateMenor==0 && DateMayor==''){
		Msg="Fecha no válida. Debe seleccionar una fecha mayor o igual a la fecha actual."
	}
	
	if(DateMenor=='' && DateMayor==0){
		Msg="Fecha no válida. Debe seleccionar una fecha menor o igual a la fecha actual."
	}


	if(DateMenor!=0){
	   DateMenor = DateMenor * (-1)
	}   
		
	
	if(DateMayor!=''){
		if(DiasDiff>DateMayor){
		  alert(Msg)
		  obj.value=""
		}
	}	
		
	if(DateMenor!=''){
		if(DiasDiff<DateMenor){
		    alert(Msg)
		    obj.value=""
		}
	}	

	
}	 

function valiDateDiasLaborales(objdate){
	if(objdate.value!=''){
	   dateStr1 = objdate.value
	   var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;
	   var matchArray1 = dateStr1.match(datePat);
	   var month1 = matchArray1[3];
	   var day1   = matchArray1[1];
	   var year1  = matchArray1[4];	
	   var mydate = new Date(month1 +"/"+day1+"/"+year1);
	   
	   var myweekday= mydate.getDay();
	   if(myweekday==0 || myweekday==6){
	   	alert("El dia seleccionado no corresponde a un dia laboral")
	   	objdate.value=""
	   }

	}
}

function setdatenow(fechaactual){
	for (i=0;i<document.frmBody.length;i++){
		if (document.frmBody.elements[i].type == 'text'){
			if(document.frmBody.elements[i].value=='<date>'){
				document.frmBody.elements[i].value=fechaactual
			}
		}
	}	
	
	
}




function validarTimeMayor(obj1,obj2,msg1,msg2){
var ArrayFecha1
var ArrayFecha2
var sw=0
	if(obj1 && obj2){
		var valor1 = obj1.value
		var valor2 = obj2.value
		if(valor1!='' && valor2!=''){
			ArrayFecha1 = valor1.split(':')
			ArrayFecha2 = valor2.split(':')
			if(ArrayFecha1.length==2 && ArrayFecha2.length==2){
				var Hora1   = parseInt(ArrayFecha1[0])
				var Minuto1 = parseInt(ArrayFecha1[1])
				var Hora2   = parseInt(ArrayFecha2[0])
				var Minuto2 = parseInt(ArrayFecha2[1])
				sw=1
	
				if(Hora1>Hora2){
					alert("Hora '"+msg1+"' debe ser menor que hora '"+msg2+"'.")
					obj2.focus()
					return false
				}
				if(Hora1==Hora2){
					if(Minuto1>Minuto2){
						alert("Hora '"+msg1+"' debe ser menor que hora '"+msg2+"'.")
						obj2.focus()
						return false
					}	
				}
			}
		}
	}
	
	
	if(obj1 && obj2){
		if(sw==0 && (obj1.value!="" || obj2.value!="")){
			//alert("Hora no tiene formato valido.")
			return false
		}else{
			return true
		}
	}	
}