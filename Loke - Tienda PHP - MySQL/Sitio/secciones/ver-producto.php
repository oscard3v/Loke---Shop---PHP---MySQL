<?php

require './libraries/tags.php';
require './libraries/imagenes.php';

    $producto = obtenerProductosPorId($con, $_GET['id'])[0];
    $tagsProducto = obtenerTagsPorProducto($con,$_GET['id']);

    if(!isset($producto)) {
        header('Location: index.php');
        exit;
    }


?>


<section class="container space">
    <div>
        <h2 class="display-4">Tecnología y accesorios</h2>
        <p class="lead pl-2">Todo el Stock - Envío a todo el País!</p>
    </div>
    <div class="row">

        <div>
            <a href="index.php?s=catalogo" class="btn-universal w-100 d-block m-2 text-center" class="card-link">Volver</a> 
        </div>    

        <div class="cardlist w-100 d-flex  flex-wrap text-center justify-content-center">



            <div class="carditem text-centerm-2 m-2 flex-fill">
                <div class="title p-2"><?= htmlspecialchars($producto['nombre']) ?></div>
                <div class="image">
                    <img src="./imgs/thumbs/<?= htmlspecialchars($producto['imagen']) ?>" class="borde" width="200" height="200" alt="">
                </div>
                <div class="content px-5 pt-2">

                    <div> <b>Descripción del producto</b> </div>
                    <p class="mb-2"><?= htmlspecialchars($producto['detalle']) ?></p>

                    <div class="mt-4"> <b>Texto del producto</b> </div>
                    <p class="p-2"><?= htmlspecialchars($producto['descripcion']) ?></p>
                    

                    <div class="mt-4"> <b>Características del producto</b> </div>
                    <p class="p-2">
                    <?php foreach($tagsProducto as $tag ): ?>

                        <span class="tag"><?= ucfirst($tag['nombre']) ?></span>
                    
                    <?php endforeach; ?>
                </p>

                </div>
                <div class="cardfooter p-2"> 
                    <a href="#" class="btn-universal w-100 d-block" class="card-link">Comprar - $<?= htmlspecialchars($producto['precio']) ?></a> 
                </div>
            </div>


        </div>    

    </div>
</section>
