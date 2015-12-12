<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ] .= $page[ 'title_separator' ].'Setup';
$page[ 'page_id' ] = 'setup';

if( isset( $_POST[ 'create_db' ] ) ) {

	if ($DBMS == 'MySQL') {
		include_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/includes/DBMS/MySQL.php';
	}
	elseif ($DBMS == 'PGSQL') {
		include_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/includes/DBMS/PGSQL.php';
	}
	else {
		dvwaMessagePush( "ERROR: Invalid database selected. Please review the config file syntax." );
		dvwaPageReload();
	}

}


$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Configuración de la Base de Datos <img src=\"".DVWA_WEB_PAGE_TO_ROOT."dvwa/images/spanner.png\"></h1>

	<p>Haz click en el boton 'Crear / Reiniciar BD' para crear o reiniciar tu Base de Datos.</p>

	<p>Si la Base de Datos existe, puede eliminar los datos y reiniciarla.</p>

	<br />

	Backend Database: <b>".$DBMS."</b>

	<br /><br /><br />
	
	<!-- Create db button -->
	<form action=\"#\" method=\"post\">
		<input name=\"create_db\" type=\"submit\" value=\"Crear / Reiniciar BD\">
	</form>
</div>
";


dvwaHtmlEcho( $page );

?>
