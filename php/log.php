<?php
session_start();
//echo session_id(),"<br>";
//echo session_name(),"<br>";
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
$email2=$_POST['email'];
$contra=$_POST['contrase'];
$_SESSION['email']=$email2;
$IP=$_SERVER['REMOTE_ADDR'];
$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
	if($conn)
		{
			mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
			$consulta = "SELECT * FROM usuario WHERE  email='$email2' and contrasena='$contra'";
			$result = mysql_query($consulta) or die("La consulta fall&oacute;: " . mysql_error());
			if($rows=mysql_fetch_array($result))
			{
        		extract($rows);
				if($tipo=='administrador')
				{
						$IP=$_SERVER['REMOTE_ADDR'];
						$fecha=date("Y-m-d H:y:s");
						$query="INSERT INTO LOGS VALUES(0,$id,'$email','$fecha','$IP','ok');"; 
						$result=mysql_query($query) or die(mysql_error());
						header("Location: administrador.php",true);
				}
				else if($email2==$email && $contra==$contrasena && $activo==1)
				{
						$IP=$_SERVER['REMOTE_ADDR'];
						$fecha=date("Y-m-d H:y:s");
						//echo $query;
						$query="INSERT INTO LOGS VALUES(0,$id,'$email','$fecha','$IP','ok');"; 
						$result=mysql_query($query) or die(mysql_error());
						header("Location: inicio.php",true);
				}
				
				else
					{
						$IP=$_SERVER['REMOTE_ADDR'];
						$fecha=date("Y-m-d H:y:s");
						$query="INSERT INTO LOGS VALUES(0,null,'$email','$fecha','$IP','ko');";
						//echo $query; 
						$result=mysql_query($query) or die(mysql_error());
						echo "Error al conectar con el usuario: $email ";
						header("Location: registro.php",true);
					}
				}
			else
			{
				header("Location: registro.php",true);
			}
			//mysql_free_result($result);
			mysql_close($conn);  
		}
?>
</body>
</html>
