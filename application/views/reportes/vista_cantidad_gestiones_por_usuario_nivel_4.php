 
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
      		<th width="7%">Usuario</th>
			<th width="7%">Nivel 4</th>		
			<th width="12%">CANTIDAD</th>

		</tr>
	
         <?php 
		    //$i = 1;
		    
			foreach($rango as $item):
	echo "<tr>";
		
	 echo "<td>".$item->usuario."</td>";		
	 echo "<td>".$item->nivel4."</td>";
	 echo "<td>".$item->cantidad."</td>";
	 
	  
	 
		    
	
	endforeach; ?>
		
	
</table>
 <!--       
 <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
 <tr>
 	<td class="" style="text-align:center"><strong>[<a href="#" onclick="aplicar_cambios()">APLICAR CAMBIOS</a>]</strong></td>
 </tr>
 </table>
 --> 
 <script type="text/javascript"> 

   $(".date-picker").datepicker({
   changeYear: true,
   changeMonth: true,
   dateFormat: 'yy/mm/dd'
   
   });

</script>             
</div>

