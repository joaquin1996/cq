<?php 
//incluir funciones reutilizamos
include './includes/functions.php';

$id_usuario = $_SESSION['id'];
$filename = $_FILES['foto']['name'];
$nivel_academico = $_POST['n_academico'];
$titulo = $_POST['titulo'];
$institucion = $_POST['institucion'];
$lugar = $_POST['lugar'];
$fecha = $_POST['fecha'];

    // guardamos la foto del producto
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = $id_usuario.date('Y_m_d_h_i_s').'.'.$ext;
    move_uploaded_file($_FILES['foto']['tmp_name'], './upload/titulos/'.$filename);	

    // registrar formulario en la base de datos
    $insertar = $conn->prepare("INSERT INTO titulo VALUES(null, 
        '$id_usuario',
        '$filename',
        '$nivel_academico',
        '$titulo',
        '$institucion',
        '$lugar',
        '$fecha'
    )");
    $insertar->execute();  

    if ($insertar) {
        $_SESSION['success'] = 'Operacion Realizada Exitosamente.';
        header('Location:' . getenv('HTTP_REFERER'));
    } else {
        // mensaje de error
        $_SESSION['error'] = 'Ocurrio un error inesperado intenalo de nuevo';
        header('Location:' . getenv('HTTP_REFERER'));
    }
  

?>