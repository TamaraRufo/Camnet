<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../css/camnet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="apDivreg">
  <div id="apDiv13">
    <div id="apDiv14" class="Estilo5">
    <?php
	require ('config.php');
    /*Recoger los datos enviados*/
    $nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$ciudad=$_POST['ciudad'];
    $emailu=$_POST['email'];
	$contra=$_POST['contra']; 
	$IP=$_SERVER['REMOTE_ADDR'];
	$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
	if($conn)
		{         
			mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
			
			$query1="SELECT email from usuario where email ='$emailu';";
			$result=mysql_query($query1) or die(mysql_error());
			
			if (mysql_fetch_array($result))
				{
					echo "El usuario $emailu ya está dado de alta";
					echo "<a href='registro.php'> Volver </a>";
					
				}
			else {  
					$query="INSERT INTO USUARIO VALUES(0,'$nombre','$apellido','$ciudad','$emailu','usuario','$contra','$IP',1);"; 
					$result=mysql_query($query) or die(mysql_error());

					echo("<H1>");
					echo(" FELICIDADES .<br>");
					echo("</H1>");
					echo( $nombre. " te acabas de registrar en CAMNET ");
					echo "<a href='index.php'> Inicio </a>";
					
					$query2="select id from usuario where email ='$emailu';"; 
					$result=mysql_query($query2) or die(mysql_error());
					
					$id=id;
					$dir=;"../temporal/$id";
					mkdir($dir,0777);
				}
			mysql_close($conn);            
		}                     
	else 
		echo ('No se ha podido registrar'); 
	?>
    </div>
    </div>
</div>
<div id="apDiv11"><img src="../img/registrate.png" width="813" height="50" /></div>
<div id="apDiv12"><img src="../img/logolado.jpg" width="123" height="555" /></div>
</body>
</html>
