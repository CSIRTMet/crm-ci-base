<?php
class Telefono extends CI_Controller {
       	function __construct()
	{
		parent::__construct();
		 
		
	}
	
	function index()
	{
		$this->load->model('Telefono_modelo');

		$data['title'] = "Mis telefonos";

		$data['heading'] = "Mi cabezera";

		$data['query'] = $this->Telefono->get_last_ten_entries();

		$this->load->view('telefono', $data);
	}
	function enviar_mensaje_socket(){
		//detalle de retornos
		//0 pudo llamar
		//1 nsocket_create() error
		//2 socket_connect() error
		//3 no se  pudo llamar
		//4 default

		$cabecera = $this->input->post('cabecera');
		$origen = $this->input->post('origen');
		$destino = $this->input->post('destino');
		$gestion = $this->input->post('gestion');
		$campana = $this->input->post('campana');
		$ruta = $this->input->post('ruta');
		$direccion = '192.168.1.52';
		//$direccion = '127.0.0.1';
		$puerto_servicio = 2022;
		$retorno = 4;

		//se asume que llega el telefono con el formato correcto
		//1- limpio las entradas

		$cabecera = trim($cabecera);
		$origen = trim($origen);
		$destino = trim($destino);
		$gestion = trim($gestion);
		$campana = trim($campana);
		$campana = trim($campana);
		$ruta = trim($ruta);

		//2 - armo el mensaje
		$concatenador = ":";
		$mensaje = $cabecera.$concatenador.$origen.$concatenador.$destino.$concatenador.$gestion.$concatenador.$campana.$concatenador.$ruta."\n";

		//3 - cuerpo del socket
		//echo "Enviado: ".$mensaje."<br>\n";
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0){
			$retorno = 1; //echo "nsocket_create() error";
			//exit;
		}else{
			$resultado = socket_connect($socket, $direccion, $puerto_servicio);
			if (!$resultado){
				$retorno = 2; //echo "socket_connect() error";
			}else{
				socket_sendto($socket, $mensaje, strlen($mensaje), 0, $direccion, $puerto_servicio);
				$input = socket_read($socket, 4);
				if($input == "0"){  
					$retorno = 3; //echo "Recibido: ";
					//echo "0"; //no se  pudo llamar
				}else{
					$retorno = 0;
					//echo "Recibido: ";
					//echo "1"; // pudo llamar
				}
			}
			socket_close($socket);
			echo $retorno; //0 = exito
		}
	}




	function llamar()
	{
		 
		$ruta = $this->input->post('ruta');
		$destino = $this->input->post('destino');
		$rut_cl='';
		$id_cliente = $this->input->post('id_cliente');
		
		$id_campana = $this->session->userdata("campana_id_campana");
		$tipo_campana = $this->session->userdata("campana_tipo");
		$this->load->model('Telefono_modelo');
		
		$usuarioAsterisk 	= 'astkubo';
		$passwordAsterisk	= 'kubokubo';
		
		$anexo		= $this->session->userdata('usuario_anexo');

		$contexto	= 'DLPN_DialPlan1';
		$ipAsterisk	= '192.168.1.52';
		$puerto		= '5038';
		 
		 
		 
		$display_number = $destino;
		//remove anything that is not a number or an asterisk(*) 
		$number = $ruta.$destino;// preg_replace ( "/[^\d\*]/", "", $_REQUEST['number'] );

		$rutCliente=$this->Telefono_modelo->getRutCliente($id_campana,$tipo_campana,$id_cliente);
		//print_r($rutCliente);
		//exit;
		foreach($rutCliente as $item):
			$rut_cl = $item->rut;
		endforeach;
		
		$output_html="&nbsp;&nbsp;
		&Uacute;ltimo n&uacute;mero discado: $display_number";			
		//Asterisk DialCode
		$timeout = 30;
		$socket = fsockopen(  $ipAsterisk ,$puerto, $errno, $errstr, $timeout);
		if(!$socket){ die("Error Connecting to Asterisk Server"); }
		fputs($socket, "Action: Login\r\n");
		fputs($socket, "UserName: ".$usuarioAsterisk."\r\n");
		fputs($socket, "Secret: ".$passwordAsterisk."\r\n\r\n");
		sleep(1);
		fputs($socket, "Action: Originate\r\n");
		//Partially contributed by SugarForge User mikeyb
		$callerid = $anexo;
		if (strpos($anexo, '/') === false) {
			fputs($socket, "Channel: Local/".$anexo."@".$contexto."\r\n");
		} else {
			fputs($socket, "Channel: ".$anexo."\r\n");
		}
		fputs($socket, "Context: ".$contexto."\r\n");
		fputs($socket, "Variable: Rut=".$rut_cl."\r\n");
		fputs($socket, "Exten: ".$number."\r\n");
		fputs($socket, "Priority: 1\r\n");
		fputs($socket, "Callerid: ".$anexo."\r\n\r\n");
		sleep(1);
		$wrets=fgets($socket,128);
		echo $output_html;
		
	}

	function ingresar_nuevo_telefono(){
	
	$numero = $this->input->post('numero');
	$tipo = $this->input->post('tipo');
	$id_cliente = $this->input->post('id_cliente');
	$area = $this->input->post('area');
	$tipo_campana = $this->session->userdata('campana_tipo');
	if($tipo_campana == 2) //marketing
	{
	$rut = '';
	} else {
	$rut = $this->input->post('rut');
	}
	
	$this->form_validation->set_rules('tipo', 'Tipo', 'required|is_natural_no_zero');
	if($tipo == 2){
		$this->form_validation->set_rules('numero', 'Numero', 'required|numeric');
	}else{
		//$this->form_validation->set_rules('numero', 'Numero', 'required|numeric|min_length[8]');
		$this->form_validation->set_rules('numero', 'Numero', 'required|numeric');
	}
	$this->form_validation->set_rules('area', 'Area', 'required|numeric');
	
	
	$success = $this->form_validation->run();
	
		if ($success){
		$this->load->model('Telefono_modelo');
		$res = $this->Telefono_modelo->ingresar_nuevo_telefono($id_cliente,$numero,$area,$tipo,$rut);

		echo $res; //1 = exito		
		}
		else {
		echo strip_tags(validation_errors()); 
		}
	}
	
	
	
	function validar_telefono()
	{
	
	    $data["fono"] = $this->uri->segment(3);
		$data["id_telefono"] = $this->uri->segment(4);
		$data["id_cliente"] = $this->uri->segment(5);
		$data["id_numero"] = 0;
		$this->load->view('vista_validar_telefono', $data);
	}
 
 	function validar_telefono_ibr()
	{
	
	    $data["fono"] = $this->uri->segment(3);
		$data["id_telefono"] = 0;  //si es 0 la vista va a clasificar un fono cenco de ibr
		$data["id_numero"] = $this->uri->segment(4); //con esto puedo saber que telefono de los 5 de cenco clasificare
		$data["id_cliente"] = $this->uri->segment(5);
		$id_campana = $this->session->userdata("campana_id_campana");
		
		if($id_campana != 1 && $id_campana != 5){
			echo "No se ha definido calificacion para esta campana";
			}
		else{	
			$this->load->view('vista_validar_telefono', $data);
		}
	}
	
 	function  form_carga_div_telefonos($id_cliente)
	{
	    $id_campana = $this->session->userdata("campana_id_campana");
		$id_empresa = $this->session->userdata("campana_id_empresa");
	    $tipo_campana = $this->session->userdata("campana_tipo");
		$this->load->model('Telefono_modelo');
		$data['telefonos'] 	= $this->Telefono_modelo->get_telefonos_cliente($id_cliente,$tipo_campana);	
		
		if($tipo_campana == 2) { // marketing
		
		
		switch ($id_campana) {
			case 1: //cencosud venta
			
			
				$query = "select id_cliente, $id_campana as id_campana, 
				disc_at1 as area1, fono_at1 as fono1,
				disc_at2 as area2, fono_at2 as fono2,
				disc_at3 as area3, fono_at3 as fono3,
				disc_at4 as area4, fono_at4 as fono4,
				disc_at5 as area5, fono_at5 as fono5,
				ddd_cel as area6,  num_celular as fono6,
				tipificacion_fono1, tipificacion_fono2,
				tipificacion_fono3, tipificacion_fono4,
				tipificacion_fono5, tipificacion_fono6
				from tmp_base_oficial_camp_$id_campana 
				where id_cliente = $id_cliente limit 1";
				$data = $this->db->query($query)->row_array();
			
			
			
				$this->load->view('vista_div_telefono_mkt', $data);	
				break;
			case 2: //netline pyme
				$this->load->view('vista_div_telefono_mkt', $data);	
				break;
			case 3: //claro hfcc
				$this->load->view('vista_div_telefono_mkt', $data);		
				break;
                        case 5: //cencosud venta
				$query = "select id_cliente, $id_campana as id_campana, 
				area_telefono_postal as area1, telefono_postal as fono1,
				area_celular_postal as area2, celular_postal as fono2,
				tipificacion_fono1, tipificacion_fono2		 
				from tmp_base_oficial_camp_$id_campana 
				where id_cliente = $id_cliente limit 1";
				$data = $this->db->query($query)->row_array();
			default:
			   $this->load->view('vista_div_telefono_mkt', $data);	
		}
			
			
		}
		
		else{  // cobranza
		
			switch ($id_empresa) {
			case 2: //claro
				$this->load->view('vista_div_telefono_cob', $data);	
				break;
			
			default:
			    $this->load->view('vista_div_telefono_cob', $data);	
		}
		
		}
		

		
	}

 
 	function ingresar_val_telefono(){
		//reglas
		$id_telefono = $this->input->post('id_telefono');
		$select_clasificacion = $this->input->post('id_clasificacion');
		$select_tipificacion = $this->input->post('id_tipificacion');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$id_numero = $this->input->post('id_numero');  
		$id_cliente = $this->input->post('id_cliente');  
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_clasificacion', 'Clasificacion', 'is_natural_no_zero');
		$this->form_validation->set_rules('id_tipificacion', 'Tipificacion', 'is_natural_no_zero');

		//corre validacion
		$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
		$success = $this->form_validation->run();
		

		//comprueba resultados 

		if ($success) { 
			
			
			$this->load->model('Telefono_modelo');
			
			
			// echo "set_calificacion($id_telefono, $select_clasificacion, $select_tipificacion,$tipo_campana,$id_numero, $id_cliente)";
		    $resultado = $this->Telefono_modelo->set_calificacion($id_telefono, $select_clasificacion, $select_tipificacion,$tipo_campana,$id_numero, $id_cliente);
			
 
			echo "1";

		}
		else { echo strip_tags(validation_errors()); }  
	}
	function form_carga_div_telefonos_cliente($id_cliente){
	    	$id_campana = $this->session->userdata("campana_id_campana");
		$id_empresa = $this->session->userdata("campana_id_empresa");
	    	$tipo_campana = $this->session->userdata("campana_tipo");
		$this->load->model('Telefono_modelo');
		$data['telefonos'] 	= $this->Telefono_modelo->get_telefonos_cliente($id_cliente,$tipo_campana);	
		
		$this->load->view('vista_div_telefono_cliente', $data);
		
	}
	
	function form_mostrar_codigo_area_telefono()
	  {
		  
		    $this->load->view('vista_codigos_telefonicos');	
	  }
	


function test_curl()
{
   	     $url = "http://190.196.182.124/busca_mail2.php?anexo=462&telefono=27134496&fecha=2013-09-27&campana=474&borrar=n&rut=11111111";
 	     /*$handler = curl_init($url);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($handler);
            curl_close($handler);
	     var_dump($response);*/



$archivo = file_get_contents($url);
echo $archivo; 



}

}
?>

