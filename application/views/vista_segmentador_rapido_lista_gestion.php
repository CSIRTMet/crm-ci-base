 



<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>KUBO - Segmentacion rapida de lista</title> 


<script src="<?php echo base_url(); ?>js/jquery.min.1.5.1.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.tzCheckbox.js"></script> 

<script type="text/javascript"> 
$(document).ready(function(){
	
	$('input[type=checkbox]').tzCheckbox({labels:['Enable','Disable']});
});


function enviarFormualario()
{
	$('#form1').submit();
	
	
}



</script>


<style type="text/css">
<!--
#Layer1 {

	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
}
#Layer2 {

	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;	
}
#Layer3 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
}

table { 

border-style:solid;
    border-width:1px;
    border-color:#9aaab4;
    padding:4pt;
    text-align:left;
    margin-left:10px;
    margin-right:6px;
 background-color: #edf1f3 }
 
 H1 {
    font-size:150%;
    padding-left: 10px;
    text-align: left;
}
H2 {
    font-size:150%;
    padding-left: 10px;
    text-align: left;
}
H3 {
    padding-left: 10px;
    text-align: left;
}

H4 {
    padding-left: 10px;
    text-align: left;
}
H5 {
    padding-left: 10px;
    text-align: left;
}
 



 





*{
	margin:0;
	padding:0;
}
 

#page{
	width:600px;
	margin: 100px auto 100px;
}

#page ul{
	list-style:none;
}

#page li{
	padding: 15px;
}

#page li:nth-child(even){
	background:url('images/line_bg.png') repeat-y center center;
}

#page #titulo{
	width:370px;
	font-size:20px;
	color:#000;
	display: inline-block;
}

 
 


-->
</style>
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/jquery.tzCheckbox.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/botones.css" />
<link href="../../css/jquery.tzCheckbox.css" rel="stylesheet" type="text/css" /> 
<link href="../../css/botones.css" rel="stylesheet" type="text/css" /> 

<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/layout-default-latest.css" rel="stylesheet" type="text/css" />
<link href="../../css/complex.css" rel="stylesheet" type="text/css" />

 

</head> 
<body style="background:url('<?php echo base_url() ?>css/images/page_bg.png') repeat-x;"> 
 
 <p>&nbsp;</p>
<p align="center">SEGMENTACION DE REGISTROS</p>

<?php  foreach($listas as $lista): ?>



<p align="center">LISTA: <?php echo $lista->nombre; ?> </p>
<p align="center">REGISTROS:  <?php  echo $lista->total_registros; ?></p>

<ul> 
    		<li align="center" style="size:12px;">Registros terminados:  <?php  echo $lista->terminado; ?></li>
 
            <li align="center" style="size:12px;">Registros disponibles para gestionar:  <?php  echo $lista->disponible; ?></li>
             
</ul>       
<p>
  <?php 

$id_lista 				=   $lista->id_lista;
$sin_gestion		 	=  ($lista->segmentacion_sin_gestion==1)? "checked":"";
$agendamiento_privado 	=  ($lista->segmentacion_ag_privado==1)? "checked":"";
$agendamiento_publico 	=  ($lista->segmentacion_ag_publico==1)? "checked":"";
$pendiente 				=  ($lista->segmentacion_pendiente==1)? "checked":"";

?>
  
  <?php  endforeach; ?>
</p>
<p align="center"><a href="<?php echo base_url() ?>index.php/lista_gestion/index" class="negative">
        [Volver a las listas] 
    </a></p>
<form name="form1" id="form1" method="post" action="<?php echo base_url() ?>index.php/lista_gestion/segmentar_rapido_lista_gestion/<?php  echo $id_lista; ?>">

<input name="id_lista" type="hidden" id="id_lista" value="<?php echo $id_lista; ?>"  />

  
  <div id="page"> 

 <span id="mensaje"></span>
<ul> 
    		<li>
<span id="titulo">Registros sin Gestion [<?php  echo $lista->sin_gestion; ?>]: </span>
<input name="sin_gestion" type="checkbox" id="sin_gestion" value="1" <?php echo $sin_gestion; ?> data-on="Activado" data-off="No Activado" />
	  </li> 
              
          	<li>
             <span id="titulo">Registros en Agendamiento Privado [<?php  echo $lista->aprivado; ?>]: </span>
             <input name="agendamiento_privado" type="checkbox" id="agendamiento_privado" value="1"  <?php echo $agendamiento_privado; ?> data-on="Activado" data-off="No Activado"/>
            </li> 
               
             <li>
              <span id="titulo">Registros en Agendamiento Publico [<?php  echo $lista->apublico; ?>]: </span>
              <input name="agendamiento_publico" type="checkbox" id="agendamiento_publico" value="1" <?php echo $agendamiento_publico; ?> data-on="Activado" data-off="No Activado" />
             </li> 
               
             <li>
              <span id="titulo">Registros en estado Pendiente [<?php  echo $lista->pendiente; ?>]: </span>
              <input name="pendiente" type="checkbox" id="pendiente" value="1" <?php echo $pendiente; ?> data-on="Activado" data-off="No Activado" />
             </li>
            
            
             <div class="buttons"><a href="#" onClick="enviarFormualario();">Guardar</a>    <a href="<?php echo base_url() ?>index.php/lista_gestion/index" class="negative">
         
        Cancel
    </a>
</div>
  
  </ul>
 
 
    <!-- You are free to remove this footer --> 
 
</div> 
 </form>
 

 
</body> 
</html> 



