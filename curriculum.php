<?php require_once 'main_app/mainHead.php'; ?>

    <picture>
		<!-- Extra Large Desktops -->
		<source media="(min-width: 1200px)" srcset="font/Banner%20proyecto.png">
		<!-- Desktops -->
		<source media="(min-width: 992px)" srcset="font/Banner%20proyecto.png">
		<!-- Tablets -->
		<source media="(min-width: 768px)" srcset="font/Banner%20proyecto.png">
		<!-- Landscape Phones -->
		<source media="(min-width: 576px)" srcset="font/Banner%20proyecto.png">
		<!-- Portrait Phones -->
		<img src="font/Banner%20proyecto.png" class="img-fluid mt-5">
    </picture>
    
    <div class="container">
        <center>
        <form action="store_curriculum.php" enctype="multipart/form-data" class="card p-3 col-md-5" method="post">
            <!-- mensajes -->
            <?php include_once './includes/mensajes.php'; ?>
            <div class="form-group">
                <label for="file" style="font-size: 1.8rem; color: #f44336;">Subir Curriculum</label>
                <input type="file" name="file" id='file' class="form-control" style="padding: 3px 0.75rem;">
            </div>

            <input type="submit" value="Guardar" class="form-control btn btn-info">

        </form>

        <hr>

        <?php if($_SESSION['level'] == 0) : ?>

            <div class="col-md-12 p-4 card">
            <h2>Listado de Curriculums</h2>
                <!-- mensajes de respuesta -->
            <?php include './includes/mensajes.php'; ?>

                <table class="table table-hover">
                    <thead>
                        <th>Usuario que subio el archivo</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Operaciones</th>
                    </thead>
                    <tbody>

                        <?php 
                            $usuarios = get_usuario_curriculum($conn);
                        ?>

                        <?php foreach ($usuarios as $key => $value) : ?>
                            <tr>
                                <td><?php echo $value->nombre.' '.$value->apellido; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->telefono; ?></td>
                                <td><?php echo $value->fecha; ?></td>
                                <th>
                                    <a target='_blank' href="./upload/curriculums/<?php echo $value->archivo; ?>" class="btn btn-primary">Visualizar</a>                            
                                    <a class="btn btn-danger" 
                                        href="./delete_curriculum.php?id=<?php echo $value->id_curriculum; ?>" 
                                        onclick="return confirm('¿Estas seguro de eliminar este registro?')">
                                        <i class="fa fa-trash"></i> Eliminar
                                    </a>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>         
            </div>

            </div>

    <?php endif; ?>
    </div>

    <br><br><br><br>

<?php require_once 'main_app/mainFooter.php'; ?>