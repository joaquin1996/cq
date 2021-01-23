<?php 
//incluir funciones reutilizamos
include './includes/functions.php';

$id_usuario = $_SESSION['id'];
$filename = $_FILES['foto']['name'];
$evento = $_POST['evento'];
$participacion = $_POST['participacion'];
$lugar = $_POST['lugar'];
$fecha = $_POST['fecha'];
$i_adicional = $_POST['i_adicional'];

    // guardamos la foto del producto
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = $id_usuario.date('Y_m_d_h_i_s').'.'.$ext;
    move_uploaded_file($_FILES['foto']['tmp_name'], './upload/eventos/'.$filename);	

    // registrar formulario en la base de datos
    $insertar = $conn->prepare("INSERT INTO evento VALUES(null, 
        '$id_usuario',
        '$filename',
        '$evento',
        '$participacion',
        '$lugar',
        '$fecha',
        '$i_adicional'
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