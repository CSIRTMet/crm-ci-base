<?php

class Gestion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Lista_gestion_modelo');
        $this->load->model('Gestion_modelo');
        $this->load->model('Campana_cliente_modelo');
        $this->load->model('Direccion_modelo');
    }

    function index() {
        
    }

    function ingresar_gestion() {
        $id_campana = $this->session->userdata('campana');
        $id_gestion = $this->input->post('id_gestion');
        $id_cliente = $this->input->post('id_cliente');
        $id_usuario = $this->input->post('id_usuario');

        $id_nivel1 = $this->input->post('id_nivel1');
        $id_nivel2 = $this->input->post('id_nivel2');
        $id_nivel3 = $this->input->post('id_nivel3');
        $id_nivel4 = $this->input->post('id_nivel4');


        $fecha_nacimiento = $this->input->post('fecha_nacimiento');
        $estado_civil = $this->input->post('estado_civil');
        $sexo = $this->input->post('sexo');

        $glosa = $this->input->post('glosa');
        $usuario_anexo = $this->session->userdata('usuario_anexo');
        $usuario_ip = $this->session->userdata('usuario_ip');
        $id_campana = $this->session->userdata('campana_id_campana');

        $direccion_correcta = $this->input->post('direccion_correcta');

        //campos de venta


        $data_venta["disc_at1"] = $this->input->post('venta_area1');
        $data_venta["disc_at2"] = $this->input->post('venta_area2');
        $data_venta["disc_at3"] = $this->input->post('venta_area3');
        $data_venta["disc_at4"] = $this->input->post('venta_area4');
        $data_venta["disc_at5"] = $this->input->post('venta_area5');
        $data_venta["ddd_cel"] = $this->input->post('venta_area6');

        $data_venta["fono_at1"] = $this->input->post('venta_fono1');
        $data_venta["fono_at2"] = $this->input->post('venta_fono2');
        $data_venta["fono_at3"] = $this->input->post('venta_fono3');
        $data_venta["fono_at4"] = $this->input->post('venta_fono4');
        $data_venta["fono_at5"] = $this->input->post('venta_fono5');
        $data_venta["num_celular"] = $this->input->post('venta_fono6');


        $rut = $this->input->post('venta_rut');
        $data_venta["rut_venta"] = $rut;

        $rut = strtoupper(preg_replace('{\.|,|-}', '', $rut));
        $sub_rut = substr($rut, 0, strlen($rut) - 1);
        $sub_dv = substr($rut, -1);

        $data_venta["rut_rut_venta"] = $sub_rut;
        $data_venta["rut_dv_venta"] = $sub_dv;

        $data_venta["sexo"] = $this->input->post('sexo');
        $data_venta["edad"] = $this->input->post('edad');
        $data_venta["fechanacimiento"] = $fecha_nacimiento;
        $data_venta["estadocivil"] = $estado_civil;


        $data_venta["plan_vendido"] = $this->input->post('venta_plan');
        $data_venta["primamensual"] = $this->input->post('venta_primamensual');
        $data_venta["primapesos"] = $this->input->post('venta_primapesos');
        $data_venta["nombre1"] = $this->input->post('venta_nombre1');
        $data_venta["apepat1"] = $this->input->post('venta_apepat1');
        $data_venta["apemat1"] = $this->input->post('venta_apemat1');
        $data_venta["parentesco1"] = $this->input->post('venta_parentesco1');
        $data_venta["porcentaje1"] = $this->input->post('venta_porcentaje1');
        $data_venta["sexo1"] = $this->input->post('venta_sexo1');
       
        $data_venta["nombre2"] = $this->input->post('venta_nombre2');
        $data_venta["apepat2"] = $this->input->post('venta_apepat2');
        $data_venta["apemat2"] = $this->input->post('venta_apemat2');
        $data_venta["parentesco2"] = $this->input->post('venta_parentesco2');
        $data_venta["porcentaje2"] = $this->input->post('venta_porcentaje2');
        $data_venta["sexo2"] = $this->input->post('venta_sexo2');
       
        $data_venta["nombre3"] = $this->input->post('venta_nombre3');
        $data_venta["apepat3"] = $this->input->post('venta_apepat3');
        $data_venta["apemat3"] = $this->input->post('venta_apemat3');
        $data_venta["parentesco3"] = $this->input->post('venta_parentesco3');
        $data_venta["porcentaje3"] = $this->input->post('venta_porcentaje3');
        $data_venta["sexo3"] = $this->input->post('venta_sexo3');
       
        $data_venta["nombre4"] = $this->input->post('venta_nombre4');
        $data_venta["apepat4"] = $this->input->post('venta_apepat4');
        $data_venta["apemat4"] = $this->input->post('venta_apemat4');
        $data_venta["parentesco4"] = $this->input->post('venta_parentesco4');
        $data_venta["porcentaje4"] = $this->input->post('venta_porcentaje4');
        $data_venta["sexo4"] = $this->input->post('venta_sexo4');
       

        $data_venta["nombre5"] = $this->input->post('venta_nombre5');
        $data_venta["apepat5"] = $this->input->post('venta_apepat5');
        $data_venta["apemat5"] = $this->input->post('venta_apemat5');
        $data_venta["parentesco5"] = $this->input->post('venta_parentesco5');
        $data_venta["porcentaje5"] = $this->input->post('venta_porcentaje5');
        $data_venta["sexo5"] = $this->input->post('venta_sexo5');


        $data_venta["num_propuesta2"] = $this->input->post('venta_num_propuesta2');
        $data_venta["anos_vigencia2"] = $this->input->post('venta_anos_vigencia2');
        $data_venta["plco_descrip2"] = $this->input->post('venta_plco_descrip2');
        $data_venta["ini_vig2"] = $this->input->post('venta_ini_vig2');
        $data_venta["primamensual2"] = $this->input->post('venta_primamensual2');
        $data_venta["primapesos2"] = $this->input->post('venta_primapesos2');



        $venta_recuperacion = $this->input->post('venta_recuperacion');

        //print_r($data_venta);
        $fono_llamado = $this->input->post('fono_llamado');
        $fono_llamado_carrier = $this->input->post('fono_llamado_carrier');
        $id_telefono = $this->input->post('id_telefono');


        $accion = 0;
        $this->db->where("id_nivel4", $id_nivel4);
        $res = $this->db->get("nivel4")->row();
        if (!empty($res)) {
            $accion = $res->accion;
        }

        if ($accion == 2) { //agendamiento
            $tipo_agendamiento = $this->input->post('tipo_agendamiento');
            $fecha = $this->input->post('fecha');
            $hora = $this->input->post('hora');
            $minuto = $this->input->post('minuto');
            $fecha_agendada = $fecha . " " . $hora . ":" . $minuto . ":" . '00';
        } else {
            $fecha_agendada = null;
            $tipo_agendamiento = null;
        }
        //-------------------------------------------------

        $this->form_validation->set_rules('id_gestion', 'Gestion', 'required');
        $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');

        $this->form_validation->set_rules('id_nivel1', 'Nivel 1', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('id_nivel2', 'Nivel 2', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('id_nivel3', 'Nivel 3', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('id_nivel4', 'Nivel 4', 'required|is_natural_no_zero');


        //validacion para agendamiento ------------------

        if ($accion == 2) { //agendamiento
            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('hora', 'Hora', 'required|is_natural_no_zero');
            $this->form_validation->set_rules('minuto', 'Minuto', 'required|is_natural_no_zero');
            $this->form_validation->set_rules('tipo_agendamiento', 'Tipo de agendamiento', 'required|is_natural_no_zero');
        }
        //----------------------------------------------- 
        /*
          LOS ACEPTA VENTA
         */
        if ($id_nivel4 == 19) {
            if ($id_campana != 4) {
                $this->form_validation->set_rules('venta_rut', 'Rut Venta', 'required|callback_validarRut[' . $id_cliente . ']');
            }
            $this->form_validation->set_rules('glosa', 'Glosa', 'required');

            if ($id_campana == 1) { //venta 
                $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'required');
                $this->form_validation->set_rules('estado_civil', 'Estado civil', 'required');
                $this->form_validation->set_rules('sexo', 'Sexo', 'required');
                $this->form_validation->set_rules('edad', 'Edad', 'required|numeric');

                $this->form_validation->set_rules('direccion_correcta', 'Comuna (tab direcciones)', 'required|is_natural_no_zero');


                $this->form_validation->set_rules('venta_area1', 'Area 1', 'required');
                $this->form_validation->set_rules('venta_fono1', 'Fono 1', 'required');

                $this->form_validation->set_rules('venta_plan', 'PLAN', 'required');
                $this->form_validation->set_rules('venta_primamensual', 'prima mensual', 'required');
                $this->form_validation->set_rules('venta_primapesos', 'prima pesos', 'required');
                $this->form_validation->set_rules('venta_nombre1', 'nombre 1', 'required');
                $this->form_validation->set_rules('venta_apepat1', 'apepat 1', 'required');
                $this->form_validation->set_rules('venta_apemat1', 'apemat 1', 'required');
                $this->form_validation->set_rules('venta_parentesco1', 'parentesco 1', 'required');
                $this->form_validation->set_rules('venta_porcentaje1', 'porcentaje 1', 'required');
                $this->form_validation->set_rules('venta_sexo1', 'sexo 1', 'required');


                $porcentaje_parcial1 = ($data_venta["porcentaje1"] == "") ? 0 : $data_venta["porcentaje1"];
                $porcentaje_parcial2 = ($data_venta["porcentaje2"] == "") ? 0 : $data_venta["porcentaje2"];
                $porcentaje_parcial3 = ($data_venta["porcentaje3"] == "") ? 0 : $data_venta["porcentaje3"];
                $porcentaje_parcial4 = ($data_venta["porcentaje4"] == "") ? 0 : $data_venta["porcentaje4"];
                $porcentaje_parcial5 = ($data_venta["porcentaje5"] == "") ? 0 : $data_venta["porcentaje5"];

                $porcentaje1 = ($data_venta["porcentaje1"] == "") ? 0 : $data_venta["porcentaje1"];
                $porcentaje2 = ($data_venta["porcentaje2"] == "" || $data_venta["apepat2"] == "") ? 0 : $data_venta["porcentaje2"];
                $porcentaje3 = ($data_venta["porcentaje3"] == "" || $data_venta["apepat3"] == "") ? 0 : $data_venta["porcentaje3"];
                $porcentaje4 = ($data_venta["porcentaje4"] == "" || $data_venta["apepat4"] == "") ? 0 : $data_venta["porcentaje4"];
                $porcentaje5 = ($data_venta["porcentaje5"] == "" || $data_venta["apepat5"] == "") ? 0 : $data_venta["porcentaje5"];


                $porcentaje_parcial = $porcentaje_parcial1 + $porcentaje_parcial2 + $porcentaje_parcial3 + $porcentaje_parcial4 + $porcentaje_parcial5;
                $porcentaje_total = $porcentaje1 + $porcentaje2 + $porcentaje3 + $porcentaje4 + $porcentaje5;
                if ($porcentaje_parcial != 100) {
                    echo "La suma de porcentajes es $porcentaje_parcial, pero debe ser 100";
                    return false;
                } else if ($porcentaje_total != 100 && $porcentaje_parcial == 100) {
                    echo "A los usuarios con porcentaje asignado, debe completarle todos los datos";
                    return false;
                }
            } else if ($id_campana == 2) { //venta 
                $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'required');
                $this->form_validation->set_rules('estado_civil', 'Estado civil', 'required');
                $this->form_validation->set_rules('sexo', 'Sexo', 'required');
                $this->form_validation->set_rules('edad', 'Edad', 'required|numeric');
                $this->form_validation->set_rules('venta_plan', 'PLAN', 'required');
                $this->form_validation->set_rules('venta_recuperacion', 'Recuperacion de venta', 'required');
            } else if ($id_campana == 3) { //venta 
                $data_venta["venta_email"] = $this->input->post('venta_email');
                $data_venta["venta_forma_pago"] = $this->input->post('venta_forma_pago');
                $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'required');
                $this->form_validation->set_rules('estado_civil', 'Estado civil', 'required');
                $this->form_validation->set_rules('sexo', 'Sexo', 'required');
                $this->form_validation->set_rules('edad', 'Edad', 'required|numeric');
                $this->form_validation->set_rules('venta_plan', 'PLAN', 'required');
                $this->form_validation->set_rules('venta_recuperacion', 'Recuperacion de venta', 'required');
                $this->form_validation->set_rules('venta_email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('venta_forma_pago', 'Forma de pago', 'required');
                $this->form_validation->set_rules('direccion_correcta', 'Comuna (tab direcciones)', 'required|is_natural_no_zero');
            } else if ($id_campana == 4) {
                $data_venta["venta_fecha_visita"] = $this->input->post('venta_fecha_visita');
                $data_venta["venta_hora_visita"] = $this->input->post('venta_hora_visita');
                $data_venta["venta_sucursal"] = $this->input->post('venta_sucursal');
                $data_venta["venta_nuevo_telefono"] = $this->input->post('venta_nuevo_telefono');
                $this->form_validation->set_rules('venta_fecha_visita', 'Fecha de visita', 'required');
                $this->form_validation->set_rules('venta_hora_visita', 'Hora de visita', 'required');
                $this->form_validation->set_rules('venta_sucursal', 'Sucursal', 'required');
        
            } else if ($id_campana == 5) {
                $data_venta["rut1"] = $this->input->post('venta_rut1');
                $data_venta["rut2"] = $this->input->post('venta_rut2');
                $data_venta["rut3"] = $this->input->post('venta_rut3');
                $data_venta["rut4"] = $this->input->post('venta_rut4');
                
                
                $this->form_validation->set_rules('estado_civil', 'Estado civil', 'required');
                $this->form_validation->set_rules('sexo', 'Sexo', 'required');
                $this->form_validation->set_rules('direccion_correcta', 'Comuna (tab direcciones)', 'required|is_natural_no_zero');

                //$this->form_validation->set_rules('venta_plan', 'PLAN', 'required');
               
                $this->form_validation->set_rules('venta_nombre1', 'nombre 1', 'required');
                $this->form_validation->set_rules('venta_apepat1', 'apepat 1', 'required');
                $this->form_validation->set_rules('venta_apemat1', 'apemat 1', 'required');
                $this->form_validation->set_rules('venta_parentesco1', 'parentesco 1', 'required');
                $this->form_validation->set_rules('venta_porcentaje1', 'porcentaje 1', 'required');
                $this->form_validation->set_rules('venta_rut1', 'rut 1', 'required');


                $porcentaje_parcial1 = ($data_venta["porcentaje1"] == "") ? 0 : $data_venta["porcentaje1"];
                $porcentaje_parcial2 = ($data_venta["porcentaje2"] == "") ? 0 : $data_venta["porcentaje2"];
                $porcentaje_parcial3 = ($data_venta["porcentaje3"] == "") ? 0 : $data_venta["porcentaje3"];
                $porcentaje_parcial4 = ($data_venta["porcentaje4"] == "") ? 0 : $data_venta["porcentaje4"];
               

                $porcentaje1 = ($data_venta["porcentaje1"] == "") ? 0 : $data_venta["porcentaje1"];
                $porcentaje2 = ($data_venta["porcentaje2"] == "" || $data_venta["apepat2"] == "") ? 0 : $data_venta["porcentaje2"];
                $porcentaje3 = ($data_venta["porcentaje3"] == "" || $data_venta["apepat3"] == "") ? 0 : $data_venta["porcentaje3"];
                $porcentaje4 = ($data_venta["porcentaje4"] == "" || $data_venta["apepat4"] == "") ? 0 : $data_venta["porcentaje4"];
               

                $porcentaje_parcial = $porcentaje_parcial1 + $porcentaje_parcial2 + $porcentaje_parcial3 + $porcentaje_parcial4;
                $porcentaje_total = $porcentaje1 + $porcentaje2 + $porcentaje3 + $porcentaje4;
                if ($porcentaje_parcial != 100) {
                    echo "La suma de porcentajes es $porcentaje_parcial, pero debe ser 100";
                    return false;
                } else if ($porcentaje_total != 100 && $porcentaje_parcial == 100) {
                    echo "A los usuarios con porcentaje asignado, debe completarle todos los datos";
                    return false;
                }
                 
            }
        }



        $this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('numeric', 'El campo %s debe ser un número');
        $this->form_validation->set_message('valid_email', 'El campo %s debe contener un correo válido');


        $success = $this->form_validation->run();

        if ($success) {
            $id_lista = $this->session->userdata('lista_id_lista');
            $tipo_campana = $this->session->userdata('campana_tipo');

            /*             * ********************************
             * * ACTUALIZA LA GESTION
             * ******************************** */

            $arr_gestion["id_gestion"] = $id_gestion;
            $arr_gestion["id_campana"] = $id_campana;
            $arr_gestion["id_cliente"] = $id_cliente;
            $arr_gestion["id_usuario"] = $id_usuario;

            $arr_gestion["id_nivel1"] = $id_nivel1;
            $arr_gestion["id_nivel2"] = $id_nivel2;
            $arr_gestion["id_nivel3"] = $id_nivel3;
            $arr_gestion["id_nivel4"] = $id_nivel4;


            $arr_gestion["rut_contacto"] = $data_venta["rut_venta"];
            $arr_gestion["fecha_nacimiento"] = $fecha_nacimiento;
            $arr_gestion["estado_civil"] = $estado_civil;
            $arr_gestion["sexo"] = $sexo;
            $arr_gestion["glosa"] = $glosa;
            $arr_gestion["fecha_agendada"] = $fecha_agendada;
            $arr_gestion["tipo_agendamiento"] = $tipo_agendamiento;
            $arr_gestion["anexo"] = $usuario_anexo;
            $arr_gestion["ip"] = $usuario_ip;
            $arr_gestion["venta_recuperacion"] = $venta_recuperacion;


            $resultado = $this->Gestion_modelo->set_gestion($arr_gestion);



            /*             * ********************************
             * * ACTUALIZA LISTA CLIENTE
             * ******************************** */
            $res = $this->Lista_gestion_modelo->set_lista_cliente($id_lista, $id_cliente, $id_nivel4, $fecha_agendada, $tipo_agendamiento, $id_usuario, $tipo_campana);

            /*             * ********************************
             * * ingreso la ultima gestion del cliente en la tabla cliente_campana.
             * ******************************** */
            $res2 = $this->Campana_cliente_modelo->set_ultima_gestion($id_campana, $tipo_campana, $id_cliente, $id_nivel4);

            /*             * ********************************
             * * actualiza la tabla temporal del cliente para la venta.
             * ******************************** */

            $address = $this->Direccion_modelo->get_mejor_direccion_cliente($id_cliente);

            if (count($address) > 0) {
                $data_venta["cod_region"] = $address->regi_codigo;
                $data_venta["cod_ciudad"] = $address->ciud_codigo;
                $data_venta["cod_comuna"] = $address->comu_codigo;
                $data_venta["dir_calle"] = $address->calle;
                $data_venta["dir_nro"] = $address->numero;
                $data_venta["dir_comp"] = $address->complemento;
            }

            if ($id_nivel4 == 19) {  //solo catualiza las temp si hay venta
                $res3 = $this->Campana_cliente_modelo->set_tmp_base_oficial_camp($id_campana, $data_venta, $id_cliente);
            } else {
                $sub_rut = ''; // no se envía rut cuando no hay venta
            }

            /*             * ********************************
             * * AGREGA RUTA DE GRABACION EN LA GESTION
             * ******************************** */

            $arr_grabacion["id_gestion"] = $id_gestion;
            $arr_grabacion["id_telefono"] = $id_telefono;
            $arr_grabacion["fono_llamado"] = $fono_llamado;
            $arr_grabacion["anexo"] = $usuario_anexo;
            $arr_grabacion["tipo_campana"] = $tipo_campana;

            $arr_grabacion["fono_llamado_carrier"] = $fono_llamado_carrier;
            $arr_grabacion["id_cliente"] = $id_cliente;
            $arr_grabacion["rutventa"] = $sub_rut;
            $arr_grabacion["dv"] = $sub_dv;
            $arr_grabacion["plan_vendido"] = $data_venta["plan_vendido"];
            


            $resultado_grabacion = $this->Gestion_modelo->agrega_ruta_grabacion($arr_grabacion);

            if ($resultado && $res) {
                echo "1";
            } else {
                echo "No se pudo realizar la operacion : Vuelva a intentar";
            }
        } else {
            echo strip_tags(validation_errors());
        }
    }

    /*  get_historial
      recupero el historial de gestiones del cliente
      con estado_actual = 0  para una campaña dada
     */

    function get_historial($id_cliente, $id_campana) {
        $tipo_campana = $this->session->userdata('campana_tipo');
        $data["gestiones"] = $this->Gestion_modelo->get_historial($id_cliente, $id_campana, $tipo_campana);
        //echo "$id_cliente,$id_campana,$tipo_campana";
        $this->load->view('vista_listar_gestion_de_cliente', $data);
    }

    public function validarRut($rut, $id_cliente) {
        $rut = strtoupper(preg_replace('{\.|,|-}', '', $rut));
        $sub_rut = substr($rut, 0, strlen($rut) - 1);
        $sub_dv = substr($rut, -1);
        $cuatro_primeros_digitos_rut = substr($rut, 0, 4);
        //echo "4 primeros digitos del rut: $id_cliente".$cuatro_primeros_digitos_rut;
        $x = 2;

        $sub_rut = substr(preg_replace('{\.|,|-}', '', $rut), 0, strlen(preg_replace('{\.|,|-}', '', $rut)) - 1);
        $sub_dv = substr(preg_replace('{\.|,|-}', '', $rut), -1);

        $s = 0;
        for ($i = strlen($sub_rut) - 1; $i >= 0; $i--) {
            $x = ($x > 7) ? 2 : $x;
            $s += $sub_rut[$i] * $x;
            $x++;
        }

        $dv = 11 - ($s % 11);

        $dv = ($dv == 10) ? 'K' : (($dv == 11) ? '0' : $dv);

        if ($dv == $sub_dv) {
            $query = "select rut from campana_cliente_mkt where id_cliente = $id_cliente";
            $rut_titular = $this->db->query($query)->row()->rut;
            $rutCliente = $rut_titular;
            $rutCliente = substr($rutCliente, 0, 4);
            if ($cuatro_primeros_digitos_rut == $rutCliente || $this->session->userdata('campana') > 2) {
                return true;
            } else {
                $this->form_validation->set_message('validarRut', 'El rut no corresponde con el titular');
                return false;
            }
        } else {
            $this->form_validation->set_message('validarRut', 'El rut no es válido');
            return false;
        }
    }

    function curl() {

        $fono = "0998717865";
        $fecha = date("Y-m-d");
        $anexo = "562";
        $rut = "";
        $campana = "5430";
        $campana = str_pad($campana, 4, "0", STR_PAD_LEFT);
        $url = "http://190.196.182.124/busca_mail2.php?anexo=$anexo&telefono=$fono&fecha=$fecha&campana=$campana&borrar=n&rut=$rut";


        echo $url;

        echo "<br>";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($handler);
        curl_close($handler);
        echo "<br> response= $response";
    }

}
?>

