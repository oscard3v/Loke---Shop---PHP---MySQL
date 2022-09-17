<?php
session_start();

require_once  __DIR__ . '/../libraries/sessions.php';
require_once  __DIR__ . '/../libraries/autenticador.php';
require_once  __DIR__ . '/../libraries/usuarios.php';

// Datos de la base de datos
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_DATABASE = "loke";
const DB_CHARSET = "utf8mb4";

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Si no conecta lo manda al 404
if(!$con) {
    header('Location: index.php?s=404');
    exit;
}

mysqli_set_charset($con, DB_CHARSET);