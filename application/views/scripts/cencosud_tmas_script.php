<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {color: #FFFFFF; font-weight: bold; }
.Estilo1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript"> 
 $("#mostrar_con_abono_efectuado").click(function(){
		try{			
			$("#con_abono_efectuado").css("display", "");
			$("#con_abono_futuro").css("display", "none");
			$("#dicom").css("display", "none");	
			$("#pie").css("display", "");
			$("#cobro_cuota_convenio").css("display", "none");	
			$("#cobro_cartera_normal").css("display", "none");		
		}catch(e){
		}
  });
  $("#mostrar_con_abono_futuro").click(function(){
		try{			
			$("#con_abono_efectuado").css("display", "none");
			$("#dicom").css("display", "none");
			$("#con_abono_futuro").css("display", "");
			$("#pie").css("display", "");	
			$("#cobro_cuota_convenio").css("display", "none");	
			$("#cobro_cartera_normal").css("display", "none");			
		}catch(e){
		}
  });
  $("#mostrar_dicom").click(function(){
		try{			
			$("#con_abono_efectuado").css("display", "none");
			$("#con_abono_futuro").css("display", "none");
			$("#dicom").css("display", "");
			$("#pie").css("display", "");	
			$("#cobro_cuota_convenio").css("display", "none");	
			$("#cobro_cartera_normal").css("display", "none");			
		}catch(e){
		}
  });
  $("#ocultar_script").click(function(){
		try{			
			$("#con_abono_efectuado").css("display", "none");
			$("#con_abono_futuro").css("display", "none");
			$("#dicom").css("display", "none");
			$("#pie").css("display", "none");	
			$("#cobro_cuota_convenio").css("display", "none");	
			$("#cobro_cartera_normal").css("display", "none");			
		}catch(e){
		}
  });
   $("#mostrar_cobro_cuota_convenio").click(function(){
		try{			
			$("#con_abono_efectuado").css("display", "none");
			$("#con_abono_futuro").css("display", "none");
			$("#dicom").css("display", "none");
			$("#pie").css("display", "none");	
			$("#cobro_cuota_convenio").css("display", "");	
			$("#cobro_cartera_normal").css("display", "none");	

					
		}catch(e){
		}
  });
  
  
   $("#mostrar_cobro_cartera_normal").click(function(){
		try{			
			$("#con_abono_efectuado").css("display", "none");
			$("#con_abono_futuro").css("display", "none");
			$("#dicom").css("display", "none");
			$("#pie").css("display", "none");	
			$("#cobro_cuota_convenio").css("display", "none");	
			$("#cobro_cartera_normal").css("display", "");	

					
		}catch(e){
		}
  });
  
  
</script>

</head>

<body>
<div class="cabecera" id="cabecera">
  <div align="center">
    <p><strong>SCRIPT  CENCOSUD</strong></p>
    <p>
    
    <a href="#" id="mostrar_con_abono_efectuado">Script Convenio con Abono Efectuado</a>
    <span class="Estilo1">|</span>
    <a href="#" id="mostrar_con_abono_futuro">Script Convenio con Abono Futuro</a>
    <span class="Estilo1">|</span>
    <a href="#" id="mostrar_dicom">Script Campa&ntilde;a Dicom</a>
    
    <span class="Estilo1">|</span>
    <a href="#" id="mostrar_cobro_cuota_convenio">Script cobro cuota convenio</a>
  
    <span class="Estilo1">|</span>
    <a href="#" id="mostrar_cobro_cartera_normal">Script cobro cartera normal</a>

    <span class="Estilo1">|</span>
    <a href="#" id="ocultar_script">ocultar script</a>
    
    </p>
  </div>
</div>
<div class="con_abono_efectuado" id="con_abono_efectuado" style="display:none; text-align: justify">
  <p><strong>Script Convenio con Abono Efectuado</strong></p>
  <p><strong><em>Mensaje N??1 </em></strong><strong><em>Aceptaci??n cierre Convenio Remoto con abono efectuado</em></strong></p>
  <p>Le informo que a partir de este momento, esta  conversaci??n ser?? grabada, mi nombre es XXXXX de su tarjeta XXXXXXXXXXXXXXX,  ??hablo con Don XXXXXX? (Cliente responde Si)</p>
  <ul type="disc">
    <li>Me       confirma su RUT, direcci??n y su fecha de nacimiento por favor (indicado       por el cliente)</li>
  </ul>
  <p>Don(a) XXXXX usted acepta el Convenio de Pago de la deuda total  de su tarjeta de cr??dito XXXXXXXXX (Cliente responde Si).</p>
  <p>A continuaci??n se entrega el detalle de su Convenio de Pago:</p>
  <ul type="disc">
    <li>El       ??ltimo abono a su deuda es de $XXXXX pesos.</li>
  </ul>
  <ul type="disc">
    <li>Entonces,       su deuda total es $XXXXX pesos (Monto Oferta menos Pie).</li>
  </ul>
  <ul type="disc">
    <li>Este       monto ser?? convenido en XXX Cuotas sucesivas mensuales de $ XXX con el       primer vencimiento para el d??a XXXXX</li>
  </ul>
  <ul type="disc">
    <li>Nota: Esta       alternativa de convenio estar?? vigente mientras se mantengan al d??a los       pagos convenidos de las cuotas pactadas, de lo contrario el descuento       realizado quedar?? sin efecto, siendo su deuda de XXXX (deuda original       menos los abonos realizados por usted)???. </li>
  </ul>
  <p>Esta Ud. De acuerdo y acepta las condiciones antes mencionadas  (Si/No Verbal y explicito).</p>
  <p>Es importante comentarle que los valores expresados  anteriormente pueden tener variaciones menores, ??esta de acuerdo? (Si/No/verbal  y expl??cito).</p>
  <p>Me indica su tel??fono fijo, celular?? y correo electr??nico?</p>
  <p>Autoriza  en este acto a CAT, para que la informaci??n entregada por usted, sea utilizada  para cualquiera de los fines que estime conveniente que digan relaci??n con el  presente convenio?</p>
  <p>El proceso del Convenio se realizar?? dentro de los 5 d??as  h??biles siguientes. <strong>(V??lido para todas las Tarjetas).</strong></p>
</div>

<div class="con_abono_futuro" id="con_abono_futuro" style="display:none; text-align: justify">
  <p><strong>Script Convenio con  Abono Futuro</strong></p>
  <p><strong><em><u>Mensaje  N?? 2</u></em></strong> <strong><em><u>Aceptaci??n  cierre Convenio Remoto con pie futuro</u></em></strong></p>
  <p>Le informo que a partir de este momento, esta conversaci??n ser??  grabada, mi nombre es XXXXX de<br />
    su tarjeta XXXXXXXXXXXXXXX, ??hablo con Don XXXXXX ? (Cliente  responde Si)</p>
  <p>?? Me confirma su RUT, direcci??n y su fecha  de nacimiento por favor (indicado por el cliente).</p>
  <p>A continuaci??n se entrega el detalle de su Convenio de Pago:</p>
  <p>?? Entonces, su deuda total es $XXXXX pesos <strong>con un  pie de $XX el cual debe ser cancelado en un plazo m??ximo de 3 d??as cronol??gicos</strong><strong>.</strong></p>
  <p>?? Este monto ser?? convenido en XXX Cuotas  sucesivas mensuales de $ XXX con el primer vencimiento para el d??a XXXXX Esta  Ud. De acuerdo y acepta las condiciones antes mencionadas (Si/No Verbal y  explicito).</p>
  <p>Es importante comentarle que los valores expresados  anteriormente pueden tener variaciones menores, ??esta de acuerdo? (Si/No/verbal  y expl??cito).</p>
  <p>Me indica su tel??fono fijo, celular?? y correo electr??nico?</p>
  <p>??Autoriza en este acto a CAT, para que la  informaci??n entregada por usted, sea utilizada para cualquiera de los fines que  estime conveniente que digan relaci??n con el presente convenio?</p>
  <p>El proceso de Convenio se realizar?? dentro de los 5 d??as  h??biles siguientes siempre que el pago del pie se realice en el plazo m??ximo de  3 d??as cronol??gicos. <strong>(Indicar s??lo para convenio de tarjeta</strong> <strong>Jumbo).</strong> </p>
  <p>Nota: Esta alternativa de convenio estar?? vigente mientras se mantengan al  d??a los pagos convenidos de las cuotas pactadas, de lo contrario el descuento  realizado quedar?? sin efecto, siendo su deuda de XXXX (deuda original menos los  abonos realizados por usted)???.</p>
</div>


<div class="dicom" id="dicom" style="display:none; text-align: justify">
  <p><strong>Script Campa&ntilde;a Dicom</strong></p>
  <p>Buenos d??as  (tardes), Usted habla con (nombre de ejecutivo), de la empresa de cobranza  Cobratec.,</br>
  </p>
  <p> por encargo de?? su tarjeta (Paris,  Jumbo, o Easy),?? nos permitimos informar  que seg??n nuestros registros usted mantiene una deuda impaga por $(Monto Deuda),</p>
  <p> la cual est&aacute; comunicada en los Informes Comerciales.<br />
    Estimado cliente,  en caso que Usted sea una de las personas que recibe Devoluci??n de Impuestos  durante el mes de mayo,</p>
  <p> le ofrecemos una atractiva oferta para que?? regularice sus compromisos de pago  pendientes, aprovechando la siguiente oportunidad:</p>
  <ol>
    <ol>
      <li><strong><em>[Ofrecer alternativas de  ofertas Vigentes al 31-05-2011].</em></strong></li>
      <li><strong>Pago con cheques a?? fecha manteniendo pago Contado. </strong></li>
    </ol>
  </ol>
  <p>Al momento de  regularizar su situaci??n, usted tiene autom??ticamente dentro de 7 aprox. Ser&aacute; &quot;aclarada&quot; o eliminada de la base de dato de Informes comerciales.<br />
    Es importante que  pueda solucionar su problema de Morosidad, lo antes posible, de tal manera de  evitar mayores costos asociados a la cobranza, para ello tiene un plazo m??ximo de  72 horas para solucionar su situaci&oacute;n.<br />
    Buenos D??as, tardes  etc. don (nombre cliente) que tenga un buen d??a</p>
</div>









<div class="cobro_cuota_convenio" id="cobro_cuota_convenio" style="display:none; text-align: justify">
  <p>Buenos  d??as (tardes) podr??a comunicarme con el Sr. (nombre y apellido)</p>
  <p>Respuesta:</p>
  <ul>
    <li>Se encuentra  (Paso 1)?? </li>
    <li>No se  encuentra (Paso 2)</li>
    <li>No corresponde  (Paso 3)</li>
    <li>No vive en  dicho lugar (Paso 4)  </li>
  </ul>
  <p><strong>CONVENIO EN MORA:</strong></p>
  <p><strong>Paso 1 ??? Se encuentra</strong></p>
  <p>Don o  Sra. (Nombre Cliente), buenos d??as (tardes) estamos llamando de Tarjetas M??s,?? mi nombre es (identificarse con nombre y  apellido).</p>
  <p>El  motivo de mi llamado es para informarle, que seg??n nuestros registros usted  tiene pendiente el pago de su cuota del mes de (mes deuda cuota) por un monto  de $(monto cuota), la cual ten??a fecha de pago para el d??a (fecha pago cuota).  Dado lo anterior, solicitamos a usted saber la fecha en que regularizar?? esto. </p>
  <p>Por  este motivo, nos hemos comunicado con usted y lo esperamos (d??a compromiso) en  nuestras oficinas ubicadas en Calle Estado N?? 360, Piso 8, Santiago (indicar  horarios) para regularizar su situaci??n.</p>
  <p>Respuesta  Cliente:</p>
  <ul>
    <li>Pagar?? (Paso  5)  </li>
  </ul>
  <p>Don o  Sra. (Nombre Cliente), le recordamos que en el caso que usted no pague en el  plazo se??alado, nos tiene que informar al 600 365 8342, de tal manera de evitar  futuros llamados solicitando regularizar su cuota.  </p>
  <p><strong>Despedida:</strong></p>
  <p>Don o  Sra. (nombre) le recuerdo la importancia de cumplir con su compromiso y que en  caso de cualquier duda o consulta que tenga se comunique conmigo (nombre  Ejecutivo) al 600 365 8342, ya que lamentablemente luego de las 48 hora  indicadas perder?? los exclusivos beneficios que tenemos para usted.  </p>
  <p><strong>Paso 2 ??? No se encuentra (TERCERO)</strong></p>
  <p>Don o  Sra. buenos d??as (tardes), usted me podr??a indicar si es familiar de don o Sra.  (Nombre Cliente),</p>
  <p>Respuesta  Si:</p>
  <p>Estamos  llamando de Cencosud - Par??s,?? mi nombre  es (identificarse con nombre y apellido), y estamos tratando de hablar con don  o Sra. (nombre), para lo cual usted me podr??a indicar si tiene alg??n tel??fono  donde yo lo pueda ubicar o me indica a que hora lo podemos llamar, dado que  necesitamos hablar con ??l o ella en el plazo m??ximo de 48 horas.</p>
  <p>Si  usted fuera tan amable le puede entregar un tel??fono para que nos llame que es  el 600 365 8342 entre las 09:00 hasta las 20:00 horas en forma continuada,  donde uno de nuestros Ejecutivos se contactar?? con el y le entregar?? exclusivos  beneficios que tenemos para ??l/ella.</p>
  <p>Necesitamos  comunicarnos con el o ella cuanto antes, por lo tanto, solicitamos a usted  entregarle este mensaje a la brevedad.</p>
  <p>&nbsp; </p>
  <p><strong>Paso 3 y 4 ??? No corresponde o No vive en dicho  lugar</strong></p>
  <p>Disculpe,  usted me podr??a indicar si conoce a don o Sra. (nombre cliente) o sabe donde lo  puedo ubicar.</p>
  <p>Seg??n  respuesta tipificar en el sistema.</p>
</div>



<div class="cobro_cartera_normal" id="cobro_cartera_normal" style="display:none; text-align: justify">
  <p>Buenos d??as (tardes), me podr??a comunicar con XXXXXXX,  mi nombre es (nombre y apellido), ejecutivo de tarjetas M??s.    </p>
  <p>???	Le informo que a partir de este momento esta llamada puede ser grabada.    </p>
  <p>???	Lo estoy llamando por la deuda pendiente que mantiene con tarjetas M??s Par??s o Jumbo.    </p>
  <p><strong>Primera opci??n: Pago total</strong></p>
  <p>Se est??n descontando todos los intereses y gastos de cobranza acumulados a la fecha, su deuda en estos momentos es de $____________(con intereses), y el descuento que le podemos ofrecer es de $___________, quedando SOLO su deuda capital de $_____________ al cancelar al contado.    </p>
  <p>???	Esta deuda la puede cancelar con cheque, cheques de terceros, vales a la vista, compra de carteras, etc.    </p>
  <p>???	??Tiene la posibilidad de cancelar este monto dentro de este mes? (no mas de 5 d??as Plazo)    </p>
  <p>	(solo ante la completa negativa ofrecer la opci??n de abonos)    </p>
  <p><strong>Segunda Opci??n: 30% convenio 1 </strong></p>
  <p>???	Si Ud. cancela un pie de $_________________, equivalente al 30% y el saldo cancelarlo en cuotas sucesivas mensuales    </p>
  <p><strong>Tercera opci??n: 10% convenio 2</strong></p>
  <p> ???	Si Ud cancela un pie de $________________, Equivale al 10% y el saldo cancelarlo en cuotas sucesivas mensuales.</p>
  <p> ???	Para acceder a dicha alternativa, Ud. debe presentarse dentro de los pr??ximos 02 d??as (no mas de 02 d??as plazo m??ximo a partir de hoy).</p>
  <p> Debe dirigirse directamente a nuestras oficinas ubicadas en Estado N?? 360 Of. 802, santiago en horario continuado de lunes a viernes de 9:00 a 20:00 Hrs, s??bados de 10:00 a 15:00 hrs.</p>
  <p>Tambi??n se puede acercar a todos los puntos asociados a la red de pagos de Cencosud:
    - Tiendas Par??s
    - Supermercados Jumbo o Santa Isabel
    - Tiendas Easy
    - En sucursales de Servipag
    - En Banco Estado y Serviestado    </p>
  <p>Puede obtener su cup??n de pago retir??ndolo con su RUT en los dispensadores ubicados en todas las sucursales (terminales de autoconsultas).    </p>
  <p>???	<strong>Sr.(a), por favor necesito que me pueda confirmar la siguiente informaci??n (confirmar datos de direcci??n y tel??fonos o correo electr??nico) </strong></p>
  <p>Le agradezco por su tiempo y el haber recibido esta llamada.</p>
  <p> <strong>NOTA:</strong></p>
  <p> ???	En caso de no encontrarse el cliente, dejar t?? nombre y fono de la operadora.</p>
  <p> ???	Los cheques deben ser extendidos nominativos y cruzados a nombre de CERSA.</p>
  <p> ???	En caso de no poder asistir el cliente, puede enviar un representante con poder simple para convenios.</p>
  <p> ???	Se aceptan cheques de terceros que no presenten protesto. (Previa autorizaci??n).    </p>
  <p>???	Cantidad de cheques seg??n pol??tica cedente.    </p>
  <p>???	Al dejar mensaje con familiar directo dejar tu nombre y mensaje indicando que estas llamando para ofrecer una alternativa de pago.    </p>
  <p>???	La aclaraci??n de BIC es a contar del ingreso de la renegociaci??n al sistema</p>
  <p> ???	Siempre comenzar por Pago total, Convenio 1, convenio2 y darlas de acuerdo a la posibilidad de pago del cliente en forma pausada de lo contrario se quedaran sin argumento si dan todas las opciones al inicio.- </p>
</div>





<div class="pie" id="pie" style="display:none; text-align: justify" >
  <p>Siendo hoy dd/mm/aaaa su solicitud de Convenio ha sido recibida  respetando todas las?? condiciones antes  detalladas. Muchas gracias.</p>
  <p>Se??or(a) le informo que puede llamar al Call Center despu??s de 5  d??as para conocer el estado de la solicitud, marcando el n??mero 600-450-5000.</p>
</div>

</body>
</html>
