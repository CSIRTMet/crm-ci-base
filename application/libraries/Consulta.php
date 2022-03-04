<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Consulta{

	private $fields;
	private $sources;
	private $conditions;
	private $finalquery;
	private $finalqueryReciclaje;
	private $andOr;
	private $valueParentesis;
	
	// constructor de la clase
	public function __construct()
	{
		$this->fields = array();
		$this->sources = "";
		$this->valueParentesis = "";
		$this->andOr =  array();
		//$this->sources = array();    //usar cuando se seleccione más de una tabla en una version posterior
		$this->conditions = array();
	}
	
	public function loadQuery(){
		$f = 1;
		$j = 0;
		$parDer="";
		$parIzq="";
		$this->finalqueryUpdate = "";
		$this->finalqueryReciclaje = "";
		if(sizeof($this->fields) == 0){
			$this->finalquery = "SELECT * ";
		}
		else{
			$this->finalquery = "SELECT ";
					
			foreach($this->fields as $indice=>$actual){
				if($f==1){	$this->finalquery .= "".$actual." ";}
				else{	$this->finalquery .= ", ".$actual." ";}
				$f++;
			}
		}
		$this->finalquery .= " FROM ".$this->sources." ";
		if($this->testConditions()){ 
			$this->finalquery .= " WHERE ";
			$f = 1;
			$valueParentesis = str_split($this->valueParentesis); // convierto el string en un arreglo
			for($i=0;$i<sizeof($this->conditions);$i++)
			{
				if($this->conditions[$i]!='' and $this->conditions[$i]!=null)
				{
					if(count($valueParentesis)>$j){
						$valParentesis=$this->convertir_a_numero($valueParentesis[$j]);
						if($valParentesis == 1){
							$parIzq="(";
						}else{
							$parIzq="";
						}
					}
					$j++;
					if(count($valueParentesis)>$j){
						$valParentesis=$this->convertir_a_numero($valueParentesis[$j]);
						if($valParentesis == 1){
							$parDer=")";
						}else{
							$parDer="";
						}
					}
				}
				if($f==1){
					$this->finalquery .= $parIzq." ".$this->conditions[$i];
					$this->finalqueryReciclaje .= $parIzq." ".$this->conditions[$i];
				}else{
					$this->finalquery .= " ".$this->andOr[$i]." ".$parIzq." ".$this->conditions[$i];
					$this->finalqueryReciclaje .= " ".$this->andOr[$i]." ".$parIzq." ".$this->conditions[$i];
				}
				$this->finalquery .= $parDer;
				$this->finalqueryReciclaje .= $parDer;
				$f++;
				$j++;
			}
		}
	}
	
	
	public function get_String_Conditions()
	{
		$sql_conditions = "";
		$f = 1;
		$j = 0;
		$parDer = "";
		$parIzq = "";
		if($this->testConditions()){ 
			$sql_conditions .= " WHERE ";
			$f = 1;
			$valueParentesis = str_split($this->valueParentesis);
			for($i=0;$i<sizeof($this->conditions);$i++)
			{
				if($this->conditions[$i]!='' and $this->conditions[$i]!=null)
				{
					if(count($valueParentesis)>$j){
						$valParentesis=$this->convertir_a_numero($valueParentesis[$j]);
						if($valParentesis == 1){
							$parIzq="(";
						}else{
							$parIzq="";
						}
					}
					$j++;
					if(count($valueParentesis)>$j){
						$valParentesis=$this->convertir_a_numero($valueParentesis[$j]);
						if($valParentesis == 1){
							$parDer=")";
						}else{
							$parDer="";
						}
					}
				}
				if($f==1){
					$sql_conditions .= $parIzq." ".$this->conditions[$i];
				}else{
					$sql_conditions .= " ".$this->andOr[$i]." ".$parIzq." ".$this->conditions[$i];
				}
				$sql_conditions .= $parDer;
				$f++;
				$j++;
			}
		}
		return $sql_conditions;
	}
	
	public function resetVar(){
		$this->fields = null;
		$this->sources = null;
		$this->conditions = null;
		$_SESSION["valueParentesis"] = "";
	}
	
	public function addAndOr($andOr){
		$this->andOr[sizeof($this->andOr)] = $andOr;
	}
	public function addFields($field){
		$this->fields[$field] = $field;
	}
	public function addSources($sources){
		$this->sources = $sources;
	}
	public function addConditions($conditions){
		array_push($this->conditions,$conditions);
	}	
	
	public function addValueParentesis($valueParentesis){
		$this->valueParentesis = $valueParentesis;
	}
	
	/* public function delFields($field){
		unset($this->fields[$field]);
	} */
	public function delAndOr($indice){
		//$this->andOr[$indice] = null;
		array_splice($this->andOr,$indice,1);
	}
	public function delConditions($indice){
		array_splice($this->conditions,$indice,1);
		//echo $this->valueParentesis." con indice $indice; ";
		$valueParentesis = str_split($this->valueParentesis); //paso el string a arreglo
		$izq = $indice*2;
		$der = ($indice*2)+1;
		//PRIMERO SE BORRA POR LA DERECHA
		array_splice($valueParentesis, $der, 1); //derecha
		array_splice($valueParentesis, $izq, 1); //izquierda 
		$valueParentesis = $valueParentesis;
		$num =count($valueParentesis); 
  		$i=0; 
        $str_valueParentesis = '';
		for($i=0;$i<$num;$i++){ 
			  $str_valueParentesis.=$valueParentesis[$i]; 
		} 

		$this->valueParentesis =  $str_valueParentesis;
		//echo "$str_valueParentesis con indice izquierda = $izq y der = $der" ;
		
	}
	
	
	public function getFields(){
		return $this->fields;
	}	
	public function getSources(){
		return $this->sources;
	}	
	public function getConditions(){
		return $this->conditions;
	}	
	public function getAndor(){
		return $this->andOr;
	}
	public function getFinalQuery(){
		return $this->finalquery;
	}
	public function getValueParentesis()
	{
		return $this->valueParentesis;
	}
	
	public function getFinalQueryReciclaje($app,$script){
		
		$SQL= "UPDATE CLIENTE_".$app." SET BLOQUEO = 0 
		 WHERE ID_CLIENTE_".$app." IN ( select id_Cliente_".$app." 
		 FROM ".$this->sources." WHERE  ".$this->finalqueryReciclaje."); 
		 
		 UPDATE agenda_".$script." set estado = 1 WHERE id_llamada in 
		 (SELECT id_llamada_".$script." FROM llamada_".$script." 
		 WHERE id_prospecto_llamada in (
		 	SELECT id_Cliente_".$app." FROM ".$this->sources." WHERE  ".$this->finalqueryReciclaje.") )";
		 
		 return $SQL;
		 
	}
	public function testConditions(){
		$flag = false;
		for($i=0;$i<sizeof($this->conditions);$i++){
			if($this->conditions[$i]!='' and $this->conditions[$i]!=null){
				$flag = true;
			}
		}
		return $flag;
	}
	public function getRegistrosAReciclar(){
		include('inc.conexion.php');
		$sql =  "SELECT count(*) as num FROM ".$this->sources." WHERE  ".$this->finalqueryReciclaje."";
		
		$resultado = odbc_exec($conexion, $sql);
		$field = odbc_fetch_object($resultado);
		$numero = $field->num;
		
	    return "Se va a operar sobre un total de : ".$numero." registros";
		
		
	}
	public function convertir_a_numero($str){
	  $legalChars = "%[^0-9\-\. ]%";
	  $str=preg_replace($legalChars,"",$str);
	  return $str;
	}
}

?>