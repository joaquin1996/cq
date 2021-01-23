<?php
try{
    $mysqli = new mysqli('localhost','root','','cq');
}catch(Exception $e){
    echo 'Error, no se pudo conetar a la Base de Datos', $e->getMessage(), "\n";
}
?>