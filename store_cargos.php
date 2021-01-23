<?php 
//incluir funciones reutilizamos
include './includes/functions.php';

$id_usuario = $_SESSION['id'];
$c_institucion = $_POST['c_institucion'];
$c_programa = $_POST['c_programa'];
$c_cargo = $_POST['c_cargo'];
$c_f_entrada = $_POST['c_f_entrada'];
$c_f_salida = $_POST['c_f_salida'];
$c_i_adicional = $_POST['c_i_adicional'];
    
    // registrar formulario en la base de datos
    $insertar = $conn->prepare("INSERT INTO cargos VALUES(null, 
        '$id_usuario',
        '$c_institucion',
        '$c_programa',
        '$c_cargo',
        '$c_f_entrada',
        '$c_f_salida',
        '$c_i_adicional'
    )");
    $insertar->execute();  

    if ($insertar) {

        // mensaje que se guarda en la session
        $_SESSION['success'] = 'Operacion Realizada Exitosamente.';

        // redireccionamiento a la pagina anterior
        header('Location:' . getenv('HTTP_REFERER'));
    } else {
        // mensaje de error
        $_SESSION['error'] = 'Ocurrio un error inesperado intenalo de nuevo';
        header('Location:' . getenv('HTTP_REFERER'));
    }
  

?>