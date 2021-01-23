<?php 
//incluir funciones reutilizamos
include './includes/functions.php';

$id = $_SESSION['id'];
$filename = $_FILES['perfil']['name'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$nacimiento = $_POST['nacimiento'];
$telefono = $_POST['telefono'];
$estado_civil = $_POST['estado_civil'];
$nacionalidad = $_POST['nacionalidad'];
$direccion = $_POST['direccion'];


    $verificar = whereFirst($conn, 'datos_usuario', 'id_usuario', $id);
        if (!$verificar) {
            // guardamos la foto del producto
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = $cedula.date('Y_m_d_h_i_s').'.'.$ext;
            move_uploaded_file($_FILES['perfil']['tmp_name'], './upload/perfiles/'.$filename);	
            
            // registrar formulario en la base de datos
                $insertar = $conn->prepare("INSERT INTO datos_usuario VALUES(null, 
                '$id',
                '$nombre',
                '$apellido',
                '$cedula',
                '$nacimiento',
                '$telefono',
                '$estado_civil',
                '$nacionalidad',
                '$direccion',
                '$filename'
            )");
            $insertar->execute();  
            header('Location:' . getenv('HTTP_REFERER'));
                    
        } else {

            // mensaje de error
            $_SESSION['error'] = 'El usuario ya existe.';
            header('Location:' . getenv('HTTP_REFERER')); 

        }


exit;

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
                '$bebida'
            )");
            $insertar->execute();  

            header('Location:' . './index.php');
            // si todo sale bien mostrar mensaje de exito
            //$_SESSION['success'] = 'Te has registrado ya puedes iniciar sesion con tus credenciales.';                
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