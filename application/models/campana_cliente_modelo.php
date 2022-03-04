<?php

class Campana_cliente_modelo extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function index() {
        
    }

    function set_ultima_gestion($id_campana, $tipo_campana, $id_cliente, $id_nivel4) {
        $campana_cliente = "campana_cliente_mkt";

        $sql = "update " . $campana_cliente . " set ultima_gestion = " . $id_nivel4 . " where id_campana = " . $id_campana . " and id_cliente = " . $id_cliente . "";
        $res = $this->db->query($sql);
        return $res;
    }

    function set_tmp_base_oficial_camp($id_campana, $data_venta, $id_cliente) {
        $tabla = "tmp_base_oficial_camp_$id_campana";



        if ($id_campana == 1) {

            $sql = "select forma_pago from $tabla where id_cliente = $id_cliente limit 1";
            $aux = $this->db->query($sql)->row();
            if (!empty($aux) && count($aux) == 1) {

                $forma_pago = strtoupper($aux->forma_pago);

                switch (true) {
                    case preg_match("/JUMBO/i", $forma_pago) : $forma_pago = '10';
                        break;
                    case preg_match("/PARIS/i", $forma_pago): $forma_pago = '13';
                        break;
                    case preg_match("/EASY/i", $forma_pago): $forma_pago = '14';
                        break;
                    case preg_match("/BUS/i", $forma_pago): $forma_pago = '15';
                        break;
                    case preg_match("/CENCOSUD/i", $forma_pago): $forma_pago = '19';
                        break;
                    case preg_match("/UNIVERSAL/i", $forma_pago): $forma_pago = '20';
                        break;
                    default: $forma_pago = $forma_pago;
                }

                $data_venta["cod_forma_pago"] = $forma_pago;
            }

            $res = $this->db->update($tabla, $data_venta, array('id_cliente' => $id_cliente));
            return $res;
        } else if ($id_campana == 2) {

            $data_venta2["rut_venta"] = $data_venta["rut_venta"];
            $data_venta2["rut_rut_venta"] = $data_venta["rut_rut_venta"];
            $data_venta2["rut_dv_venta"] = $data_venta["rut_dv_venta"];
            $data_venta2["estadocivil"] = $data_venta["estadocivil"];
            $data_venta2["plan_vendido"] = $data_venta["plan_vendido"];

            $res = $this->db->update($tabla, $data_venta2, array('id_cliente' => $id_cliente));
            return $res;
        } else if ($id_campana == 3) {

            $data_venta2["rut_venta"] = $data_venta["rut_venta"];
            $data_venta2["rut_rut_venta"] = $data_venta["rut_rut_venta"];
            $data_venta2["rut_dv_venta"] = $data_venta["rut_dv_venta"];
            $data_venta2["estadocivil"] = $data_venta["estadocivil"];
            $data_venta2["plan_vendido"] = $data_venta["plan_vendido"];
            $data_venta2["venta_email"] = $data_venta["venta_email"];
            $data_venta2["venta_forma_pago"] = $data_venta["venta_forma_pago"];

            if(isset($data_venta["cod_region"])){
            $data_venta2["cod_region"] = $data_venta["cod_region"];
            $data_venta2["cod_ciudad"] = $data_venta["cod_ciudad"];
            $data_venta2["cod_comuna"] = $data_venta["cod_comuna"];
            $data_venta2["dir_calle"] = $data_venta["dir_calle"];
            $data_venta2["dir_nro"] = $data_venta["dir_nro"];
            $data_venta2["dir_comp"] = $data_venta["dir_comp"];
            }   

            $res = $this->db->update($tabla, $data_venta2, array('id_cliente' => $id_cliente));
            return $res;
        } else if ($id_campana == 4) {
            $data_venta2["venta_fecha_visita"] = $data_venta["venta_fecha_visita"];
            $data_venta2["venta_hora_visita"] = $data_venta["venta_hora_visita"];
            $data_venta2["venta_sucursal"] = $data_venta["venta_sucursal"];
            $data_venta2["venta_nuevo_telefono"] = $data_venta["venta_nuevo_telefono"];                 
            $res = $this->db->update($tabla, $data_venta2, array('id_cliente' => $id_cliente));
            return $res;
        
        } else if ($id_campana == 5) {

            $data_venta2["rut_venta"] = $data_venta["rut_venta"];
            $data_venta2["venta_rut"] = $data_venta["rut_rut_venta"];
            $data_venta2["venta_dv"] = $data_venta["rut_dv_venta"];
            $data_venta2["estadocivil"] = $data_venta["estadocivil"];
            $data_venta2["plan_vendido"] = $data_venta["plan_vendido"];
            
            $data_venta2["area_telefono_postal"] = $data_venta["disc_at1"];
            $data_venta2["area_celular_postal"] = $data_venta["disc_at2"];
            $data_venta2["telefono_postal"] = $data_venta["fono_at1"];
            $data_venta2["celular_postal"] = $data_venta["fono_at2"];
            //usuarios
            $data_venta2["nombre1"]     = $data_venta["nombre1"];
            $data_venta2["apepat1"]     = $data_venta["apepat1"];
            $data_venta2["apemat1"]     = $data_venta["apemat1"];
            $data_venta2["rut1"]        = $data_venta["rut1"]; 
            $data_venta2["parentesco1"] = $data_venta["parentesco1"];  
            $data_venta2["porcentaje1"] = $data_venta["porcentaje1"];
            
            $data_venta2["nombre2"]     = $data_venta["nombre2"];
            $data_venta2["apepat2"]     = $data_venta["apepat2"];
            $data_venta2["apemat2"]     = $data_venta["apemat2"];
            $data_venta2["rut2"]        = $data_venta["rut2"]; 
            $data_venta2["parentesco2"] = $data_venta["parentesco2"];  
            $data_venta2["porcentaje2"] = $data_venta["porcentaje2"];
            
            $data_venta2["nombre3"]     = $data_venta["nombre3"];
            $data_venta2["apepat3"]     = $data_venta["apepat3"];
            $data_venta2["apemat3"]     = $data_venta["apemat3"];
            $data_venta2["rut3"]        = $data_venta["rut3"]; 
            $data_venta2["parentesco3"] = $data_venta["parentesco3"];  
            $data_venta2["porcentaje3"] = $data_venta["porcentaje3"];
            
            $data_venta2["nombre4"]     = $data_venta["nombre4"];
            $data_venta2["apepat4"]     = $data_venta["apepat4"];
            $data_venta2["apemat4"]     = $data_venta["apemat4"];
            $data_venta2["rut4"]        = $data_venta["rut4"]; 
            $data_venta2["parentesco4"] = $data_venta["parentesco4"];  
            $data_venta2["porcentaje4"] = $data_venta["porcentaje4"];
            

            if(isset($data_venta["cod_region"])){
            $data_venta2["cod_region"] = $data_venta["cod_region"];
            $data_venta2["cod_ciudad"] = $data_venta["cod_ciudad"];
            $data_venta2["cod_comuna"] = $data_venta["cod_comuna"];
            $data_venta2["dir_calle"] = $data_venta["dir_calle"];
            $data_venta2["dir_nro"] = $data_venta["dir_nro"];
            $data_venta2["dir_comp"] = $data_venta["dir_comp"];
            }   

            $res = $this->db->update($tabla, $data_venta2, array('id_cliente' => $id_cliente));
            return $res;
        } 
    }

}

?>