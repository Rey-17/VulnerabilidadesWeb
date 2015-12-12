<?php

if( isset( $_GET[ 'Login' ] ) ) {

	// Sanitise username input
	$user = $_GET[ 'username' ];
	$user = stripslashes( $user );
	$user = mysql_real_escape_string( $user );

	// Sanitise password input
	$pass = $_GET[ 'password' ];
	$pass = stripslashes( $pass );
	$pass = mysql_real_escape_string( $pass );
	$pass = md5( $pass );

	$qry = "SELECT * FROM `users` WHERE user='$user' AND password='$pass';";
	$result = mysql_query($qry) or die('<pre>' . mysql_error() . '</pre>' );

	if( $result && mysql_num_rows( $result ) == 1 ) {
		// Obtener detalles del usuario
		$i=0; // Bug fix.
		$avatar = mysql_result( $result, $i, "avatar" );

		// Login Satisfactorio
		$html .= "<p>Bienvenido al area segura " . $user . "</p>";
		$html .= '<img src="' . $avatar . '" />';
	} else {
		// Login Fallado
		sleep(3);
		$html .= "<pre><br>Usuario y/o password incorrecto.</pre>";
		}

	mysql_close();
}

?>