<?php

if(isset($_POST['btnSign']))
{

   $message = trim($_POST['mtxMessage']);
   $name    = trim($_POST['txtName']);
   
   // Desinfectando las entradas del mensaje
   $message = trim(strip_tags(addslashes($message)));
   $message = mysql_real_escape_string($message);
   $message = htmlspecialchars($message);
    
   // Desinfectando las entrada del nombre pero hace falta una funcion mas.
   $name = str_replace('<script>', '', $name);
   $name = mysql_real_escape_string($name);
  
	//Las inserta en la base de datos
   $query = "INSERT INTO guestbook (comment,name) VALUES ('$message','$name');";
   
   $result = mysql_query($query) or die('<pre>' . mysql_error() . '</pre>' );
   
}

?>