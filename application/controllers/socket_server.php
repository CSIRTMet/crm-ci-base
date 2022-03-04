<?php

/* Permitir que el script permanezca en espera de conexiones.*/
set_time_limit(0);

/* Habilitar vaciado de salida implicito, de modo que veamos lo que
* obtenemos a medida que va llegando. */
ob_implicit_flush();

/****** IP DEL ASTERISK Y PUERTO PARA EL SERVICIO DE SOCKET *******/
$direccion = '127.0.0.1';
$puerto    = 1001;
/*****************************************************************/



$codigo_cierre = '2222';  
$ok = '1111';
$error = '0000';



if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
    echo "socket_create() fall&oacute;: motivo: " . socket_strerror($sock) . "\n";
}

if (($ret = socket_bind($sock, $direccion, $puerto)) < 0) {
    echo "socket_bind() fall&oacute;: motivo: " . socket_strerror($ret) . "\n";
}

if (($ret = socket_listen($sock, 5)) < 0) {
    echo "socket_listen() fall&oacute;: motivo: " . socket_strerror($ret) . "\n";
}
do{
    if(($mens_sock = socket_accept($sock)) < 0){
        echo "socket_accept() fall&oacute;: motivo " . socket_strerror($mens_sock) . "\n";
        break;
    }

    do{
        if (false === ($buf = @socket_read($mens_sock, 35))){
            echo "socket_read() fall&oacute;: motivo: " . socket_strerror($ret) . "\n";
            break 1;
        }
		
		$cabecera = (string)substr($buf,0,4);
		$origen = (string)substr($buf,4,6);
		$destino = (string)substr($buf,10,15);
		$gestion = (string)substr($buf,25,10); 
		
		$respuesta = "PHP: cabecera : $cabecera \n";
		$respuesta .= "origen: $origen \n";
		$respuesta .= "destino: $destino \n";
		$respuesta .= "gestion: $gestion \n";
		echo $respuesta;
			
		if ($cabecera == $codigo_cierre) {
			
			$respuesta = '1111';
			socket_write($mens_sock, $respuesta, strlen($respuesta));
            break 2;
		}
		else {
		/*
		
		LOGICA DEL SOCKET ACA:
		
		se debe crear el archivo .call
		darle permiso 
		usar la funcion mv y no cp para dejarlo en la carpeta del asterisk que corresponda.
		
		si todo ok -> setear $respuesta = '1111';
		sino $respuesta = '0000'; 
		
		
		*/
		$respuesta = '1111'; //todo ok
		socket_write($mens_sock, $respuesta, strlen($respuesta));
		}
		

    } while(true);
	
    socket_close($mens_sock);
} while(true);

socket_close($sock);
?>