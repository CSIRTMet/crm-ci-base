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
</style> <div align="center" class="style6">INGRESAR NUEVA EMPRESA
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
<form method="post" action="<?php echo base_url() ?>index.php/empresa/ingresa_empresa" enctype="multipart/form-data" />
    <tr>
      <td colspan="2" class="x-combo-list-hd">Nombre Empresa </td>
      <td colspan="2" class="x-combo-list-hd">Codigo</td>
    </tr>
    <tr>
      <td colspan="2">
        <input name="txt_nombre" type="text" class="x-form-field" id="txt_nombre" />      </td>
      <td colspan="2">
        <input name="txt_codigo" type="text" id="txt_codigo" size="16" value=""/>      </td>
    </tr>
    <tr>
      <td width="43%">&nbsp;</td>
      <td width="16%" bgcolor="#CCCCCC"><input name="Grabar" type="submit" class="x-form-invalid-msg" id="Grabar" value="Grabar" /></td>
      <td width="41%">&nbsp;</td>
    </tr>
</form>
  </table>
</div>

