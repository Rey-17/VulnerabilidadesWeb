<?php

if(isset($_POST['btnSign']))
{

   $message = trim($_POST['mtxMessage']);
   $name    = trim($_POST['txtName']);
   
   // Desinfectar las entradas de mensaje usando funciones PHP
   $message = stripslashes($message);
   $message = mysql_real_escape_string($message);
   $message = htmlspecialchars($message);
   
   // Desinfectar las entradas de nombre usando funciones de PHP
   $name = stripslashes($name);   
   $name = mysql_real_escape_string($name); 
   $name = htmlspecialchars($name);
  
	// Despues de haber desinfectado las entradas de codigo malicioso las inserta en la base de datos 
   $query = "INSERT INTO guestbook (comment,name) VALUES ('$message','$name');";
   
	//Por ultimo muestra los textos almacenados o manda un error
   $result = mysql_query($query) or die('<pre>' . mysql_error() . '</pre>' );
   
}

?>