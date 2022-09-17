<?php
require_once 'main/conex.php';
require_once 'libraries/productos.php';
require_once __DIR__ . '/bootstrap/routes.php';

$seccion = $_GET['s'] ?? 'home';

if(!isset($seccionesPermitidas[$seccion])) {
    $seccion = "404";
}

$seccionData = $seccionesPermitidas[$seccion];

$errorEstado = sessionGetValue('status_error');
$avisoCorrecto = sessionGetValue('status_success');
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LOKE - Tienda Virtual - <?= $seccionData['title'];?> </title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/estilos.css">
		<link href="imgs/favicon.png" rel="icon"> </head>

	<body>
		<header class="container fondo3">
			<h1 class="d-none">Loke tienda Virtual</h1>
			<div class="row">
				<nav class=" col fixed-top navbar navbar-expand-lg navbar-light bg-dark">
					<a class="navbar-brand" href="index.php"> <img src="recursos/logo.png" alt="Logo Loke"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barra" aria-controls="barra" aria-expanded="false" aria-label="Menú Hamburguesa"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="barra">
						<ul class="navbar-nav text-center ml-auto">
							<li class="nav-item"> <a class="nav-link white" href="index.php">Home</a></li>
							<li class="nav-item"> <a class="nav-link" href="index.php?s=catalogo">Catálogo</a></li>
							<li class="nav-item"> <a class="nav-link" href="index.php?s=contacto">Contacto</a></li>
							<?php  if(!estaLogueado()): ?>
								<li class="nav-item"> <a class="nav-link" href="index.php?s=login">Ingreso</a></li>
							<?php else: ?>
								<li class="nav-item"> <a class="nav-link" href="index.php?s=panel">Panel</a></li>
								<li class="nav-item"> <a class="nav-link" href="acciones/logout.php">Salir</a></li>
							<?php endif; ?>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<main class="main-content">


			<?php

        require __DIR__ . '/secciones/' . $seccion . '.php';
        ?>
		</main>
		<footer class="container-fluid">
			<ul class="redes">
				<li>
					<a href="https://www.facebook.com" target="_blank"><img class="svg-icon" src="recursos/whatsapp.svg" alt="facebook"> </a>
				</li>
				<li>
					<a href="https://www.instagram.com" target="_blank"><img class="svg-icon" src="recursos/instagram.svg" alt="instagram"> </a>
				</li>
				<li>
					<a href="https://www.linkedin.com" target="_blank"><img class="svg-icon" src="recursos/telegram.svg" alt="linkedin"> </a>
				</li>
				<li>
					<a href="https://www.youtube.com" target="_blank"><img class="svg-icon" src="recursos/youtube.svg" alt="youtube"> </a>
				</li>
				<li>
					<a href="https://twitter.com" target="_blank"><img class="svg-icon" src="recursos/twitter.svg" alt="twitter"> </a>
				</li>
			</ul>
			<ul class="container">
                <li><strong>Alumno</strong></li>
                <li>Aguiar Oscar</li>
                <li>Programación II 2020</li>
				<li>5to Cuatrimestre</li>
                <li>Email: oscar.aguiar@davinci.edu.ar</li>
                <li>Escuela Da Vinci 2020</li>          
            </ul>
		</footer>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>    
		<script>
			$('.nav-item').on('click', function() {
				$(".navbar-collapse").collapse("hide");
			})
		</script>		
    </body>
	</html>