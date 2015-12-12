<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ] .= $page[ 'title_separator' ].'Vulnerabilidad: Stored Cross Site Scripting (XSS)';
$page[ 'page_id' ] = 'xss_s';

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

require_once DVWA_WEB_PAGE_TO_ROOT."vulnerabilities/xss_s/source/{$vulnerabilityFile}";

$page[ 'help_button' ] = 'xss_s';
$page[ 'source_button' ] = 'xss_s';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerabilidad: Stored Cross Site Scripting (XSS)</h1>

	<div class=\"vulnerable_code_area\">

		<form method=\"post\" name=\"guestform\" onsubmit=\"return validate_form(this)\">
		<table width=\"550\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\">
		<tr>
		<td width=\"100\">Nombre *</td> <td>
		<input name=\"txtName\" type=\"text\" size=\"30\" maxlength=\"10\"></td>
		</tr>
		<tr>
		<td width=\"100\">Mensaje *</td> <td>
		<textarea name=\"mtxMessage\" cols=\"50\" rows=\"3\" maxlength=\"100\"></textarea></td>
		</tr>
		<tr>
		<td width=\"100\">&nbsp;</td>
		<td>
		<input name=\"btnSign\" type=\"submit\" value=\"Deja tu Comentario\" onClick=\"return checkForm();\"></td>
		</tr>
		</table>
		</form>

		{$html}
		
	</div>
	
	<br />
	
	".dvwaGuestbook()."
	<br />
	
	
</div>
";


dvwaHtmlEcho( $page );
?>
