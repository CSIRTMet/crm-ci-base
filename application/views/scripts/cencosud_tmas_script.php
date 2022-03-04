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
  <p><strong><em>Mensaje Nº1 </em></strong><strong><em>Aceptación cierre Convenio Remoto con abono efectuado</em></strong></p>
  <p>Le informo que a partir de este momento, esta  conversación será grabada, mi nombre es XXXXX de su tarjeta XXXXXXXXXXXXXXX,  ¿hablo con Don XXXXXX? (Cliente responde Si)</p>
  <ul type="disc">
    <li>Me       confirma su RUT, dirección y su fecha de nacimiento por favor (indicado       por el cliente)</li>
  </ul>
  <p>Don(a) XXXXX usted acepta el Convenio de Pago de la deuda total  de su tarjeta de crédito XXXXXXXXX (Cliente responde Si).</p>
  <p>A continuación se entrega el detalle de su Convenio de Pago:</p>
  <ul type="disc">
    <li>El       último abono a su deuda es de $XXXXX pesos.</li>
  </ul>
  <ul type="disc">
    <li>Entonces,       su deuda total es $XXXXX pesos (Monto Oferta menos Pie).</li>
  </ul>
  <ul type="disc">
    <li>Este       monto será convenido en XXX Cuotas sucesivas mensuales de $ XXX con el       primer vencimiento para el día XXXXX</li>
  </ul>
  <ul type="disc">
    <li>Nota: Esta       alternativa de convenio estará vigente mientras se mantengan al día los       pagos convenidos de las cuotas pactadas, de lo contrario el descuento       realizado quedará sin efecto, siendo su deuda de XXXX (deuda original       menos los abonos realizados por usted)”. </li>
  </ul>
  <p>Esta Ud. De acuerdo y acepta las condiciones antes mencionadas  (Si/No Verbal y explicito).</p>
  <p>Es importante comentarle que los valores expresados  anteriormente pueden tener variaciones menores, ¿esta de acuerdo? (Si/No/verbal  y explícito).</p>
  <p>Me indica su teléfono fijo, celular  y correo electrónico?</p>
  <p>Autoriza  en este acto a CAT, para que la información entregada por usted, sea utilizada  para cualquiera de los fines que estime conveniente que digan relación con el  presente convenio?</p>
  <p>El proceso del Convenio se realizará dentro de los 5 días  hábiles siguientes. <strong>(Válido para todas las Tarjetas).</strong></p>
</div>

<div class="con_abono_futuro" id="con_abono_futuro" style="display:none; text-align: justify">
  <p><strong>Script Convenio con  Abono Futuro</strong></p>
  <p><strong><em><u>Mensaje  Nº 2</u></em></strong> <strong><em><u>Aceptación  cierre Convenio Remoto con pie futuro</u></em></strong></p>
  <p>Le informo que a partir de este momento, esta conversación será  grabada, mi nombre es XXXXX de<br />
    su tarjeta XXXXXXXXXXXXXXX, ¿hablo con Don XXXXXX ? (Cliente  responde Si)</p>
  <p>· Me confirma su RUT, dirección y su fecha  de nacimiento por favor (indicado por el cliente).</p>
  <p>A continuación se entrega el detalle de su Convenio de Pago:</p>
  <p>· Entonces, su deuda total es $XXXXX pesos <strong>con un  pie de $XX el cual debe ser cancelado en un plazo máximo de 3 días cronológicos</strong><strong>.</strong></p>
  <p>· Este monto será convenido en XXX Cuotas  sucesivas mensuales de $ XXX con el primer vencimiento para el día XXXXX Esta  Ud. De acuerdo y acepta las condiciones antes mencionadas (Si/No Verbal y  explicito).</p>
  <p>Es importante comentarle que los valores expresados  anteriormente pueden tener variaciones menores, ¿esta de acuerdo? (Si/No/verbal  y explícito).</p>
  <p>Me indica su teléfono fijo, celular  y correo electrónico?</p>
  <p> Autoriza en este acto a CAT, para que la  información entregada por usted, sea utilizada para cualquiera de los fines que  estime conveniente que digan relación con el presente convenio?</p>
  <p>El proceso de Convenio se realizará dentro de los 5 días  hábiles siguientes siempre que el pago del pie se realice en el plazo máximo de  3 días cronológicos. <strong>(Indicar sólo para convenio de tarjeta</strong> <strong>Jumbo).</strong> </p>
  <p>Nota: Esta alternativa de convenio estará vigente mientras se mantengan al  día los pagos convenidos de las cuotas pactadas, de lo contrario el descuento  realizado quedará sin efecto, siendo su deuda de XXXX (deuda original menos los  abonos realizados por usted)”.</p>
</div>


