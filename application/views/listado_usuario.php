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


#Layer4 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;
	overflow: scroll;	

	
}
#Layer5 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}
#Layer6 {
	position:relative;
	width:95%;
	text-align:justify;
	padding:7px;

}
#Layer7 {
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

-->
</style>
<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.style5 {color: #000000}
.style6 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->
</style> <div align="center" class="style6">LISTADO DE USUARIOS
    </div>
<div id="Layer1">
 
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid3-row-alt">
     <tr>
	<td>
	<a href="<?php echo base_url() ?>index.php/usuario/ingresar_usuario">Nuevo Usuario
	</td>
    </tr> 
    <tr>
      <td width="145" class="x-combo-list-hd">CLIENTE</td>
      <td width="140" class="x-combo-list-hd">SERVICIO</td>
      <td width="227" class="x-combo-list-hd">CARTERA</td>
      <td width="399" class="x-combo-list-hd">DIA Y HORA </td>
    </tr>
    <tr>
      <td><strong>Autopista Vespucio Norte </strong></td>
      <td>COBRANZA_JUDICIAL</td>
      <td></td>
      <td nowrap="nowrap"><? 
$fecha = time ();  echo date ( "d-m-Y h:i:s" , $fecha ); 
?>
</td>
    </tr>
<tr><td><h3>Mis Usuarios</h3></td>
</tr>
<tr>
<td>ID</td>
<td>Rut</td>
<td>Usuario</td>
<td>Nombre Usuario</td>
<td>Tipo Usuario</td>
<td>Accion</td>
</tr>
<tr>

<?php
$i=1;
 foreach($results as $item):?>
<td><?php echo $i; ?></td>
<td><?php echo $item->rut; ?></td>
<td><?php echo $item->nombre_usuario; ?></td>
<td><?php echo $item->nombre; ?></td>
<td>
<?php 
	if($item->tipo_usuario == 0 ) echo "Sin tipo Usuario";
	if($item->tipo_usuario == 1 ) echo "Agente";
	if($item->tipo_usuario == 2 ) echo "Supervisor";
	if($item->tipo_usuario == 3 ) echo "Administrador";

 ?></td>
<td>
<a href="<?php echo base_url() ?>index.php/usuario/edita_usuario/<?php echo $item->id_usuario?>">Editar
</td>
</tr>
<tr>
<?php 
$i++;
endforeach;?>
</tr>
<tr><td>
<?php echo $this->pagination->create_links(); ?>

</td>
</tr>	
  </table>
</div>
