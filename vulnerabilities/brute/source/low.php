<?php

if( isset( $_GET['Login'] ) ) {

	$user = $_GET['username'];
	
	$pass = $_GET['password'];
	$pass = md5($pass);

	$qry = "SELECT * FROM `users` WHERE user='$user' AND password='$pass';";
	$result = mysql_query( $qry ) or die( '<pre>' . mysql_error() . '</pre>' );

	if( $result && mysql_num_rows( $result ) == 1 ) {
		// Obtener detalles del usuario
		$i=0; // Bug fix.
		$avatar = mysql_result( $result, $i, "avatar" );

		// Login Satisfactorio
		$html .= "<p>Bienvenido " . $user . "</p>";
		$html .= '<img src="' . $avatar . '" />';
	} else {
		//Login Fallado
		$html .= "<pre><br>Usuario y/o password incorrecto.</pre>";
	}

	mysql_close();
}

?>