<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../css/camnet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/botonera.js"></script>
</head>

<body onload="MM_preloadImages('../img/inicio2.jpg','../img/perfil2.jpg','../img/amigos2.jpg','../img/salir2.jpg','../img/opciones2.jpg')">
<?php
	require ('config.php');
    /*Recoger los datos enviados*/
	$email=$_SESSION['email'];
    $conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
	if($conn)
		{         
			mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
			$queryl="SELECT * from usuario where email='$email';";
			$result=mysql_query($queryl) or die(mysql_error());
			while($rows=mysql_fetch_array($result))
			{
        		extract($rows);
				$_SESSION['id']=$id;
				$_SESSION['nombre']=$nombre;
				$_SESSION['apellido']=$apellidos;
				$_SESSION['ciudad']=$ciudad;
			}
			mysql_free_result($result);
			mysql_close($conn); 
		}
?>
<div id="apDiv10">
  <div id="apDiv13">
    <table width="198" height="255" border="0" bordercolor="#99CC33">
      <tr>
        <td width="101" height="92" align="center"><img src="../img/default.jpg" width="90" height="90" /></td>
        <td width="80">&nbsp;</td>
      </tr>
      <tr>
        <td height="38" colspan="2"><span class="Estilo5"><?php echo $_SESSION['nombre'];echo " ";echo $_SESSION['apellido'];?></span>
        <hr color="#99CC33">
        </td>
      </tr>
      <tr>
        <td height="21" colspan="2" class="Estilo7">Datos Personales <hr color="#99CC33"></td>
      </tr>
      <tr>
        <td height="45" colspan="2"><span class="Estilo7">Ciudad:</span> <span class="Estilo5"><?php echo $_SESSION['ciudad'];?></span></td>
      </tr>
      <tr>
        <td height="21" colspan="2"><span class="Estilo7">Email:</span> <span class="Estilo5"><?php echo $_SESSION['email'];?></span></td>
      </tr>
    </table>
    <div id="apDiv15">
      <?php
		#phpinfo();
	  ?>
      <table border='0' cellpadding='0' align="center">
        <tr><td>
        <OBJECT id='mediaPlayer' width="320" height="285"
        classid='CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95'
        codebase='http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701'
        standby='Loading Microsoft Windows Media Player components...' type='application/x-oleobject'>
        <param name='fileName' value="http://localhost:1282">
        <param name='animationatStart' value='true'>
        <param name='transparentatStart' value='true'>
        <param name='autoStart' value="true">
        <param name='showControls' value="true">
        <param name='loop' value="true">
        <EMBED type='application/x-mplayer2'
        pluginspage='http://microsoft.com/windows/mediaplayer/en/download/'
        id='mediaPlayer' name='mediaPlayer' displaysize='4' autosize='-1'
        bgcolor='darkblue' showcontrols="true" showtracker='-1'
        showdisplay='0' showstatusbar='-1' videoborder3d='-1' width="320" height="285"
        src="http://localhost:1282" autostart="true" designtimesp='5311' loop="true">
        </EMBED>
        </OBJECT>
        </td></tr>
        <tr><td align='center'>
        <a href="http://localhost:1282" target='_blank' class="Estilo5" style='font-size: 16px;'>Tu cam</a>
        </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<div id="apDiv11">
  <table width="810" height="42" border="0" bordercolor="#99CC33" bgcolor="#99CC33">
    <tr>
      <td width="102" valign="bottom"><a href="inicio.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('inicio','','../img/inicio2.jpg',1)"><img src="../img/inicio.jpg" name="inicio" width="101" height="31" border="0" id="inicio" /></a></td>
      <td width="102" valign="bottom"><a href="perfil.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('perfil','','../img/perfil2.jpg',1)"><img src="../img/perfil.jpg" name="perfil" width="101" height="31" border="0" id="perfil" /></a></td>
      <td width="103" valign="bottom"><a href="amigos.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('amigos','','../img/amigos2.jpg',1)"><img src="../img/amigos.jpg" name="amigos" width="101" height="31" border="0" id="amigos" /></a></td>
      <td width="272" valign="baseline">&nbsp;</td>
      <td width="101" valign="bottom"><a href="opciones.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../img/opciones2.jpg',1)"><img src="../img/opciones.jpg" name="Image7" width="101" height="31" border="0" id="Image7" /></a></td>
      <td width="104" valign="bottom"><a href="index.php" target="_self" onmouseover="MM_swapImage('salir','','../img/salir2.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../img/salir.jpg" name="salir" width="101" height="31" border="0" id="salir" /></a></td>
    </tr>
  </table>
</div>
<div id="apDiv12"><img src="../img/logolado.jpg" width="123" height="555" /></div>
</body>
</html>