<div class="dicom" id="dicom" style="display:none; text-align: justify">
  <p><strong>Script Campa&ntilde;a Dicom</strong></p>
  <p>Buenos días  (tardes), Usted habla con (nombre de ejecutivo), de la empresa de cobranza  Cobratec.,</br>
  </p>
  <p> por encargo de  su tarjeta (Paris,  Jumbo, o Easy),  nos permitimos informar  que según nuestros registros usted mantiene una deuda impaga por $(Monto Deuda),</p>
  <p> la cual est&aacute; comunicada en los Informes Comerciales.<br />
    Estimado cliente,  en caso que Usted sea una de las personas que recibe Devolución de Impuestos  durante el mes de mayo,</p>
  <p> le ofrecemos una atractiva oferta para que  regularice sus compromisos de pago  pendientes, aprovechando la siguiente oportunidad:</p>
  <ol>
    <ol>
      <li><strong><em>[Ofrecer alternativas de  ofertas Vigentes al 31-05-2011].</em></strong></li>
      <li><strong>Pago con cheques a  fecha manteniendo pago Contado. </strong></li>
    </ol>
  </ol>
  <p>Al momento de  regularizar su situación, usted tiene automáticamente dentro de 7 aprox. Ser&aacute; &quot;aclarada&quot; o eliminada de la base de dato de Informes comerciales.<br />
    Es importante que  pueda solucionar su problema de Morosidad, lo antes posible, de tal manera de  evitar mayores costos asociados a la cobranza, para ello tiene un plazo máximo de  72 horas para solucionar su situaci&oacute;n.<br />
    Buenos Días, tardes  etc. don (nombre cliente) que tenga un buen día</p>
</div>









<div class="cobro_cuota_convenio" id="cobro_cuota_convenio" style="display:none; text-align: justify">
  <p>Buenos  días (tardes) podría comunicarme con el Sr. (nombre y apellido)</p>
  <p>Respuesta:</p>
  <ul>
    <li>Se encuentra  (Paso 1)  </li>
    <li>No se  encuentra (Paso 2)</li>
    <li>No corresponde  (Paso 3)</li>
    <li>No vive en  dicho lugar (Paso 4)  </li>
  </ul>
  <p><strong>CONVENIO EN MORA:</strong></p>
  <p><strong>Paso 1 – Se encuentra</strong></p>
  <p>Don o  Sra. (Nombre Cliente), buenos días (tardes) estamos llamando de Tarjetas Más,  mi nombre es (identificarse con nombre y  apellido).</p>
  <p>El  motivo de mi llamado es para informarle, que según nuestros registros usted  tiene pendiente el pago de su cuota del mes de (mes deuda cuota) por un monto  de $(monto cuota), la cual tenía fecha de pago para el día (fecha pago cuota).  Dado lo anterior, solicitamos a usted saber la fecha en que regularizará esto. </p>
  <p>Por  este motivo, nos hemos comunicado con usted y lo esperamos (día compromiso) en  nuestras oficinas ubicadas en Calle Estado Nº 360, Piso 8, Santiago (indicar  horarios) para regularizar su situación.</p>
  <p>Respuesta  Cliente:</p>
  <ul>
    <li>Pagará (Paso  5)  </li>
  </ul>
  <p>Don o  Sra. (Nombre Cliente), le recordamos que en el caso que usted no pague en el  plazo señalado, nos tiene que informar al 600 365 8342, de tal manera de evitar  futuros llamados solicitando regularizar su cuota.  </p>
  <p><strong>Despedida:</strong></p>
  <p>Don o  Sra. (nombre) le recuerdo la importancia de cumplir con su compromiso y que en  caso de cualquier duda o consulta que tenga se comunique conmigo (nombre  Ejecutivo) al 600 365 8342, ya que lamentablemente luego de las 48 hora  indicadas perderá los exclusivos beneficios que tenemos para usted.  </p>
  <p><strong>Paso 2 – No se encuentra (TERCERO)</strong></p>
  <p>Don o  Sra. buenos días (tardes), usted me podría indicar si es familiar de don o Sra.  (Nombre Cliente),</p>
  <p>Respuesta  Si:</p>
  <p>Estamos  llamando de Cencosud - París,  mi nombre  es (identificarse con nombre y apellido), y estamos tratando de hablar con don  o Sra. (nombre), para lo cual usted me podría indicar si tiene algún teléfono  donde yo lo pueda ubicar o me indica a que hora lo podemos llamar, dado que  necesitamos hablar con él o ella en el plazo máximo de 48 horas.</p>
  <p>Si  usted fuera tan amable le puede entregar un teléfono para que nos llame que es  el 600 365 8342 entre las 09:00 hasta las 20:00 horas en forma continuada,  donde uno de nuestros Ejecutivos se contactará con el y le entregará exclusivos  beneficios que tenemos para él/ella.</p>
  <p>Necesitamos  comunicarnos con el o ella cuanto antes, por lo tanto, solicitamos a usted  entregarle este mensaje a la brevedad.</p>
  <p>&nbsp; </p>
  <p><strong>Paso 3 y 4 – No corresponde o No vive en dicho  lugar</strong></p>
  <p>Disculpe,  usted me podría indicar si conoce a don o Sra. (nombre cliente) o sabe donde lo  puedo ubicar.</p>
  <p>Según  respuesta tipificar en el sistema.</p>
