<?php
//CONEXION: 
//$host = 'localhost';
//$user = 'root';
//$password = '';
//$database = 'blog_master';

$host = 'us-cdbr-iron-east-01.cleardb.net';
$user = 'b1ad82d24d5637';
$password = '82d2de50';
$database = 'heroku_ffbc9ee6a7e3046';
$db = mysqli_connect($host, $user, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");
        
//Iniciar la sesion:
if(!isset($_SESSION)){
    session_start();
}
?>
