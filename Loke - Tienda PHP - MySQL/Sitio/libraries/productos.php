<?php

// Obtenemos todos los productos
function obtenerProductos($con) {
    $query = "SELECT * FROM Productos";
    $exec = mysqli_query($con, $query);
    $productos = [];

    while($fila = mysqli_fetch_assoc($exec)) {
        $productos[] = $fila;
    }
    return $productos;
}

// Obtenemos un producto por id
function obtenerProductosPorId($con,$id) {
    $query = "SELECT * FROM Productos WHERE idproductos = '" . $id . "'";
    $exec = mysqli_query($con, $query);
    $productos = [];

    while($fila = mysqli_fetch_assoc($exec)) {
        $productos[] = $fila;
    }
    return $productos;
}


// Creamos un producto con la información del usuario
function crearProducto($con, $producto, $detalle, $descripcion, $imagen, $altimagen, $precio, $idusuario, $tags) {

    $producto = mysqli_real_escape_string($con, $producto);
    $detalle = mysqli_real_escape_string($con, $detalle);
    $descripcion = mysqli_real_escape_string($con, $descripcion);
    $altimagen = mysqli_real_escape_string($con, $altimagen);
    $precio = mysqli_real_escape_string($con, $precio);
    $counter = 0; 
    $date = date('YmdHis');

    if(!empty($imagen['name'])){
        $nombreImagen = $date . $imagen['name'];
        guardarImagen($imagen['tmp_name'],$nombreImagen);
    }

    $query = "INSERT INTO productos (nombre,detalle,descripcion,imagen,imagen_alt,precio,usuarios_idusuarios) 
    VALUES ('" . $producto . "','" . $detalle . "','" . $descripcion . "','" . $nombreImagen . "','" . $altimagen . "','" . $precio . "','" . $idusuario . "')";
    $exec = mysqli_query($con, $query);

    if($exec) {

        if(empty($tags)) {
            return true;
        }

        $ultimaIdProducto = mysqli_insert_id($con);
        $values = [];

        foreach($tags as $tag) {
            $values[] = "(" . $ultimaIdProducto . ", '" . mysqli_real_escape_string($con, $tag) . "')";
        }

        $query = "INSERT INTO productos_has_tags (productos_idproductos, tags_idtags)
                  VALUES " . implode(', ', $values);
        $exec = mysqli_query($con, $query);

        if($exec) {
            return true;
        }
    }
    return false;
}



function editarProducto($con, $id, $producto, $detalle, $descripcion, $altimagen, $precio, $idUsuario,  $tags) {


    $id = mysqli_real_escape_string($con, $id);
    $producto = mysqli_real_escape_string($con, $producto);
    $descripcion = mysqli_real_escape_string($con, $descripcion);
    $altimagen = mysqli_real_escape_string($con, $altimagen);
    $precio = mysqli_real_escape_string($con, $precio);
    $idUsuario = mysqli_real_escape_string($con, $idUsuario);


    $query = "UPDATE productos SET nombre = '" . $producto . "',detalle = '" . $detalle . "',descripcion = '" . $descripcion . "',imagen_alt = '" . $altimagen . "',precio  = '" . $precio . "',usuarios_idusuarios = '" . $idUsuario . "'
    WHERE idproductos = '" . $id . "'";

    $exito = mysqli_query($con, $query);

    if($exito) {

        $query = "DELETE FROM productos_has_tags
                  WHERE productos_idproductos = '" . $id . "'";
        $exito = mysqli_query($con, $query);

        if(!$exito) {
            return false;
        }

        if(empty($tags)) {
            return true;
        }
        $values = [];

        foreach($tags as $tag) {
            $values[] = "(" . $id . ", '" . mysqli_real_escape_string($con, $tag) . "')";
        }

        $query = "INSERT INTO productos_has_tags (productos_idproductos, tags_idtags)
                  VALUES " . implode(', ', $values);
        $exito = mysqli_query($con, $query);

        if($exito) {
            return true;
        }
    }

    return false;
}

// Obtener toda la info del producto por id
function productoCompletoPorId($con, $id) {
    $id = mysqli_real_escape_string($con, $id);
    $query = "SELECT p.* , 
                GROUP_CONCAT(t.idtags, ' => ', t.nombre SEPARATOR ' , ') AS tags
            FROM productos p
            LEFT JOIN productos_has_tags pht
            ON p.idproductos = pht.productos_idproductos
            LEFT JOIN tags t
            ON t.idtags = pht.tags_idtags
            WHERE p.idproductos = '" . $id . "'
            GROUP BY p.idproductos";

    $res = mysqli_query($con, $query);
    return mysqli_fetch_assoc($res);
}

// Eliminamos un producto por id
function eliminarProducto($con, $id) {
    $id = mysqli_real_escape_string($con, $id);
    $query = "DELETE FROM productos WHERE idproductos = '" . $id . "'";
    $exec = mysqli_query($con, $query);

    return $exec;
}

