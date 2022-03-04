<?php $this->load->view('includes/header'); ?>

 
 
<div class='centrado'> 
<div class='columna' style='margin-top:-174px'> 
<div class='logo'></div> 
  <div class='titulo_bienvenida'></div> 
<div class='cuadro flexible'> 
<div class='top'></div> 
<div class='middle'><div class='mensaje_feedback'> 
 
    <div id="error"><?php echo validation_errors(); 
        if(isset($mensaje)){
            echo $mensaje;
        } ?></div>
 
 
</div> 
 
 
<?php 
    $ip = $_SERVER['REMOTE_ADDR'];
    echo form_open(base_url().'index.php/usuario/validar_usuario'); 
	?>
<legend>Usuario</legend> 
<?php 
	echo form_input('txt_nombre_usuario', ''); 
	?>
<legend>Clave</legend> 
<?php 
	echo form_password('txt_clave', ''); 
	?>
<legend>Anexo</legend> 
<?php 
	echo form_input('txt_anexo', '');  
	echo form_hidden('hidden_ip', $ip); 
	?>
 

<div class="right boton_submit" onclick="document.getElementById(&quot;loading&quot;).style.display = &quot;inline&quot;;">
 <?php echo form_submit('submit', 'Ingresar'); ?> 
<span></span>
</div> 
<img class="right" id="loading" src="<?php echo base_url() ?>css/login/imagenes/sm_loader.gif" style="margin-top:13px;display:none;" /> 
<div class="clear"></div>
 
<br />
<a href="http://www.puribe.cl">Puribe Ltda.</a> - <a href="http://www.signalsoft.cl">Signalsoft Ltda</a> 
<div class="clear"></div> 
 <?php  

 echo form_close();
 ?> 
  
 
</div> 
<div class='bottom'></div> 
</div> 


</div> 
</div> 

<?php $this->load->view('includes/footer'); ?>