<?php
session_start();
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
		$query="Update usuario set activo=0 where id=$nombre_campo;";
		//echo $query;
		$result=mysql_query($query) or die(mysql_error());
	}
mysql_free_result($result);
mysql_close($conn); 
header("Location: usuarios.php",true);
?>