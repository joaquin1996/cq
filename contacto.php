<?php require_once 'main_app/mainHead.inc';require_once 'main_app/nav.inc'; ?>

<div class="caja bg-white">
    <form action="" method="POST" role="form">
	<legend>Usuarios</legend>

	<div class="form-group">
		<label for="usuario">Usuario</label>
		<input type="text" class="form-control" id="usuario" name="usuario" placeholder="">
	</div>
	<div class="form-group">
       <label for="contraseña">Contraseña</label>
       <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="">
   </div>
    <div class="form-group">
       <label for="correo">Correo</label>
       <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com">
   </div>
    <div class="form-group">
       <label for="pregunta">Pregunta</label>
       <select class="form-control" id="pregunta" name="pregunta">
           <option>¿Como se llama tu mama?</option>
           <option>¿Como se llama tu mascota?</option>
           <option>¿Nombre de tu serie favorita?</option>
       </select>
   </div>
   <div class="form-group">
       <label for="respuesta">Respuesta</label>
       <input type="text" class="form-control" id="respuesta" name="respuesta" placeholder="">
   </div>

	<button type="submit" class="btn btn-primary">Registrar</button>
</form>
</div>
<br>
<div class="caja bg-white">
<form action="" method="POST" class="" role="form">
    <div class="form-group">
	    <legend>Persona</legend>
    </div>
		
    <div class="row">
              <div class="col">
                  <div class="form-group">
                 <label for="nombre">Nombre</label>
                 <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
             </div>

              </div>
              <div class="col">
                <div class="form-group">
                 <label for="apellido">Apellido</label>
                 <input type="text" class="form-control" id="apellido" name="apellido" placeholder="">
             </div>
              </div>
          </div>
        
    <div class="form-group">
        <label for="exampleFormControlInput1">Cedula</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
      
      <div class="form-group">
	<label for="fechaNacimiento" class="control-label">Fecha de Nacimiento</label>

		<input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="" required="required" title="">

        </div>
        
    <div class="form-group">
       <label for="telefono">Telefono</label>
       <input type="text" class="form-control" id="telefono" name="telefono" placeholder="">
   </div>
   
   <div class="form-group">
       <label for="direccion">Direccion</label>
       <textarea class="form-control" id="direccion" name="direccion" rows="3"></textarea>
   </div>
   
   <div class="form-group">
       <label for="estadoCivil">Estado civil</label>
       <select class="form-control" id="estadoCivil" name="estadoCivil">
           <option>Soltero</option>
           <option>Casado</option>
           <option>Concubinato</option>
       </select>
   </div>

   
   <div class="form-group">
       <label for="nacionalidad">Nacionalidad</label>
       <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="">
   </div>

		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Registrar</button>
			</div>
		</div>
</form>
</div>

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

<?php require_once 'main_app/footer.inc';require_once 'main_app/mainFooter.inc'; ?>