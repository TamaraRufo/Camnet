<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href='../css/camnet.css' rel='stylesheet' type='text/css' />
<script type="text/javascript" src='../js/botonera.js'></script>
</head>

<body onload="MM_preloadImages('../img/inicio2.jpg','../img/salir2.jpg','../img/usuarios2.jpg','../img/archivos2.jpg','../img/logs2.jpg','../img/webs2.jpg')">

<div id="apDiv10">
  <div id="apDiv13">
  <p></p>
  <form name="form" action='archivos2.php' method="post">
  <table border="1" align="center" bordercolor="#000000">
  	<tr align="center">
        <td colspan="9" class="Estilo5" > Tabla de Objetos </td>
        </tr>
    <tr align="center" class="Estilo16">
        <td><span class="Estilo17">
          IDOB        </span></td>
        <td><span class="Estilo17">
          TIPO        </span></td>
        <td><span class="Estilo17">
          TITULO      </span></td>
        <td><span class="Estilo17">
           RUTA        </span></td>
        <td><span class="Estilo17">
          PROPIETARIO        </span></td>
        <td><span class="Estilo17">
          DESCRIPCION        </span></td>
        <td><span class="Estilo17">
        TAMAÑO        </span></td>
        <td><span class="Estilo17">
        FECHA        </span></td>
        <td>&nbsp; </td>
    </tr>
  <?php
			require ('config.php');
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
				{         
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
					$queryl="SELECT * from objeto where activo=1;";
					$result=mysql_query($queryl) or die(mysql_error());
					while($rows=mysql_fetch_array($result))
					{
						extract($rows);
						$_SESSION['idob']=$idob;
						$_SESSION['tipo']=$tipo;
						$_SESSION['titulo']=$titulo;
						$_SESSION['ruta']=$ruta;
						$_SESSION['propietario']=$propietario;
						$_SESSION['descripcion']=$descripcion;
						$_SESSION['tamanio']=$tamanio;	
						$_SESSION['fecha']=$fecha;					
							echo "<tr>";
								echo "<td class='Estilo17'>";
									echo $_SESSION['idob'];
								echo "</td>";
								echo "<td class='Estilo17'>";
									echo $_SESSION['tipo'];
								echo "</td>";
								echo "<td class='Estilo17'>";
									echo $_SESSION['titulo'];
								echo "</td>";
								echo "<td class='Estilo17'>";
									echo $_SESSION['ruta'];
								echo "</td>";
								echo "<td class='Estilo17'>";
									echo $_SESSION['propietario'];
								echo "</td>";
								echo "<td class='Estilo17'>";
									echo $_SESSION['descripcion'];
								echo "</td>";
								echo "<td class='Estilo17'>";
									echo $_SESSION['tamanio'];
								echo "</td>";
								echo "<td class='Estilo17'>";
									echo $_SESSION['fecha'];
								echo "</td>";
								echo "<td class='Estilo17'>";
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
