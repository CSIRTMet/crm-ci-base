<?php
/*******************************	
Configuracion

Mensaje

CABECERA DE MENSAJE
2222 =  cierra el servidor de socket (detiene el servicio)
cualquier otra combinacion no cierra el servidor 

RESPUESTA OBTENIDA DESDE EL SERVIDOR DE SOCKET
0000 = fallo la operacion
1111 = exito en la operacion

ORIGEN (anexo que hace la llamada) =>largo 6 con caracteres de relleno a la izquierda
ejemplo: anexo 6001 

::ORIGEN:: = 006001

DESTINO (numero a discar) => largo 15 con caracteres de relleno a la izquierda
ejemplo numero celular 9097934067

::DESTINO:: = 000009097934067

GESTION(id de la gestion asociada a la llamada) => largo 10  con caracteres de relleno a la izquierda
ejemplo : gestion 1254

::GESTION:: = 0000001254

MENSAJE A ENVIAR POR CADA PETICION DE LLAMADO =

MENSAJE = CABECERA+ORIGEN+ESTINO+GESTION : (TODO JUNTO),  LARGO 35

------------------
EJEMPLO 1 : REALIZAR UNA LLAMADA
------------------
Para pedir que se llame al numero 9097934067 desde el anexo 6001, asociado a la gestion 1254, el mensaje es:
11110060010000090979340670000001254

donde:
primeros 4 =  Cabecera: 1111 
siguientes 6 = ORIGEN : 006001
siguientes 15 = DESTINO : 000009097934067
siguientes 10 = GESTION : 0000001254

SI SE CREA EL ARCHIVO .CALL Y SE COPIA CORRECTAMENTE A LA CARPETA OUTGOING DE ASTERISK, EL SERVER DEBE RETORNAR
EL MENSAJE DE LARGO 4 : 1111 y DESCONECTAR

SI FALLA, EL MENSAJE DE LARGO 4 ES : 0000 y se debe desconectar


------------------
EJEMPLO 2 : TERMINAR EL SERVICIO DEL SERVIDOR SOCKET
------------------
Esto en realidad detiene el loop infinito que espera por conexiones.
sirve para actualizar el servidor 


donde:
primeros 4 =  Cabecera: 2222 

los demas 31 caracteres pueden ser cualquiera, no se consiran


//mensaje de ejemplo = 22220060010000090979340670000001254

FIN
********************************/

function enviar_mensaje_socket($cabecera, $origen, $destino, $gestion)
{

	$direccion = '127.0.0.1';
	$puerto_servicio = 1001;
	
//se asume que llega el telefono con el formato correcto

//1- limpio las entradas
$cabecera = trim($cabecera);
$origen = trim($origen);
$destino = trim($destino);
$gestion = trim($gestion);


//2 - relleno con caracteres a la izquierda
for($i=strlen($origen); $i<6; $i++){
			$origen = "0".$origen;
		}
for($j=strlen($destino); $j<15; $j++){
			$destino = "0".$destino;
		}
for($k=strlen($gestion); $k<10; $k++){
			$gestion = "0".$gestion;
		}


//2 - armo el mensaje		
$mensaje = $cabecera.$origen.$destino.$gestion;		

if(strlen($mensaje) != 35){
echo "Largo no es correcto";
		exit;
	}

//3 - cuerpo del socket
echo "Enviado: ".$mensaje."<br>\n";
	
	
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if ($socket < 0) {
		echo "nsocket_create() error";
		exit;
	} 
	
	$resultado = socket_connect($socket, $direccion, $puerto_servicio);
	if (!$resultado) {
		echo "socket_connect() error";
	} 
	else {
	
		socket_sendto($socket, $mensaje, strlen($mensaje), 0, $direccion, $puerto_servicio);
		$input = socket_read($socket, 4);
		if($input == "1111")
		{   
			//echo "Recibido: ";
			echo "1"; //se pudo llamar
		}
		else
		{
			//echo "Recibido: ";
			echo "0"; //no se pudo llamar
		}
	}
	socket_close($socket);
}




enviar_mensaje_socket('2222','6001','9097934067','157843');

?>




