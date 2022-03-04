

<script type="text/javascript" >


function tdMouseOver(var_id) {
	if( $("#" + var_id).hasClass('x-grid3-row-over') ) 
	{ 
		$("#" + var_id).removeClass('x-grid3-row-over'); 
		$("#" + var_id).addClass('tdOver');
	}
}

function tgMouseOut(var_id) {
	if( $("#" + var_id).hasClass('tdOver') ) 
	{ 
		$("#" + var_id).removeClass('tdOver'); 
		$("#" + var_id).addClass('x-grid3-row-over');
	}
}

</script>

<style type="text/css">
.tdOver {
	text-align: left;
	background-color: #336699;
	color: #FFFFFF;
	cursor: pointer;
}
 
.x-grid3 A {
	text-decoration:none;	
	color: #000000; 
}
.x-grid3-row-over A {
	text-decoration:none;
	color: #000000;	 
}
.tdOver A{
	text-decoration:none;
	color:#FFFFFF;	 
}

</style>



<table id="menu_gestion" width="100%" border="0" cellpadding="1" cellspacing="1" class="x-border-layout-ct">
    <tr>
      <td  id="item_menu_campana" onmouseover="tdMouseOver(this.id)" onmouseout="tgMouseOut(this.id)" width="14%" 
	  class="<?php if($seccion == "campana") echo 'x-grid3'; else echo 'x-grid3-row-over'; ?>" >
	  <div align="center"><strong><?php echo anchor('principal_gestion/load_campana_gestion',"CAMPA&Ntilde;A") ?></strong></div>
	  </td>
      <td id="item_menu_cargas" onmouseover="tdMouseOver(this.id)" onmouseout="tgMouseOut(this.id)" width="17%" 
	  class="<?php if($seccion == "cargas") echo "x-grid3"; else echo 'x-grid3-row-over'; ?>" >
	  <div align="center"><strong><?php echo anchor('principal_gestion/load_carga_gestion',"CARGAS") ?></strong></div>
	  </td>
      <td id="item_menu_listas" onmouseover="tdMouseOver(this.id)" onmouseout="tgMouseOut(this.id)" width="17%" 
	  class="<?php if($seccion == "listas") echo 'x-grid3'; else echo 'x-grid3-row-over'; ?>" >
	  <div align="center"><strong><?php echo anchor('principal_gestion/load_lista_gestion',"LISTAS") ?></strong></div>
	  </td>
       <td id="item_menu_script" onmouseover="tdMouseOver(this.id)" onmouseout="tgMouseOut(this.id)" width="16%" 
	  class="<?php if($seccion == "script") echo 'x-grid3'; else echo 'x-grid3-row-over'; ?>" >
	  <div align="center"><strong><?php echo anchor('principal_gestion/load_script_gestion',"SCRIPT") ?></strong></div>
	  </td>
      <td id="item_menu_usuarios" onmouseover="tdMouseOver(this.id)" onmouseout="tgMouseOut(this.id)" width="17%" 
	  class="<?php if($seccion == "usuarios") echo 'x-grid3'; else echo 'x-grid3-row-over'; ?>" >
	  <div align="center"><strong><?php echo anchor('principal_gestion/load_usuario_gestion',"USUARIOS") ?></strong></div>
	  </td>
      <td id="item_menu_administracion" onmouseover="tdMouseOver(this.id)" onmouseout="tgMouseOut(this.id)" width="19%" 
	  class="<?php if($seccion == "administracion") echo 'x-grid3'; else echo 'x-grid3-row-over'; ?>" >
	  <div align="center"><strong><?php echo anchor('principal_gestion/load_administracion_gestion',"ADMINISTRAR") ?></strong></div>
	  </td>
     
    </tr>
  </table>