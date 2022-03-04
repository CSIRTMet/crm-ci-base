<?php
date_default_timezone_set("America/Santiago");

?>
<html>
<head>
<meta http-equiv="Content-Type"  content="text/html; charset=UTF-8" /> 
<style type="text/css">


html>body {
	font-size: 16px; 
	font-size: 68.75%;
} /* Reset Base Font Size */



</style>
<!-- including the jQuery UI Datepicker and styles -->
<link href="<?php echo base_url() ?>css/calendario/assets/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>css/ext-all.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-latest.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.ui.datepicker-es.js"></script>
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css">

</head>
<body ><form name="form" action="#" method="post">


<table width="100%" border="0" cellpadding="2" cellspacing="3" class="">
  <tr>
    <td class="DOMO_view_value_vista"></td>
    </tr>
  
  
  <tr>
    <td bgcolor="#CADBFF" class="ui-layout-resizer-open-hover"><strong>NUEVO AGENDAMIENTO </strong></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="x-grid3-row-over">Cliente:</td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="x-grid3-row-over">Lista: </td>
    </tr>
  <tr>
    <td bgcolor="#CADBFF" class="x-grid3-row-selected">Fecha  (Año/Mes/Dia)</td>
    </tr>
  
   

  
  <tr>
     <td class="x-border-layout-ct"><input name="fecha" id="fecha" type="text"  class="date-picker" />
	   <select name="hora" id="hora" >
	     <option value="0">*Hora*</option>
	     <?php foreach($horas as $hora):?>
	     <option value="<?php echo $hora?>"><?php echo $hora?></option>
	     <?php endforeach;?>  
           </select>
	:
    
	<select name="minuto" id="minuto">
	  <option value="0">*Minutos*</option>
	  <?php foreach($minutos as $minuto):?>
	  <option value="<?php echo $minuto?>"><?php echo $minuto?></option>
	  <?php endforeach;?>  
	  </select></td>
    </tr>
  
   
  
  
  
  <tr>
    <td bgcolor="#666666"><label>
      <div align="center">
        <input name="Guardar" type="button" id="Guardar"  class="buttons" value="Guardar" onClick="enviar()">
        <input name="Cancelar" type="button" id="Cancelar" value="Cancelar" onClick="window.close();">
        </div>
    </label></td>
    </tr>
</table>




</form>

<script type="text/javascript"> 

   $(".date-picker").datepicker({
   changeYear: true,
   changeMonth: true,
   dateFormat: 'yy/mm/dd'
   
   });

</script>
</body></html>
