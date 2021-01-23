<?php 
require_once 'main_app/mainHead.php'; 
$consulta = whereFirst($conn, 'datos_usuario', 'id_usuario', $_SESSION['id']);
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
                <button data-toggle="modal" data-target="#modificar_informacion" class="btn btn-info">Actualizar Información personal <i class="fa fa-edit"></i></button>
                <a class="btn btn-danger" target="_blank" href="./reporte.php?id=<?php echo $consulta->id_usuario; ?>">Exportar <i class="fa fa-file"></i></a>

            </center>
        </div>
    </div>
    
</section>

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
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_titulos">Añadir Titulos <i class="fa fa-plus"></i></button>
<div class="modal fade" id="modal_titulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Titulo</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <!-- Insert content here -->
               
               <div class="container bg-white">
                <form action="store_titulo.php" method="POST" role="form" name="form-titulos" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>

                    <div class="form-group">
                        <label for="n_academico">Nivel academico</label>
                        <select class="form-control" id="n_academico" name="n_academico">
                            <option value="Certificado">Certificado</option>
                            <option value="Bachiller">Bachiller</option>
                            <option value="Universitario">Universitario</option>
                            <option value="Postgrado">Postgrado</option>
                            <option value="Maestria">Maestria</option>
                            <option value="Doctorado">Doctorado</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="" required autocomplete="off" pattern="[A-Za-z ]+">
                    </div>
                    <div class="form-group">
                        <label for="institucion">Institucion</label>
                        <input type="text" class="form-control" id="institucion" name="institucion" placeholder="" required autocomplete="off" pattern="[A-Za-z ]+">
                    </div>
                    <div class="form-group">
                        <label for="lugar">Lugar</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" placeholder="" required autocomplete="off">
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_titulo">Fecha</label>
                        <input type="date" name="fecha" id="fecha_titulo" class="form-control">
                    </div>
                 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" id="btn-cancelar" name="btn-cancelar">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-lg" id="btn-guardar-titulos" name="btn-guardar-titulos">Guardar</button>
                    </div>
                </form>
            </div>               
            </div>            
         </div>
      </div>
   </div>
   
<!--titulos-->
<div class="row mt-4">
<?php 
    $titulos = where($conn, 'titulo', 'id_usuario', $_SESSION['id']);
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
               <a href="#" onclick="eliminar('titulo', <?php echo $value->id; ?>)" style="font-size: 1.6rem;"><i class="fa fa-trash"></i></a>
            </div>
       </div>
   </div>
<?php endforeach; ?>
</div>
</section>

<hr>

<!--section distinciones-->
<section class="container distinciones p-4 mb-4">
       <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_distinciones">Añadir Distinciones <i class="fa fa-plus"></i></button>
<div class="modal fade" id="modal_distinciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Distincion</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <!-- Insert content here -->
               <div class="container">
                    <form action="store_distinciones.php" method="POST" role="form" id="form_distinciones" enctype="multipart/form-data">
                    
                    <div class="form-group">
                       <label for="foto">Foto</label>
                       <input type="file" class="form-control-file" name="foto" id="foto">
                   </div>


                    <div class="form-group">
                        <label for="distincion">Distincion</label>
                        <input type="text" class="form-control" name="distincion" id="distincion" placeholder="">
                    </div>
                    <div class="form-group">
                       <label for="lugar">Lugar</label>
                       <input type="text" class="form-control" name="lugar" id="lugar" placeholder="">
                   </div>

                   <div class="form-group">
                    <label for="fecha" class="control-label">Fecha de Entrega</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="" required="required" title="">
                    </div>
                    <div class="form-group">
                       <label for="i_adicional">Informacion adicional</label>
                       <textarea class="form-control" name="i_adicional" id="i_adicional" rows="3"></textarea>
                   </div>
                   
                   <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-lg" id="btn-guardar-distinciones">Guardar</button>
                    </div>                   
                   
                </form>
                </div>
            </div>
            
         </div>
      </div>
   </div>
       
<!--distinciones-->
<div class="row mt-4">
    <?php 
        $distinciones = where($conn, 'distinciones', 'id_usuario', $_SESSION['id']);
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
                       <a href="#" onclick="eliminar('distinciones', <?php echo $value->id; ?>)" style="font-size: 1.6rem;"><i class="fa fa-trash"></i></a>
                    </div>
               </div>
          </div>
    
    <?php endforeach; ?>
    </div>
</section>


<hr>

