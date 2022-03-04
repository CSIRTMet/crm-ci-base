<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <title>KUBO :: usuarios</title>
	<LINK rel="StyleSheet" href="<?=base_url()?>/css/CSS/estilos.css" type="text/css"> 
	<link rel="StyleSheet" href="<?=base_url()?>/css/CSS/style_campana.css" type="text/css"> 
    </script><script language="javascript" type="text/javascript" src="<?=base_url()?>/JS/jquery.js"></script>
</head>
<body>	
<?php
echo "<table border='0' cellspacing='5'><tr><td><b>Usuarios:</b> &nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table>";?>
<table border="1" cellspacing="2" cellpadding="2" align="center" width="100%">
	<thead>
	<tr>
	<th>&nbsp;</th>
	<th><small>RUT</small></th>
	<th><small>Usuario</small></th>
	<th><small>Nombre</small></th>
	</tr>
	</thead>
	<tbody>
	<?php
		foreach($usuarios_lista as $user){
			echo "<tr>";
			echo "<td width='30px'><input type='checkbox' name='usuarios[]' checked value='".$user->id_usuario."'></td>";
			echo "<td>".$user->rut."</td>";
			echo "<td>".$user->nombre_usuario."</td>";
			echo "<td>".$user->nombre."</td>";
			echo "</tr>";
		}
		
		 foreach($usuarios_no_lista as $user){
			echo "<tr>";
			echo "<td width='30px'><input type='checkbox' name='usuarios[]' value='".$user->id_usuario."'></td>";
			echo "<td>".$user->rut."</td>";
			echo "<td>".$user->nombre_usuario."</td>";
			echo "<td>".$user->nombre."</td>";
			echo "</tr>";
		} 
		
	?>
	</tbody>
</table><br>
</body>
</html>
