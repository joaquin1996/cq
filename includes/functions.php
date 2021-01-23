<?php 
// manejo de sesiones
session_start();

// redireccionar si la sesion no existe
if (!$_SESSION['email']) {
    header("Location: ./");
}

// conexion a la base de datos con pdo 
try{
    $conn = new PDO('mysql:host=localhost;dbname=cq', 'root', '');  
 
}catch(PDOException $e) {                                                                     
    Echo "Error: " . $e->getMesagge();         
}

// funcion para traer todos los registros de una tabla 
function whereAll($conn, $table){
    $consultar = $conn->prepare("SELECT * FROM $table"); 
    $consultar->execute();
    $listado = $consultar->fetchAll(PDO::FETCH_OBJ);
    return $listado;
}

// traer todos los productos con su categoria
function whereAllProducts($conn){
    $consultar = $conn->prepare("SELECT * FROM category, products WHERE category.id = products.category_id "); 
    $consultar->execute();
    $listado = $consultar->fetchAll(PDO::FETCH_OBJ);
    return $listado;
}

function BusquedaProductosLike($conn, $nombre){
    $consultar = $conn->prepare("SELECT * FROM products
    INNER JOIN category ON products.category_id=category.id
    WHERE name LIKE '%' :nombre '%' "); 
    $consultar->execute(array(':nombre'=>$nombre));
    $listado = $consultar->fetchAll(PDO::FETCH_OBJ);
    return $listado;
}

// funcion para consultar y traer un registro
function whereFirst($conn, $table, $key, $value){
    $consultar = $conn->prepare("SELECT * FROM $table where $key = '$value'"); 
    $consultar->execute();
    $item = $consultar->fetchObject();
    return $item;
}

// funcion para consultar y traer un registro
function where($conn, $table, $key, $value, $ordering = null){
    if ($ordering == null) {
        $consultar = $conn->prepare("SELECT * FROM $table where $key = '$value'"); 
        $consultar->execute();
        $listado = $consultar->fetchAll(PDO::FETCH_OBJ);
        return $listado;
    } else {
        $consultar = $conn->prepare("SELECT * FROM $table where $key = '$value' order by fecha $ordering"); 
        $consultar->execute();
        $listado = $consultar->fetchAll(PDO::FETCH_OBJ);
        return $listado;
    }
    
}

// traer un producto con su categoria mediante el id
function getProductId($conn, $id){
    // traemos el producto
    $product = $conn->prepare("SELECT * FROM products WHERE id = $id "); 
    $product->execute();
    $item_product = $product->fetchObject();

    // traemos la categoria
    $category = $conn->prepare("SELECT * FROM category WHERE id = $item_product->category_id "); 
    $category->execute();
    $item_category = $category->fetchObject();

    // creamos un objeto con ambos datos 
    $data = new stdClass();
    $data->product = $item_product;
    $data->category = $item_category; 

    return $data;
}

// function para traer un registro por id de la base de datos
function find($conn, $table, $id){
    $consultar = $conn->prepare("SELECT * FROM $table where id = '$id'"); 
    $consultar->execute();
    $item = $consultar->fetchObject();
    return $item;
}

// funcion para generar el slug de un producto
function slugify($string){
    $preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');
        $pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
        $string = preg_replace($pattern, '', $string);
    $string = preg_replace('~[^\\pL\d]+~u', '-', $string);
    $string = trim($string, '-');
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
    $string = strtolower($string);
    $string = preg_replace('~[^-\w]+~', '', $string);
    
    return $string;
}

function get_usuarios($conn){
    $consultar = $conn->prepare("SELECT * FROM usuarios
    INNER JOIN datos_usuario ON usuarios.id=datos_usuario.id_usuario
    where status = 1"); 
    $consultar->execute();
    $listado = $consultar->fetchAll(PDO::FETCH_OBJ);
    return $listado;
}

function get_usuario_curriculum($conn){
    $consultar = $conn->prepare("SELECT * FROM curriculums
    INNER JOIN datos_usuario ON curriculums.id_usuario=datos_usuario.id_usuario 
    INNER JOIN usuarios ON curriculums.id_usuario=usuarios.id "); 
    $consultar->execute();
    $listado = $consultar->fetchAll(PDO::FETCH_OBJ);
    return $listado;
}

function get_solicitudes($conn){
    $consultar = $conn->prepare("SELECT * FROM usuarios
    INNER JOIN datos_usuario ON usuarios.id=datos_usuario.id_usuario
    where status = 0"); 
    $consultar->execute();
    $listado = $consultar->fetchAll(PDO::FETCH_OBJ);
    return $listado;
}

?>