
<html>
<head>
<meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 



<link href="<?php echo base_url() ?>/css/estiloskubo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 

<style type="text/css">

.DOMO_view_value_vista {
font-family:   sans-serif;
	font-size: 11pt;
        font-weight:  bold;
	color: #004F75  ;
	vertical-align: text-top;
	text-align: left;

	background-color:#BECEEF;
	/* background-color: #BCC7D6; */
}



</style>



 <link href="../../css/layout-default-latest.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>/css/layout-default-latest.css" rel="stylesheet" type="text/css">
<title>Gestiones del Cliente</title>
</head>
<body >


<table width="100%" border="0" cellpadding="2" cellspacing="3" class="ui-layout-pane">
  <tr>
    <td colspan="9" class="DOMO_view_value_vista"></td>
  </tr>
  
  
  <tr>
    <td class="ui-layout-resizer"><div align="center"><strong>Gestion</strong></div></td>
    <td class="ui-layout-resizer"><div align="center"><strong>Fecha</strong></div></td>
	<td class="ui-layout-resizer"><div align="center"><strong>Usuario</strong></div></td>
    <td class="ui-layout-resizer"><div align="center"><strong>Nivel 3</strong></div></td>
    <td class="ui-layout-resizer"><div align="center"><strong>Nivel 4</strong></div></td>
    <td class="ui-layout-resizer"><div align="center"><strong>Fono</strong></div></td>
	<td class="ui-layout-resizer"><div align="center"><strong>Glosa</strong></div></td>
	
  </tr>
  
  
  <?php foreach($gestiones as $gestion):?>


	
  <tr>
    <td   nowrap class="content"><?php echo $gestion->id_gestion; ?></td>
    <td    nowrap class="content"><?php echo $gestion->fecha_contacto ?></td>
    <td  nowrap class="content"><?php echo $gestion->nombre_usuario; ?></td>

     
    <td   nowrap class="content"><?php echo $gestion->nivel3 ?></td>
    <td   nowrap class="content"><?php echo $gestion->nivel4 ?></td>
    <td   nowrap class="content"><?php echo $gestion->numero_llamado ?></td>
	<td   nowrap class="content"><?php echo $gestion->glosa ?></td>
	
  </tr>
   <?php endforeach;?>
  
  
  
  <tr>
    <td colspan="9" bgcolor="#666666"><label>
      <div align="center">
        <input name="Cerrar" type="button" id="Cerrar" value="Cerrar" onClick="window.close();">
      </div>
    </label></td>
  </tr>
</table>




 
</body></html>
