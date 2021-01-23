<?php 
require_once 'main_app/mainHead.php'; 
$consulta = whereFirst($conn, 'datos_usuario', 'id_usuario', $_GET['id']);
$usuario = whereFirst($conn, 'usuarios', 'id', $_GET['id']);
?>

<?php if($consulta): ?>

<section class="curriculumVitae container-fluid mt-5 mb-4">
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid img-thumbnail foto w-100" src="./upload/perfiles/<?php echo $consulta->perfil; ?>"  alt="image">
        </div>

        <div class="col-md-8">
            <h1 class="display-4 text-center">Curriculum Vitae</h1>

            <div class="d-block">
                <div class="row ralla">
                    <div class="col"><p class="font-weight-bold">Nombre:</p></div>
                    <div class="col"><p><?php echo $consulta->nombre." ".$consulta->apellido; ?></p></div>
                </div>
            </div>
            <div class="d-block">
                <div class="row ralla">
                    <div class="col"><p class="font-weight-bold">Cédula:</p></div>
                    <div class="col"><p><?php echo $consulta->cedula; ?></p></div>
                </div>
            </div>
            <div class="d-block">
                <div class="row ralla">
                    <div class="col"><p class="font-weight-bold">Fecha de Nacimiento:</p></div>
                    <div class="col"><p><?php echo $consulta->nacimiento; ?></p></div>
                </div>
            </div>
            <div class="d-block">
                <div class="row ralla">
                    <div class="col"><p class="font-weight-bold">Telefono:</p></div>
                    <div class="col"><p><?php echo $consulta->telefono; ?></p></div>
                </div>
            </div>
            <div class="d-block">
                <div class="row ralla">
                    <div class="col"><p class="font-weight-bold">Dirección:</p></div>
                    <div class="col"><p><?php echo $consulta->direccion; ?></p></div>
                </div>
            </div>
            <div class="d-block">
                <div class="row ralla">
                    <div class="col"><p class="font-weight-bold">Estado Civil:</p></div>
                    <div class="col"><p><?php echo $consulta->estado_civil; ?></p></div>
                </div>
            </div>
            <div class="d-block">
                <div class="row ralla">
                    <div class="col"><p class="font-weight-bold">Nacionalidad:</p></div>
                    <div class="col"><p><?php echo $consulta->nacionalidad; ?></p></div>
                </div>
            </div>
            <br>
            <center>
                <a href="javascript:window.history.back();" class="btn btn-primary ml-2">
                    <i class="fa fa-backward"></i>&nbsp; Ir a la  Pagina Anterior
                </a>      

                <?php if($usuario->status == 0): ?>
                    <a href="./delete_usuario.php?id=<?php echo $_GET['id']; ?>" onclick="return confirm('¿Estas seguro de eliminar este registro?')" class="btn btn-danger">Rechazar</a>  
                    <button onclick="asignar_cargo(<?php echo $_GET['id']; ?>)" class="btn btn-success" data-toggle="modal" data-target="#modal_aceptar">Aceptar</button>   
                <?php endif; ?>
            </center>
        </div>
    </div>
    
</section>

<!-- modal de aceptar -->
<div class="modal fade" id="modal_aceptar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <!-- Insert content here -->
               
               <div class="container bg-white">
                <form action="store_aceptar.php" method="POST" role="form" name="form-titulos" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_usuario" id="id_usuario_cargo">
                        <label for="">Ordenar registros de manera:</label>
                        <select name="cargo" id="cargo" required>
                            <option value="">Seleccionar orden</option>
                            <option value="asc">Ascendente</option>
                            <option value="desc">Descendente</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                    </div>
                </form>
            </div>               
            </div>            
         </div>
      </div>
   </div>


<?php else:  ?> 
<section class="curriculumVitae container-fluid mt-5 mb-4">
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid img-thumbnail foto w-100" src="font/jesus-perfil.jpg"  alt="image">
        </div>

        <div class="col-md-8 text-center">
            <h1 class="display-4 text-center">Curriculum Vitae</h1>
            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-info">Registrar información personal</button>
        </div>
        
    </div>
</section>
<br>
<?php endif; ?>


<!-- mensajes  -->
<?php include './includes/mensajes.php'; ?>

