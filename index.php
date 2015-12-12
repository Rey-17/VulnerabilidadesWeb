<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );

require_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();

$page[ 'title' ] .= $page[ 'title_separator' ].'Bienvenido';

$page[ 'page_id' ] = 'home';

$page[ 'body' ] .= "

<div class=\"body_padded\">

	<h1>Demostración de Protección de la Información</h1>

	<p>Actualmente la tecnología web es muy utilizada, ya sea por Comercios, Gobiernos y hasta para transacciones bancarias aprovechando que el internet logra una mejor conexión. Pero aparte de realizar las funcionalidades que el usuario espera, la aplicación tambien le debe garantizar, integridad, seguridad y protección de sus datos.</p>

</div>

	<div id='stage' style='position: absolute; left:45%;top:40%; '>
<div id='spinner' style='-webkit-transform-origin: 180px 0 0;'>
<img style='-webkit-transform: rotateY(0deg) translateX(180px); padding: 0 0 0 160px;' src='images/vulne.png' width='200' height='160' alt=''>
<img style='-webkit-transform: rotateY(-72deg) translateX(180px); padding: 0 0 0 147px;' src='images/xss.png' width='213' height='160' alt=''>
<img style='-webkit-transform: rotateY(-144deg) translateX(180px); padding: 0 0 0 120px;' src='images/sql.png' width='240' height='160' alt=''>
<img style='-webkit-transform: rotateY(-216deg) translateX(180px); padding: 0 0 0 147px;' src='images/fuerza.png' width='213' height='160' alt=''>
<img style='-webkit-transform: rotateY(-288deg) translateX(180px); padding: 0 0 0 122px;' src='images/logo.png' width='238' height='160' alt=''>
</div>
</div>
";
dvwaHtmlEcho( $page );

?>

</body>
</html>
