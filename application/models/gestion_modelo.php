<?php

class Gestion_modelo extends CI_Model {

    var $id_gestion = ''; // 
    var $id_campana = ''; // 
    var $id_cliente = ''; // 
    var $id_usuario = '';
    var $id_accion = '';
    var $id_contactabilidad = '';
    var $id_respuesta = '';
    var $id_sub_respuesta = '';
    var $id_tipo_contacto = '';
    var $nombre_contacto = '';
    var $apaterno_contacto = '';
    var $amaterno_contacto = '';
    var $glosa = '';
    var $fecha_agendada = '';
    var $tipo_agendamiento = '';
    var $venta_recuperacion = '';
    var $campo1 = '';
    var $campo2 = '';
    var $campo3 = '';
    var $campo4 = '';
    var $campo5 = '';
    var $campo6 = '';
    var $campo7 = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries() {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function set_gestion($arr_gestion) {
        date_default_timezone_set("America/Santiago");
        $arr_gestion["fecha_termino"] = date('Y-m-d H:i:s');
        $arr_gestion["estado_gestion"] = 2;

        if ($arr_gestion["id_gestion"] == 0) {
            return $this->db->insert('gestion_mkt', $arr_gestion);
            $data = NULL;
        } else {
            return $this->db->update('gestion_mkt', $arr_gestion, array('id_gestion' => $arr_gestion["id_gestion"]));
            $data = NULL;
        }
    }

    function set_nueva_gestion($id_campana, $id_cliente, $id_deuda, $id_usuario, $tipo_campana) {
        //agendamiento
        $data["id_campana"] = $id_campana;
        $data["id_cliente"] = $id_cliente;
        $data["id_usuario"] = $id_usuario;
        $data["id_nivel1"] = 1; // 
        $data["id_nivel2"] = 1; // 
        $data["id_nivel3"] = 1; // 
        $data["id_nivel4"] = 1; // 
        $data["nombre_contacto"] = '';
        $data["apaterno_contacto"] = '';
        $data["amaterno_contacto"] = '';
        $data["rut_contacto"] = '';
        $data["glosa"] = '';
        date_default_timezone_set("America/Santiago");

        $data["fecha_inicio"] = date('Y-m-d H:i:s');
        $data["estado_gestion"] = 0; //iniciada


        $this->db->insert('gestion_mkt', $data);



        $data = NULL;
        return $this->db->insert_id();
    }

    /*  get_historial
      recupero el historial de gestiones del cliente
      con estado_actual = 0  para una campa�a dada
     */

    function get_historial($id_cliente, $id_campana, $tipo_campana) {



        $sql = "select  
	
	id_gestion, 
	cl.nombre as nombre_cliente,
	u.nombre as nombre_usuario,
	n1.nombre as nivel1,
	n2.nombre as nivel2,
	n3.nombre as nivel3,
	n4.nombre as nivel4,
 
	g.fecha_termino  as fecha_contacto,
	g.glosa  as glosa,
	g.numero_llamado 

	from gestion_mkt g
	inner join nivel1 n1 on n1.id_nivel1 = g.id_nivel1
	inner join nivel2 n2 on n2.id_nivel2 = g.id_nivel2
	inner join nivel3 n3 on n3.id_nivel3 = g.id_nivel3
	inner join nivel4 n4 on n4.id_nivel4 = g.id_nivel4
	 
	inner join usuario u on u.id_usuario = g.id_usuario
	inner join cliente_mkt cl on cl.id_cliente = g.id_cliente
	
	where g.id_cliente = " . $id_cliente . " 
	and g.id_campana = " . $id_campana . " 
	and g.estado_gestion = 2
	order by g.id_gestion desc";



        $result = $this->db->query($sql);
        return $result->result();
        ;
    }

    function get_ultima_gestion($id_campana, $id_cliente_o_deuda, $tipo_campana) {


        if ($tipo_campana == 1) { //cobranza	
            $gestion = "gestion";
            $campo_key = "g.id_deuda";
        } else {
            $gestion = "gestion_mkt";
            $campo_key = "g.id_cliente";
        }




        $sql = "select  
 
	u.nombre as nombre_usuario,
	 
	n4.nombre as nombre_sub_respuesta,
	
	g.fecha_termino  as fecha_contacto,
	g.glosa  as glosa

	from " . $gestion . " g
	 
	inner join nivel4 n4 on n4.id_nivel4 = g.id_nivel4
	 
	inner join usuario u on u.id_usuario = g.id_usuario
	
	where 
	
	$campo_key = " . $id_cliente_o_deuda . "  
	and g.id_campana = " . $id_campana . " 
	and g.estado_gestion = 2
	order by g.id_gestion desc
	limit 1";

        $result = $this->db->query($sql);

        return $result->row();
        ;
    }

    function agrega_ruta_grabacion($arreglo) {

	

        date_default_timezone_set("America/Santiago");
        list($anio, $mes, $dia) = explode("-", date("Y-m-d", time()));
        $data["grabacion"] = "";
        if ($arreglo["tipo_campana"] == 2) {
            $data["id_telefono"] = $arreglo["id_telefono"];
        }
        $data["numero_llamado"] = $arreglo["fono_llamado"];
        $pathrecord = $anio . "/" . $mes . "/" . $dia . "/" . $arreglo["anexo"];
        $ruta = "http://192.9.200.200/monitor/" . $pathrecord . "/";
        $ruta_grabacion = "";
        $nombre_archivo = "";



        /*         * *** */
//IBR


        $fono_carrier = $arreglo["fono_llamado_carrier"];
        $fono = substr($fono_carrier, 1); //saco el 9
        $fecha = date("Y-m-d");
        $anexo = $arreglo["anexo"];
        $rut = $arreglo["rutventa"];
        $dv = $arreglo["dv"];
        $campana = $arreglo["plan_vendido"];
        $id_campana = $this->session->userdata('campana_id_campana');

     
        /* $sql = "select codigo_venta from tmp_base_oficial_camp_$id_campana where id_cliente = ?";
          $res = $this->db->query($sql, array($arreglo["id_cliente"]))->row();
          $codcampana = $res->codigo_venta;

          $campana = str_pad(substr($codcampana,0,4), 4, "0", STR_PAD_LEFT);
         */




        if ($id_campana == 1) {
            $url = "http://190.196.182.124/busca_mail2.php?anexo=$anexo&telefono=$fono&fecha=$fecha&campana=$campana&borrar=n&rut=$rut";
        } else if ($id_campana == 2 || $id_campana == 3 ) {
            $url = "http://190.196.182.124/kubo/script_audio_metlife.php?anexo=$anexo&telefono=$fono_carrier&fecha=$fecha&rut=$rut";
        } else if ($id_campana == 4) { 
            $url = "http://190.196.182.124/kubo/script_audio_paris.php?fecha=$fecha&anexo=$anexo&telefono=$fono_carrier";
        } else if ($id_campana == 5) { 
            $url = "http://190.196.182.124/kubo/script_audio_metlife.php?anexo=$anexo&telefono=$fono_carrier&fecha=$fecha&rut=$rut-$dv";
        }
           
 

        if ($fono_carrier != '') {
//http://190.196.182.124/busca_mail2.php?anexo=562&telefono=0998717865&fecha=2012-12-17&campana=5430&borrar=n&rut=14121236"
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($handler);
            curl_close($handler);

//$response = file_get_contents($url);
            $data["numero_llamado"] = $arreglo["fono_llamado"];
            $data["grabacion"] = $response;


           // if ($id_campana < 3) {  //no incluye cencosud ya que ya funciona
            $query = "insert into log_grabacion(campana,anexo, telefono, rut, peticion, respuesta) values(?,?,?,?,?,?)";
            $this->db->query($query, array($id_campana,$anexo, $fono_carrier, $rut, $url, $response));
            //}

            /*             * ** */
        } else {
            $data["numero_llamado"] = 'nro no marcado';
            $data["grabacion"] = 'sin url grabacion';
        }

        if ($arreglo["id_gestion"] > 0) {
            if ($arreglo["tipo_campana"] == 1) {
                return $this->db->update('gestion', $data, array('id_gestion' => $arreglo["id_gestion"]));
            } else {
                return $this->db->update('gestion_mkt', $data, array('id_gestion' => $arreglo["id_gestion"]));
            }
        }
    }

}