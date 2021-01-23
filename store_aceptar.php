<?php
	include './includes/functions.php';

    $id = $_POST['id_usuario'];
    $ordering = $_POST['cargo'];

    $update = $conn->prepare("UPDATE usuarios SET  
        status = '1',       
        ordering = '$ordering'
    where id = '$id'"); 
    $update->execute();
    $_SESSION['success'] = 'Operacion Realizada Exitosamente.';
    header('Location: solicitudes.php');
	
?>