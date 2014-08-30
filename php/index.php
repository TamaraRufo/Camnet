<?php
session_start();
session_destroy();
?>
<html>
<link href="../css/camnet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/blancos.js"></script>
</head>
<body>
<div id="apDiv1">
  <div id="apDiv2">
    <div id="apDiv9">
      <table width="411" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="147" class="Estilo3"><a href="registro.php" class="Estilo12">Registrate</a></td>
          <td width="145" class="Estilo3">&iquest;Has olvidado tu contrase&ntilde;a?</td>
          <td width="119">&nbsp;</td>
        </tr>
      </table>
    </div>
    <table width="413" height="46" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="146" valign="bottom"><span class="Estilo5">Email</span></td>
        <td width="146" valign="bottom"><span class="Estilo5">Contrase&ntilde;a</span></td>
        <td width="121" valign="bottom">&nbsp;</td>
      </tr>
      <tr>
        <td height="25" colspan="3" align="left" valign="middle">
        <form name="formulario" method="post" action="log.php" onSubmit="return blancos(this)">
          <label for="email"></label>
          <input name="email" type="text" id="email">
          <label for="contrase"></label>
          <input type="password" name="contrase" id="contrase">
          <label for="enviar"></label>
          <input type="submit" name="enviar" id="enviar" value="Enviar">
        </form></td>
      </tr>
    </table>
  </div>
  <div id="apDiv5"><img src="../img/camaleon copy.jpg" width="456" height="410" /></div>
    <div id="apDiv6"><img src="../img/logo.jpg" alt="" width="700" height="155" /></div>
<div id="apDiv7">
      <hr width="100%" color="#FFFFFF" size="1"/>
      <div id="apDiv8">
        <div align="center" class="Estilo3 Estilo6">Registrate | Condiciones de Uso | Politica de Pivacidad</div>
    </div>
  </div>
</div>
</body>
</html>