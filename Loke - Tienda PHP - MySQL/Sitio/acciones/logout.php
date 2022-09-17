<?php
require_once '../main/conex.php';

// Desconectamos al usuario.
desconectar();
header('Location: ../index.php?s=login');