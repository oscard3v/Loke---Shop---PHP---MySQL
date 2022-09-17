<?php
require_once __DIR__ . '/usuarios.php';

// Autentica al usuario
function autenticar($con,$email,$pass) {
    $usuario = usuarioPorEmail($con,$email);
    if($usuario !== null) {
        if(password_verify($pass, $usuario['password'])) {

            setearUsuario([
                'user_id' => $usuario['idusuarios'],
                'user_email' => $usuario['email']
            ]);
            return true;
        }
    } 
    return false;
}

// Comprueba si el usuario es admin
function accesoAdmin(){
    if(!isset($_SESSION['usuario'])){
        header('Location: ./index.php?s=home');
        exit;
    }
}

// Establece los datos del usuario
function setearUsuario($datos) {
    $_SESSION['usuario'] = $datos;
}

// Obtenemos los datos del usuario
function obtenerUsuario() {
    return $_SESSION['usuario'];
}

// Borramos los datos del usuario
function desconectar(){
    unset($_SESSION['usuario']);
}

// Verificamos si el usuario está autenticado
function estaLogueado() {
    return isset($_SESSION['usuario']);
}