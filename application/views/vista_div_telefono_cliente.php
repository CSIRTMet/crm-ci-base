<script type="text/javascript" >
$(document).ready(function()
{
  jQuery('.numbersOnly').keyup(function () { 
	this.value = this.value.replace(/[^0-9]/g,'');
	
 });

});

</script>
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="ui-layout-pane">
	
	
    <tr>
      <td width="16%" class="x-combo-list-hd">TELEFONO </td>
   
    </tr>
	   
<?php foreach($telefonos as $telefono):
		$color = '';
		if ($telefono->tipificacion==1){
		$color = 'bgcolor="#66CC33"';
		};  
?>
<tr>
	  <td  class = "x-grid3-row-over" nowrap="nowrap"<?php echo  $color ?> ><?php echo $telefono->area."-".$telefono->telefono;?>  <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" /></td>
	   
  </tr>
      <?php endforeach;?> 
</table>
  </div> 
  
  
  
 
  