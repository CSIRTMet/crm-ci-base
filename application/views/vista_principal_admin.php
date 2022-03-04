

<style type="text/css">
<!--

#encabezado_campana {

	position:relative;
	width:100%;
	text-align:justify;
	padding:0px;
	
	
}

#div_vista_principal_administracion {

	position:relative;
	width:95%;
	text-align: center;
	padding-bottom:1px;
	padding-left:7px;
	padding-right:7px;
	margin:0 auto 0 auto;
	
	
	
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

</script>
<link href="<?php echo base_url() ?>/css/ext-all.css" rel="stylesheet" type="text/css" />
<link href="../../css/ext-all.css" rel="stylesheet" type="text/css" />
<title>KUBO COBRAZA - ADMINISTRACION</title>



<div id="div_vista_principal_administracion">
<?php $this->load->view("includes/encabezado");?>
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="x-progress-inner" >
    
    <tr>
      <td  class="x-border-layout-ct"><strong>ADMINISTRACION DEL SISTEMA</strong></td>
    </tr>
    <tr>
      <td class="x-menu"><span style="padding-left:30px;"><a href="<?php echo base_url() ?>index.php/empresa_admin/form_listar_empresa/">EMPRESAS</a></span></td>
    </tr>
    <tr>
      <td class="x-menu"><span style="padding-left:30px;"><a href="<?php echo base_url() ?>index.php/usuario_admin/form_listar_usuario/">USUARIOS</a></span></td>
    </tr>
  </table>
</div>