<!--section titulos-->
<section class="container titulos p-4 mb-4">
<!--Modal Titulos-->
<button type="button" class="btn btn-success btn-lg">Titulos</button>
<!--titulos-->
<div class="row mt-4">
<?php 
    $titulos = where($conn, 'titulo', 'id_usuario', $_GET['id']);
    foreach ($titulos as $key => $value) : 
?>
    <div class="col-sm-4 mb-4">        
        <div class="card text-center">
        <div class="card-header"><img class="img-fluid imgTitulo" src="<?php echo "./upload/titulos/".$value->foto; ?>" alt="image"></div>
           <div class="card-body">
               <blockquote class="blockquote mb-0">
                   <p style="margin-bottom: .5rem"><b><?php echo $value->nivel_academico; ?></b> - <?php echo $value->titulo; ?></p>
                   <span><?php echo $value->institucion; ?></span>
                   <footer class="blockquote-footer"><?php echo $value->lugar ?> </footer>
               </blockquote>
           </div>
           <div class="card-footer text-muted text-center">
               <?php echo $value->fecha; ?> <br>
               <a target='_blank' href="<?php echo "./upload/titulos/$value->foto"; ?>" style="font-size: 1.6rem;"><i class="fa fa-eye"></i></a>
            </div>
       </div>
   </div>
<?php endforeach; ?>
</div>
</section>

<hr>

<!--section distinciones-->
<section class="container distinciones p-4 mb-4">
<button type="button" class="btn btn-success btn-lg" >Distinciones</button>
<!--distinciones-->
<div class="row mt-4">
    <?php 
        $distinciones = where($conn, 'distinciones', 'id_usuario', $_GET['id']);
        foreach ($distinciones as $key => $value) : 
    ?>
    
        <div class="col-sm-4 mb-4">
              <div class="card text-center">
               <div class="card-header"><img class="img-fluid imgTitulo" src="./upload/distinciones/<?php echo $value->foto; ?>" alt="image"></div>
                    <div class="card-body">
                        <h4 class="card-title text-center"><?php echo $value->distincion; ?></h4>
                        <p class="card-text text-rigth"><b><?php echo $value->lugar; ?> - </b><?php echo $value->i_adicional; ?></p>
                    </div>
                    <div class="card-footer text-muted text-center">
                       <?php echo $value->fecha; ?> <br>
                       <a target='_blank' href="<?php echo "./upload/distinciones/$value->foto"; ?>" style="font-size: 1.6rem;"><i class="fa fa-eye"></i></a>
                    </div>
               </div>
        </div>
    
    <?php endforeach; ?>
    </div>
</section>



<hr>
<!--Section Cargos--> 
<section class="container Cargos p-4 mb-4">
<button type="button" class="btn btn-success btn-lg">Cargos </button>
    <div class="row mt-4">
       
        <?php 
            $cargos = where($conn, 'cargos', 'id_usuario', $_GET['id']);
            foreach ($cargos as $key => $value) :
        ?>
            <div class="col-sm-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $value->c_cargo; ?></h4>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $value->c_institucion; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo " - ".$value->c_programa; ?></h6>
                        <p class="card-text"><?php echo $value->c_f_entrada; ?> a <?php echo $value->c_f_salida ?> - <?php echo $value->c_i_adicional; ?></p>
                    </div>                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
   

<hr>
<!--Section Eventos-->
<section class="container Evento p-4 mb-4">
<button type="button" class="btn btn-success btn-lg" >Eventos</button>
    <div class="row mt-4">
         
    <?php  
        $eventos = where($conn, 'evento', 'id_usuario', $_GET['id']);
        foreach ($eventos as $key => $value):
    ?>
        <div class="col-sm-4 mb-4">
            <div class="card text-center">
                <div class="card-header"><img class="img-fluid imgTitulo" src="./upload/eventos/<?php echo $value->foto; ?>" alt="image"></div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $value->evento; ?></h4>
                        <p class="card-text">
                            <b><?php echo $value->participacion; ?> </b>
                            <br> - <?php echo $value->i_adicional; ?> 
                            <br> - <?php echo $value->lugar; ?>
                        </p>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <?php echo $value->fecha; ?> <br>
                        <a target='_blank'  href="<?php echo "./upload/eventos/$value->foto"; ?>" style="font-size: 1.6rem;"><i class="fa fa-eye"></i></a>
                    </div>                    
                </div>
          </div>
    <?php endforeach; ?>
    </div>
