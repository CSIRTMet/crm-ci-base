<table width="100%" border="0" cellpadding="0" cellspacing="0" class="ui-layout-pane">
    
	
	
    <tr>
      <td width="8%" nowrap="nowrap" class="x-combo-list-hd">ID</td>
      <td width="8%" nowrap="nowrap" class="x-combo-list-hd">Num Doc. </td>
      <td width="16%" nowrap="nowrap" class="x-combo-list-hd">Monto</td>
      <td width="16%" nowrap="nowrap" class="x-combo-list-hd">F. Compromiso </td>
      <td width="16%" nowrap="nowrap" class="x-combo-list-hd">Lugar pago </td>
      <td width="16%" nowrap="nowrap" class="x-combo-list-hd">Tipo Pago </td>
      <td width="16%" nowrap="nowrap" class="x-combo-list-hd">Forma Pago </td>
      <td width="16%" nowrap="nowrap" class="x-combo-list-hd">Cuotas</td>
      <td width="16%" nowrap="nowrap" class="x-combo-list-hd">Pie</td>
      <td width="16%" nowrap="nowrap" class="x-combo-list-hd">Monto Cuotas </td>
	  <td width="16%" nowrap="nowrap" class="x-combo-list-hd">Fecha de Pago </td>
    </tr>
    
     
<?php foreach($compromisos as $compromiso):
  ?>
<tr>

	 
	  <td nowrap="nowrap"><?php echo $compromiso->id_compromiso; ?></td>
	  
	 
	  <td nowrap="nowrap"><?php echo $compromiso->numero_documento; ?></td>
	  <td nowrap="nowrap"><?php echo $compromiso->monto; ?></td>
	  <td nowrap="nowrap"><?php echo $compromiso->fecha_compromiso; ?></td>
	  <td nowrap="nowrap"><?php 
		switch ($compromiso->lugar_de_pago) {
		case 1:
			echo "Cobratec"; break;
		case 2:
			echo "Sencillito"; break;
		case 3:
			echo "Sucursal"; break;
		case 4:
			echo "Otro"; break;
		default: echo "--";
		} ?>
	  </td>
	  <td nowrap="nowrap">
	  <?php 
		switch ($compromiso->tipo_de_pago) {
		case 1:
			echo "Total"; break;
		case 2:
			echo "Abono"; break;
		case 3:
			echo "Convenio"; break;
		default: echo "--";
		} ?></td>
	  <td nowrap="nowrap">
	  <?php 
		switch ($compromiso->forma_de_pago) {
		case 1:
			echo "Efectivo"; break;
		case 2:
			echo "Cheque"; break;
		case 3:
			echo "Otro"; break;
		default: echo "--";
		} ?></td>
	  <td nowrap="nowrap"><?php echo $compromiso->numero_cuotas; ?></td>
	  <td nowrap="nowrap"><?php echo $compromiso->pie; ?></td>
    <td><?php echo $compromiso->monto_cuota; ?></td>
	 <td><?php echo $compromiso->fecha_de_pago; ?></td>
    </tr>  
	 
 <?php endforeach;?> 
	  
	  
	  
      
  </table>
  
  