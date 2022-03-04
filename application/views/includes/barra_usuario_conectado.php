
<?php $nombre_usuario = $this->session->userdata('nombre'); ?>
<?php $campana_nombre = $this->session->userdata('campana_nombre'); ?>
<?php if ($nombre_usuario) { ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="left" valign="top">
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr>
				<td width="60%" align="right" valign="bottom">KUBO GESTION</td>
			  <td width="40%" align="right" valign="bottom"><strong>Campa&ntilde;a</strong>: <?php echo $campana_nombre; ?> &nbsp;&nbsp; <strong>Usuario</strong>: <?php echo $nombre_usuario; ?> - [<a href="<?php echo base_url();?>index.php/campana_gestion/index">Cambiar Campa&ntilde;a</a>]  &nbsp; [<a href="<?php echo base_url();?>index.php/usuario/logout">Salir</a>]</td>
			</tr>
			</table>
		</td>
		
	</tr>
	</table>
<?php } ?>
