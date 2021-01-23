<?php
	include './includes/functions.php';

    $id = $_GET['id'];
    
    // eliminamos la imagen en su respectiva ubicacion dependiendo la tabla
    $anterior = whereFirst($conn, 'curriculums', 'id_curriculum', $id); 

    unlink('./upload/curriculums/'.$anterior->archivo);
    
    // eliminar registro de la tabla
    $consulta = $conn->prepare("DELETE FROM curriculums WHERE id_curriculum = '$id' ");
    $consulta->execute();
        
    if ($consulta) {
        $_SESSION['success'] = 'Registro Eliminado.';		
    } else {
        $_SESSION['error'] = 'Ocurrio algo inesperado intentalo de nuevo...';
    }

    // redireccionar a la pagina anterior
    header('Location:' . getenv('HTTP_REFERER'));
	
?>