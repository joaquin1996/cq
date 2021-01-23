<?php
	include './includes/functions.php';

    $tabla = $_POST['tabla'];
    $id = $_POST['id'];
    
    // eliminamos la imagen en su respectiva ubicacion dependiendo la tabla
    $anterior = find($conn, $tabla, $id); 
    if($tabla == 'titulo') {
        unlink('./upload/titulos/'.$anterior->foto);
    } 
    
    if($tabla == 'distinciones') {
        unlink('./upload/distinciones/'.$anterior->foto);
    }
    

    // eliminar registro de la tabla
    $consulta = $conn->prepare("DELETE FROM $tabla WHERE id = '$id' ");
    $consulta->execute();
        
    if ($consulta) {
        $_SESSION['success'] = 'Registro Eliminado.';		
        echo 1;
    } else {
        $_SESSION['error'] = 'Ocurrio algo inesperado intentalo de nuevo...';
        echo 0;
    }
	
?>