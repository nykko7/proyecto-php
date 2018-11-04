<?php
//Iniciar la sesion y la conexion a bd
require_once 'includes/conexion.php';

//Recoger datos del formulario
if(isset($_POST)){
    
    if(isset($_SESSION['error_login'])){
        session_unset();
    }
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    //Comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);
    
    //Comprobar la contraseña/cifrar
    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        $verify = password_verify($password, $usuario['password']);
        
        if($verify){
            //Utilizar una sesion para guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;
            
        }else{
            //Si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto.";
        }
    }else{
        //Mensaje de error
        $_SESSION['error_login'] = "Login incorrecto.";
    }    
    
}

//Redirigir al index.php
header('Location: index.php');

?>

