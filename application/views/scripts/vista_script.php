
<style type="text/css">
<!--
.style3 {color: #FFFFFF; font-weight: bold; }
.Estilo1 {
	 
	 
}
-->
</style>



<div id="menu_script" align="center" style="border-bottom: inset #333 ">


<?php foreach($menu_script as $row):  ?>
 | &nbsp; 
<a href="#" onClick="cargar_script_particular(<?php echo $row->id_script ?>);" title="<?php echo $row->descripcion ?>"><?php echo $row->nombre ?> </a>&nbsp; 
 
<?php endforeach;  ?>


</div>

  
<div id="div_detalle_script" align="left">

</div>


