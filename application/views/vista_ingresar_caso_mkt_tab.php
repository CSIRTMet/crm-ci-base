


<script type="text/javascript">IniciarCrono()</script>

<style type="text/css">
    <!--

    #encabezado_campana {

        position:relative;
        width:100%;
        text-align:justify;
        padding:0px;


    }

    #div_cliente {

        position:relative;
        width:95%;
        text-align:justify;

        padding-bottom:1px;
        padding-left:7px;
        padding-right:7px;
        padding-top:10px;


    }

    #div_telefono , #div_direccion, #div_email {

        position:relative;
        width:95%;
        text-align:justify;
        padding-top:5px;
        padding-left:7px;
        padding-right:7px;



    }
    #div_gestion {
        position:relative;
        width:95%;
        text-align:justify;
        padding:7px;

    }

    #div_agenda{
        position:relative;
        width:95%;
        text-align:justify;
        padding:0 7px 7px 7px;


    }

    #div_venta{
        position:relative;
        width:95%;
        text-align:justify;
        padding:0 7px 7px 7px;


    }

    #div_resumen {
        position:relative;
        width:95%;
        text-align:justify;
        padding:7px;

    }
    #Layer6 {
        position:relative;
        width:95%;
        text-align:justify;
        padding:7px;

    }
    #div_comando {
        position:relative;
        width:95%;
        text-align:justify;
        padding:7px;

    }
    table { 

        border-style:solid;
        border-width:1px;
        border-color:#9aaab4;
        padding:4pt;
        text-align:left;
        margin-left:10px;
        margin-right:6px;
        background-color: #edf1f3 }

    H1 {
        font-size:150%;
        padding-left: 10px;
        text-align: left;
    }
    H2 {
        font-size:150%;
        padding-left: 10px;
        text-align: left;
    }
    H3 {
        padding-left: 10px;
        text-align: left;
    }

    H4 {
        padding-left: 10px;
        text-align: left;
    }
    H5 {
        padding-left: 10px;
        text-align: left;
    }

    -->
</style>

<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />


<style type="text/css">
    <!--
    -->






    ul.tabs {
        margin: 0;
        padding: 0;
        float: left;
        list-style: none;
        height: 32px;
        border-bottom: 1px solid #999;
        border-left: 1px solid #999;
        width: 100%;
    }
    ul.tabs li {
        float: left;
        margin: 0;
        padding: 0;
        height: 31px;
        line-height: 31px;
        border: 1px solid #999;
        border-left: none;
        margin-bottom: -1px;
        overflow: hidden;
        position: relative;
        background: #e0e0e0;
    }
    ul.tabs li a {
        text-decoration: none;
        color: #000;
        display: block;
        font-size: 1.2em;
        padding: 0 20px;
        border: 1px solid #fff;
        outline: none;
    }
    ul.tabs li a:hover {
        background: #ccc;
    }
    html ul.tabs li.active, html ul.tabs li.active a:hover  {
        background: #fff;
        border-bottom: 1px solid #fff;
    }




    .tab_container {
        border: 1px solid #999;
        border-top: none;
        overflow: hidden;
        clear: both;
        float: left; width: 100%;
        background: #fff;
    }
    .tab_content {
        padding: 20px;
        font-size: 1.2em;
    }



</style> 





<script type="text/javascript" >
    $(document).ready(function()
    {
        $(".tab_content").hide();
        $("ul.tabs li:first").addClass("active").show();
        $(".tab_content:first").show();

        $("ul.tabs li").click(function()
        {
            $("ul.tabs li").removeClass("active");
            $(this).addClass("active");
            $(".tab_content").hide();

            var activeTab = $(this).find("a").attr("href");
            $(activeTab).fadeIn();
            return false;
        });


        carga_div_telefonos(<?php echo $id_cliente; ?>);
        carga_div_direcciones(<?php echo $id_cliente; ?>);
        carga_div_email(<?php echo $id_cliente; ?>);

    });

</script>

<script type="text/javascript">


    /*
     *#######################
     *     ON PAGE LOAD
     *#######################
     */

    $("#select_nivel1").change(function() {
        $('#select_nivel2').html('<option value=0>Cargando...</option>');
        $('#select_nivel3').html('<option value=0>--</option>');
        $('#select_nivel4').html('<option value=0>--</option>');
        var id = $(this).val();
        var url = '<?php echo base_url() ?>index.php/tipificacion/get_nivel2/';

        $.post(url, {'id': id}, function(data) {
            $('#select_nivel2').html(data);
        });
    });



    // Selects one or more elements to assign a simpletip to



    $("#select_nivel2").change(function() {
        $('#select_nivel3').html('<option value=0>Cargando...</option>');
        $('#select_nivel4').html('<option value=0>--</option>');
        var id = $(this).val();
        var url = '<?php echo base_url() ?>index.php/tipificacion/get_nivel3/';
        $.post(url, {'id': id}, function(data) {
            $('#select_nivel3').html(data);
        });

    });



    $("#select_nivel3").change(function() {
        $('#select_nivel4').html('<option value=0>Cargando...</option>');
        var id = $(this).val();
        var url = '<?php echo base_url() ?>index.php/tipificacion/get_nivel4/';
        $.post(url, {'id': id}, function(data) {
            $('#select_nivel4').html(data);
        });

    });

    $("#select_nivel4").change(function() {

        var id = $(this).val();
        var url = '<?php echo base_url() ?>index.php/tipificacion/get_detalle_nivel4/';
        $.post(url, {'id': id}, function(data) {

            console.log(data);

            if (data.accion == "2") {
                mostrar_div_agendamiento();
            }
            else
            {
                ocultar_div_agendamiento();
            }

            if (id != "9999") {
                //ocultar_div_venta();
            }
            else {
                //mostrar_div_venta();
            }

        }, "json");

    });


    /*
     *#######################
     * TRAE RESPUESTA DE CLIENTE DESDE CONTROLADOR
     *#######################*/



</script>


<script type="text/javascript">
    /*
     *#######################
     *   
     *#######################
     */



    function mostrar() {
        $("#pop").fadeIn('slow');
    } //checkHover

    function cerrarPop() {
        $("#pop").hide();
    }

    $('#txt_glosa').keypress(function(e)
    {
        var code = e.keyCode ? e.keyCode : e.which;
        var pressedKey = String.fromCharCode(code);
        if (!pressedKey.match(/[a-zA-Z0-9 ()\s]/g))
        {
            e.preventDefault();
        }
    });

    function guardar_telefono() {
        $.post("<?php echo base_url() ?>index.php/telefono/ingresar_nuevo_telefono", {
            area: $("#txt_area_add").val()
                    , numero: $("#txt_numero_add").val()
                    , tipo: $("#select_tipo_telefono_add").val()
                    , id_cliente: $("#txt_id_cliente").val()

        }, function(data) {
            if (data.length > 3)  //viene un error y lo muestro
            {
                alert(data);
            }
            else
            {
                ocultar_div_nuevo_telefono();
                carga_div_telefonos(<?php echo $id_cliente; ?>);
            }
        });


    }


    function guardar_direccion() {

        $.post("<?php echo base_url() ?>index.php/direccion/ingresar_nueva_direccion", {
            direccion_region: $("#select_region").val()
                    , direccion_ciudad: $("#select_ciudad").val()
                    , direccion_comuna: $("#select_comuna").val()
                    , direccion_calle: $("#dir_calle").val()
                    , direccion_numero: $("#dir_numero").val()
                    , direccion_complemento: $("#dir_complemento").val()

                    , id_cliente: <?php echo $id_cliente; ?>

        }, function(data) {
            if (data.length > 3)  //viene un error y lo muestro
            {
                alert(data);
            }
            else
            {
                ocultar_div_nueva_direccion();
                carga_div_direcciones(<?php echo $id_cliente; ?>);
            }
        });


    }
    function guardar_email() {

        $.post("<?php echo base_url() ?>index.php/email/ingresar_nuevo_email", {
            email: $("#txt_email").val()
                    , tipo: $("#select_tipo_email_add").val()
                    , id_cliente: <?php echo $id_cliente; ?>

        }, function(data) {
            if (data.length > 3)  //viene un error y lo muestro
            {
                alert(data);
            }
            else
            {
                ocultar_div_nuevo_email();
                carga_div_email(<?php echo $id_cliente; ?>);
            }
        });


    }




    function enviar_formulario() {
        //alert("hola");

        // $("#Grabar").attr("disabled","disabled");
        // alert( $("#txt_campo3").val());
        $.post("<?php echo base_url() ?>index.php/gestion/ingresar_gestion", {
            id_cliente: $("#txt_id_cliente").val()
                    , id_gestion: $("#txt_id_gestion").val()
                    , id_usuario: $("#txt_id_usuario").val()
                    , id_nivel1: $("#select_nivel1").val()
                    , id_nivel2: $("#select_nivel2").val()
                    , id_nivel3: $("#select_nivel3").val()
                    , id_nivel4: $("#select_nivel4").val()
                    , nombre_contacto: ''
                    , apaterno_contacto: ''
                    , amaterno_contacto: ''
                    , fecha_nacimiento: $("#txt_fecha_nacimiento").val()
                    , estado_civil: $("#txt_estado_civil").val()
                    , sexo: $("#txt_sexo").val()
                    , edad: $("#txt_edad").val()
                    , glosa: $("#txt_glosa").val()

                    //datos del agendamiento
                    , tipo_agendamiento: $("#select_tipo_agendamiento").val()
                    , fecha: $("#fecha").val()
                    , hora: $("#hora").val()
                    , minuto: $("#minuto").val()


                    , direccion_correcta: $("#direccion_correcta").val()

                    //datos de venta

                    , venta_area1: $("#area1").val()
                    , venta_area2: $("#area2").val()
                    , venta_area3: $("#area3").val()
                    , venta_area4: $("#area4").val()
                    , venta_area5: $("#area5").val()
                    , venta_area6: $("#area6").val()

                    , venta_fono1: $("#fono1").val()
                    , venta_fono2: $("#fono2").val()
                    , venta_fono3: $("#fono3").val()
                    , venta_fono4: $("#fono4").val()
                    , venta_fono5: $("#fono5").val()
                    , venta_fono6: $("#fono6").val()

                    , venta_rut: $("#venta_rut").val()
                    , venta_plan: $("#venta_plan").val()
                    , venta_primamensual: $("#venta_primamensual").val()
                    , venta_primapesos: $("#venta_primapesos").val()

                    , venta_nombre1: $("#venta_nombre1").val()
                    , venta_apepat1: $("#venta_apepat1").val()
                    , venta_apemat1: $("#venta_apemat1").val()
                    , venta_parentesco1: $("#venta_parentesco1").val()
                    , venta_porcentaje1: $("#venta_porcentaje1").val()
                    , venta_sexo1: $("#venta_sexo1").val()
                    , venta_rut1: $("#venta_rut1").val()

                    , venta_nombre2: $("#venta_nombre2").val()
                    , venta_apepat2: $("#venta_apepat2").val()
                    , venta_apemat2: $("#venta_apemat2").val()
                    , venta_parentesco2: $("#venta_parentesco2").val()
                    , venta_porcentaje2: $("#venta_porcentaje2").val()
                    , venta_sexo2: $("#venta_sexo2").val()
                    , venta_rut2: $("#venta_rut2").val()

                    , venta_nombre3: $("#venta_nombre3").val()
                    , venta_apepat3: $("#venta_apepat3").val()
                    , venta_apemat3: $("#venta_apemat3").val()
                    , venta_parentesco3: $("#venta_parentesco3").val()
                    , venta_porcentaje3: $("#venta_porcentaje3").val()
                    , venta_sexo3: $("#venta_sexo3").val()
                    , venta_rut3: $("#venta_rut3").val()

                    , venta_nombre4: $("#venta_nombre4").val()
                    , venta_apepat4: $("#venta_apepat4").val()
                    , venta_apemat4: $("#venta_apemat4").val()
                    , venta_parentesco4: $("#venta_parentesco4").val()
                    , venta_porcentaje4: $("#venta_porcentaje4").val()
                    , venta_sexo4: $("#venta_sexo4").val()
                    , venta_rut4: $("#venta_rut4").val()

                    , venta_nombre5: $("#venta_nombre5").val()
                    , venta_apepat5: $("#venta_apepat5").val()
                    , venta_apemat5: $("#venta_apemat5").val()
                    , venta_parentesco5: $("#venta_parentesco5").val()
                    , venta_porcentaje5: $("#venta_porcentaje5").val()
                    , venta_sexo5: $("#venta_sexo5").val()


                    , venta_num_propuesta2: $("#venta_num_propuesta2").val()
                    , venta_anos_vigencia2: $("#venta_anos_vigencia2").val()
                    , venta_plco_descrip2: $("#venta_plco_descrip2").val()
                    , venta_ini_vig2: $("#venta_ini_vig2").val()
                    , venta_primamensual2: $("#venta_primamensual2").val()
                    , venta_primapesos2: $("#venta_primapesos2").val()



                    , venta_recuperacion: $("#venta_recuperacion").val()
                    , venta_email: $("#venta_email").val()
                    , venta_forma_pago: $("#venta_forma_pago").val()

                    ///,venta_fecha_vencimiento_data : $("#venta_fecha_vencimiento_data").val()

                    , venta_fecha_visita: $("#venta_fecha_visita").val()
                    , venta_hora_visita: $("#venta_hora_visita").val()
                    , venta_sucursal: $("#venta_sucursal").val()
                    , venta_nuevo_telefono: $("#venta_nuevo_telefono").val()


                    //Agrega ruta grabacion
                    , fono_llamado: $("#txt_fono_llamado").val()
                    , fono_llamado_carrier: $("#txt_fono_llamado_carrier").val()


                    , id_telefono: $("#txt_id_telefono").val()

        }, function(data) {


            if (data.length > 3)  //viene un error y lo muestro
            {
                alert(data);


            }
            else
            {
                $("#Grabar").attr("disabled", "");
                cargar_cliente(); //sino viene error , cargo el cliente
            }
        });
    }


</script>
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    <!--
    .style8 {font-weight: bold}
    -->
</style>
<form id="form_creacion" name="form_creacion" action="#" method="post"  >




    <ul class="tabs">
        <li><a href="#div_telefono">TELEFONOS</a></li>
        <li><a href="#div_direccion">DIRECCIONES</a></li>
        <li><a href="#div_email">EMAIL</a></li>	  
    </ul>


    <div class="tab_container">

        <?php
        foreach ($clientes as $item):

            if ($item->rut != null && $item->dv != null) {
                //$item->rut =$item->rut."-".$item->dv; 
            }

            $form_rut = $item->rut;
            $form_dv = $item->dv;
            ?>



            <?php
            if ($this->session->userdata("campana") == 2 || $this->session->userdata("campana") == 5) {
                $form_rut = substr($form_rut, 0, 4);
                $form_dv = '';
            }
            ?>


            <div id="div_cliente">
                <table width="100%" border="0" cellpadding="1" cellspacing="1" class="ui-layout-pane">

                    <input type="hidden" id="txt_id_gestion" name="txt_id_gestion" size="15" value="<?php echo $id_gestion; ?>" />   
                    <input type="hidden" id="txt_id_cliente" name="txt_id_cliente" size="15" value="<?php echo $item->id_cliente; ?>" />  
                    <input type="hidden" id="txt_id_usuario" name="txt_id_usuario" size="15" value="<?php echo $this->session->userdata('id_usuario'); ?>" />  
                    <input type="hidden" id="txt_fono_llamado" name="txt_fono_llamado" value = "" size="15"/>
                    <input type="hidden" id="txt_fono_llamado_carrier" name="txt_fono_llamado_carrier" value = "" size="15"/>
                    <input type="hidden" id="txt_id_telefono" name="txt_id_telefono" value = "0" size="15"/>
                    <tr>
                        <td width="138"><strong> RUT</strong></td>
                        <td width="313"><strong>

                                <input name="txt_rut" type="text" class="x-form-field" id="txt_rut" value="<?php echo $form_rut; ?>" size="15" maxlength="10" readonly="readonly" />
                                <input name="txt_dv" type="text" class="x-form-field" id="txt_dv" value="<?php echo $form_dv; ?>" size="5" maxlength="1" readonly="readonly"/>
                            </strong></td>
                        <td colspan="2"><span class="style8">ULTIMA GESTION:  </span><a href='#' id='ultima_gestion' title="<?php
                            if (count($ultima_gestion) == 1) {
                                echo "Fecha = [$ultima_gestion->fecha_contacto]";
                                echo "\n";
                                echo "Ejecutivo = [$ultima_gestion->nombre_usuario]";
                                echo "\n";
                                echo "Glosa = [$ultima_gestion->glosa]";
                            }
                            ?>">
                                                                                            <?php
                                                                                            if (count($ultima_gestion) == 1) {
                                                                                                echo $ultima_gestion->nombre_sub_respuesta;
                                                                                            } else {
                                                                                                echo "--";
                                                                                            }
                                                                                            ?>

                            </a>	  <img src="<?php echo base_url() ?>/css/images/logo_historial.png"  title="Ver todas las gestiones" alt="Ver todas las gestiones" width="60" height="17"  align="absmiddle" style="cursor:pointer" onclick="historial_gestiones('<?php echo $item->id_cliente ?>', '<?php echo $this->session->userdata("campana") ?>')" /> </td>
                    </tr>

                    <tr>
                        <td><strong>NOMBRE</strong></td>
                        <td nowrap><?php echo $item->nombre; ?></td>
                        <td width="101"><strong>EMAIL</strong></td>
                        <td width="445" nowrap="nowrap"><?
                            foreach ($emails as $email):
                                echo $email->email;
                            endforeach;
                            ?>
                            <?php /* <img  align="absmiddle" src="<?php echo base_url() ?>/css/images/icono_email.gif" height="17" onclick="" /> */ ?>		</td>
                    </tr>




                    <?php if ($this->session->userdata("campana") == 2 || $this->session->userdata("campana") == 3 || $this->session->userdata("campana") == 4 || $this->session->userdata("campana") == 5) { ?>
                        <tr>
                            <td><strong>DESCRIPCION</strong></td>
                            <td colspan="3" nowrap><?php echo $item->marca; ?></td>
                        </tr>


                    <?php } else { ?>

                        <tr>
                            <td><strong>MARCA</strong></td>
                            <td nowrap><?php echo $item->marca; ?></td>
                            <td><strong>SEGURO</strong></td>
                            <td nowrap="nowrap"><?php echo trim($venta["plco_descrip"]) ?></td>
                        </tr>
                        <tr>
                            <td><strong>DESCRIPCION</strong></td>
                            <td colspan="3" nowrap><?php echo trim($venta["ramo_descrip"]) ?></td>
                        </tr>
                    <?php } ?>


                </table>
            </div>

            <div id="div_telefono" class="tab_content">
                <div align="center"><img src="<?php echo base_url() ?>/css/images/ajax-loader.gif" />
                </div>
            </div> 

            <div id="div_direccion" class="tab_content">

                <div align="center"><img src="<?php echo base_url() ?>/css/images/ajax-loader.gif" />
                </div>


            </div> 

            <div id="div_email" class="tab_content">

                <div align="center"><img src="<?php echo base_url() ?>/css/images/ajax-loader.gif" />
                </div>


            </div> 

            <div id="div_gestion" class="">

                <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >

                    <tr>
                        <td width="15%" class="header">TIPIFICACION </td>
                        <td colspan="2" class="header">DATOS DE CONTACTO </td>
                        <td class="header">GLOSA</td>
                    </tr>
                    <tr>
                        <td> <?php //var_dump($nivel1);   ?><select name="select_nivel1" id="select_nivel1" >
                                <option value="0">* Nivel 1 *</option>
                                <?php foreach ($nivel1 as $nivel): ?>
                                    <option value="<?php echo $nivel->id_nivel1; ?>"><?php echo $nivel->nombre; ?></option>
                                <?php endforeach; ?>
                            </select></td>
                        <td width="10%" class="x-date-mp-btns">F. NAC.</td>
                        <td width="20%"  ><span >
                                <?php if ($this->session->userdata("campana") == 4) { ?>
                                    <input name="txt_fecha_nacimiento" type="text" id="txt_fecha_nacimiento" class="date-picker" value=""/>
                                <?php } else { ?>
                                    <input name="txt_fecha_nacimiento" type="text" id="txt_fecha_nacimiento" class="date-picker" value="<?php echo ($venta["fechanacimiento"] == "0000/00/00") ? "" : $venta["fechanacimiento"]; ?>"/>
                                <?php } ?>                            
                            </span></td>


                        <td width="26%" rowspan="4" ><textarea name="txt_glosa"  cols="30" rows="5" class="ext-mb-textarea" id="txt_glosa"></textarea></td>
                    </tr>
                    <tr>
                        <td><select name="select_nivel2" id="select_nivel2" >
                                <option value="0">* Nivel 2 *</option>
                            </select></td>
                        <td class="x-date-mp-btns">E. CIVIL</td>
                        <td  >  <?php
                            $options = array(
                                '' => 'Seleccione',
                                'C' => 'Casado(a)',
                                'S' => 'Soltero(a)',
                                'V' => 'Viudo(a)',
                                'A' => 'Separado(a)',
                            );
                            $identificador = 'id="txt_estado_civil"';
                            echo form_dropdown('txt_estado_civil', $options, '', $identificador);
                            ?></td>
                    </tr>
                    <tr>
                        <td><select name="select_nivel3" id="select_nivel3" >
                                <option value="0">* Nivel 3 *</option>
                            </select></td>
                        <td class="x-date-mp-btns">SEXO</td>
                        <td ><?php
                            $options = array(
                                '' => 'Seleccione',
                                'F' => 'F',
                                'M' => 'M',
                            );
                            $identificador = 'id="txt_sexo"';
                            echo form_dropdown('txt_sexo', $options, $venta["sexo"], $identificador);
                            ?></td>
                    </tr>
                    <tr>
                        <td><select name="select_nivel4" id="select_nivel4" >
                                <option value="0">* Nivel 4 *</option>
                            </select></td>
                        <td class="x-date-mp-btns">EDAD</td>
                        <td ><input name="txt_edad" type="text" id="txt_edad"  value="<?php echo $venta["edad"] ?>" /></td>
                    </tr>
                </table>
            </div>


            <div id="div_agenda" style="display:none">

                <table width="100%" border="0" cellpadding="1" cellspacing="1" >
                    <tr>
                        <td width="17%" class="header">Agendar nueva llamada </td>
                        <td width="4%" class="header"><img src="<?php echo base_url() ?>/css/images/agendamiento_1.png" width="32" height="32" /></td>
                        <td width="28%" class="x-border-layout-ct"><input name="fecha" id="fecha" type="text"  class="date-picker" /> 
                            (<em>a&ntilde;o/mes/dia</em>) </td>
                        <td width="51%" class="x-border-layout-ct"><select name="hora" id="hora" >
                                <option value="0">* Hora *</option>
                                <?php foreach ($horas as $hora): ?>
                                    <option value="<?php echo $hora ?>"><?php echo $hora ?></option>
                                <?php endforeach; ?>
                            </select>
                            <strong>:</strong>
                            <select name="minuto" id="minuto">
                                <option value="0">* Minutos *</option>
                                <?php foreach ($minutos as $minuto): ?>
                                    <option value="<?php echo $minuto ?>"><?php echo $minuto ?></option>
                                <?php endforeach; ?>
                            </select> 
                            <select name="select_tipo_agendamiento" id="select_tipo_agendamiento">
                                <option value="0">* Tipo de agendamiento *</option>
                                <option value="1">Privado</option>
                                <option value="2" selected="selected">P&uacute;blico</option>
                            </select></td>
                    </tr>
                </table>
            </div>





            <?php if ($this->session->userdata("campana") == 2 || $this->session->userdata("campana") == 3) { ?>

                <div id="div_venta" style="display:">

                    <table width="100%" border="0" cellpadding="1" cellspacing="1" >
                        <tr>
                            <td colspan="4" class="header">DATOS DE LA VENTA</td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">RUT </td>
                            <td ><input name="venta_rut" type="text" id="venta_rut"  value=""/></td>
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
                            <td class="x-date-mp-btns">RECUPERACION DE VENTA</td>
                            <td><select name="venta_recuperacion" id="venta_recuperacion" >
                                    <option value="NO">* NO *</option>
                                    <option value="SI">* SI *</option>
                            </td>
                            <td class="x-date-mp-btns"></td>
                            <td></td>
                        </tr>
                        <?php if ($this->session->userdata("campana") == 3) { ?>

                            <tr>
                                <td class="x-date-mp-btns">EMAIL</td>
                                <td><input name="venta_email" type="text" id="venta_email"  value=""/>
                                </td>
                                <td class="x-date-mp-btns">FORMA DE PAGO</td>
                                <td ><input name="venta_forma_pago" type="text" id="venta_forma_pago"  value=""/></td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>          
            <?php } else if ($this->session->userdata("campana") == 4) { ?>

                <div id="div_venta" style="display:">

                    <table width="100%" border="0" cellpadding="1" cellspacing="1" >
                        <tr>
                            <td colspan="4" class="header">DATOS DE LA VENTA</td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">FECHA VISITA </td>
                            <td ><input name="venta_fecha_visita" type="text" id="venta_fecha_visita"  value="" class="date-picker"/></td>
                            <td class="x-date-mp-btns">HORA VISITA</td>
                            <td><input name="venta_hora_visita" type="text" id="venta_hora_visita"  value=""/></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">NUEVO TELEFONO </td>
                            <td ><input name="venta_nuevo_telefono" type="text" id="venta_nuevo_telefono"  value=""/></td>
                            <td class="x-date-mp-btns"><strong>RECUPERACION DE VENTA</strong></td>
                            <td><select name="venta_recuperacion" id="venta_recuperacion" >
                                    <option value="NO">* NO *</option>
                                    <option value="SI">* SI *</option>
                            </td>
                        </tr>


                        <tr>
                            <td class="x-date-mp-btns">SUCURSAL</td>
                            <td colspan='3'><select name="venta_sucursal" id="venta_sucursal" >
                                    <option value="">* Seleccione *</option>
                                    <?php foreach ($sucursales as $sucursal): ?>
                                        <option value="<?php echo $sucursal->codigo; ?>"><?php echo $sucursal->codigo . " -  " . $sucursal->sucursal . " - " . $sucursal->direccion . ", " . $sucursal->comuna; ?></option>
                                    <?php endforeach; ?>
                            </td>         
                        </tr>
                        <?php if ($this->session->userdata("campana") == 3) { ?>

                            <tr>
                                <td class="x-date-mp-btns">EMAIL</td>
                                <td><input name="venta_email" type="text" id="venta_email"  value=""/>
                                </td>
                                <td class="x-date-mp-btns">FORMA DE PAGO</td>
                                <td ><input name="venta_forma_pago" type="text" id="venta_forma_pago"  value=""/></td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>      
        
        
        
        
        
        
            <?php } else if ($this->session->userdata("campana") == 5) {  
                
                
                $this->load->view("campanas/vista_campana_5");
                
                
                
            } else { ?>       

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
                            <td width="20%" class="x-date-mp-btns">Prima mensual</td>
                            <td width="19%" ><input name="venta_primamensual" type="text" id="venta_primamensual"  value="<?php echo $venta["primamensual"] ?>"/></td>
                            <td width="26%" class="x-date-mp-btns">Prima pesos</td>
                            <td width="35%" ><input name="venta_primapesos" type="text" id="venta_primapesos"  <?php echo $venta["primapesos"] ?>/></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Num Propuesta 2</td>
                            <td ><input name="venta_num_propuesta2" type="text" id="venta_num_propuesta2"  value="<?php echo $venta["num_propuesta2"] ?>" /></td>
                            <td class="x-date-mp-btns">Años vigencia 2</td>
                            <td ><input name="venta_anos_vigencia2" type="text" id="venta_anos_vigencia2"  value="<?php echo $venta["anos_vigencia2"] ?>" /></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Cód. Verificación</td>
                            <td ><input name="venta_plco_descrip2" type="text" id="venta_plco_descrip2"   value="<?php echo $venta["plco_descrip2"] ?>" readonly="readonly" /></td>
                            <td class="x-date-mp-btns">Ini vig 2</td>
                            <td ><input name="venta_ini_vig2" type="text" id="venta_ini_vig2"  value="<?php echo $venta["ini_vig2"] ?>" /></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Prima mensual 2</td>
                            <td ><input name="venta_primamensual2" type="text" id="venta_primamensual2"  value="<?php echo $venta["primamensual2"] ?>"/></td>
                            <td class="x-date-mp-btns">Prima pesos 2</td>
                            <td ><input name="venta_primapesos2" type="text" id="venta_primapesos2"  value="<?php echo $venta["primapesos2"] ?>"/></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Fecha vencimiento data</td>
                            <td ><input name="venta_fecha_vencimiento_data" type="text" id="venta_fecha_vencimiento_data"  value="<?php echo $venta["fecha_vencimiento_data"] ?>"/></td>
                            <td class="x-date-mp-btns">&nbsp;</td>
                            <td >&nbsp;</td>
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
                            <td width="26%" class="x-date-mp-btns">Sexo 1</td>
                            <td width="35%" ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'M' => 'Masculino',
                                    'F' => 'Femenino'
                                );
                                $identificador = 'id="venta_sexo1" ';
                                echo form_dropdown('venta_sexo1', $options, '', $identificador);
                                ?></td>
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
                            <td width="26%" class="x-date-mp-btns">Sexo 2</td>
                            <td width="35%" ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'M' => 'Masculino',
                                    'F' => 'Femenino'
                                );
                                $identificador = 'id="venta_sexo2" ';
                                echo form_dropdown('venta_sexo2', $options, '', $identificador);
                                ?></td>
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
                            <td width="26%" class="x-date-mp-btns">Sexo 3</td>
                            <td width="35%" ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'M' => 'Masculino',
                                    'F' => 'Femenino'
                                );
                                $identificador = 'id="venta_sexo3" ';
                                echo form_dropdown('venta_sexo3', $options, '', $identificador);
                                ?></td>
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
                            <td width="26%" class="x-date-mp-btns">Sexo 4</td>
                            <td width="35%" ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'M' => 'Masculino',
                                    'F' => 'Femenino'
                                );
                                $identificador = 'id="venta_sexo4" ';
                                echo form_dropdown('venta_sexo4', $options, '', $identificador);
                                ?></td>
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





                <div id="div_venta" style="display:">

                    <table width="100%" border="0" cellpadding="1" cellspacing="1" >




                        <tr>
                            <td colspan="4" class="header">DATOS DE USUARIO<strong> 5</strong></td>
                        </tr>
                        <tr>
                            <td width="20%" class="x-date-mp-btns">Nombre 5</td>
                            <td width="19%" ><input name="venta_nombre5" type="text" id="venta_nombre5" /></td>
                            <td width="26%" class="x-date-mp-btns">Sexo 5</td>
                            <td width="35%" ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'M' => 'Masculino',
                                    'F' => 'Femenino'
                                );
                                $identificador = 'id="venta_sexo5" ';
                                echo form_dropdown('venta_sexo5', $options, '', $identificador);
                                ?></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Pat 5</td>
                            <td ><input name="venta_apepat5" type="text" id="venta_apepat5" /></td>
                            <td class="x-date-mp-btns">Parentesco 5</td>
                            <td ><?php
                                $options = array(
                                    '' => 'Seleccione',
                                    'EL MISMO' => 'EL MISMO',
                                    'CONYUGE' => 'CONYUGE',
                                    'HIJO' => 'HIJO',
                                    'OTRO' => 'OTRO'
                                );
                                $identificador = 'id="venta_parentesco5" ';
                                echo form_dropdown('venta_parentesco5', $options, $venta["parentesco5"], $identificador);
                                ?></td>
                        </tr>
                        <tr>
                            <td class="x-date-mp-btns">Ape Mat 5</td>
                            <td ><input name="venta_apemat5" type="text" id="venta_apemat5" /></td>
                            <td class="x-date-mp-btns">Porcentaje 5</td>
                            <td ><input name="venta_porcentaje5" type="text" id="venta_porcentaje5" class="numbersOnly"  value="<?php echo $venta["porcentaje5"] ?>"/></td>
                        </tr>
                    </table>
                </div>

            <?php }    // del if camapana = 2  ?>




        <?php endforeach; ?>

        <script type="text/javascript">

    $(".date-picker").datepicker({
        yearRange: "-90:+1",
        changeYear: true,
        changeMonth: true,
        dateFormat: 'yy/mm/dd'

    });

        </script>






        <div id="div_comando">
            <table border="0" style="width:100%">
                <tr>
                    <td width="43%">&nbsp;</td>
                    <td width="6%"  ><input name="Grabar" type="button" class="btnForm" id="Grabar" value="Grabar" onclick="enviar_formulario();" /></td>
                    <td width="51%">&nbsp;</td>
                </tr>
            </table>
        </div>

    </div>




</form>

<script>
    $('#venta_rut').Rut({
        on_error: function() {
            alert('Rut incorrecto');
        },
        format_on: 'keyup'
    });
    $('#venta_rut1').Rut({
        on_error: function() {
            alert('Rut incorrecto');
        },
        format_on: 'keyup'
    });
    $('#venta_rut2').Rut({
        on_error: function() {
            alert('Rut incorrecto');
        },
        format_on: 'keyup'
    });
    $('#venta_rut3').Rut({
        on_error: function() {
            alert('Rut incorrecto');
        },
        format_on: 'keyup'
    });
    $('#venta_rut4').Rut({
        on_error: function() {
            alert('Rut incorrecto');
        },
        format_on: 'keyup'
    });
</script>