<?php
session_start();
$id=$_SESSION['id'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$ciudad=$_POST['ciudad'];
$email=$_POST['email'];
$email=$_POST['contra'];
require ('config.php');
$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
	if($conn)
		{
		 	foreach($_POST as $nombre_campo => $valor)
			{
				echo $nombre_campo." ";
				echo $valor."<br>";
				if($nombre_campo!='guardar' && $valor!=NULL)
				{
					//echo "dentro del if";
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
					$consulta = "UPDATE usuario set $nombre_campo='$valor' where id=$id;";
					//echo $consulta;
					//echo "<br>";
					$result = mysql_query($consulta) or die("La consulta fall&oacute;: " . mysql_error());
				}
			}
		}
mysql_free_result($result);
mysql_close($conn);
header("Location: opciones.php",true);
?>
