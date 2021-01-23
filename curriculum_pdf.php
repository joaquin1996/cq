
<?php 
$base_url = 'http://'.$_SERVER['HTTP_HOST']."/cq";

// variables con todos los datos del usuario
$id_usuario = $_GET['id'];
$usuario = find($conn, 'usuarios', $_GET['id']);
$datos_usuario = whereFirst($conn, 'datos_usuario', 'id_usuario', $_GET['id']);
$titulos = where($conn, 'titulo', 'id_usuario', $id_usuario, $usuario->ordering);
$distinciones = where($conn, 'distinciones', 'id_usuario', $id_usuario, $usuario->ordering);
$eventos = where($conn, 'evento', 'id_usuario', $id_usuario, $usuario->ordering);

$traer_cargos = $conn->prepare("SELECT * FROM cargos where id_usuario = '$id_usuario' order by c_f_entrada $usuario->ordering"); 
$traer_cargos->execute();
$cargos = $traer_cargos->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fonacit</title>
</head>
<body>

<style>
    .row {
        width: 100%;
    }
    
    .row div {
        display: inline-block;
        width: 49%;
    }

    .center {
        text-align: center;
    }
   
    .bg-danger {
        background: red;
    }

    .firma {
        width: 40%;
        border-top: 2px solid black;
        text-align: center;
        margin: auto;
        margin-top: 4rem;
        font-size: 23px;
    }

    .table {
        width: 100%;
        margin-left: 3rem;
    }

    .table td {
        width: 50%;
        font-size: 1.3rem;
    }

    .titulo {
        margin-left: 3rem;
        text-decoration: underline;
    }

    .borde {
        border-top: 2px solid black;
        padding-bottom: 1rem;
    }

    .anexos div {
        width: 100%;
    }

    .anexos img {
        width: auto;
        max-width: 100%;
    }

    .anexos-title {
        font-size: 6rem;
        text-align: center;
        padding-top: 3rem;
    }

</style>

<div class="row">
<!-- div izquierdo -->
    <div class="center">
        <h2>CURRICULUM VITAE</h2>
    </div>

<!-- div derecho -->
    <div class="center">
        <img src="<?php echo $base_url."/upload/perfiles/".$datos_usuario->perfil; ?>" class="row" alt="">
    </div>
</div>

<h2 class="titulo">Datos Personales</h2>
<table class="table">
    <tbody>
        <tr>
            <td><strong>1. Nombre y Apellido </strong></td>
            <td><?php echo $datos_usuario->nombre." ".$datos_usuario->apellido; ?></td>
        </tr>
        <tr>
            <td><strong>2. Cedula </strong></td>
            <td><?php echo $datos_usuario->cedula; ?></td>
        </tr>
        <tr>
            <td><strong>3. Fecha de nacimiento </strong></td>
            <td><?php echo $datos_usuario->nacimiento; ?></td>
        </tr>
        <tr>
            <td><strong>4. Telefono </strong></td>
            <td><?php echo $datos_usuario->telefono; ?></td>
        </tr>
        <tr>
            <td><strong>5. Correo </strong></td>
            <td><?php echo $usuario->email; ?></td>
        </tr>
        <tr>
            <td><strong>6. Direccion </strong></td>
            <td><?php echo $datos_usuario->direccion; ?></td>
        </tr>
        <tr>
            <td><strong>7. Estado Civil </strong></td>
            <td><?php echo $datos_usuario->estado_civil; ?></td>
        </tr>
        <tr>
            <td><strong>8. Nacionalidad </strong></td>
            <td><?php echo $datos_usuario->nacionalidad; ?></td>
        </tr>
        
    </tbody>
</table>    

<div class="firma">
    <?php echo $datos_usuario->nombre." ".$datos_usuario->apellido; ?>
</div>



<!-- salto de pagina -->
<div style="page-break-after:always;"></div>

<!-- titulos -->
<h2 class="titulo">Titulos</h2>
<table class="table">
    <tbody>
        <?php $i = 1; foreach ($titulos as $key => $value): ?>
            <tr>
                <td><?php echo $i."."; $i++; ?></td>
            </tr>
            <tr>
                <td><strong>Nivel academico</strong></td>
                <td><?php echo $value->nivel_academico; ?></td>
            </tr>
            <tr>
                <td><strong>Titulo</strong></td>
                <td><?php echo $value->titulo; ?></td>
            </tr>
            <tr>
                <td><strong>Institucion</strong></td>
                <td><?php echo $value->institucion; ?></td>
            </tr>
            <tr>
                <td><strong>Lugar</strong></td>
                <td><?php echo $value->lugar; ?></td>
            </tr>
            <tr>
                <td><strong>Fecha</strong></td>
                <td><?php echo $value->fecha; ?></td>
            </tr>
            <tr class="borde">
                <td class="borde"></td>
                <td class="borde"></td>
            </tr>
        <?php endforeach; ?>     
    </tbody>