</section>
   




<?php require_once 'main_app/mainFooter.php'; ?>

<!-- modal de registro de informacion personal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de tu perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="store_perfil.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="perfil" class="col-form-label">Imagen de Perfil:</label>
                <input type="file" name="perfil" class="form-control" id="perfil">
            </div>

            <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" id="nombre">
            </div>

            <div class="form-group">
                <label for="apellido" class="col-form-label">Apellido:</label>
                <input type="text" name="apellido" class="form-control" id="apellido">
            </div>

            <div class="form-group">
                <label for="cedula" class="col-form-label">Cédula:</label>
                <input type="text" class="form-control" name="cedula" id="cedula">
            </div>

            <div class="form-group">
                <label for="nacimiento" class="col-form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="nacimiento" id="nacimiento">
            </div>

            <div class="form-group">
                <label for="telefono" class="col-form-label">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" id="telefono">
            </div>

            <div class="form-group">
                <label for="estado_civil" class="col-form-label">Estado Civil:</label>
                <select class="form-control" name="estado_civil" id="estado_civil">
                    <option value="Soltero(a)">Soltero(a)</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                    <option value="Viudo(a)">Viudo(a)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nacionalidad" class="col-form-label">Nacionalidad:</label>
                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad">
            </div>

            <div class="form-group">
                <label for="direccion" class="col-form-label">Dirección:</label>
                <textarea class="form-control" name="direccion" rows="5" id="direccion"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- modal de modificacion de  informacion personal -->
<div class="modal fade" id="modificar_informacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Información de tu perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update_perfil.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="perfil_modify" class="col-form-label">actualizar Imagen de Perfil:</label>
                <input type="file" name="perfil" class="form-control" id="perfil_modify">
            </div>

            <div class="form-group">
                <label for="nombre_modify" class="col-form-label">Nombre:</label>
                <input value="<?php echo $consulta->nombre; ?>" type="text" name="nombre" class="form-control" id="nombre_modify">
            </div>

            <div class="form-group">
                <label for="apellido_modify" class="col-form-label">Apellido:</label>
                <input value="<?php echo $consulta->apellido; ?>" type="text" name="apellido" class="form-control" id="apellido_modify">
            </div>

            <div class="form-group">
                <label for="cedula_modify" class="col-form-label">Cédula:</label>
                <input value="<?php echo $consulta->cedula; ?>" type="text" class="form-control" name="cedula" id="cedula_modify">
            </div>

            <div class="form-group">
                <label for="nacimiento_modify" class="col-form-label">Fecha de Nacimiento:</label>
                <input value="<?php echo $consulta->nacimiento; ?>" type="date" class="form-control" name="nacimiento" id="nacimiento_modify">
            </div>

            <div class="form-group">
                <label for="telefono_modify" class="col-form-label">Teléfono:</label>
                <input value="<?php echo $consulta->telefono; ?>" type="text" class="form-control" name="telefono" id="telefono_modify">
            </div>

            <div class="form-group">
                <label for="estado_civil_modify" class="col-form-label">Estado Civil:</label>
                <select class="form-control" name="estado_civil" id="estado_civil_modify">
                    <option value="<?php echo $consulta->estado_civil; ?>"><?php echo $consulta->estado_civil; ?></option>
                    <option value="Soltero(a)">Soltero(a)</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                    <option value="Viudo(a)">Viudo(a)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nacionalidad_modify" class="col-form-label">Nacionalidad:</label>
                <input value="<?php echo $consulta->nacionalidad; ?>" type="text" class="form-control" name="nacionalidad" id="nacionalidad_modify">
            </div>

            <div class="form-group">
                <label for="direccion_modify" class="col-form-label">Dirección:</label>
                <textarea class="form-control" name="direccion" rows="5" id="direccion_modify"><?php echo $consulta->direccion; ?></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
      </div>
      
    </div>
  </div>
</div>