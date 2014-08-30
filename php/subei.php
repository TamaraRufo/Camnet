<?php
session_start();
$email=$_SESSION['email'];
$dir="../temporal/".$_SESSION['id'];

$status = "";
if ($_POST['action'] == "upload") 
{
	// obtenemos los datos del archivo 
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if ($archivo != "" && ($tipo=="image/png" || $tipo=="image/jpg" || $tipo=="image/jpeg"|| $tipo=="image/gif")) 
	{
		// guardamos el archivo a la carpeta files
		$destino =  $dir."/".$prefijo."_".$archivo;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) 
		{
			//$status = "Archivo subido: <b>".$archivo."</b>";
			//echo $status;
			$descripcion="imagen";
			$fecha=date("Y-m-d H:y:s");
			require ('config.php');
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
			{         
				mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error());
				$queryl="SELECT * from usuario where email='$email';";
				$result=mysql_query($queryl) or die(mysql_error());
				while($rows=mysql_fetch_array($result))
				{
					extract($rows);
					$propietario=$id;
				}
				$query="INSERT INTO objeto VALUES(0,'I','$archivo','$destino','$propietario','$descripcion','$tamano','$fecha',1)";
				//$result=mysql_query($queryl) or die(mysql_error());
				$result=mysql_query($query) or die(mysql_error());
			}
		} 
		else 
		{
			$status = "Error al subir el archivo";
		}
	} 
	else 
	{
		$status = "Error al subir archivo";
	}
}
header("Location: perfil.php",true);
?>
