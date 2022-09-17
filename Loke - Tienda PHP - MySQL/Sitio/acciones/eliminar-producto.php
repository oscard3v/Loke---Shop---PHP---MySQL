<?php
require '../main/conex.php';
require '../libraries/productos.php';
require '../libraries/imagenes.php';

// Obtenemos id del producto para eliminar.
$id = $_GET['id'];
$deleteImages = eliminarImagen($con,$id);
$exito = eliminarProducto($con, $id);

// Avisamos al usuario
if($exito) {
    $_SESSION['status_success'] = "Producto eliminado correctamente!";
    header("Location: ../index.php?s=panel");
} else {
    $_SESSION['status_error'] = "Ocurrió un error! El producto no pudo ser eliminado!";
    header("Location: ../index.php?s=panel");
}
