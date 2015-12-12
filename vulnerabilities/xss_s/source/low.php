<?php

if(isset($_POST['btnSign']))
{

   $message = trim($_POST['mtxMessage']);
   $name    = trim($_POST['txtName']);
   
   // Solo se hace uso de dos funciones para desinfectar los mensajes
	// y no se utiliza la funcion por lo que permite la entrada de tags HTML y Javascript
   $message = stripslashes($message);
   $message = mysql_real_escape_string($message);
   
   // Se desinfecta la entrada del nombre solamente con una función
   $name = mysql_real_escape_string($name);
   $query = "INSERT INTO guestbook (comment,name) VALUES ('$message','$name');";
   
   $result = mysql_query($query) or die('<pre>' . mysql_error() . '</pre>' );
   
}

?>