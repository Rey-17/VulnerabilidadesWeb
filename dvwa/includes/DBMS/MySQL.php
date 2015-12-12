<?php

/*

This file contains all of the code to setup the initial MySQL database. (setup.php)

*/

if( !@mysql_connect( $_DVWA[ 'db_server' ], $_DVWA[ 'db_user' ], $_DVWA[ 'db_password' ] ) ) {
	dvwaMessagePush( "Could not connect to the database - please check the config file." );
	dvwaPageReload();
}

// Create database
$drop_db = "DROP DATABASE IF EXISTS dvwa;";
if( !@mysql_query ( $drop_db ) ) {
	dvwaMessagePush( "Could not drop existing database<br />SQL: ".mysql_error() );
	dvwaPageReload();
}

$create_db = "CREATE DATABASE dvwa;";

if( !@mysql_query ( $create_db ) ) {
	dvwaMessagePush( "Could not create database<br />SQL: ".mysql_error() );
	dvwaPageReload();
}

dvwaMessagePush( "La base de datos ha sido creada." );

// Create table 'users'
if( !@mysql_select_db( $_DVWA[ 'db_database' ] ) ) {
	dvwaMessagePush( 'Could not connect to database.' );
	dvwaPageReload();
}

$create_tb = "CREATE TABLE users (user_id int(6),first_name varchar(15),last_name varchar(15), user varchar(15), password varchar(32),avatar varchar(100), PRIMARY KEY (user_id));";
if( !mysql_query( $create_tb ) ){
	dvwaMessagePush( "Table could not be created<br />SQL: ".mysql_error() );
	dvwaPageReload();
}

dvwaMessagePush( "la tabla 'users' ha sido creada." );

// Insert some data into users

// Get the base directory for the avatar media...
$baseUrl = 'http://'.$_SERVER[ 'SERVER_NAME' ] .':8080' .$_SERVER[ 'PHP_SELF' ];
$stripPos = strpos( $baseUrl, 'Cross-Site-Scripting/setup.php' );
$baseUrl = substr( $baseUrl, 0, $stripPos ).'Cross-Site-Scripting/hackable/users/';

$insert = "INSERT INTO users VALUES
	('1','admin','admin','admin',MD5('password'),'{$baseUrl}admin.jpg'),
	('2','Bolivar','Cortes','Bholy10',MD5('abc123'),'{$baseUrl}gordonb.jpg'),
	('3','Viviana','Castillo','Vivi',MD5('charley'),'{$baseUrl}1337.jpg'),
	('4','Samuel','Labrador','Sami',MD5('letmein'),'{$baseUrl}pablo.jpg'),
	('5','Jose','Smith','smithy',MD5('password'),'{$baseUrl}smithy.jpg');";
if( !mysql_query( $insert ) ){
	dvwaMessagePush( "Data could not be inserted into 'users' table<br />SQL: ".mysql_error() );
	dvwaPageReload();
}
dvwaMessagePush( "Datos insertados en la tabla 'users'." );
	
// Create guestbook table
$create_tb_guestbook = "CREATE TABLE guestbook (comment_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, comment varchar(300), name varchar(100), PRIMARY KEY (comment_id));";
	
if( !mysql_query( $create_tb_guestbook ) ){
	dvwaMessagePush( "Table could not be created<br />SQL: ".mysql_error() );
	dvwaPageReload();
}
	
dvwaMessagePush( "la tabla 'guestbook' ha sido creada." );
	
// Insert data into 'guestbook'
$insert = "INSERT INTO guestbook VALUES
('1','Esto es un comentario de prueba.','test');";
	
if( !mysql_query( $insert ) ){
	dvwaMessagePush( "Data could not be inserted into 'guestbook' table<br />SQL: ".mysql_error() );
	dvwaPageReload();
}
dvwaMessagePush( "Datos insertados en la tabla 'guestbook'." );

dvwaMessagePush( "Setup realizado!" );
dvwaPageReload();

?>
