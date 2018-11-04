<?php
//CONEXION: 
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'blog_master';
$db = mysqli_connect($host, $user, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");
        
//Iniciar la sesion:
if(!isset($_SESSION)){
    session_start();
}
?>
