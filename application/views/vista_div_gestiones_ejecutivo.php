<?php
date_default_timezone_set("America/Santiago");
?>
<table width="100%" border=1" cellpadding="0" cellspacing="0" class="ui-layout-pane">
     <tr>
      <td width="1" height="1" nowrap="nowrap" class="x-combo-list-hd" colspan="2" align="right">Gestiones realizadas el 
	  <?php 
		$fecha = time (); 
		echo date ( "d-m-Y" , $fecha );
?> por 
<?php
echo $this->session->userdata('nombre');
$suma = 0;
?>
</td>
    </tr>	
    <tr>
      <td width="1" height="1" nowrap="nowrap" class="x-combo-list-hd">Gesti&oacute;n </td>
      <td width="1" height="1" nowrap="nowrap" class="x-combo-list-hd">Cantidad</td>
    </tr>
    
     
<?php foreach($gestiones as $gestion):
  ?>
<tr>
  <td width="1" height="1" nowrap="nowrap"><?php echo $gestion->sub_respuesta; ?></td>
  <td width="1" height="1" nowrap="nowrap"><?php 
  $suma= $suma+$gestion->cantidad;
  echo $gestion->cantidad; ?></td>
</tr>  
	 
 <?php endforeach;?> 
	<tr>
  <td width="1" height="1" nowrap="nowrap">Total gestiones</td>
  <td width="1" height="1" nowrap="nowrap"><?php echo $suma; ?></td>
</tr>  
	   
	  
      
  </table>
  
  