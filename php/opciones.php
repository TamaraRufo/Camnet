<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../css/camnet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/botonera.js"></script>
</head>

<body onload="MM_preloadImages('../img/inicio2.jpg','../img/perfil2.jpg','../img/amigos2.jpg','../img/salir2.jpg','../img/opciones2.jpg')">
<div id="apDiv10">
  <div id="apDiv13">
    <div id="apDiv18"><img src="../img/modifica.gif" width="748" height="50" /></div>
    <div id="apDiv17">
    <?php
	$email=$_SESSION['email'];
require ('config.php');
$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
	if($conn)
		{
			mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
			$consulta = "SELECT * FROM usuario WHERE  email='$email';";
			$result = mysql_query($consulta) or die("La consulta fall&oacute;: " . mysql_error());
			if($rows=mysql_fetch_array($result))
			{
        		extract($rows);
				$_SESSION['id']=$id;
				$_SESSION['nombre']=$nombre;
				$_SESSION['apellidos']=$apellidos;
				$_SESSION['ciudad']=$ciudad;
				$_SESSION['email']=$email;
				}
			mysql_free_result($result);
			mysql_close($conn);  
		}
?>
    <form name="form" action="modifica.php" method="post">
      <table width="237" height="162" border="0">
        <tr>
          <th width="125" height="28" align="left" class="Estilo5" scope="row">Nombre:</th>
          <td width="363" align="left"><label for="nombre"></label>
            <input name="nombre" type="text" id="nombre" value="<?php echo $_SESSION['nombre']?>" size="30" /></td>
        </tr>
        <tr>
          <th height="24" align="left" class="Estilo5" scope="row">Apellidos:</th>
          <td align="left"><label for="apellidos"></label>
            <input name="apellidos" type="text" id="apellidos" value="<?php echo $_SESSION['apellidos']?>" size="30" /></td>
        </tr>
        <tr>
          <th height="27" align="left" class="Estilo5" scope="row">Ciudad:</th>
          <td align="left"><label for="ciudad"></label>
            <input name="ciudad" type="text" id="ciudad" value="<?php echo $_SESSION['ciudad']?>" size="30" /></td>
        </tr>
        <tr>
          <th height="24" align="left" class="Estilo5" scope="row">Email:</th>
          <td align="left"><label for="email"></label>
            <input name="email" type="text" id="email" value="<?php echo $_SESSION['email']?>" size="30" /></td>
        </tr>
        <tr>
          <th height="31" align="left" class="Estilo5" scope="row">Contraseña:</th>
          <td align="left"><label for="contra"></label>
            <input type="password" name="contra" id="contra" /></td>
        </tr>
        <tr>
          <th height="14" align="left" class="Estilo5" scope="row"></th>
          <td align="right"><label for="guardar"></label>
            <label for="borrar"></label>
            <input type="reset" name="borrar" id="borrar" value="Restablecer" />
            <input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
        </tr>
      </table>
      </form>
    </div>
  </div>
</div>
<div id="apDiv11">
  <table width="810" height="42" border="0" bordercolor="#99CC33" bgcolor="#99CC33">
    <tr>
      <td width="102" valign="bottom"><a href="inicio.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('inicio','','../img/inicio2.jpg',1)"><img src="../img/inicio.jpg" name="inicio" width="101" height="31" border="0" id="inicio" /></a></td>
      <td width="102" valign="bottom"><a href="perfil.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('perfil','','../img/perfil2.jpg',1)"><img src="../img/perfil.jpg" name="perfil" width="101" height="31" border="0" id="perfil" /></a></td>
      <td width="102" valign="bottom"><a href="amigos.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('amigos','','../img/amigos2.jpg',1)"><img src="../img/amigos.jpg" name="amigos" width="101" height="31" border="0" id="amigos" /></a></td>
      <td width="273" valign="baseline">&nbsp;</td>
      <td width="101" align="left" valign="bottom"><a href="opciones.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../img/opciones2.jpg',1)"><img src="../img/opciones.jpg" name="Image7" width="101" height="31" border="0" id="Image7" /></a></td>
      <td width="104" valign="bottom"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('salir','','../img/salir2.jpg',1)"><img src="../img/salir.jpg" name="salir" width="101" height="31" border="0" id="salir" /></a></td>
    </tr>
  </table>
</div>
<div id="apDiv12"><img src="../img/logolado.jpg" width="123" height="555" /></div>
</body>
</html>
