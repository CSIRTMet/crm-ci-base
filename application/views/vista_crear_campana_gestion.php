<?php $this->load->view('includes/header'); ?>

<script type="text/javascript"> 
	$(".date-picker").datepicker($.datepicker.regional[ "es" ] );
</script>
<title>KUBO :: BIENVENIDO </title>


		


<div id="login_form">

	<h1>Crear Campa&ntilde;a</h1>
	<?php echo validation_errors();?>
    <?php 
	
	echo form_open(base_url().'index.php/campana_gestion/crear_campana_gestion');
	echo "<legend>Nombre</legend>";
	echo form_input('nombre', set_value('nombre') );
	echo "<legend>Desde</legend>";
	echo '<input name="fecha_inicio" id="fecha_inicio" type="text"  class="date-picker"   />';
	echo "<legend>Hasta</legend>";
	echo '<input name="fecha_termino" id="fecha_termino" type="text"  class="date-picker" />';
	echo "<legend>Codigo</legend>";
	echo form_input('codigo', set_value('codigo'));

	$options2 = array(
                  '0'   => 'Seleccione Tipo',
                  '1'   => 'Cobranza',
                  '2'   => 'Telemarkeing'
                 
                );
	echo form_dropdown('tipo', $options2, set_value('tipo', '0'));
	
	$options = array(
                  '0'  => 'Seleccione Estado',
                  '1'    => 'Activa',
                  '2'   => 'No Activa'      
                );
	echo form_dropdown('estado', $options, set_value('estado', '0'));
	
	echo form_submit('submit', 'Crear');
	echo form_close();
	?>

</div><!-- end login_form-->


<script type="text/javascript"> 

   $(".date-picker").datepicker({
   changeYear: true,
   changeMonth: true,
   dateFormat: 'yy/mm/dd'
   
   });

</script>

	
<?php $this->load->view('includes/footer'); ?>