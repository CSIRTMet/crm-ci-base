<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <title>CRM Campaign Manager Extractor 
  </title>
	<link rel="StyleSheet" href="<?=base_url()?>/css/CSS/style_campana.css" type="text/css"> 
	<script language="javascript" type="text/javascript" src="<?=base_url()?>/js/jquery.js"></script>	
	<script language='javascript' type='text/javascript' src='<?=base_url()?>/js/calendar.js'></script>
	<script language='javascript' type='text/javascript' src='<?=base_url()?>/js/onlyNumeric.js'></script>
	<script language='javascript' type='text/javascript' src='<?=base_url()?>/js/onlyAlfa.js'></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>/js/calendario/calendar-win2k-1.css" title="win2k-cold-1" />
	<script type="text/javascript" src="<?=base_url()?>/js/calendario/calendar.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/calendario/lang/calendar-en.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/js/calendario/calendar-setup.js"></script>
	
	<script language="javascript" type="text/javascript">
		
	function viewMouseOver( id )
	{  $("#" + id).addClass("viewHover");	}
	
	function viewMouseOut( id )
	{  $("#" + id).removeClass("viewHover");  }
	
	
	</script>
	<style type="text/css" media="screen,projection">
		@import url(<?=base_url()?>/js/calendar.css);
	</style>
</head>
<body onLoad="" style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b">

<?php
$campo_tipo = array();
$fecha_enviada = array();

$columna = $_POST["columna"];
$condicion = $_POST["condicion"];
$texto = $_POST["txtCharNum"];
$fecha = $_POST["Date"];
$vRadio = $_POST["vRadio"];
$campo_tipo = split("/",$columna);
$fecha_enviada = split("/",$fecha);


if($fecha != '' and $fecha != null){
	$parametro="convert(varchar(10), ".$campo_tipo[1].", 112) ";
	$valor=$fecha_enviada[2].$fecha_enviada[1].$fecha_enviada[0];
	//echo "<br><br>".$sentencia." ";	
}
else{
	$parametro=$campo_tipo[1];
		$valor=$texto;
}
if($condicion == 'LIKE'){
	$sentencia = $parametro." like '%".$valor."%' ";
}else{
	if($condicion == 'IGUAL'){
		$sentencia = $parametro." = '".$valor."' ";
	}else{
		if($condicion == 'DISTINTO'){
			$sentencia = $parametro." <> '".$valor."' ";
		}else{
			if($condicion == 'MAY_O_IGUAL'){
				$sentencia = $parametro." >= '".$valor."' ";
			}else{
				if($condicion == 'MEN_O_IGUAL'){
					$sentencia = $parametro." <= '".$valor."' ";
				}else{
					if($condicion == 'MAY'){
						$sentencia = $parametro." > '".$valor."' ";
					}else{
						if($condicion == 'MEN'){
							$sentencia = $parametro." < '".$valor."' ";
						}else{
							if($condicion == 'COM_CON'){
								$sentencia = $parametro." like '".$valor."%' ";
							}else{
								if($condicion == 'TER_CON'){
									$sentencia = $parametro." like '%".$valor."' ";
								}else{
									if($condicion == 'NO_COM_CON'){
										$sentencia = $parametro." no like '".$valor."%' ";
									}else{
										if($condicion == 'NO_TER_CON'){
											$sentencia = $parametro." no like '%".$valor."' ";
										}else{
											if($condicion == 'NO_LIKE'){
												$sentencia = $parametro." no like '%".$valor."%' ";
											}else{
												if($condicion == 'AGRUPA'){
													$sentencia = $parametro." in ( '".$valor."') ";
												}
											}
										}
									}		
								}
							}
						}
					}
				}
			}
		}
	}	
}
$_SESSION["consulta"]->addConditions($sentencia);
$_SESSION["consulta"]->addAndOr($vRadio);
echo $campo_tipo[0];

?>
<script>
	//$.get("ajax_lista_condiciones.php", function(data)
	//{	
		//mielemento = window.opener.document.getElementById('condiciones');
		//mielemento = document.getElementById('condiciones');
		//mielemento = $(mielemento);
		//$(mielemento).html(data);  
		//$("#condiciones").html( data );  
		//window.opener.document.getElementById('condiciones').value = data;
	//});
	window.opener.ViewConditions();
	window.close();
	
</script>
</body>
</html>