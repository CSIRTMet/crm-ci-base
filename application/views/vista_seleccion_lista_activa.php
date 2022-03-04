<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/barra_usuario_conectado_div_simple'); ?>

 
<div class='centrado'> 
<div class='columna' style='margin-top:-174px'> 
<div class='logo'></div> 

<div class='cuadro flexible'> 
<div class='top'></div> 
<div class='middle'> 
  

	<h2>Lista a trabajar</h2>
	
 
<div>
  
<?php   
  $attr = array(	
'onclick'=>'document.getElementById(&quot;loading&quot;).style.display = &quot;inline&quot;;'
);
?>  
  <ol>
  
  <?php 
	$tipo_usuario = $this->session->userdata('tipo_usuario');
	if($tipo_usuario == 3 || $tipo_usuario==4){
	
	$n = 0;
	
	foreach($listas as $lista):
	$n++;
	echo "<li>".anchor("campana/set_lista_selected/$lista->id_lista","$lista->nombre", $attr)."</li>";
	endforeach;
	
		if ($n ==0){
			echo "Usted no cuenta con una lista de trabajo asignada, contacte a su supervisor";
		}
	
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