 
<h2>Traspasar agendamientos a nuevo usuario</h2>

	<table width="90%" align="center">
		<tr style="text-align: left">
			
			<td width="37%">
				 
				<input type="hidden" name="id_campana" id="id_campana" value="<?php echo $this->session->userdata('campana'); ?>">
			Seleccione un usuario</td>
		</tr>
		
		
		<tr style="text-align: left">
			<td colspan="2">
			  
			  <select name="usuario_a_traspasar_agendamiento" size="7" id="usuario_a_traspasar_agendamiento" >
			    <?php 	
				foreach($usuarios as $usuario):
				 
				 echo "<option value='".$usuario->id_usuario."'>".$usuario->nombre."  &nbsp;&nbsp;&nbsp;    [".$usuario->nombre_usuario."] </option>";
				
				endforeach; 
				?>
			    
			    
			    
	      </select>		    </td>
		</tr>
</table>
	<br>
 
	
	<div align="center"><a href="#" onclick="ejecutar_asignar_otro_usuario(<?php echo $id_usuario; ?>, $('#usuario_a_traspasar_agendamiento').val() )">Seleccionar Agente para traspaso</a></div>
</form>
 


