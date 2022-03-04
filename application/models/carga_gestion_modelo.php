<?php

class Carga_gestion_modelo extends CI_Model
{	
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function index()
	{
		
	}
	



function cargar_archivo2($archivo, $nombre_archivo, $id_nomina) {

        $sql = "truncate table prov_temp_csv;";
        $this->db->query($sql);

        // $sql2 = "LOAD DATA LOCAL INFILE ? REPLACE INTO TABLE prov_temp_csv CHARACTER SET latin1 FIELDS TERMINATED BY \"\;\" ENCLOSED BY '\"' ESCAPED BY '\\\\' LINES TERMINATED BY '\\r\\n' IGNORE 1 LINES (campo1,campo2,campo3,campo4,campo5,campo6)"
        //        . "";
        // $this->db->query($sql2, array($archivo));


        $this->load->library("CSVReader");
        $reader = new CSVReader();
        $array = $reader->parse_file($archivo);

        foreach ($array as $fila):
            $campos = "";
            $valores = "";
            $n = 1;
            //var_dump($fila);
            foreach ($fila as $row => $key):
                if ($n == 1) {
                    $campos = $campos . " campo" . $n;
                    $valores = $valores . " '$key' ";
                } else {
                    $campos = $campos . ", campo" . $n;
                    $valores = $valores . ", '$key' ";
                }

                $n++;
                if ($n > 9)
                    break; //no hay mas campos disponibles en la tabla
            endforeach;

            $sql = "insert into prov_temp_csv($campos) values($valores)";
            $this->db->query($sql);
        //echo $sql."<br>";
        endforeach;



        $sql3 = "update prov_temp_csv set id_nomina = ? where 1;";
        $this->db->query($sql3, array($id_nomina));

        $sql4 = "insert into prov_extranjero (id_nomina, codigo_socio_negocio, socio_de_negocio, factura, vencimiento, moneda, total_docto_me)
		(select id_nomina, campo1, campo2, campo3, campo4, campo5, campo6 from prov_temp_csv where 1)";
        $this->db->query($sql4);
    }











	function get_cargas_campana($campana){
		$sql = "select *, (select tipo_carga.nombre from tipo_carga where tipo_carga.id_tipo_carga = carga.id_tipo_carga ) as tipo,
		(select count(*) from carga_cliente_mkt where carga_cliente_mkt.id_carga = carga.id_carga) as registros from carga where id_campana = ?";
		$query = $this->db->query($sql,array($campana));
		return $query->result();
	}
	
	function add_carga($arreglo){
	
		$data["tipo_campana"] = $this->session->userdata("campana_tipo");
		$data['id_campana'] = $arreglo['id_campana'];
		$data['nombre'] = $arreglo['nombre'];
		$data['id_tipo_carga'] = $arreglo['id_tipo_carga'];
		$data['id_usuario'] = $arreglo['id_usuario'];
		$data['estado_carga'] = $arreglo['id_usuario'];
		$data['fecha'] = date("Y-m-d H:m:s");
		$data['nombre_archivo'] = $arreglo['archivo'];
		
		$this->db->insert('carga',$data);
		return $this->db->insert_id();
	}
	
	
	function cargar_archivo($archivo, $id_carga, $id_campana){
	
		//$sql =  "LOAD DATA LOCAL INFILE ? INTO TABLE `tmp_base_cargada_manual_demo` FIELDS TERMINATED BY ';' ENCLOSED BY '\"' ESCAPED BY '\\'  IGNORE 1 LINES; ";
		


		$sql = "truncate table tmp_carga_camp_".$id_campana;
		$this->db->query($sql);
		$sql2 = "LOAD DATA LOCAL INFILE ? REPLACE INTO TABLE tmp_carga_camp_".$id_campana." CHARACTER SET latin1 FIELDS TERMINATED BY \";\" ENCLOSED BY '\"' ESCAPED BY '\\\\' LINES TERMINATED BY '\\r\\n' IGNORE 1 LINES"
    . "";
	
               /* echo $sql2;
                echo $archivo;
                exit;*/
		$this->db->query($sql2,array($archivo));
		
		//LLAMO AL SP QUE INSERTA EN TODAS LAS TABLAS:

		
		$db2 = $this->load->database('default2', TRUE);	
                
		if($id_campana == 1){
		$query = $db2->query("call carga_manual_base(".$id_campana.", ".$id_carga.");");
		}
		else if($id_campana == 2){
		$query = $db2->query("call carga_manual_base_metlife(".$id_campana.", ".$id_carga.");");
		}
                else if($id_campana == 3){
		$query = $db2->query("call carga_manual_base_metlife_dent_odont(".$id_campana.", ".$id_carga.");");
		}
                else if($id_campana == 4){
		$query = $db2->query("call carga_manual_base_paris(".$id_campana.", ".$id_carga.");");
		}
                else if($id_campana == 5){
		$query = $db2->query("call carga_manual_base_metlife_vida_protegida(".$id_campana.", ".$id_carga.");");
		}
		
		
		
	}
	
	

	function edit_carga($data){
		$this->db->update('carga',$data,array('id_carga'=>$data['id_carga']));
	}
	
	function del_carga($id){
	
	/*  sacar de la tabla carga
		sacar de la tabla carga_clinte
		sacar clientes de la carga de campana_cliente, PREOCUPARSE DE LOS DUPLICADOS 
		sacar clientes de la carga de lista_cliente	si existen (puede tomarse en cuenta la tabla campana_cliente resultante )
		sacar clientes de la carga de la tabla cliente
		sacar clientes sacados de la tabla cliente de la tabla deuda, pago cuota, direccion, telefono, email, judicial
		sacar clientes de la carga de la tabla gestion

	 */ 


		$tables = array('carga');
		$this->db->where('id_carga',$id);
		//$this->db->where('nombre_archivo is null');
		$this->db->delete($tables);  
	}
	
	function del_gestion_clientes_eliminados($id){
	  
	}
	
	


	
	
	
}
?>