</table>    
<br><br>


<!-- distinciones -->
<h2 class="titulo">Distinciones</h2>
<table class="table">
    <tbody>
        <?php $i = 1; foreach ($distinciones as $key => $value): ?>
            <tr>
                <td><?php echo $i."."; $i++; ?></td>
            </tr>
            <tr>
                <td><strong>Distincion</strong></td>
                <td><?php echo $value->distincion; ?></td>
            </tr>
            <tr>
                <td><strong>Lugar</strong></td>
                <td><?php echo $value->lugar; ?></td>
            </tr>
            <tr>
                <td><strong>Fecha</strong></td>
                <td><?php echo $value->fecha; ?></td>
            </tr>
            <tr>
                <td><strong>Informacion adicional</strong></td>
                <td><?php echo $value->i_adicional; ?></td>
            </tr>
            <tr class="borde">
                <td class="borde"></td>
                <td class="borde"></td>
            </tr>
        <?php endforeach; ?>     
    </tbody>
</table>    
<br><br>


<!-- cargos -->
<h2 class="titulo">Cargos</h2>
<table class="table">
    <tbody>
        <?php $i = 1; foreach ($cargos as $key => $value): ?>
            <tr>
                <td><?php echo $i."."; $i++; ?></td>
            </tr>
            <tr>
                <td><strong>Institucion</strong></td>
                <td><?php echo $value->c_institucion; ?></td>
            </tr>
            <tr>
                <td><strong>Programa</strong></td>
                <td><?php echo $value->c_programa; ?></td>
            </tr>
            <tr>
                <td><strong>Cargo</strong></td>
                <td><?php echo $value->c_cargo; ?></td>
            </tr>
            <tr>
                <td><strong>Fecha de entrada</strong></td>
                <td><?php echo $value->c_f_entrada; ?></td>
            </tr>
            <tr>
                <td><strong>Fecha de salida</strong></td>
                <td><?php echo $value->c_f_salida; ?></td>
            </tr>
            <tr>
                <td><strong>Informacion adicional</strong></td>
                <td><?php echo $value->c_i_adicional; ?></td>
            </tr>
            <tr class="borde">
                <td class="borde"></td>
                <td class="borde"></td>
            </tr>
        <?php endforeach; ?>     
    </tbody>
</table>    
<br><br>




<!-- eventos -->
<h2 class="titulo">Eventos</h2>
<table class="table">
    <tbody>
        <?php $i = 1; foreach ($eventos as $key => $value): ?>
            <tr>
                <td><?php echo $i."."; $i++; ?></td>
            </tr>
            <tr>
                <td><strong>Evento</strong></td>
                <td><?php echo $value->evento; ?></td>
            </tr>
            <tr>
                <td><strong>Participacion</strong></td>
                <td><?php echo $value->participacion; ?></td>
            </tr>
            <tr>
                <td><strong>Lugar</strong></td>
                <td><?php echo $value->lugar; ?></td>
            </tr>
            <tr>
                <td><strong>Fecha</strong></td>
                <td><?php echo $value->fecha; ?></td>
            </tr>            
            <tr>
                <td><strong>Informacion adicional</strong></td>
                <td><?php echo $value->i_adicional; ?></td>
            </tr>
            <tr class="borde">
                <td class="borde"></td>
                <td class="borde"></td>
            </tr>
        <?php endforeach; ?>     
    </tbody>
</table>    

<!-- salto de pagina -->
<div style="page-break-after:always;"></div>

<!-- titulo anexos -->
<h1 class="anexos-title">Anexos</h1>
<!-- salto de pagina -->
<div style="page-break-after:always;"></div>

<div class="anexos">
    <?php foreach ($titulos as $titulo): ?>
        <div class="center">
            <img src="<?php echo $base_url.'/upload/titulos/'.$titulo->foto; ?>" alt="">
        </div>
        <br>
    <?php endforeach; ?>

    <?php foreach ($distinciones as $distincion): ?>
        <div class="center">
            <img src="<?php echo $base_url.'/upload/distinciones/'.$distincion->foto; ?>" alt="">
        </div>
        <br>
    <?php endforeach; ?>

    <?php foreach ($eventos as $evento): ?>
        <div class="center">
            <img src="<?php echo $base_url.'/upload/eventos/'.$evento->foto; ?>" alt="">
        </div>
        <br>
    <?php endforeach; ?>
</div>