<?php
require_once('user.php');
require_once('backProd.php');


$server 	= 'mysql427.umbler.com';
$user 		= 'rgomes97';
$password 	= 'rg64567203';
$database 	= 'graficaflaguris';
 
 # Conexão Mysql
@$mysqli = new mysqli($server,$user,$password,$database);

// Erro de conexão

if(mysqli_connect_errno()){
	echo 'Failed to connect to MySQL:('.$mysqli->connect_errno.') '.$mysqli->connect_error;
	exit;
}
