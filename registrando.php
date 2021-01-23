<?php 
//incluir funciones reutilizamos
include './includes/functions.php';

$email = $_POST['email'];
$pass = $_POST['pass'];
$confirm_pass = $_POST['confirm_pass'];
$mascota = $_POST['mascota'];
$madre = $_POST['madre'];
$bebida = $_POST['bebida'];

// verificar que las contraseñas coinciden
if ($pass == $confirm_pass) {
    
    $pass = md5($pass);
    $verificar = whereFirst($conn, 'usuarios', 'email', $email);
        if (!$verificar) {
            // registrar formulario en la base de datos
                $insertar = $conn->prepare("INSERT INTO usuarios VALUES(null, 
                '$email',
                '$pass',
                '$mascota',
                '$madre',
                '$bebida',
                '0',
                '1',
                'asc'
            )");
            $insertar->execute();  

            // si todo sale bien mostrar mensaje de exito
            $_SESSION['success'] = 'Te has registrado ya puedes iniciar sesion con tus credenciales.';
            header('Location:' . './index.php');
        } else {
            // mensaje de error
            $_SESSION['error'] = 'El usuario ya existe.';
            header('Location:' . getenv('HTTP_REFERER'));

        }

} else {
    // mensaje de error
    $_SESSION['error'] = 'Las contraseñas no coinciden';
    header('Location:' . getenv('HTTP_REFERER'));

}



?>