<?php include './includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/datatable.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>CQuery</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top">
      <div class="container">
         <a class="navbar-brand" href="#">CurriculumQuery</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="./inicio.php">Inicio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./perfil.php">Perfil</a>
               </li>  
               
               <?php if($_SESSION['level'] == 0): ?>
                  <li class="nav-item">
                     <a class="nav-link" href="./curriculum.php" >Curriculums</a>                   
                  </li>
               <?php else: ?>
                  <li class="nav-item">
                     <a class="nav-link" href="./curriculum.php" >Añadir Curriculum</a>                   
                  </li>
               <?php endif; ?>
               
               <?php if ($_SESSION['level'] == 0) : ?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                     <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="./solicitudes.php">Solicitudes</a>
                        <a class="dropdown-item" href="./usuarios.php">Listado</a>
                     </div>
                  </li>
               <?php endif; ?>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['email']; ?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdown02">
                     <a class="dropdown-item" href="./logout.php">Cerrar sesion</a>
                  </div>
               </li>               
            </ul>
         </div>
      </div>
   </nav>