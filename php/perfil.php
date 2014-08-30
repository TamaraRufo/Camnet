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
<style type="text/css">
<!--
#apDiv24 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:6;
	left: 14px;
	top: 358px;
}
-->
</style>
</head>

<body onload="MM_preloadImages('../img/inicio2.jpg','../img/perfil2.jpg','../img/amigos2.jpg','../img/salir2.jpg','../img/opciones2.jpg')">
<div id="apDiv10">
  <div id="apDiv13">
    <div id="apDiv19">
    <table width="301" height="102" border="0" bordercolor="#99CC33">
      <tr>
        <form name="form" action="subei.php" method="post" enctype="multipart/form-data">
          <td width="323" height="96" valign="top" class="text"><input name="archivo" type="file" class="casilla" id="archivo" size="35" />
              <input name="enviar" type="submit" class="boton" id="enviar" value="Imagen" />
              <input name="action" type="hidden" value="upload" />
          </td>
        </form>
      </tr>
    </table>
    </div>
    
    <div id="apDiv20">
    <table width="301" height="102" border="0" bordercolor="#99CC33">
      <tr>
        <form name="form" action="subev.php" method="post" enctype="multipart/form-data">
          <td width="323" height="96" valign="top" class="text"><input name="archivo" type="file" class="casilla" id="archivo" size="35" />
              <input name="enviar" type="submit" class="boton" id="enviar" value="Video" />
              <input name="action" type="hidden" value="upload" />
          </td>
        </form>
      </tr>
    </table>
    </div>
    <div id="apDiv17">
    <form name="form" action="borrarimagen.php" method="post">
    <table border="1" align="center" bordercolor="#000000">
  	<tr class="Estilo5" align="center">
        <td colspan="4" class="Estilo5" > Listado de Imagenes </td>
        </tr>
    <tr class="Estilo5" align="center">
        <td class="Estilo5">
          ID        </td>
        <td class="Estilo5">
          TITULO        </td>
        <td class="Estilo5">
          FECHA	        </td>
        <td class="Estilo5">
          RUTA	        </td>
        </tr>
        <?php
			$id=$_SESSION['id'];
			require ('config.php');
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
				{         
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
					$consulta="SELECT * from objeto where propietario=$id and tipo='I' and activo=1;";
					$result=mysql_query($consulta) or die(mysql_error());
					while($rows=mysql_fetch_array($result))
					{
						extract($rows);
						$_SESSION['idob']=$idob;
						$_SESSION['titulo']=$titulo;
						$_SESSION['fecha']=$fecha;
						$_SESSION['ruta']=$ruta;						
							echo "<tr>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['idob'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['titulo'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['fecha'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo "<a href=".$_SESSION['ruta'].">VER</a>";
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo "<input type='submit' name='$idob' id='eliminar' value='Eliminar'/>";
								echo "</td>";
							echo "</tr>";
					}
					mysql_free_result($result);
					mysql_close($conn); 
				}
		?>
	</table>
    </form>
    <div align="left"></div>
    <div align="left"></div>
    </div>
    <div id="apDiv21">
    <form name="form" action="borrarimagen.php" method="post">
    <table border="1" align="center" bordercolor="#000000">
  	<tr class="Estilo5" align="center">
        <td colspan="4" class="Estilo5" > Listado de Videos </td>
        </tr>
    <tr class="Estilo5" align="center">
        <td class="Estilo5">
          ID        </td>
        <td class="Estilo5">
          TITULO        </td>
        <td class="Estilo5">
          FECHA	        </td>
        <td class="Estilo5">
          RUTA	        </td>
        </tr>
        <?php
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
				{         
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
					$queryl="SELECT * from objeto where propietario=$id and tipo='V' and activo=1;";
					$result=mysql_query($queryl) or die(mysql_error());
					while($rows=mysql_fetch_array($result))
					{
						extract($rows);
						$_SESSION['idob']=$idob;
						$_SESSION['titulo']=$titulo;
						$_SESSION['fecha']=$fecha;
						$_SESSION['ruta']=$ruta;						
							echo "<tr>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['idob'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['titulo'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['fecha'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo "<a href=".$_SESSION['ruta'].">VER</a>";
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo "<input type='submit' name='$idob' id='eliminar' value='Eliminar'/>";
								echo "</td>";
							echo "</tr>";
					}
					mysql_free_result($result);
					mysql_close($conn); 
				}
		?>
	</table>
    </form>
    <div align="right"></div>
    </div>
    <div id="apDiv24">
    <form name="form" action="recupera.php" method="post">
    <table border="1" align="center" bordercolor="#000000">
  	<tr class="Estilo5" align="center">
        <td colspan="4" class="Estilo5" > Listado de Borrados </td>
        </tr>
    <tr class="Estilo5" align="center">
        <td class="Estilo5">
          ID        </td>
        <td class="Estilo5">
          TITULO        </td>
        <td class="Estilo5">
          FECHA	        </td>
        <td class="Estilo5">
          RUTA	        </td>
        </tr>
        <?php
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
				{         
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
					$queryl="SELECT * from objeto where propietario=$id and activo=0;";
					$result=mysql_query($queryl) or die(mysql_error());
					while($rows=mysql_fetch_array($result))
					{
						extract($rows);
						$_SESSION['idob']=$idob;
						$_SESSION['titulo']=$titulo;
						$_SESSION['fecha']=$fecha;
						$_SESSION['ruta']=$ruta;						
							echo "<tr>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['idob'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['titulo'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo $_SESSION['fecha'];
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo "<a href=".$_SESSION['ruta'].">VER</a>";
								echo "</td>";
								echo "<td class='Estilo5'>";
									echo "<input type='submit' name='$idob' id='eliminar' value='Recuperar'/>";
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
  </div>
</div>
<div id="apDiv11">
  <table width="810" height="42" border="0" bordercolor="#99CC33" bgcolor="#99CC33">
    <tr>
      <td width="102" valign="bottom"><a href="inicio.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('inicio','','../img/inicio2.jpg',1)"><img src="../img/inicio.jpg" name="inicio" width="101" height="31" border="0" id="inicio" /></a></td>
      <td width="102" valign="bottom"><a href="perfil.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('perfil','','../img/perfil2.jpg',1)"><img src="../img/perfil.jpg" name="perfil" width="101" height="31" border="0" id="perfil" /></a></td>
      <td width="102" valign="bottom"><a href="amigos.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('amigos','','../img/amigos2.jpg',1)"><img src="../img/amigos.jpg" name="amigos" width="101" height="31" border="0" id="amigos" /></a></td>
      <td width="273" valign="baseline">&nbsp;</td>
      <td width="101" valign="bottom"><a href="opciones.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../img/opciones2.jpg',1)"><img src="../img/opciones.jpg" name="Image6" width="101" height="31" border="0" id="Image6" /></a></td>
      <td width="104" valign="bottom"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('salir','','../img/salir2.jpg',1)"><img src="../img/salir.jpg" name="salir" width="101" height="31" border="0" id="salir" /></a></td>
    </tr>
  </table>
</div>
<div id="apDiv12"><img src="../img/logolado.jpg" width="123" height="555" /></div>
</body>
</html>
