<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>Kubo Preview
  </title>
	<LINK rel="StyleSheet" href="<?=base_url()?>/css/CSS/estilos.css" type="text/css"> 
<link rel="StyleSheet" href="<?=base_url()?>/css/CSS/style_campana.css" type="text/css"> 
	<script language='javascript' type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 	
	
	
</head>
<body style="color: rgb(0, 0, 0);" alink="#ee0000" link="#0000ee" vlink="#551a8b" bgcolor= "#EEEEEE">
<br>
<div class="DOMO_Div_Body" id="DOMO_Div_Body">
<h2>&nbsp;</h2>
<h2>&nbsp;</h2>
<h2>Vista Previa</h2>
&nbsp;Total de Registros(cruz): <b><?=$records;?></b>
<br>
&nbsp;Total de deudas: <b><?=$deudas;?></b>
<br>
&nbsp;Mostrando: 
<?php 
if($records<100)
	echo "<b>".$records."</b> ";
else
	echo "<b>12</b> ";
?>de <b><?=$records;?></b>
<br><br>



<?php 
$tipo = $this->session->userdata('campana_tipo');
if ($tipo == 2) { // MARKETING
?>

<table border="1" cellspacing="2" cellpadding="2" align="center" width="90%" bgcolor= "#EEEEEE">
	<thead>
	<tr>
	
    <th nowrap><small>Estado</small></th>
    <th nowrap><small>Ciudad</small></th>
	<th nowrap><small>Comuna</small></th>
    <th nowrap><small>Region</small></th>

    <th nowrap><small>Rut</small></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach($clientes as $row)
	{ ?>
    <tr>

    
 
        <td nowrap><?php  
			switch ($row->estado_registro) {
			case 0: echo "Nuevo"; break;
			case 1: echo "Ag. Privado"; break;
			case 2: echo "Ag. Publico"; break;
			case 3: echo "Pendiente"; break;
			case 4: echo "Terminado"; break;
			default:
			   echo "$row->estado_registro No definido";
			}
		 ?></td>
        <td nowrap><?php echo $row->nombre_ciudad ?></td>
        <td nowrap><?php echo $row->nombre_comuna ?></td>
        <td nowrap><?php echo $row->nombre_region ?></td>
       
        <td nowrap><?php echo $row->rut ?></td>
       
    </tr>
	<?php }
	?>
	</tbody>
</table>



<?php } else { ?>
<table border="1" cellspacing="2" cellpadding="2" align="center" width="90%" bgcolor= "#EEEEEE">
	<thead>
	<tr>
    <th nowrap><small>Fin cartera</small></th>
    <th nowrap><small>Logo</small></th>
    <th nowrap><small>Monto</small></th>
    <th nowrap><small>Ciudad</small></th>
	<th nowrap><small>Comuna</small></th>
    <th nowrap><small>Region</small></th>
    <th nowrap><small>Nro. Documento</small></th>
    <th nowrap><small>Nro. Documento Origen</small></th>
    <th nowrap><small>Rut</small></th>
    
	
	</tr>
	</thead>
	<tbody>
	<?php
	foreach($clientes as $row)
	{ ?>
    <tr>

        <td nowrap><?php echo $row->fecha_fin_cartera ?></td>
        <td nowrap><?php echo $row->logo ?></td>
        <td nowrap><?php echo $row->monto_documento ?></td>
        <td nowrap><?php echo $row->nombre_ciudad ?></td>
        <td nowrap><?php echo $row->nombre_comuna ?></td>
        <td nowrap><?php echo $row->nombre_region ?></td>
        <td nowrap><?php echo $row->numero_documento ?></td>
        <td nowrap><?php echo $row->numero_documento_anterior ?></td>
        <td nowrap><?php echo $row->rut ?></td>
       
    </tr>
	<?php }
	?>
	</tbody>
</table>



<?php } ?>


<br>
</div>
</body>
</html>