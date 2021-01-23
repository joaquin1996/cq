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


    $anterior = whereFirst($conn, 'datos_usuario', 'id_usuario', $id);
    if ($filename != '') {     
        // eliminamos la imagen anterior 
        if (file_exists("./upload/perfiles/'.$anterior->perfil")) {
            unlink('./upload/perfiles/'.$anterior->perfil);
        }      
        
        // guardamos la nueva imagen
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $filename = $cedula.date('Y_m_d_h_i_s').'.'.$ext;
        move_uploaded_file($_FILES['perfil']['tmp_name'], './upload/perfiles/'.$filename);
        
    } else {
        // si no actualizo la imagen enviamos el mismo nombre que la anterior
        $filename = $anterior->perfil;
    }
    
    $update = $conn->prepare("UPDATE datos_usuario SET 
        nombre = '$nombre',
        apellido = '$apellido',
        cedula = '$cedula',
        nacimiento = '$nacimiento',
        telefono = '$telefono',
        estado_civil = '$estado_civil',
        direccion = '$direccion',
        perfil = '$filename'
    where id_usuario = '$id'"); 
    $update->execute();
    header('Location:' . getenv('HTTP_REFERER'));

       
?>