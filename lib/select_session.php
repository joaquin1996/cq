<?php
require_once "conexion.php";

session_start();

$id_usuario = $_SESSION['id_usuario'];

$query = $mysqli->query("SELECT usu.*, per.*, cur.* FROM usuarios AS usu INNER JOIN persona AS per ON usu.id_persona=per.id_persona INNER JOIN curriculum AS cur ON cur.id_persona=per.id_persona WHERE usu.id_usuario=$id_usuario");

$datos = $query->fetch_array();

$id_curriculum = $datos['id_curriculum'];

$query_titulos = $mysqli->query("SELECT cur.*, tit.* FROM curriculum AS cur INNER JOIN titulo AS tit ON cur.id_curriculum=tit.id_curriculum WHERE cur.id_curriculum=$id_curriculum");

$query_cargos = $mysqli->query("SELECT cur.*, car.* FROM curriculum AS cur INNER JOIN cargos AS car ON cur.id_curriculum=car.id_curriculum WHERE cur.id_curriculum=$id_curriculum");

$query_distinciones = $mysqli->query("SELECT cur.*, dis.* FROM curriculum AS cur INNER JOIN distinciones AS dis ON cur.id_curriculum=dis.id_curriculum WHERE cur.id_curriculum=$id_curriculum");

$query_eventos= $mysqli->query("SELECT cur.*, eve.* FROM curriculum AS cur INNER JOIN evento AS eve ON cur.id_curriculum=eve.id_curriculum WHERE cur.id_curriculum=$id_curriculum");

?>