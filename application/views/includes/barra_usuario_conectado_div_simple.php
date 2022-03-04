
<?php $nombre_usuario = $this->session->userdata('nombre'); ?>
<?php $campana_nombre = $this->session->userdata('campana_nombre'); ?>
<?php if ($nombre_usuario) { ?>
<div class="barra_conectado"> 
<?php if ($campana_nombre!=""){ ?>
<strong>Campa&ntilde;a</strong>: <?php echo $campana_nombre; ?>  &nbsp;&nbsp; 

<?php } ?>

<strong>Usuario</strong>: <?php echo $nombre_usuario; ?> - <a href="<?php echo base_url();?>index.php/usuario/logout">Salir</a> 
	</div>	 
<?php } ?>
