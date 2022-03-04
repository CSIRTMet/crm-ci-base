<script type="text/javascript" >
    $(document).ready(function()
    {
        jQuery('.numbersOnly').keyup(function() {
            this.value = this.value.replace(/[^0-9]/g, '');

        });

    });

</script>
<style type="text/css">
    <!--
    .style1 {color: #000000}
    -->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="ui-layout-pane">

    <!-- borrar !-->

    <?php
    $id_campana = $this->session->userdata("campana");
    if ($id_campana != 1) {
        ?> 
        <tr>
            <td colspan="2" ><a href="#" name="nuevos_telefonos" id="nuevos_telefonos" onclick="mostrar_div_nuevo_telefono();">+ Agregar Fono</a></td>
        </tr>
        <?php
    }
    ?> 

    <tr>
        <td colspan="2" class="x-combo-list-hd">TELEFONO </td>
    </tr>

    <?php
    $id_campana = $this->session->userdata("campana");
    
    if ($id_campana == 5) {
        ?> 
        <tr>
            <td width="50%" nowrap="nowrap"  class = "x-grid3-row-over"><label for="area1">Fono 1 </label>
                <input name="area1" type="text" id="area1" size="2" value="<?php echo $area1; ?>" class="numbersOnly" />
                <input name="fono1" type="text" id="fono1" value="<?php echo $fono1; ?>" size="12" class="numbersOnly" />	    
                <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                      onclick="llamar_alt('<?php echo "1#0#" . $id_cliente; ?>')"  /><?php echo traduce_clasificacion($tipificacion_fono1); ?></td>
            <td width="50%" nowrap="nowrap"  class = "x-grid3-row-over"><label for="area3"> Fono 2</label>
                <input name="area2" type="text" id="area2" value="<?php echo $area2; ?>" size="2" class="numbersOnly" />
                <input name="fono2" type="text" id="fono2" value="<?php echo $fono2; ?>" size="12"  class="numbersOnly"/>
                <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                      onclick="llamar_alt('<?php echo "2#0#" . $id_cliente; ?>')"  /><?php echo traduce_clasificacion($tipificacion_fono2); ?></td>
        </tr>
        <?php
        
    } else if ($id_campana != 1) {

        foreach ($telefonos as $telefono):
            $color = '';
            if ($telefono->tipificacion == 1) {
                $color = 'bgcolor="#66CC33"';
            };
            ?>
            <tr>
                <td colspan="2" nowrap="nowrap"  class = "x-grid3-row-over"<?php echo $color ?> ><?php echo $telefono->area . "-" . $telefono->telefono; ?> 
                    <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                          onclick="llamar('<?php echo $telefono->area . $telefono->telefono . "#" . $telefono->id_telefono . "#" . $telefono->id_cliente; ?>')"  /> <?php echo traduce_clasificacion($telefono->tipificacion); ?></td>

            </tr>
        <?php
        endforeach;
    }    
        
    else { //campana 1
        ?> 
        <tr>
            <td width="50%" nowrap="nowrap"  class = "x-grid3-row-over"><label for="area3">Fono 1 </label>
                <input name="area1" type="text" id="area1" size="2" value="<?php echo $area1; ?>" class="numbersOnly" />
                <input name="fono1" type="text" id="fono1" value="<?php echo $fono1; ?>" size="12" class="numbersOnly" />	    
                <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                      onclick="llamar_alt('<?php echo "1#0#" . $id_cliente; ?>')"  /><?php echo traduce_clasificacion($tipificacion_fono1); ?></td>
            <td width="50%" nowrap="nowrap"  class = "x-grid3-row-over"><label for="area3"> Fono 2</label>
                <input name="area2" type="text" id="area2" value="<?php echo $area2; ?>" size="2" class="numbersOnly" />
                <input name="fono2" type="text" id="fono2" value="<?php echo $fono2; ?>" size="12"  class="numbersOnly"/>
                <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                      onclick="llamar_alt('<?php echo "2#0#" . $id_cliente; ?>')"  /><?php echo traduce_clasificacion($tipificacion_fono2); ?></td>

        </tr>
        <tr>
            <td width="50%" nowrap="nowrap"  class = "x-grid3-row-over"><label for="area3">Fono 3 </label>
                <input name="area3" type="text" id="area3" value="<?php echo $area3; ?>" size="2" class="numbersOnly" />
                <input name="fono3" type="text" id="fono3" value="<?php echo $fono3; ?>" size="12" class="numbersOnly" />	    
                <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                      onclick="llamar_alt('<?php echo "3#0#" . $id_cliente; ?>')"  /><?php echo traduce_clasificacion($tipificacion_fono3); ?></td>
            <td width="50%" nowrap="nowrap"  class = "x-grid3-row-over"><label for="area3"> Fono 4</label>
                <input name="area4" type="text" id="area4" value="<?php echo $area4; ?>" size="2"  class="numbersOnly" />
                <input name="fono4" type="text" id="fono4" value="<?php echo $fono4; ?>" size="12" class="numbersOnly" />
                <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                      onclick="llamar_alt('<?php echo "4#0#" . $id_cliente; ?>')"  /><?php echo traduce_clasificacion($tipificacion_fono4); ?></td>

        </tr>
        <tr>
            <td width="50%" nowrap="nowrap"  class = "x-grid3-row-over"><label for="area3">Fono 5 </label>
                <input name="area5" type="text" id="area5" value="<?php echo $area5; ?>" size="2" class="numbersOnly" />
                <input name="fono5" type="text" id="fono5" value="<?php echo $fono5; ?>" size="12" class="numbersOnly" />	    
                <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                      onclick="llamar_alt('<?php echo "5#0#" . $id_cliente; ?>')"  /><?php echo traduce_clasificacion($tipificacion_fono5); ?></td>
            <td width="50%" nowrap="nowrap"  class = "x-grid3-row-over"><label for="area3"> Celular</label>
                <input name="area6" type="text" id="area6" value="<?php echo $area6; ?>" size="2" class="numbersOnly" />
                <input name="fono6" type="text" id="fono6" value="<?php echo $fono6; ?>" size="12" class="numbersOnly" />
                <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_telefono.gif" height="17" style="cursor:pointer" 
                      onclick="llamar_alt('<?php echo "6#0#" . $id_cliente; ?>')"  /><?php echo traduce_clasificacion($tipificacion_fono6); ?></td>

        </tr>
<?php }
?> 

</table>


<div id="div_nuevo_telefono" style="display:none">

    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
        <tr>
            <td width="9%" class="x-progress-text-back"><div align="center" class="style1">Area</div></td>
            <td width="15%" class="x-progress-text-back"><div align="center" class="style1">Numero</div></td>
            <td width="14%" class="x-progress-text-back"><div align="center" class="style1">Tipo</div></td>
            <td width="62%" class="x-progress-text-back"><div align="center" class="style1"></div></td>
        </tr>
        <tr>
            <td width="9%" class="x-box-mc"><input name="txt_area_add" type="text" id="txt_area_add" size="10" maxlength="2"  class="numbersOnly"></td>
            <td width="15%" class="x-box-mc"><input name="txt_numero_add" type="text" id="txt_numero_add" size="20" maxlength="12"  class="numbersOnly"></td>
            <td width="14%" class="x-box-mc">
                <select name="select_tipo_telefono_add" id="select_tipo_telefono_add">
                    <option value="0">*Seleccione*</option>
                    <option value="1">Fijo</option>
                    <option value="2">Movil</option>
                </select>	</td>
            <td width="62%" class="x-box-mc">
                <a href="#" id="agregar_nuevo_telefono" name="agregar_nuevo_telefono" onClick="guardar_telefono();">Guardar Fono</a>
                -
                <a href="#" id="ocultar_div_nuevo_telefono" name="ocultar_div_nuevo_telefono" onClick="ocultar_div_nuevo_telefono()">Cancelar</a></td>
        </tr>
    </table>
</div> 

<?php

function traduce_clasificacion($tipificacion) {

    $valor = "";
    switch ($tipificacion) {
        case 1:
            $valor = "No valido";
            break;
        case 4:
            $valor = "Contactado";
            break;
        case 3:
            $valor = "No Contactado";
            break;
        case "1":
            $valor = "No valido";
            break;
        case "4":
            $valor = "Contactado";
            break;
        case "3":
            $valor = "No Contactado";
            break;
        default:
            $valor = "";
    }

    return $valor;
}
?>
  

