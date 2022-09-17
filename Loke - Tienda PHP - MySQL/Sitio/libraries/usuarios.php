<?php

// Obtenemos usuario por email
function usuarioPorEmail($con, $email) {
    $email = mysqli_real_escape_string($con, $email);

    $query = "SELECT * FROM usuarios WHERE email = '" . $email . "'";
    $res = mysqli_query($con, $query);

    if($fila = mysqli_fetch_assoc($res)) {
        return $fila;
    } else {
        return null;
    }
}

// Obtenemos la id del usuario autenticado
function obtenerIdUsuario(){
    if(isset($_SESSION['usuario'])){
        return $_SESSION['usuario']['user_id'];
    }
    return false;
}