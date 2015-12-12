<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ] .= $page[ 'title_separator' ].'Vulnerabilidad: Fuerza Bruta';
$page[ 'page_id' ] = 'brute';

dvwaDatabaseConnect();

$vulnerabilityFile = '';
switch( $_COOKIE[ 'security' ] ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;

	case 'medium':
		$vulnerabilityFile = 'medium.php';
		break;

	case 'high':
	default:
		$vulnerabilityFile = 'high.php';
		break;
}

require_once DVWA_WEB_PAGE_TO_ROOT."vulnerabilities/brute/source/{$vulnerabilityFile}";

$page[ 'help_button' ] = 'brute';
$page[ 'source_button' ] = 'brute';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerabilidad: Fuerza Bruta</h1>
	<p>El ataque de Fuerza bruta consiste en poder acceder a sitios o areas protegidas por contraseña, intentando con un diccionario, ya preparado, la manera de romper la seguridad y acceder.
	 Por lo general los ataques se realizan con diccionarios ya preparados o un script que genere de forma aleatoria la mejor combinación de palabras</p>

	<div class=\"vulnerable_code_area\">

		<h2>Login</h2>

		<form action=\"#\" method=\"GET\">
			Nombre:<br><input type=\"text\" name=\"username\"><br>
			Password:<br><input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password\"><br>
			<input type=\"submit\" value=\"Login\" name=\"Login\">
		</form>

		{$html}

	</div>

	
</div>
";

dvwaHtmlEcho( $page );

?>