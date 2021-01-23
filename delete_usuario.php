<?php
	include './includes/functions.php';

    echo $id = $_GET['id'];
    
    // eliminamos los cargos asociado a este usuario
    $cargos = where($conn, 'cargos', 'id_usuario', $id);
    if ($cargos) {        
        // eliminar registros de la tabla
        $consulta = $conn->prepare("DELETE FROM cargos WHERE id_usuario = '$id' ");
        $consulta->execute();
    }

    // eliminamos los titulos asociado a este usuario
    $titulos = where($conn, 'titulo', 'id_usuario', $id);
    if ($titulos) {      
        foreach ($titulos as $key => $value) {
            unlink('./upload/titulos/'.$value->foto);
        }  
        
        // eliminar registros de la tabla
        $consulta = $conn->prepare("DELETE FROM titulo WHERE id_usuario = '$id' ");
        $consulta->execute();         
    }

    // eliminamos los eventos asociado a este usuario
    $eventos = where($conn, 'evento', 'id_usuario', $id);
    if ($eventos) {      
        foreach ($eventos as $key => $value) {
            unlink('./upload/eventos/'.$value->foto);
        }  
        
        // eliminar registros de la tabla
        $consulta = $conn->prepare("DELETE FROM evento WHERE id_usuario = '$id' ");
        $consulta->execute();         
    }

    // eliminamos las distinciones asociado a este usuario
    $distinciones = where($conn, 'distinciones', 'id_usuario', $id);
    if ($distinciones) {      
        foreach ($distinciones as $key => $value) {
            unlink('./upload/distinciones/'.$value->foto);
        }  
        
        // eliminar registros de la tabla
        $consulta = $conn->prepare("DELETE FROM distinciones WHERE id_usuario = '$id' ");
        $consulta->execute();         
    }

    // eliminamos el perfil asociado a este usuario
    $datos_usuario = where($conn, 'datos_usuario', 'id_usuario', $id);
    if ($datos_usuario) {      
        foreach ($datos_usuario as $key => $value) {
            unlink('./upload/perfiles/'.$value->perfil);
        }  
        
        // eliminar registros de la tabla
        $consulta = $conn->prepare("DELETE FROM datos_usuario WHERE id_usuario = '$id' ");
        $consulta->execute();         
    }

    // eliminar el usuario de la tabla usuarios
    $delete = $conn->prepare("DELETE FROM usuarios WHERE id = '$id' ");
    $delete->execute();
        
    if ($delete) {
        $_SESSION['success'] = 'Operacion realizada exitosamente.';		
        header('Location: solicitudes.php');

    } else {
        $_SESSION['error'] = 'Ocurrio algo inesperado intentalo de nuevo...';
        header('Location: solicitudes.php');

    }
	
?>