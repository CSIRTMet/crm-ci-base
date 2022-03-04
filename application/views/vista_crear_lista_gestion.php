<?php $this->load->view('includes/header'); ?>

<title>KUBO :: COBRANZA </title>
<div id="create_form">

	<h1>Crear Lista </h1>
	<?php echo validation_errors();?>
    <?php 
	
	echo form_open(base_url().'index.php/lista_gestion/crear_lista_gestion');
	echo "<legend>Nombre</legend>";
	echo form_input('nombre', set_value('nombre') );
	echo "<legend>Numero de barridos</legend>";
	echo form_input('numero_gestiones', set_value('numero_gestiones') );
	?>
	<input type="hidden" id="id_campana" name="id_campana" value="<?php echo $this->session->userdata('campana'); ?>" />
	<?php echo form_submit('submit', 'Crear');
	$js = 'onClick="window.close()"';

	echo form_reset('cancelar', 'Cancelar', $js);
	echo form_close();
	?>

</div>
<!-- end login_form-->


	
<?php $this->load->view('includes/footer'); ?>