<!--Section Cargos--> 
<section class="container Cargos p-4 mb-4">
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_cargos">Añadir Cargos <i class="fa fa-plus"></i></button>
<div class="modal fade" id="modal_cargos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Cargo</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <!-- Insert content here -->
               <div class="container">
                    <form action="store_cargos.php" method="POST" role="form" id="form-cargos">

                    <div class="form-group">
                        <label for="c_institucion">Institucion</label>
                        <input type="text" class="form-control" id="c_institucion" name="c_institucion" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="c_programa">Programa</label>
                        <input type="text" class="form-control" id="c_programa" name="c_programa" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="c_cargo">Cargo</label>
                        <input type="text" class="form-control" id="c_cargo" name="c_cargo" placeholder="" required>
                    </div>

                    <div class="row">
                              <div class="col">
                                  <div class="form-group">
                                        <label for="c_f_entrada">Entrada</label>
                                        <input type="date" class="form-control" name="c_f_entrada" id="c_f_entrada" required>
                                   </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                    <label for="c_f_salida">Salida</label>
                                    <input type="date" class="form-control" name="c_f_salida" id="c_f_salida" required>
                               </div>

                              </div>
                          </div>

                    <div class="form-group">
                       <label for="c_i_adicional">Informacion adicional</label>
                       <textarea class="form-control" id="c_i_adicional" name="c_i_adicional" rows="3"></textarea>
                   </div>
                   
                   <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-lg" id="btn-guardar-cargos">Guardar</button>
                    </div>
                   
                </form>
                </div>
            </div>
            
         </div>
      </div>
   </div>        

         <div class="row mt-4">
         
        <?php 
            $cargos = where($conn, 'cargos', 'id_usuario', $_SESSION['id']);
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
                    <div class="card-footer text-muted text-center">
                        <a href="#" onclick="eliminar('cargos', <?php echo $value->id; ?>)" style="font-size: 1.6rem;"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
   </section>
   
<hr>

<!--Section Eventos-->
<section class="container Evento p-4 mb-4">
       <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_eventos">Añadir Eventos <i class="fa fa-plus"></i></button>
<div class="modal fade" id="modal_eventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Evento</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <!-- Insert content here -->
               <div class="container">
                    <form action="store_evento.php" method="POST" role="form" enctype="multipart/form-data" id="form-eventos">
                    
                    <div class="form-group">
                       <label for="foto">foto</label>
                       <input type="file" class="form-control-file" id="foto" name="foto">
                   </div>
                    <div class="form-group">
                        <label for="evento">Nombre del Evento</label>
                        <input type="text" class="form-control" id="evento" name="evento" placeholder="">
                    </div>
                    <div class="form-group">
                       <label for="participacion">Participacion</label>
                       <select class="form-control" id="participacion" name="participacion">
                           <option value="Espectador">Espectador</option>
                           <option value="Colaborador">Colaborador</option>
                           <option value="Ponente">Ponente</option>
                       </select>
                   </div>
                   <div class="form-group">
                        <label for="lugar">Lugar</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" placeholder="">
                    </div>
                    <div class="form-group">
                    <label for="fecha" class="control-label">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="" required="required" title="">
                    </div>
                    <div class="form-group">
                       <label for="i_adicional">Informacion adicional</label>
                       <textarea class="form-control" id="i_adicional" name="i_adicional" rows="3"></textarea>
                   </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                        <button type="sumit" class="btn btn-primary btn-lg" id="btn-guardar-evento">Guardar</button>
                    </div>
                   
                </form>
                </div>
            </div>
            
         </div>
      </div>
   </div>
<div class="row mt-4">
         
    <?php  
        $eventos = where($conn, 'evento', 'id_usuario', $_SESSION['id']);
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
                        <a href="#" onclick="eliminar('evento', <?php echo $value->id; ?>)" style="font-size: 1.6rem;"><i class="fa fa-trash"></i></a>
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
                <select class="form-control" name="nacionalidad" id="nacionalidad" required>
                    <option value="">Seleccionar...</option>
                    <option value="Venezolano">Venezolano</option>
                    <option value="Extranjero">Extranjero</option>
                </select>
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
                <select class="form-control" name="nacionalidad" id="nacionalidad_modify" required>
                    <option value="<?php echo $consulta->nacionalidad; ?>"><?php echo $consulta->nacionalidad; ?></option>
                    <option value="Venezolano">Venezolano</option>
                    <option value="Extranjero">Extranjero</option>
                </select>
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