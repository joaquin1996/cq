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
        if ($verificar) {
            
            // validar preguntas
            if ($mascota == $verificar->mascota && $madre == $verificar->madre && $bebida == $verificar->bebida) {
                // actualizar contraseña
                $update = $conn->prepare("UPDATE usuarios SET                     
                    pass = '$pass'
                where id = '$verificar->id'"); 
                $update->execute();
                
            } else {
                // mensaje de error
                $_SESSION['error'] = 'Credenciales incorrectas.';
                header('Location:' . getenv('HTTP_REFERER'));
                exit;
            }            

            header('Location:' . './index.php');
            // si todo sale bien mostrar mensaje de exito
            //$_SESSION['success'] = 'Te has registrado ya puedes iniciar sesion con tus credenciales.';                
        } else {
            // mensaje de error
            $_SESSION['error'] = 'El usuario no existe.';
            header('Location:' . getenv('HTTP_REFERER'));

        }

} else {
    // mensaje de error
    $_SESSION['error'] = 'Credenciales incorrectas.';
    header('Location:' . getenv('HTTP_REFERER'));

}



?>