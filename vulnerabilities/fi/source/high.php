<?php
		
	$file = $_GET['page']; //La pagina que deseamos mostrar 

	// Si el archivo es distinto de include.php manda un error
	if ( $file != "include.php" ) {
		echo "ERROR: Archivo no encontrado!";
		exit;
	}
		
?>