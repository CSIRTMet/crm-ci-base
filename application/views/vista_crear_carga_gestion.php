<?php $this->load->view('includes/header'); ?>

<title>KUBO :: COBRANZA </title>
<div id="create_form">

	<h1>Nueva Carga </h1>


	<?php echo "tipo campana: ".$this->session->userdata("campana_tipo"); ?>
	<p><?php echo validation_errors();?><?php echo " ".$mensaje; ?>
	    <?php 
	
	echo form_open_multipart(base_url().'index.php/carga_gestion/crear_carga_gestion'); ?>
	<legend>Nombre</legend>
	 <?php echo form_input('nombre', set_value('nombre') ); ?>	</p>
	<p>
	  <legend>Tipo</legend> 
	  
	  <select name="id_tipo_carga">
	    <option value="0">*Seleccione]*</option>
	    
	    <?php foreach($tipo_carga->result() as $tipo): ?>
	    
	    <option value="<?php echo $tipo->id_tipo_carga ?>"><?php echo $tipo->nombre ?></option>
	    <?php endforeach; ?>
      </select>
  </p>
	<p>
	  <legend>Archivo (.txt)</legend>
	  
      <input type="file" name="userfile" size="20" />
  </p>
	<p>
	  <input type="hidden" id="id_campana" name="id_campana" value="<?php echo $this->session->userdata('campana'); ?>" />
	  
	  
	    <?php 
	
	echo form_submit('submit', 'Crear');
	$js = 'onClick="window.close()"';

	echo form_reset('cancelar', 'Cancelar', $js);
	echo form_close();
	?>
	  
  </p>
</div>
<!-- end login_form-->


	
<?php $this->load->view('includes/footer'); ?>