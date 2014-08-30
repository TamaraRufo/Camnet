<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href='../css/camnet.css' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="../js/botonera.js"></script>

</head>

<body onload="MM_preloadImages('../img/inicio2.jpg','../img/perfil2.jpg','../img/amigos2.jpg','../img/salir2.jpg','../img/opciones2.jpg')">
<div id="apDiv10">
  <div id="apDiv13">
    <div id="apDiv22">
    <form name="form" method="post" action="amigoMI.php">
      <table width="293" border="0">
        <tr>
          <th scope="row"><label for="imageField"><img src="../img/amigos.gif" width="272" height="50" /></label></th>
        </tr>
        <?php
			$idp=$_SESSION['id'];
			require ('config.php');
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
				{         
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
					$query="select * from usuario u where u.id in (SELECT idamigo from acceso_webcam w where w.id=$idp);";
					//echo $query1;
					$result=mysql_query($query) or die(mysql_error());
					while($rows=mysql_fetch_array($result))
					{
						extract($rows);
						$_SESSION['idm']=$id;
						$_SESSION['nombrea']=$nombre;
						$_SESSION['apellidosa']=$apellidos;
						$_SESSION['ipamigo']=$IP;						
							echo "<tr>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['nombrea']." ".$_SESSION['apellidosa'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo "<input type='submit' name='".$_SESSION['idm']."' id='eliminar' value='Visitar'/>";
								echo "</td>";
							echo "</tr>";
					}
					mysql_free_result($result);
					mysql_close($conn); 
				}
		?>
      </table>
      </form>
    </div>
  
    <div id="apDiv23">
    <form name="form" method="post" action="amigoc.php">
      <table width="395" border="0">
        <tr>
          <th valign="middle" scope="row"><div align="center"><img src="../img/sugerencias.gif" width="297" height="50" /></div></th>
        </tr>
        <?php
			$idp=$_SESSION['id'];
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
				{         
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
						$consulta="select * 
								   from usuario u 
								   where u.id!=$idp and tipo!='administrador' and activo=1 and u.id not in(select w.idamigo
								   																	  from acceso_webcam w
																									  where w.id=$idp);";
						
						$resultado=mysql_query($consulta) or die(mysql_error());
						while($rows=mysql_fetch_array($resultado))
						{
							extract($rows);
							$_SESSION['idusu']=$id;
							$_SESSION['nombreusu']=$nombre;
							$_SESSION['apellidosusu']=$apellidos;
							$_SESSION['ciudad']=$ciudad;						
								echo "<tr>";
									echo "<td class='Estilo5' align='left' >";
										echo $_SESSION['nombreusu']." ".$_SESSION['apellidosusu'];
									echo "</td>";
									echo "<td class='Estilo5' align='left'>";
										echo "<input type='submit' name='".$_SESSION['idusu']."' id='eliminar' value='Conectar'/>";
									echo "</td>";
								echo "</tr>";
						}
					//mysql_free_result($result);
					mysql_close($conn); 
				}
		?>
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
      <td width="101" valign="bottom"><a href="opciones.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../img/opciones2.jpg',1)"><img src="../img/opciones.jpg" name="Image7" width="101" height="31" border="0" id="Image7" /></a></td>
      <td width="104" valign="bottom"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('salir','','../img/salir2.jpg',1)"><img src="../img/salir.jpg" name="salir" width="101" height="31" border="0" id="salir" /></a></td>
    </tr>
  </table>
</div>
<div id="apDiv12"><img src="../img/logolado.jpg" width="123" height="555" /></div>
</body>
</html>
