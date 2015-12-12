<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ] .= $page[ 'title_separator' ].'Vulnerabilidad: SQL Injection';
$page[ 'page_id' ] = 'sqli';

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
        $vulnerabilityFile = 'high.php';
        break;
}

require_once DVWA_WEB_PAGE_TO_ROOT."vulnerabilities/sqli/source/{$vulnerabilityFile}";

$page[ 'help_button' ] = 'sqli';
$page[ 'source_button' ] = 'sqli';

$magicQuotesWarningHtml = '';

// Check if Magic Quotes are on or off
if( ini_get( 'magic_quotes_gpc' ) == true ) {
	$magicQuotesWarningHtml = "	<div class=\"warning\">Magic Quotes are on, you will not be able to inject SQL.</div>";
}

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerabilidad: SQL Injection</h1>
	<p>Se muestra a continuacion un formulario que pide el ingreso de un ID para realizar una busqueda, <br>Es muy utilizado por sitios que ofrecen servicios de ventas, para localizar un producto por un ID en especifico.</p>

	{$magicQuotesWarningHtml}

	<div class=\"vulnerable_code_area\">

		<h3>Ingrese el Id del usuario que desea buscar:</h3>

		<form action=\"#\" method=\"GET\">
			<input type=\"text\" name=\"id\">
			<input type=\"submit\" name=\"Submit\" value=\"Submit\">
		</form>

		{$html}

	</div>
</div>
";

dvwaHtmlEcho( $page );

?>