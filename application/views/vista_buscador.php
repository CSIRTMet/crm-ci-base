

<style type="text/css">
<!--
#div_buscador {

	
	width:80%;
	
	padding:1px;
	
	
}

-->
</style>



<script type="text/javascript"> 
/*
	*#######################
	*   
	*#######################
*/



function buscar() {

		$.post("<?php echo base_url() ?>index.php/buscador/buscar_registro", { 
			 
			  columna_a_buscar: $("#columna_a_buscar").val()
			 ,valor_a_buscar: $("#valor_a_buscar").val()
			

		}, function (data) {
	
		    if (data.length <100)  //viene un error y lo muestro
			{
				alert(data);
			}
			else
			{
				$('#mainContent').html(data);
			}
		});
 		}
	
	
	

</script>
<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/layout-default-latest.css" rel="stylesheet" type="text/css" />
<link href="../../css/complex.css" rel="stylesheet" type="text/css" />
  <div id="div_buscador">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-border-layout-ct">

 

  
   
    <tr>
      <td class="x-grid3-row-over">
	  
	  <select name="columna_a_buscar" id="columna_a_buscar">
        
	
			
	

      </select>
      </td>
      </tr>
    <tr>
      <td width="137" class="x-grid3-row-over"><input name="valor_a_buscar" type="text" id="valor_a_buscar" /></td>
	 
      </tr>
  </table>
</div>



  <div id="div_buscador">
  <table border="0" style="width:100%">
    <tr>
      <td width="43%">&nbsp;</td>
      <td width="6%"  ><input name="Buscar" type="button" class="btnForm" id="Buscar" value="Buscar" onclick="buscar();" /></td>
      <td width="51%">&nbsp;</td>
    </tr>
  </table>
</div>
  

