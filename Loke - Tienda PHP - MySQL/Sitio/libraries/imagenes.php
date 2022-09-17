<?php

// Valida si es una imagen admitida.
function validarImagen($nombreImagen){
    $extension = substr($nombreImagen, strrpos($nombreImagen, '.') + 1);
    switch($extension) {
        case 'jpg':
        case 'jpeg':
            return true;
            break;

        case 'gif':
            return true;
            break;

        case 'png':
            return true;
            break;

        default:
            return false;
    }
}

// Guardamos la imagen del producto
function guardarImagen($rutaTemporal,$nombreImagen){

    $directorioImagenes = '../imgs/thumbs/';
    $extension = substr($nombreImagen, strrpos($nombreImagen, '.') + 1);

    if(validarImagen($nombreImagen)){
        if(is_uploaded_file($rutaTemporal)) {
            if(move_uploaded_file($rutaTemporal, $directorioImagenes . $nombreImagen)) {
                return true;
            }
            else {
                return false;
            }
        }
    }
    return false;
}

// Elimina la imagen del producto
function eliminarImagen($con,$id){

    $id = mysqli_real_escape_string($con, $id);
    $query = "SELECT * FROM productos WHERE idproductos = '" . $id . "'";
    $exec = mysqli_query($con, $query);
    $directorioImagenes = '../imgs/thumbs/';

    while($fila = mysqli_fetch_assoc($exec)) {
        $imagen = $fila['imagen'];
        if (file_exists($directorioImagenes.$imagen)) {
            unlink($directorioImagenes.$imagen);
        }        
    }

    return true;
}