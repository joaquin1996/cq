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
        

        <h2>Solicitudes en espera</h2>
        <hr>

        <!-- mensajes de respuesta -->
        <?php include './includes/mensajes.php'; ?>

        <table class="table table-responsive">
            <thead>
                <th>Nombre y Apellido</th>
                <th>Correo</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Operaciones</th>
            </thead>
            <tbody>

                <?php 
                    $usuarios = get_solicitudes($conn);
                ?>

                <?php foreach ($usuarios as $key => $value) : if($value->ordering == null):?>
                    <tr>
                        <td><?php echo $value->nombre.' '.$value->apellido; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->cedula; ?></td>
                        <td><?php echo $value->telefono; ?></td>
                        <th>
                            <a  href="./visualizar.php?id=<?php echo $value->id_usuario; ?>" class="btn btn-primary">Evaluar</a>                            
                        </th>
                    </tr>
                <?php endif; endforeach; ?>
            </tbody>
        </table>         
    </div>
    

    <br><br>

<?php require_once 'main_app/mainFooter.php'; ?>