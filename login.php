<?php

include './includes/functions.php'; 

$email = $_POST['email'];
$password =  md5($_POST['pass']);

$consultar = $conn->prepare("SELECT * FROM usuarios where email = '$email' and pass = '$password'"); 
$consultar->execute();
$res = $consultar->fetchObject();

if($res) {
// si es verdadero el usuario administrador guardamos los datos en la sesion
session_start();
$_SESSION['id'] = $res->id;
$_SESSION['email'] = $res->email;
$_SESSION['level'] = $res->level;
header("Location: ./inicio.php");

} else {
// si el usuario es falso
header("Location: ./index.php?res=1");

}

?>