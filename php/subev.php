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
	//echo $tipo;
	$archivo = $_FILES["archivo"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if ($archivo != "" && ($tipo=="video/avi" || $tipo=="video/wma" || $tipo=="video/x-ms-wmv" )) 
	{
		// guardamos el archivo a la carpeta files
		$destino =  $dir."/".$prefijo."_".$archivo;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) 
		{
			//$status = "Archivo subido: <b>".$archivo."</b>";
			//echo $status;
			$descripcion="video";
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
				$query="INSERT INTO objeto VALUES(0,'V','$archivo','$destino','$propietario','$descripcion','$tamano','$fecha',1)";
				$result=mysql_query($queryl) or die(mysql_error());
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
