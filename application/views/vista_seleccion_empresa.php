<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/barra_usuario_conectado_div_simple'); ?>

 
<div class='centrado'> 
<div class='columna' style='margin-top:-174px'> 
<div class='logo'></div> 

<div class='cuadro flexible'> 
<div class='top'></div> 
<div class='middle'> 
  

	<h2>Seleccione Empresa</h2>
	
 


 

<div  >
  
<?php   
  $attr = array(	
'onclick'=>'document.getElementById(&quot;loading&quot;).style.display = &quot;inline&quot;;'
);
?>  
  <ol>
    <?php 
	$tipo_usuario = $this->session->userdata('tipo_usuario');
	if($tipo_usuario == 3 || $tipo_usuario==4 || $tipo_usuario == 5){
	foreach($empresas_usuario as $empresa):
	echo "<li>".anchor("empresa/set_empresa_selected/$empresa->id_empresa","$empresa->nombre",$attr)."</li>";
	endforeach;
	}
	else {
	foreach($empresas_usuario as $empresa):
	echo "<li>".anchor("empresa_admin/set_empresa_selected/$empresa->id_empresa","$empresa->nombre",$attr)."</li>";
	endforeach;
	}
	?>
	</ol>
  
  
  
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
