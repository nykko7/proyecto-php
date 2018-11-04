<?php
    if(isset($_POST)){
        require_once 'includes/conexion.php';

        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
        $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
        $usuario = $_SESSION['usuario']['id'];
    }


    //Array de errores:
    $errores = array();

    //VALIDAR DATOS ANTES DE GUARDARLOS EN BD:
    //Validar nombre:
    if(empty($titulo)){   
        $errores['titulo'] = "El titulo no es válido.";
    }

    if(empty($descripcion)){
        $errores['descripcion'] = "La descripcion no es válida.";
    }
    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = "La categoria no es válida.";
    }



    if(count($errores) == 0){
        
        $guardar_usuario = true;

        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria "
                    . "WHERE id=$entrada_id AND usuario_id = $usuario_id";
        }else{
            //INSERTAR entrada EN BD EN SU TABLA CORRESPONDIENTE:
            $sql = "INSERT INTO entradas VALUES (NULL, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        $guardar = mysqli_query($db, $sql);
        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con exito.";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario.";
        }
        header("Location: index.php");

    }else{
        $_SESSION['errores_entrada'] = $errores;
        if(isset($_GET['editar'])){
            header("Location: editar-entrada.php?id=".$_GET['editar']);
        }else{
            header("Location: crear-entradas.php");
        }
       
    }

    
?>
