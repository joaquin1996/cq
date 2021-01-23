<?php

require_once "conexion.php";

switch($_POST['function']){
    case 'login':
        sleep(2);
            $prep = $mysqli->prepare('SELECT * FROM usuarios WHERE u_usuario=? AND u_contraseña=?');
            $prep->bind_param('ss', $_POST['usuario'], $_POST['contraseña']);
            $prep->execute();
            $prep->bind_result($id_usuario, $id_persona, $usuario, $contrasena, $t_usuario, $correo, $pregunta, $respuesta );
            $resultado = $prep->fetch();

            if($resultado){
                session_start();
                $_SESSION['id_usuario'] = $id_usuario;
                $_SESSION['id_persona'] = $id_persona;

                echo "<script>location.href='inicio.php'</script>";

            }else{
                echo "Usuario o Contraseña incorrecta";
            }
        break;
        
    case 'salir':
        session_start();
        session_destroy();
        echo "<script>location.href='index.php'</script>";
        break;
        
    case 'v-session':
        session_start();
        $datos = session_status();
        if($datos === 2 && isset($_SESSION['id_usuario'])){
            echo "existeSession";
        }else{
            echo "noExisteSession";
        }
        
        break;
        
    case 'insert-titulos':
        
        $id_curriculum = $_POST['id_curriculum'];
        $n_academico = $_POST['n_academico'];
        $titulo = $_POST['titulo'];
        $institucion = $_POST['institucion'];
        $lugar = $_POST['lugar'];
        $fecha = $_POST['fecha'];
        
        $ruta= $_POST['ruta'];
        $nombre_archivo=$_FILES['foto']['name'];
        $nombre_archivo= trim ($_FILES['foto']['name']);
        $nombre_archivo= strip_tags ($nombre_archivo);
        $upload = $ruta . $nombre_archivo;
        
        try{
            move_uploaded_file($_FILES['foto']['tmp_name'],"../".$upload);
            
            $query = $mysqli->query("INSERT INTO titulo(id_curriculum, t_foto, t_n_academico, t_titulo, t_institucion, t_lugar, t_año) VALUES ('$id_curriculum', '$upload', '$n_academico', '$titulo', '$institucion', '$lugar', '$fecha')");
            echo "Exito";
        }
        catch(Exception $e){
            echo "Fallo";
        }
        break;
        
        case 'insert-cargos':
        
        $id_curriculum = $_POST['id_curriculum'];
        $c_institucion = $_POST['c_institucion'];
        $c_programa = $_POST['c_programa'];
        $c_f_entrada = $_POST['c_f_entrada'];
        $c_f_salida = $_POST['c_f_salida'];
        $c_cargo = $_POST['c_cargo'];
        $c_i_adicional = $_POST['c_i_adicional'];
        
        try{
            $query = $mysqli->query("INSERT INTO cargos(id_curriculum, c_institucion, c_programa, c_f_entrada, c_f_salida, c_cargo, c_i_adicional) VALUES ('$id_curriculum', '$c_institucion', '$c_programa', '$c_f_entrada', '$c_f_salida', '$c_cargo', '$c_i_adicional')");
            echo "Exito";
        }catch(Exception $e){
            echo "Fracaso";
        }
        
        break;
        
        case 'insert-distinciones':
        
        $id_curriculum = $_POST['id_curriculum'];
        $distincion = $_POST['distincion'];
        $lugar = $_POST['lugar'];
        $fecha = $_POST['fecha'];
        $i_adicional = $_POST['i_adicional'];
        
        $ruta = $_POST['ruta'];
        $nombre_archivo = $_FILES['foto']['name'];
        $nombre_archivo= trim ($_FILES['foto']['name']);
        $nombre_archivo= strip_tags ($nombre_archivo);
        $upload = $ruta . $nombre_archivo;
        
        try{
            move_uploaded_file($_FILES['foto']['tmp_name'],"../".$upload);
            $query = $mysqli->query("INSERT INTO distinciones(id_curriculum, d_foto, d_distincion, d_lugar, d_f_entrega, d_i_adicional) VALUES ('$id_curriculum', '$upload', '$distincion', '$lugar', '$fecha', '$i_adicional')");
            echo "Exito";
        }catch(Exception $e){
            echo "Fracaso";
        }
        
        break;
        
        case 'insert-eventos':
        
        $id_curriculum = $_POST['id_curriculum'];
        $evento = $_POST['evento'];
        $participacion = $_POST['participacion'];
        $lugar = $_POST['lugar'];
        $fecha = $_POST['fecha'];
        $i_adicional = $_POST['i_adicional'];
        
        $ruta = $_POST['ruta'];
        $nombre_archivo = $_FILES['foto']['name'];
        $nombre_archivo= trim ($_FILES['foto']['name']);
        $nombre_archivo= strip_tags ($nombre_archivo);
        $upload = $ruta . $nombre_archivo;
        
        try{
            move_uploaded_file($_FILES['foto']['tmp_name'],"../".$upload);
            $query = $mysqli->query("INSERT INTO evento(id_curriculum, e_foto, e_evento, e_participacion, e_lugar, e_fecha, e_i_adicional) VALUES ('$id_curriculum', '$upload', '$evento', '$participacion', '$lugar', '$fecha', '$i_adicional')");
            echo "Exito";
        }catch(Exception $e){
            echo "Fracaso";
        }
        
        break;
        
        case 'busqueda-usuario':
        
        $consulta = $_POST['consulta'];
        $salida = "";
        
        try{
            $query = $mysqli->query("SELECT usu.*, per.*, cur.* FROM usuarios AS usu INNER JOIN persona AS per ON usu.id_persona=per.id_persona INNER JOIN curriculum AS cur ON per.id_persona=cur.id_persona WHERE usu.u_usuario LIKE '%".$consulta."%' OR usu.u_contraseña LIKE '%".$consulta."%' OR usu.u_correo LIKE '%".$consulta."%' OR per.p_nombre LIKE '%".$consulta."%' OR per.p_apellido LIKE '%".$consulta."%'");
            
            if($rows = $query->num_rows > 0){
                $salida.= "<table class='table table-striped'>
                               <thead>
                                   <tr>
                                       <th scope='col'>Perfil</th>
                                       <th scope='col'>Nombre</th>
                                       <th scope='col'>Usuario</th>
                                       <th scope='col'>Contraseña</th>
                                       <th scope='col'>Correo</th>
                                   </tr>
                               </thead>
                               <tbody>";
                
                while($fila = $query->fetch_array()){
                    $salida.= "<tr>
                                   <td><img src=".$fila['p_foto']." class='img-fluid' style='height:9em;max-width:9em;'></td>
                                   <td>".$fila['p_nombre'].' '.$fila['p_apellido']."</td>
                                   <td>".$fila['u_usuario']."</td>
                                   <td>".$fila['u_contraseña']."</td>
                                   <td>".$fila['u_correo']."</td>
                               </tr>";
                }
                
                $salida.= "</tbody></table>";
                
            }else{
                
                $salida.= "No se encontraron Datos";
                
            }
            
            echo $salida;
            
        }catch(Exception $e){
            echo "Fracaso";
        }
        
        break;
        
        case 'busqueda-solicitud':
        
        $consulta = $_POST['consulta'];
        $salida = "";
        
        try{
            $query = $mysqli->query("SELECT per.*, cur.*, sol.* FROM persona AS per INNER JOIN curriculum AS cur ON per.id_persona=cur.id_persona INNER JOIN solicitudes AS sol ON cur.id_curriculum=sol.id_curriculum WHERE per.p_nombre LIKE '%".$consulta."%' OR per.p_apellido LIKE '%".$consulta."%' OR per.p_cedula LIKE '%".$consulta."%' OR per.p_direccion LIKE '%".$consulta."%'");
            
            if($rows = $query->num_rows > 0){
                $salida.= "<table class='table table-striped'>
                               <thead>
                                   <tr>
                                       <th scope='col'>Perfil</th>
                                       <th scope='col'>Nombre</th>
                                       <th scope='col'>Cedula</th>
                                       <th scope='col'>Telefono</th>
                                       <th scope='col'>Direccion</th>
                                   </tr>
                               </thead>
                               <tbody>";
                
                while($fila = $query->fetch_array()){
                    $salida.= "<tr>
                                   <td><img src=".$fila['p_foto']." class='img-fluid' style='height:9em;max-width:9em;'></td>
                                   <td>".$fila['p_nombre'].' '.$fila['p_apellido']."</td>
                                   <td>".$fila['p_cedula']."</td>
                                   <td>".$fila['p_telefono']."</td>
                                   <td>".$fila['p_direccion']."</td>
                               </tr>";
                }
                
                $salida.= "</tbody></table>";
                
            }else{
                
                $salida.= "No se encontraron Datos";
                
            }
            
            echo $salida;
            
        }catch(Exception $e){
            echo "Fracaso";
        }
        
        break;
        
        case 'busqueda-personal':
        
        $consulta = $_POST['consulta'];
        $salida = "";
        
        try{
            $query = $mysqli->query("SELECT per.*, pnal.*, cur.*  FROM persona AS per INNER JOIN personal AS pnal ON per.id_persona=pnal.id_persona INNER JOIN curriculum AS cur ON per.id_persona=cur.id_persona WHERE per.p_nombre LIKE '%".$consulta."%' OR per.p_apellido LIKE '%".$consulta."%' OR per.p_cedula LIKE '%".$consulta."%' OR pnal.ocupacion LIKE '%".$consulta."%'");
            
            if($rows = $query->num_rows > 0){
                $salida.= "<table class='table table-striped'>
                               <thead>
                                   <tr>
                                       <th scope='col'>Perfil</th>
                                       <th scope='col'>Nombre</th>
                                       <th scope='col'>Cedula</th>
                                       <th scope='col'>Telefono</th>
                                       <th scope='col'>Ocupacion</th>
                                   </tr>
                               </thead>
                               <tbody>";
                
                while($fila = $query->fetch_array()){
                    $salida.= "<tr>
                                   <td><img src=".$fila['p_foto']." class='img-fluid' style='height:9em;max-width:9em;'></td>
                                   <td>".$fila['p_nombre'].' '.$fila['p_apellido']."</td>
                                   <td>".$fila['p_cedula']."</td>
                                   <td>".$fila['p_telefono']."</td>
                                   <td>".$fila['ocupacion']."</td>
                               </tr>";
                }
                
                $salida.= "</tbody></table>";
                
            }else{
                
                $salida.= "No se encontraron Datos";
                
            }
            
            echo $salida;
            
        }catch(Exception $e){
            echo "Fracaso";
        }
        
        break;
    
        
}

?>