</div>



<div class="cobro_cartera_normal" id="cobro_cartera_normal" style="display:none; text-align: justify">
  <p>Buenos días (tardes), me podría comunicar con XXXXXXX,  mi nombre es (nombre y apellido), ejecutivo de tarjetas Más.    </p>
  <p>•	Le informo que a partir de este momento esta llamada puede ser grabada.    </p>
  <p>•	Lo estoy llamando por la deuda pendiente que mantiene con tarjetas Más París o Jumbo.    </p>
  <p><strong>Primera opción: Pago total</strong></p>
  <p>Se están descontando todos los intereses y gastos de cobranza acumulados a la fecha, su deuda en estos momentos es de $____________(con intereses), y el descuento que le podemos ofrecer es de $___________, quedando SOLO su deuda capital de $_____________ al cancelar al contado.    </p>
  <p>•	Esta deuda la puede cancelar con cheque, cheques de terceros, vales a la vista, compra de carteras, etc.    </p>
  <p>•	¿Tiene la posibilidad de cancelar este monto dentro de este mes? (no mas de 5 días Plazo)    </p>
  <p>	(solo ante la completa negativa ofrecer la opción de abonos)    </p>
  <p><strong>Segunda Opción: 30% convenio 1 </strong></p>
  <p>•	Si Ud. cancela un pie de $_________________, equivalente al 30% y el saldo cancelarlo en cuotas sucesivas mensuales    </p>
  <p><strong>Tercera opción: 10% convenio 2</strong></p>
  <p> •	Si Ud cancela un pie de $________________, Equivale al 10% y el saldo cancelarlo en cuotas sucesivas mensuales.</p>
  <p> •	Para acceder a dicha alternativa, Ud. debe presentarse dentro de los próximos 02 días (no mas de 02 días plazo máximo a partir de hoy).</p>
  <p> Debe dirigirse directamente a nuestras oficinas ubicadas en Estado Nº 360 Of. 802, santiago en horario continuado de lunes a viernes de 9:00 a 20:00 Hrs, sábados de 10:00 a 15:00 hrs.</p>
  <p>También se puede acercar a todos los puntos asociados a la red de pagos de Cencosud:
    - Tiendas París
    - Supermercados Jumbo o Santa Isabel
    - Tiendas Easy
    - En sucursales de Servipag
    - En Banco Estado y Serviestado    </p>
  <p>Puede obtener su cupón de pago retirándolo con su RUT en los dispensadores ubicados en todas las sucursales (terminales de autoconsultas).    </p>
  <p>•	<strong>Sr.(a), por favor necesito que me pueda confirmar la siguiente información (confirmar datos de dirección y teléfonos o correo electrónico) </strong></p>
  <p>Le agradezco por su tiempo y el haber recibido esta llamada.</p>
  <p> <strong>NOTA:</strong></p>
  <p> •	En caso de no encontrarse el cliente, dejar tú nombre y fono de la operadora.</p>
  <p> •	Los cheques deben ser extendidos nominativos y cruzados a nombre de CERSA.</p>
  <p> •	En caso de no poder asistir el cliente, puede enviar un representante con poder simple para convenios.</p>
  <p> •	Se aceptan cheques de terceros que no presenten protesto. (Previa autorización).    </p>
  <p>•	Cantidad de cheques según política cedente.    </p>
  <p>•	Al dejar mensaje con familiar directo dejar tu nombre y mensaje indicando que estas llamando para ofrecer una alternativa de pago.    </p>
  <p>•	La aclaración de BIC es a contar del ingreso de la renegociación al sistema</p>
  <p> •	Siempre comenzar por Pago total, Convenio 1, convenio2 y darlas de acuerdo a la posibilidad de pago del cliente en forma pausada de lo contrario se quedaran sin argumento si dan todas las opciones al inicio.- </p>
</div>





<div class="pie" id="pie" style="display:none; text-align: justify" >
  <p>Siendo hoy dd/mm/aaaa su solicitud de Convenio ha sido recibida  respetando todas las  condiciones antes  detalladas. Muchas gracias.</p>
  <p>Señor(a) le informo que puede llamar al Call Center después de 5  días para conocer el estado de la solicitud, marcando el número 600-450-5000.</p>
</div>

</body>
</html>
