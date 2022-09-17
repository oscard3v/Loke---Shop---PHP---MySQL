<?php

// Obtenemos todas las tags
function obtenerTags($con) {
    $query = "SELECT * FROM tags";
    $exec = mysqli_query($con, $query);
    $tags = [];
    while($fila = mysqli_fetch_assoc($exec)) {
        $tags[] = $fila;
    }
    return $tags;
}

// Obtenemos las tags por producto
function obtenerTagsPorProducto($con, $id) {

    $id = mysqli_real_escape_string($con, $id);

    $query = "SELECT * FROM productos_has_tags WHERE productos_idproductos = '" . $id . "'";
    $exec = mysqli_query($con, $query);
    $tags = [];

    while($fila = mysqli_fetch_assoc($exec)) {

        array_push($tags,obtenerTagPorId($con,$fila['tags_idtags']));
    }

    return $tags;
}

// Obtenemos las tags por id
function obtenerTagPorId($con, $id){
    $id = mysqli_real_escape_string($con, $id);
    $query = "SELECT * FROM tags WHERE idtags = '" . $id . "'";
    $exec = mysqli_query($con, $query);

    return mysqli_fetch_assoc($exec);
}

