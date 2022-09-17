<?php
/*
Acá van a ir todas las secciones de nuestro sitio.
Típicamente, las URLs (en nuestro caso, las secciones) de un sitio se les llaman "rutas".
*/
// Creamos un array donde vamos a definir las secciones permitidas de mi sitio.
// El nombre de la seccion va como clave en el array.
$seccionesPermitidas = [
    'home' => [
        'title' => 'Página principal',
    ],
    'catalogo' => [
        'title' => 'Últimos productos'
    ],
    'ver-producto' => [
        'title' => 'Ver producto'
    ],
    'productos-destacados' => [
        'title' => 'Productos Destacados'
    ],
    'contacto' => [
        'title' => 'Contacto'
    ],
    '404' => [
        'title' => 'Página no encontrada'
    ],
    'login' => [
        'title' => 'Ingreso al panel'
    ],
    'panel' => [
        'title' => 'Panel de control'
    ],
    'crear-producto' => [
        'title' => 'Crea un nuevo producto'
    ],
    'editar-producto' => [
        'title' => 'Editar un producto'
    ],
];