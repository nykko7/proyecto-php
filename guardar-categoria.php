<?php
    if(isset($_POST)){
        require_once 'includes/conexion.php';
        
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    }
    
    //Array de errores:
    $errores = array();
    
    //VALIDAR DATOS ANTES DE GUARDARLOS EN BD:
    //Validar nombre: 
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido.";
    }
    
    if(count($errores) ==0){
        $guardar_usuario = true;
        
                
        //INSERTAR USUARIO EN BD EN SU TABLA CORRESPONDIENTE:
        $sql = "INSERT INTO categorias VALUES (NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
        
        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con exito.";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario.";
        }
        
    }else{
        $_SESSION['errores'] = $errores;        
    }
    
    header("Location: index.php");
?>
