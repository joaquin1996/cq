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
   
   
    <div class="container card p-3 text-center">

        <h2>Listado de Usuarios</h2>
        <hr>

        <table class="table table-responsive">
            <thead>
                <th>Usuario</th>
                <th>Nombre y Apellido</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Operaciones</th>
            </thead>
            <tbody>

                <?php 
                    $usuarios = get_usuarios($conn);
                ?>

                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->nombre.' '.$value->apellido; ?></td>
                        <td><?php echo $value->cedula; ?></td>
                        <td><?php echo $value->telefono; ?></td>
                        <th>
                            <a target="_blank" href="./reporte.php?id=<?php echo $value->id_usuario; ?>"><i class="fa fa-file"></i></a>
                            <a href="./visualizar.php?id=<?php echo $value->id_usuario; ?>"><i class="fa fa-eye"></i></a>
                            <?php if ($value->level != 0): ?>
                            <a href="./delete_usuario.php?id=<?php echo $value->id_usuario; ?>" onclick="return confirm('¿Estas seguro de eliminar este registro?')">
                                <i class="fa fa-trash"></i>
                            </a>    
                            <?php endif; ?>
                            
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>         
    </div>
    

    <br><br>

<?php require_once 'main_app/mainFooter.php'; ?>