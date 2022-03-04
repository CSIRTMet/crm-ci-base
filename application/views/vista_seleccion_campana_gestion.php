<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/barra_usuario_conectado_div_simple'); ?>

 
<div class='centrado'> 
<div class='columna' style='margin-top:-174px'> 
<div class='logo'></div> 

<div class='cuadro flexible'> 
<div class='top'></div> 
<div class='middle'> 
  

	<h2>Seleccione campa&ntilde;a</h2>
 
<div >
<?php   
  $attr = array(	
'onclick'=>'document.getElementById(&quot;loading&quot;).style.display = &quot;inline&quot;;'
);
?>
  
	<ol>
    <?php 
	$tipo_usuario = $this->session->userdata('tipo_usuario');
	if($tipo_usuario == 3 || $tipo_usuario == 4 || $tipo_usuario == 5){
		foreach($campanas_usuario as $campana):
			echo "<li>".anchor("campana/set_campana_selected/$campana->id_campana","$campana->nombre",$attr)."</li>";
		endforeach;
	}else {
		foreach($campanas_usuario as $campana):
			echo "<li>".anchor("campana_gestion/set_campana_selected/$campana->id_campana","$campana->nombre",$attr)."</li>";
		endforeach;
	}
	?>

	</ol>
  
  </br>
    <?php 
	if($this->session->userdata('tipo_usuario') == 2){ //supervisor ?>
	<div align="center" style="border:dotted 1px #666666; padding:2px">
	<?php 
	echo anchor("campana_gestion/form_crear_campana_gestion","Crear nueva campa&ntilde;a"); 
	?>
	</div>
	<?php } ?>
  
<span></span>
</div> 
<img class="right" id="loading" src="<?php echo base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;display:none;" /> 
<div class="clear"></div> 
 


<br /> 
<br /> 
Desarrollado por <a href="http://www.puribe.cl">Puribe Ltda.</a> y <a href="http://www.signalsoft.cl">Signalsoft Ltda</a> 
<div class="clear">

</div> 
 
  
 
</div> 
<div class='bottom'></div> 
</div> 


</div> 
</div> 
<?php $this->load->view('includes/footer'); ?>

