<?php

class Cliente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Gestion_modelo');
        $this->load->model('Telefono_modelo');
        $this->load->model('Deuda_modelo');
        $this->load->model('Pago_modelo');
        $this->load->model('Direccion_modelo');
        $this->load->model('Tipificacion_modelo');
        $this->load->model('Accion_modelo');
        $this->load->model('Cliente_modelo');
        $this->load->model('Email_modelo');
    }

    function index() {
        $this->load->model('Cliente_modelo');
        $data['title'] = "Mis clientes";
        $data['heading'] = "Mi cabezera";
        $data['clientes'] = $this->Cliente_modelo->get_last_ten_entries();
        //$data['clientes'] = $this->db->get('cliente');
        $this->load->view('cliente', $data);
    }

    function prueba() {
        $query = "UPDATE lista_cliente_mkt SET estado_actual = 0,
		usuario_actual = 2
		where id_cliente = 1
		and estado_actual = 1";
        $query = $this->db->query($query);

        echo $this->db->affected_rows();
    }

    function get_compromiso_cliente($id_cliente) {
        $id_campana = $this->session->userdata('campana_id_campana');
        $this->load->model('Cliente_modelo');
        $query = $this->Cliente_modelo->get_compromiso_cliente($id_cliente, $id_campana);
        $data["compromisos"] = $query->result();
        $this->load->view('vista_div_compromiso_cob', $data);
    }

    function get_compromiso_usuario() {

        $id_usuario = $this->session->userdata('id_usuario');
        $id_campana = $this->session->userdata('campana_id_campana');
        $query = $this->Cliente_modelo->get_compromiso_usuario($id_usuario, $id_campana);
        $data["compromisos"] = $query->result();
        $this->load->view('vista_div_mis_compromisos_cob', $data);
    }

    function get_venta_usuario() {
        $id_usuario = $this->session->userdata('id_usuario');
        $id_campana = $this->session->userdata('campana_id_campana');
        //echo $id_usuario." , ".$id_campana;
        $query = $this->Cliente_modelo->get_venta_usuario($id_usuario, $id_campana);
        //echo $query;
        //exit;

        $data["ventas"] = $query->result();
        $this->load->view('vista_div_venta_mkt', $data);
    }

    function get_gestiones_usuario() {

        $id_usuario = $this->session->userdata('id_usuario');
        $id_campana = $this->session->userdata('campana_id_campana');
        $tipo_campana = $this->session->userdata('campana_tipo');
        $query = $this->Cliente_modelo->get_gestiones_usuario($id_usuario, $id_campana, $tipo_campana);
        $data["gestiones"] = $query->result();
        $this->load->view('vista_div_gestiones_ejecutivo', $data);
    }

    function cargar_registro_buscado() {

        $id_usuario = $this->session->userdata('id_usuario');
        $id_lista = $this->session->userdata('lista_id_lista');
        $num_gestiones = $this->session->userdata('lista_numero_gestiones');
        $id_campana = $this->session->userdata('campana_id_campana');
        $tipo_campana = $this->session->userdata('campana_tipo');
        $id_cliente = NULL;

        $id_cliente_o_deuda = $this->input->post('id');



        $registro_en_uso = $this->Cliente_modelo->get_estado_cliente_a_gestionar_buscador($id_lista, $id_cliente_o_deuda, $tipo_campana);



        if ($id_cliente_o_deuda != NULL && $id_cliente_o_deuda != 0 && $registro_en_uso > 0) {


            if ($tipo_campana == 1) {
                $id_cliente = $this->Cliente_modelo->get_cliente_from_deuda($id_cliente_o_deuda);
                $data['id_cliente'] = $id_cliente;
                $data['deudas'] = $this->Deuda_modelo->get_deudas_cliente($id_cliente);
                $data['pagos'] = $this->Pago_modelo->get_pagos_cliente($id_cliente);
                $data['id_deuda'] = $id_cliente_o_deuda;
                $id_deuda = $id_cliente_o_deuda;
            } else {
                $id_deuda = 0;
                $data['id_cliente'] = $id_cliente_o_deuda;
                $id_cliente = $id_cliente_o_deuda;
            }

            $data['clientes'] = $this->Cliente_modelo->get_cliente($id_campana, $id_cliente, $tipo_campana);
            $data['ultima_gestion'] = $this->Gestion_modelo->get_ultima_gestion($id_campana, $id_cliente_o_deuda, $tipo_campana);
            try {
                $sql = "SELECT p.nombre as producto FROM productos p  where p.id_producto in (select id_producto from lista_producto WHERE id_lista = ? )";
                $data['productos'] = $this->db->query($sql, array($id_lista))->result();
            } catch (Exception $e) {
                $data['productos'] = array();
            }
            //$data['contactabilidad'] = $this->Contactabilidad_modelo->get_contactabilidad();		
            //$data['accion'] = $this->Accion_modelo->get_accion();
            $data['nivel1'] = $this->Tipificacion_modelo->getNivel1();
            $data['emails'] = $this->Email_modelo->get_email_cliente($id_cliente, $tipo_campana);

            $data["horas"] = array(
                '09' => '09',
                '10' => '10',
                '11' => '11',
                '12' => '12',
                '13' => '13',
                '14' => '14',
                '15' => '15',
                '16' => '16',
                '17' => '17',
                '18' => '18',
                '19' => '19',
                '20' => '20'
            );
            $data["minutos"] = array(
                '05' => '05',
                '15' => '15',
                '30' => '30',
                '45' => '45'
            );
            //INSERTO LA GESTION Y RECUPERO SU ID, LUEGO SE LA ENTREGO A LA VISTA.		

            $data["id_gestion"] = $this->Gestion_modelo->set_nueva_gestion($id_campana, $id_cliente, $id_deuda, $id_usuario, $tipo_campana);

            if ($tipo_campana == 1) {
                $data['deudas'] = $this->Deuda_modelo->get_deuda($id_deuda);
                //$data['pagos'] 	= $this->Pago_modelo->get_pagos_cliente($);		
            }

            if ($tipo_campana == 1) {
                $this->load->view('vista_ingresar_caso_cobranza_tab', $data);
            } else {


                $fecha_nacimiento = 'fechanacimiento';

                if ($id_campana == 2 || $id_campana == 5) {
                    $fecha_nacimiento = 'fecha_nac';
                }


                $query = "
				select *,  

				CASE 
				WHEN 
				date_format(str_to_date($fecha_nacimiento , '%d-%m-%Y'),'%Y/%m/%d')  is not null 
				THEN 
				date_format(str_to_date($fecha_nacimiento , '%d-%m-%Y'),'%Y/%m/%d') 

				WHEN 
				date_format(str_to_date($fecha_nacimiento , '%Y/%m/%d'),'%Y/%m/%d')  is not null 
				THEN 
				date_format(str_to_date($fecha_nacimiento , '%Y/%m/%d'),'%Y/%m/%d') 

				ELSE null
				end 
				as fechanacimiento
				
				
				,   CASE 
				WHEN 
				date_format(str_to_date($fecha_nacimiento , '%d-%m-%Y'),'%Y/%m/%d')  is not null 
				THEN 
			 
				(DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), date_format(str_to_date($fecha_nacimiento , '%d-%m-%Y'),'%Y-%m-%d'))), '%Y')+0)   

				WHEN 
				date_format(str_to_date($fecha_nacimiento , '%Y/%m/%d'),'%Y/%m/%d')  is not null 
				THEN 
				 
				(DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), date_format(str_to_date($fecha_nacimiento , '%Y/%m/%d'),'%Y-%m-%d'))), '%Y')+0)  

				ELSE null
				end 
				as edad


				from tmp_base_oficial_camp_$id_campana 
				where id_cliente = $id_cliente limit 1";
                $data["venta"] = $this->db->query($query)->row_array();

                $this->load->view('vista_ingresar_caso_mkt_tab', $data);
            }
        } else {
            echo "Registro en uso por otro agente, intente luego";
        }
    }

    function get_cliente_a_gestionar() {

        $id_usuario = $this->session->userdata('id_usuario');
        $id_lista = $this->session->userdata('lista_id_lista');
        $num_gestiones = $this->session->userdata('lista_numero_gestiones');
        $id_campana = $this->session->userdata('campana_id_campana');
        $tipo_campana = $this->session->userdata('campana_tipo');
        $id_cliente = NULL;
        $data['id_cliente'] = NULL;
        $data['deudas'] = NULL;
        $data['id_deuda'] = NULL;

        $id_cliente_o_deuda = $this->Cliente_modelo->get_cliente_a_gestionar($id_usuario, $id_lista, $num_gestiones, $tipo_campana);

        //sirve para traer telefonos, direcciones y email


        if ($id_cliente_o_deuda != NULL && $id_cliente_o_deuda != 0) {

            $id_deuda = 0;
            $data['id_cliente'] = $id_cliente_o_deuda;
            $id_cliente = $id_cliente_o_deuda;
            $data['clientes'] = $this->Cliente_modelo->get_cliente($id_campana, $id_cliente, $tipo_campana);
            $data['ultima_gestion'] = $this->Gestion_modelo->get_ultima_gestion($id_campana, $id_cliente_o_deuda, $tipo_campana);

            $data['nivel1'] = $this->Tipificacion_modelo->getNivel1();
            try {
                $sql = "SELECT p.nombre as producto FROM productos p  where p.id_producto in (select id_producto from lista_producto WHERE id_lista = ? )";
                $data['productos'] = $this->db->query($sql, array($id_lista))->result();
            } catch (Exception $e) {
                $data['productos'] = array();
            }

            
            
            $data['emails'] = $this->Email_modelo->get_email_cliente($id_cliente, $tipo_campana);
            $data['id_usuario'] = $id_usuario;
            $data["horas"] = array(
                '09' => '09',
                '10' => '10',
                '11' => '11',
                '12' => '12',
                '13' => '13',
                '14' => '14',
                '15' => '15',
                '16' => '16',
                '17' => '17',
                '18' => '18',
                '19' => '19',
                '20' => '20'
            );
            $data["minutos"] = array(
                '05' => '05',
                '15' => '15',
                '30' => '30',
                '45' => '45'
            );


            $fecha_nacimiento = 'fechanacimiento';

            if ($id_campana == 2 || $id_campana == 5) {
                $fecha_nacimiento = 'fecha_nac';
            }

            $query = "select  *, CASE 
				WHEN 
				date_format(str_to_date($fecha_nacimiento , '%d-%m-%Y'),'%Y/%m/%d')  is not null 
				THEN 
				date_format(str_to_date($fecha_nacimiento , '%d-%m-%Y'),'%Y/%m/%d') 

				WHEN 
				date_format(str_to_date($fecha_nacimiento , '%Y/%m/%d'),'%Y/%m/%d')  is not null 
				THEN 
				date_format(str_to_date($fecha_nacimiento , '%Y/%m/%d'),'%Y/%m/%d') 

				ELSE null
				end 
				as fechanacimiento

			,   CASE 
				WHEN 
				date_format(str_to_date($fecha_nacimiento , '%d-%m-%Y'),'%Y/%m/%d')  is not null 
				THEN 
			 
				(DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), date_format(str_to_date($fecha_nacimiento , '%d-%m-%Y'),'%Y-%m-%d'))), '%Y')+0)   

				WHEN 
				date_format(str_to_date($fecha_nacimiento , '%Y/%m/%d'),'%Y/%m/%d')  is not null 
				THEN 
				 
				(DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), date_format(str_to_date($fecha_nacimiento , '%Y/%m/%d'),'%Y-%m-%d'))), '%Y')+0)  

				ELSE null
				end 
				as edad
				


			from tmp_base_oficial_camp_$id_campana 
			where id_cliente = $id_cliente_o_deuda limit 1";

            if ($id_campana == 4) {
                $this->db->order_by('codigo','asc');
                $data['sucursales'] = $this->db->get('sucursal_paris')->result();
 
                //paris no tiene fecha de nacimiento  
                $query = "select  * from tmp_base_oficial_camp_$id_campana where id_cliente = $id_cliente_o_deuda limit 1";
            }
 
            $data["venta"] = $this->db->query($query)->row_array();
 
            //INSERTO LA GESTION Y RECUPERO SU ID, LUEGO SE LA ENTREGO A LA VISTA.		
            $data["id_gestion"] = $this->Gestion_modelo->set_nueva_gestion($id_campana, $id_cliente, $id_deuda, $id_usuario, $tipo_campana);
            $this->load->view('vista_ingresar_caso_mkt_tab', $data);
        } else {
            echo "<strong>[MENSAJE]</strong>: NO SE DISPONE DE REGISTROS ASIGNADO.";
        }
    }

    function listar_columnas() {

        // no va	echo "<option value='0' selected>*Seleccione campo*</option>";

        $this->load->model('Cliente_modelo');
        $columnas = $this->Cliente_modelo->get_columnas();


        if (!empty($columnas)) {

            echo "<option value='nombre'>Nombre</option>";
            echo "<option value='rut'>Rut (sin punto ni dv)</option>";
            echo "<option value='telefono'>Telefono</option>";
        } else {
            echo "<option value='0' selected>--</option>";
        }
    }

    /* FUNCIONES DE TESTEO 

      ESTAS FUNCIONES PERTENECEN A LOS MODELOS Y HAN SIDO MODIFICADAS UN POCO PARA VER LO KE ARROJAN
      ESTO ES PARA DEBUG


     */

    //http://localhost/gestion2010/index.php/cliente/get_cliente_a_llamar/3/4/2/
    function get_cliente_a_llamar($usuario, $lista, $num_gestiones) {
        //get_cliente_a_llamar(IN param_usuario INT(11), IN param_lista INT(11), IN param_gestiones INT(11), OUT salida INT(11))
        $db2 = $this->load->database('default2', TRUE);
        $query = $db2->query("call get_cliente_a_llamar(" . $usuario . "," . $lista . "," . $num_gestiones . ",@salida);");

        var_dump($query->result());
        echo "<br>";
        foreach ($query->result() as $row):
            $cliente = $row->id_cliente;
        endforeach;
        echo $cliente;
    }

    function buscar_cliente() {

        $columna_a_buscar = $this->input->post('columna_a_buscar');
        $valor_a_buscar = $this->input->post('valor_a_buscar');

        $tipo_campana = $this->session->userdata('campana_tipo');
        $id_campana = $this->session->userdata('campana_id_campana');
        $id_lista = $this->session->userdata('lista_id_lista');


        $this->form_validation->set_rules('valor_a_buscar', 'Valor a buscar', 'required');

        //corre validacion
        //$this->form_validation->set_message('is_natural_no_zero', 'Seleccione opcion para %s');
        $this->form_validation->set_message('required', 'Debe ingresar valor de busqueda');

        $success = $this->form_validation->run();




        if ($success) {
            echo "Buscando por $columna_a_buscar (maximo 20 resultados).";
            $this->load->model('Cliente_modelo');
            $data['clientes'] = $this->Cliente_modelo->buscar_registros($columna_a_buscar, $valor_a_buscar, $tipo_campana, $id_lista);

            $this->load->view('vista_listar_registro_encontrado.php', $data);
        } else {
            echo strip_tags(validation_errors()) . "---";
        }
        /* $tipo */
    }

}

