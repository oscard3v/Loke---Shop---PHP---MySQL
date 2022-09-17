<?php
require '../main/conex.php';
require '../libraries/productos.php';
require '../libraries/imagenes.php';

// Obtenemos los datos del producto
$producto = trim($_POST['producto']);
$detalle = trim($_POST['detalle']);
$descripcion = trim($_POST['descripcion']);
$altimagen = trim($_POST['altimagen']);
$precio = trim($_POST['precio']);
$tags = $_POST['tags']; 
$errores = [];
$imagen = $_FILES['imagen'];

// Buscamos si hay errores
if(empty($producto)) {
    $errores['producto'] = "Escribe el nombre del producto.";
} else if(strlen($producto) < 11) {
    $errores['producto'] = "El nombre del producto debe tener al más de 10 caracteres.";
}
if(empty($detalle)) {
    $errores['detalle'] = "Escribe el detalle del producto.";
}
if(empty($descripcion)) {
    $errores['descripcion'] = "Escribe la descripción del producto.";
}
if(empty($altimagen)) {
    $errores['altimagen'] = "Escribe una descripción de la imágen.";
}
if(empty($precio)) {
    $errores['precio'] = "Especifica el precio del producto.";
} else if(!ctype_digit($precio)) {
    $errores['precio'] = "El precio debe ser un número.";
}
if(empty($imagen['name'])){
    $errores['imagen'] = "Debes cargar una imagen del producto";
} else {
    if(!validarImagen($imagen['name'])){
        $errores['imagen'] = "El archivo cargado no es una imagen.";
    }
}

// Informamos al usuario los errores
if(!empty($errores)) {
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=crear-producto');
    exit;
} 

// Creamos el producto
if($idusuario = obtenerIdUsuario()) {
    $exito = crearProducto($con, $producto, $detalle, $descripcion, $imagen, $altimagen, $precio, $idusuario, $tags);
}

// Avisamos el resultado
if($exito) {
    $_SESSION['status_success'] = "El producto <b>" . $nombreProd . "</b> fue añadido!";
    header('Location: ../index.php?s=panel');
} else {  
    $_SESSION['old_data'] = $_POST;
    $_SESSION['status_error'] = "OPS! Sucedió un error, intente nuevamente!";
    header('Location: ../index.php?s=crear-producto');
}
