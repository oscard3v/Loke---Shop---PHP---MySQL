<?php

	$productos = obtenerProductos($con);

?>
	<section class="container space">
		<div>
			<h2 class="display-4">Tecnología y accesorios</h2>
			<p class="lead pl-2">Todo el Stock - Envío a todo el País!</p>
		</div>
		<div class="row">
			<div class="cardlist w-100 d-flex  flex-wrap text-center justify-content-center">
            
            <?php 
    
                foreach($productos as $i => $producto):

            ?>

				<div class="carditem text-center m-2 m-2 flex-fill d-flex flex-column">
                    <div class="title p-2"><?= htmlspecialchars($producto['nombre']) ?></div>
                    <div class="image">
                        <img src="./imgs/thumbs/<?= htmlspecialchars($producto['imagen']) ?>" class="borde" width="200" height="200" alt="">
                    </div>
					<div class="content">
						<p class="p-2"><?= htmlspecialchars($producto['detalle']) ?></p>
					</div>
					<div class="cardfooter mt-auto"> <a href="index.php?s=ver-producto&id=<?= htmlspecialchars($producto['idproductos']) ?>" class="btn-universal w-100 d-block" class="card-link">Ver más</a> </div>
                </div>


            <?php endforeach; ?>                                         

			</div>
		</div>
	</section>