<!-- ENCABEZADO-->
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="left" valign="top">
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr>
				<td width="136">[<a href="<?php echo base_url() ?>index.php/principal_admin/">Menu administracion</a>] </td>
				<td width="154"> </td>
				<td align="right" valign="bottom"><strong>Usuario Conectado</strong>: <?php echo $this->session->userdata('nombre'); ?> - <a href="<?php echo base_url();?>index.php/usuario/logout">Salir</a></td>
			</tr>
			</table>
		</td>
		<td align="right" valign="top">&nbsp;</td>
	</tr>
	</table>
	<!-- FIN ENCABEZADO-->