<?php
	$tipo_usuario = $this->session->userdata('tipo_usuario');
	$tipo_campana = $this->session->userdata('campana_tipo');
?>
		<div class="divFormsBox" id="rol_x">
			<?php
			if($tipo_usuario == 2  && $tipo_campana == 2){
			?>
			<li class='open' >
			<span class="folder" style='cursor: pointer'>&nbsp;&nbsp;Modulo Auditoria</span>
			<ul>
			    <li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="get_buscar_gestiones_campana_mkt()" title="Buscar gestiones campa&ntilde;a">Buscar Gestiones Campa&ntilde;a</a></span></li>
				<li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="traer_resumen_mensual_campana_mkt()" title="Resumen mensual campa&ntilde;a">Resumen Ventas por mes</a></span></li> 
				<!-- <li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="traer_resumen_auditoria_mensual_campana_mkt()" title="Resumen Auditoria mensual campa&ntilde;a">Resumen Auditoria Mensual Realizada</a></span></li>!-->
				<li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="get_buscar_venta_mensual_campana_mkt()" title="Buscar venta mensual campa&ntilde;a">Buscar Venta</a></span></li>
			</ul>
			</li>
            
            
            
            
            <li class='open' >
			<span class="folder" style='cursor: pointer'>&nbsp;&nbsp;Gestiones</span>
			<ul>
			    <li id="menuFormulario_" class="menuFormulario"><span class="file"><a onclick="get_reporte_diario_campana_mkt('resumen')" href="#" id="a_idform"  class="menu_2" title="">Gestiones del d&iacute;a</a></span></li>
                <li id="menuFormulario_" class="menuFormulario"><span class="file"><a onclick="get_reporte_diario_campana_mkt('total_por_horario')" href="#" id="a_idform"  class="menu_2" title="">Gestiones del d&iacute;a por horario</a></span></li>
                <li id="menuFormulario_" class="menuFormulario"><span class="file"><a onclick="get_reporte_diario_campana_mkt('total_usuario_por_dia')" href="#" id="a_idform"  class="menu_2" title="">Gestiones del d&iacute;a por usuario</a></span></li>

				
			</ul>
            
			</li>
            
            <li class='open' >
			<span class="folder" style='cursor: pointer'>&nbsp;&nbsp;Exportar Ventas</span>
			<ul>
			    <li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="get_tbl('tbl_asegurado')" title="exportar tbl_asegurado">tbl_asegurado</a></span></li>
                 <li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="get_tbl('tbl_beneficiario')" title="exportar tbl_beneficiario">tbl_beneficiario</a></span></li>
                  <li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="get_tbl('tbl_hogar')" title="exportar tbl_hogar">tbl_hogar</a></span></li>
                   <li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="get_tbl('tbl_hogar_preguntas')" title="exportar tbl_hogar_preguntas">tbl_hogar_preguntas</a></span></li>
                   <li id="menuFormulario_" class="menuFormulario"><span class="file"><a href="#" id="a_idform"  class="menu_2" onclick="get_tbl('tbl_titular')" title="exportar tbl_titular">tbl_titular</a></span></li>				
			</ul>
            
			</li>
            
			<?php
			}
			?>
		</div>
