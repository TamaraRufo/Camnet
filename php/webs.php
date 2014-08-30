<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../css/camnet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src='../js/botonera.js'></script>
</head>

<body onload="MM_preloadImages('../img/inicio2.jpg','../img/salir2.jpg','../img/usuarios2.jpg','../img/archivos2.jpg','../img/logs2.jpg','../img/webs2.jpg')">
<div id="apDiv10">
  <div id="apDiv13">
  <p></p>
  <table border="1" align="center" bordercolor="#000000">
  	<tr class="Estilo5" align="center">
        <td colspan="7" class="Estilo5" > Tabla de Amistades </td>
        </tr>
    <tr class="Estilo5" align="center">
        <td class="Estilo5">
          ID        </td>
        <td class="Estilo5">
          NOMBRE        </td>
        <td class="Estilo5">
          IDAMIGO        </td>
        <td class="Estilo5">
           NOMBRE AMIGO        </td>
        </tr>
  		<?php
			require ('config.php');
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
				{         
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
					$queryl="SELECT u1.id,u1.nombre,u2.id,u2.nombre
							 from usuario u1,usuario u2
							 where u1.id in (select w.id
							 				 from acceso_webcam w) and u2.id in (select w2.idamigo
							 				 									 from acceso_webcam w2);";
					//echo $queryl;
					$result=mysql_query($queryl) or die(mysql_error());
					while($rows=mysql_fetch_array($result))
					{
						$id1=$rows[0];
						$nombre1=$rows[1];
						$id2=$rows[2];
						$nombre2=$rows[3];					
							echo "<tr>";
								echo "<td class='Estilo5'>";
									echo $id1;
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $nombre1;
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $id2;
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $nombre2;
								echo "</td>";
							echo "</tr>";
					}
					mysql_free_result($result);
					mysql_close($conn); 
				}
		?>
	</table>
  </div>
</div>
<div id="apDivbotoneraad">
  <table width="810" height="42" border="0" bordercolor="#99CC33" bgcolor="#99CC33">
    <tr>
      <td width="102" valign="bottom"><a href="administrador.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('inicio','','../img/inicio2.jpg',1)"><img src="../img/inicio.jpg" name="inicio" width="101" height="31" border="0" id="inicio" /></a></td>
      <td width="102" valign="bottom"><a href="usuarios.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../img/usuarios2.jpg',1)"><img src="../img/usuarios.jpg" name="Image4" width="101" height="31" border="0" id="Image4" /></a></td>
      <td width="102" valign="bottom"><a href="archivos.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','../img/archivos2.jpg',1)"><img src="../img/archivos.jpg" name="Image5" width="101" height="31" border="0" id="Image5" /></a></td>
      <td width="101" valign="bottom"><a href="logs.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../img/logs2.jpg',1)"><img src="../img/logs.jpg" name="Image6" width="101" height="31" border="0" id="Image6" /></a></td>
      <td width="273" valign="bottom"><a href="webs.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../img/webs2.jpg',1)"><img src="../img/webs.jpg" name="Image7" width="101" height="31" border="0" id="Image7" /></a></td>
      <td width="104" valign="bottom"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('salir','','../img/salir2.jpg',1)"><img src="../img/salir.jpg" name="salir" width="101" height="31" border="0" id="salir" /></a></td>
    </tr>
  </table>
</div>
<div id="apDiv12"><img src="../img/logolado.jpg" width="123" height="555" /></div>
</body>
</html>