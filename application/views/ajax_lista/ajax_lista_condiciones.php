 
<?php //print_r($lst_andOr); echo "</br>";
	  //print_r($lst_condiciones);  
	 // print_r($valueParentesis);
	  ?>
      
<table border="1" cellspacing="2" cellpadding="2" align="center" width="100%">
	<thead>
	<tr>
	<th  ><div align="center">(</div></th>
	<th><small>AND/OR</small></th>
	<th><small>Condici&oacute;n</small></th>
	<th  ><div align="center">)</div></th>
	
	<th width='20px'><small>Eliminar</small></th>
	</tr>
	</thead>
	<tbody>
	<?php
		$f=0;
		$j=0;
		for($i=0;$i<sizeof($lst_condiciones);$i++)
		{
			if($lst_condiciones[$i]!='' and $lst_condiciones[$i]!=null)
			{
				echo "<tr>";
				if(count($valueParentesis)>$j){
					$valParentesis=$valueParentesis[$j];
				}
				echo "<td> <input type='checkbox' id='ocCheckbox' name='ocCheckbox' onClick='parentesisbalanceado()'";
				if($valParentesis == 1){
					echo " checked"; 	
				}
				echo "></td>";
				if($f==0){ //es la primera condicion
					echo "<td>&nbsp;</td>";							
				}else{
					echo "<td>".$lst_andOr[$i]."</td>";
				}				
				echo "<td>".$lst_condiciones[$i]."</td>";
				$j++;
				if(count($valueParentesis)>$j){
					$valParentesis=$valueParentesis[$j];
				}
				echo "<td><input type='checkbox' id='ocCheckbox' name='ocCheckbox' onClick='parentesisbalanceado()'";
				if($valParentesis == 1){
					echo " checked"; 	
				}
				echo "></td>";
				echo "<td align='center'><center><a href='#'><img border='0' src='".base_url()."/css/images/iconDelete.gif' alt='Delete' onclick='DelCondition(".$i.");'></a></center></td>";
				echo "</tr>";
				$f++;
				$j++;
				 
			}
		}
	?>
	</tbody>
</table> 