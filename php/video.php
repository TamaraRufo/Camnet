<html>
<head>
<title></title>
</head>
<body>
<?php
#phpinfo();
?>

<!-- PARA IEXPLORER SOLAMENTE
<object ID="MediaPlayer" WIDTH="320" HEIGHT="270" CLASSID="CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95" STANDBY="Loading Windows Media Player components..."
TYPE="application/x-oleobject" CODEBASE="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112">

<param name="autoStart" value="True">
<param name="filename" value="http://192.168.0.130:1115">
<param NAME="ShowControls" VALUE="True">
<param NAME="ShowStatusBar" VALUE="True">
<embed TYPE="application/x-mplayer2" SRC="192.168.0.130:1115" NAME="MediaPlayer" WIDTH="320" HEIGHT="270" autostart="1" showcontrols="1"></embed></object>
-->
<!-- begin embedded WindowsMedia file... -->
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
<!-- ...end embedded WindowsMedia file -->
<!-- begin link to launch external media player... -->
<tr><td align='center'>
<a href="http://localhost:1282" style='font-size: 85%;' target='_blank'>Launch in external player</a>
<!-- ...end link to launch external media player... -->
</td></tr>
</table>

</body>
</html>

