<?php 
//incluir funciones reutilizamos
include './includes/functions.php';

$id_usuario = $_SESSION['id'];
$filename = $_FILES['file']['name'];
$fecha = date('Y-m-d');

    // guardamos el archivo
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = $id_usuario.date('Y_m_d_h_i_s').'.'.$ext;
    move_uploaded_file($_FILES['file']['tmp_name'], './upload/curriculums/'.$filename);	

    // registrar formulario en la base de datos
    $insertar = $conn->prepare("INSERT INTO curriculums VALUES(null, 
        '$id_usuario',
        '$filename',        
        '$fecha'
    )");
    $insertar->execute();  

    if ($insertar) {
        $_SESSION['success'] = 'Operacion Realizada Exitosamente.';
        header('Location:' . getenv('HTTP_REFERER'));
    } else {
        // mensaje de error
        $_SESSION['error'] = 'Ocurrio un error inesperado intentalo de nuevo';
        header('Location:' . getenv('HTTP_REFERER'));
    }
  

?>