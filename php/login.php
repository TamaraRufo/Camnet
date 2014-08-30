<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
/*----------- validar usuario ----------------*/
/* Conexion, seleccion de base de datos */
require ('config.php');
$email=$_POST['email'];
$contra=$_POST['contrase'];

$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
	if($conn)
		{
			mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
			$consulta = "SELECT * FROM usuario WHERE  email='$email'";
			$resultado = mysql_query($consulta) or die("La consulta fall&oacute;: " . mysql_error());
			if (mysql_fetch_array($result))
				{
					if($email=='admin')
					{
						$conexion="Location: administrador.php?".session_name()."=".session_id();
						header($conexion,true);
					}
					else
					{
						$conexion="Location: inicio.php?".session_name()."=".session_id();
						header($conexion,true);
					}
				}
			else
				{
					echo "Error al conectar con el usuario: $email ";
					echo("<a href='registro.php' class='Estilo11'>".Volver."</a>");
				}
			mysql_free_result($result);
			mysql_close($conn);  
		}
?>
</body>
</html>
