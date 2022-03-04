<div id="div_venta" style="display:">

                    <table width="100%" border="0" cellpadding="1" cellspacing="1" >
                        <tr>
                            <td colspan="4" class="header">DATOS DE LA VENTA</td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">RUT </td>
                            <td ><input name="venta_rut" type="text" id="venta_rut"  value="<?php echo $venta["rut_venta"] ?>"/></td>
                            <td class="x-date-mp-btns"><strong>PLAN</strong></td>
                            <td >


                                <select name="venta_plan" id="venta_plan" >
                                    <option value="">* Seleccione *</option>
                                    <?php foreach ($productos as $producto): ?>
                                        <option value="<?php echo $producto->producto; ?>"><?php echo $producto->producto; ?></option>
                                    <?php endforeach; ?>
                                </select></td> 
                        </tr>
						
                        <tr>
                            <td width="20%" class="x-date-mp-btns">Valor Prima</td>
                            <td width="19%" ><input name="venta_valor_prima" type="text" id="venta_valor_prima"  value="<?php echo $venta["valor_prima"] ?>" readonly /></td>
                            <td width="26%" class="x-date-mp-btns">Medios de pago</td>
                            <td width="35%" ><input name="venta_medio_de_pago" type="text" id="venta_medio_de_pago"  value="<?php echo $venta["medio_de_pago"] ?>" readonly /></td>
                        </tr>
						<tr>
                            <td class="x-date-mp-btns">RECUPERACION DE VENTA</td>
                            <td><select name="venta_recuperacion" id="venta_recuperacion" >
                                    <option value="NO">* NO *</option>
                                    <option value="SI">* SI *</option>
                            </td>
                            <td class="x-date-mp-btns"></td>
                            <td></td>
                        </tr>


                    </table>
                </div>






                <div id="div_venta" style="display:">

                    <table width="100%" border="0" cellpadding="1" cellspacing="1" >




                        <tr>
                            <td colspan="4" class="header">DATOS DE USUARIO <strong>1</strong></td>
                        </tr>
                        <tr>
                            <td width="20%" class="x-date-mp-btns">Nombre 1</td>
                            <td width="19%" ><input name="venta_nombre1" type="text" id="venta_nombre1" /></td>
                            <td width="26%" class="x-date-mp-btns">Rut 1</td>
                            <td width="35%" ><input name="venta_rut1" type="text" id="venta_rut1" /></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Pat 1</td>
                            <td ><input name="venta_apepat1" type="text" id="venta_apepat1" /></td>
                            <td class="x-date-mp-btns">Parentesco 1</td>
                            <td ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'EL MISMO' => 'EL MISMO',
                                    'CONYUGE' => 'CONYUGE',
                                    'HIJO' => 'HIJO',
                                    'OTRO' => 'OTRO'
                                );
                                $identificador = 'id="venta_parentesco1" ';
                                echo form_dropdown('venta_parentesco1', $options, $venta["parentesco1"], $identificador);
                                ?></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Mat 1</td>
                            <td ><input name="venta_apemat1" type="text" id="venta_apemat1" /></td>
                            <td class="x-date-mp-btns">Porcentaje 1</td>
                            <td ><input name="venta_porcentaje1" type="text" id="venta_porcentaje1" class="numbersOnly"  value="<?php echo $venta["porcentaje1"] ?>"/></td>
                        </tr>
                    </table>
                </div>



                <div id="div_venta" style="display:">

                    <table width="100%" border="0" cellpadding="1" cellspacing="1" >




                        <tr>
                            <td colspan="4" class="header">DATOS DE USUARIO <strong>2</strong></td>
                        </tr>
                        <tr>
                            <td width="20%" class="x-date-mp-btns">Nombre 2</td>
                            <td width="19%" ><input name="venta_nombre2" type="text" id="venta_nombre2" /></td>
                            <td width="26%" class="x-date-mp-btns">Rut 2</td>
                            <td width="35%" ><input name="venta_rut2" type="text" id="venta_rut2" /></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Pat 2</td>
                            <td ><input name="venta_apepat2" type="text" id="venta_apepat2" /></td>
                            <td class="x-date-mp-btns">Parentesco 2</td>
                            <td ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'EL MISMO' => 'EL MISMO',
                                    'CONYUGE' => 'CONYUGE',
                                    'HIJO' => 'HIJO',
                                    'OTRO' => 'OTRO'
                                );
                                $identificador = 'id="venta_parentesco2" ';
                                echo form_dropdown('venta_parentesco2', $options, $venta["parentesco2"], $identificador);
                                ?></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Mat 2</td>
                            <td ><input name="venta_apemat2" type="text" id="venta_apemat2" /></td>
                            <td class="x-date-mp-btns">Porcentaje 2</td>
                            <td ><input name="venta_porcentaje2" type="text" id="venta_porcentaje2" class="numbersOnly" value="<?php echo $venta["porcentaje2"] ?>"/></td>
                        </tr>
                    </table>
                </div>




                <div id="div_venta" style="display:">

                    <table width="100%" border="0" cellpadding="1" cellspacing="1" >




                        <tr>
                            <td colspan="4" class="header">DATOS DE USUARIO</td>
                        </tr>
                        <tr>
                            <td width="20%" class="x-date-mp-btns">Nombre 3</td>
                            <td width="19%" ><input name="venta_nombre3" type="text" id="venta_nombre3" /></td>
                            <td width="26%" class="x-date-mp-btns">Rut 3</td>
                            <td width="35%" ><input name="venta_rut3" type="text" id="venta_rut3" /></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Pat 3</td>
                            <td ><input name="venta_apepat3" type="text" id="venta_apepat3"/></td>
                            <td class="x-date-mp-btns">Parentesco 3</td>
                            <td ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'EL MISMO' => 'EL MISMO',
                                    'CONYUGE' => 'CONYUGE',
                                    'HIJO' => 'HIJO',
                                    'OTRO' => 'OTRO'
                                );
                                $identificador = 'id="venta_parentesco3"';
                                echo form_dropdown('venta_parentesco3', $options, $venta["parentesco3"], $identificador);
                                ?></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Mat 3</td>
                            <td ><input name="venta_apemat3" type="text" id="venta_apemat3" /></td>
                            <td class="x-date-mp-btns">Porcentaje 3</td>
                            <td ><input name="venta_porcentaje3" type="text" id="venta_porcentaje3" class="numbersOnly" value="<?php echo $venta["porcentaje3"] ?>"/></td>
                        </tr>
                    </table>
                </div>





                <div id="div_venta" style="display:">

                    <table width="100%" border="0" cellpadding="1" cellspacing="1" >




                        <tr>
                            <td colspan="4" class="header">DATOS DE USUARIO<strong> 4</strong></td>
                        </tr>
                        <tr>
                            <td width="20%" class="x-date-mp-btns">Nombre 4</td>
                            <td width="19%" ><input name="venta_nombre4" type="text" id="venta_nombre4" /></td>
                            <td width="26%" class="x-date-mp-btns">Rut 4</td>
                            <td width="35%" ><input name="venta_rut4" type="text" id="venta_rut4" /></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Pat 4</td>
                            <td ><input name="venta_apepat4" type="text" id="venta_apepat4" /></td>
                            <td class="x-date-mp-btns">Parentesco 4</td>
                            <td ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'EL MISMO' => 'EL MISMO',
                                    'CONYUGE' => 'CONYUGE',
                                    'HIJO' => 'HIJO',
                                    'OTRO' => 'OTRO'
                                );
                                $identificador = 'id="venta_parentesco4" ';
                                echo form_dropdown('venta_parentesco4', $options, $venta["parentesco4"], $identificador);
                                ?></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Mat 4</td>
                            <td ><input name="venta_apemat4" type="text" id="venta_apemat4" /></td>
                            <td class="x-date-mp-btns">Porcentaje 4</td>
                            <td ><input name="venta_porcentaje4" type="text" id="venta_porcentaje4"  class="numbersOnly" value="<?php echo $venta["porcentaje4"] ?>"/></td>
                        </tr>
                    </table>
                </div>
