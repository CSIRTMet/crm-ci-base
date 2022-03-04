<?php
			$tipo_usuario = $this->session->userdata('tipo_usuario');
			$tipo_campana = $this->session->userdata('campana_tipo');
			$campana = $this->session->userdata('campana_id_campana');
		   ?>
		
		    <div class="divFormsBox" id="rol_x">
		    <?php
		    if($tipo_usuario == 3){
		    ?>
			<li class='open' >
				<span class="folder" style='cursor: pointer'>&nbsp;&nbsp;Ejecutivos</span>
				<ul>
					<li id="menuFormulario_" class="menuFormulario"><span class="file">
						<a href="#" id="a_idform"  class="menu_2" onclick="cargar_cliente()">
						Actualizar registro
						</a>
				    	</span>
					</li>
				<?php
				if($tipo_campana == 1){
				?>
					<li id="menuFormulario_" class="menuFormulario"><span class="file">
						<a href="#" id="a_idform"  class="menu_2" onclick="cargar_compromisos()">
						Ver mis compromisos
						</a>
					    </span>
					</li>
				<?php
				}
				?>
					<li id="menuFormulario_" class="menuFormulario"><span class="file">
						<a href="#" id="a_idform"  class="menu_2" onclick="cargar_mis_gestiones()">
						Ver mis Gestiones del d&iacute;a
						</a>
					    </span>
					</li>
	        	</ul>
			</li>
            
            <li class='closed' >
				<span class="folder" style='cursor: pointer'>&nbsp;&nbsp;GENERAL</span>
				<ul>
					<li id="menuFormulario_" class="menuFormulario"><span class="file">
						<a href="#" id="a_idform"  class="menu_2" onclick="consultar_codigo_telefonico()">
						C&oacute;digos telef&oacute;nicos</a>
					    </span>
					</li>
				</ul>
			</li>
			</div>
			<?php
				}
		    if($tipo_usuario == 5){
		    ?>
			<li class='open' >
				<span class="folder" style='cursor: pointer'>&nbsp;&nbsp;Modulo Auditoria</span>
				<ul>					
				<?php
				if($tipo_campana == 2){
				?>
					<li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="traer_resumen_mensual_campana_mkt()" title="Resumen mensual campa&ntilde;a">Resumen Ventas por mes</a></span></li>
					<!-- <li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="traer_resumen_auditoria_mensual_campana_mkt()" title="Resumen Auditoria mensual campa&ntilde;a">Resumen Auditoria Mensual Realizada</a></span></li>!-->
					<li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="get_buscar_venta_mensual_campana_mkt()" title="Buscar venta mensual campa&ntilde;a">Buscar Venta</a></span></li>
				<?php
				}
				?>
	        	</ul>
			</li>
			<?php
				}
				?>
			
		
	
	

	

	
	 
	
	 