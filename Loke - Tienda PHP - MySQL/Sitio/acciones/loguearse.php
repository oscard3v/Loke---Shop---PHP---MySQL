<?php
require_once __DIR__ . '/../main/conex.php';
require_once __DIR__ . '/../libraries/autenticador.php';

// Datos que envia el usuario
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$errores = [];

// Comprobamos que si hay errores
if(empty($email)) {
    $errores['email'] = "Debe escribir un correo de email.";
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = "El email debe ser válido. Ej: email@hotmail.com";
}
if(empty($password)) {
    $errores['password'] = "Debes escribir una contraseña de usuario.";
} 

if(!empty($errores)) {
    $_SESSION['old_data'] = $_POST;
    $_SESSION['errores'] = $errores;
    header('Location: ../index.php?s=login');
    exit;
}

// Logeamos al usuario
if(autenticar($con, $email, $password)) {
    header('Location: ../index.php?s=home');
    exit;
} else {
    $_SESSION['old_data'] = $_POST;
    $_SESSION['status_error'] = "Los datos son erroneos.";
    header('Location: ../index.php?s=login');
    exit;
}

