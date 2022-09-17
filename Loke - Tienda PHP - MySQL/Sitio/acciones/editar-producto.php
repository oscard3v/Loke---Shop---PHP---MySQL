<?php
require '../main/conex.php';
require '../libraries/productos.php';

// obtenemos informacion del producto
$id = $_GET['id']; 
$producto = trim($_POST['producto']);
$detalle = trim($_POST['detalle']);
$descripcion = trim($_POST['descripcion']);
$altimagen = trim($_POST['altimagen']);
$precio = trim($_POST['precio']);
$tags = $_POST['tags']; 
$errores = [];

// Comprobamos que si hay errores
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

// Si hay errores le avisamos
if(!empty($errores)) {
    $_SESSION['errores'] = $errores;
    $_SESSION['old_data'] = $_POST;
    header('Location: ../index.php?s=crear-producto');
    exit;
} 

// Edtiamos el producto.
if($idusuario = obtenerIdUsuario()) {
    $exito = editarProducto($con, $id, $producto,$detalle, $descripcion, $altimagen, $precio, $idusuario, $tags);
}

// Le avisamos al usuario el resultado
if($exito) {
    $_SESSION['status_success'] = "El producto <b>" . $producto . "</b> fue modificado!";
    header('Location: ../index.php?s=panel');
} else {
    $_SESSION['old_data'] = $_POST;
    $_SESSION['status_error'] = "No se pudo guardar el archivo, intente de nuevo!";
    header('Location: ../index.php?s=editar-producto&id='.$id);
}
