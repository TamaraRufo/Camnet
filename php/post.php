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
La imagen fue enviada con exito.<br><strong>Datos:</strong><br>
<ul>
  <li>Tipo <?=$tipo?></li>
  <li>Ubicasion http://www.midomini.com.ar/<?=$destino . '/' .$cad.'.'.$tipo?></li>
</ul><br>
<strong>Codigo HTML:</strong><br>
<textarea name="html" id="html"><img src="http://www.midomini.com.ar/<?=$destino.'/'.$cad.'.'.$tipo?>"><br>Por www.midomini.com.ar</textarea><br>
<img src="http://www.midomini.com.ar/<?=$destino.'/'.$cad.'.'.$tipo?>">
</body>
</html>
