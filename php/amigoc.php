<?php
session_start();
$idp=$_SESSION['id'];
require ('config.php');
$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
if($conn)
	{         
		
		foreach($_POST as $nombre_campo => $valor)
		{
			echo $nombre_campo;
			echo $valor;
		}
		mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
		$queryl="INSERT INTO acceso_webcam VALUES($idp,$nombre_campo);";
		//$query2="INSERT INTO acceso_webcam VALUES($nombre_campo,$idp);";
		//echo $queryl;
		$result=mysql_query($queryl) or die(mysql_error());
		//$result2=mysql_query($query2) or die(mysql_error());
	}
mysql_free_result($result);
//mysql_free_result($result2); 
mysql_close($conn);
header("Location: amigos.php",true);
?>