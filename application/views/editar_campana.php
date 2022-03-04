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
</style> <div align="center" class="style6">EDITAR CAMPANA
    </div>
<div id="Layer1">
 
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-grid3-row-alt">
    
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
<tr>
      <td colspan="2" class="x-combo-list-hd"><?php echo validation_errors(); ?></td>
      <td colspan="2" class="x-combo-list-hd"></td>
    </tr>
<?php
 foreach($results as $item):
	$id_campana = $item->id_campana;
	$id_empresa = $item->id_empresa;	
	$nombre = $item->nombre;
	$fecha_inicio = $item->fecha_inicio;
	$fecha_termino = $item->fecha_termino;
	$codigo = $item->codigo;
	$estado = $item->estado;
	$tipo = $item->tipo;
endforeach;
?>

<form method="post" action="<?php echo base_url() ?>index.php/campana/actualiza_campana" enctype="multipart/form-data" />
    <tr>
      <td colspan="2" class="x-combo-list-hd">Empresa </td>
      <td colspan="2" class="x-combo-list-hd">Nombre</td>
    </tr>
    <tr>
      <td colspan="2"><input name="txt_id_campana" type="hidden" class="x-form-field" id="txt_id_campana" value="<?php echo $id_campana;?>"/>
      <select name="txt_id_empresa" id="txt_id_empresa">
		<option value="1" <?php if($id_empresa == 1) echo "selected" ?>>Vespucio Norte</option>
	</select>  
      </td>
      <td colspan="2">
        <input name="txt_nombre" type="text" id="txt_nombre" size="16" value="<?php echo $nombre;?>" />      </td>
    </tr>
    <tr>
      <td colspan="2" class="x-combo-list-hd">Fecha Inicio </td>
      <td colspan="2" class="x-combo-list-hd">Fecha Término</td>
    </tr>
    <tr>
      <td colspan="2">
        <input name="txt_fecha_inicio" type="text" class="x-form-field" id="txt_fecha_inicio" value="<?php echo $fecha_inicio;?>"/>      </td>
      <td colspan="2">
        <input name="txt_fecha_termino" type="text" id="txt_fecha_termino" size="16" value="<?php echo $fecha_termino;?>"/>      </td>
    </tr>
    <tr>
      <td colspan="2" class="x-combo-list-hd">Codigo </td>
      <td colspan="2" class="x-combo-list-hd">Estado</td>
    </tr>
    <tr>
      <td colspan="2">
        <input name="txt_codigo" type="text" class="x-form-field" id="txt_codigo" value="<?php echo $codigo;?>"/>      </td>
      <td colspan="2">
       <select name="txt_estado" id="txt_estado">
		<option value="1" <?php if($estado == 1) echo "selected" ?>>Estado 1</option>
		<option value="2" <?php if($estado == 2) echo "selected" ?>>Estado 2</option>
		<option value="3" <?php if($estado == 3) echo "selected" ?>>Estado 3</option>
	</select> 
      </td>
    </tr>
    <tr>
      <td colspan="2" class="x-combo-list-hd">Tipo</td>
      <td colspan="2" class="x-combo-list-hd"></td>
    </tr>
    <tr>
      <td colspan="2">
      <select name="txt_tipo" id="txt_tipo">
		<option value="1" <?php if($tipo == 1) echo "selected" ?>>Tipo 1</option>
		<option value="2" <?php if($tipo == 2) echo "selected" ?>>Tipo 2</option>
		<option value="3" <?php if($tipo == 3) echo "selected" ?>>Tipo 3</option>
	</select>  
      </td>
      <td colspan="2">
      </td>
    </tr>
    <tr>
      <td width="43%">&nbsp;</td>
      <td width="16%" bgcolor="#CCCCCC"><input name="Grabar" type="submit" class="x-form-invalid-msg" id="Grabar" value="Grabar" /></td>
      <td width="41%">&nbsp;</td>
    </tr>
</form>
  </table>
</div>

