<?php

$productos = obtenerProductos($con);


?>

	<section class="container space">
		<div>
			<h2 class="display-4"><?= $seccionData['title'];?></h2>
            <p class="lead pl-2">Administra todos los productos del sitio desde aquí!</p>
            
            <?php if($errorEstado !== null): ?>
                        <div class="errorEstado"><?= $errorEstado;?></div>
                <?php endif; ?>
                <?php if($avisoCorrecto !== null): ?>
                        <div class="avisoCorrecto"><?= $avisoCorrecto;?></div>
                <?php endif; ?>    

		</div>
		<div class="row">

        <div>
            <a href="index.php?s=crear-producto" class="btn-universal my-1 d-block mr-3">Crear nuevo producto</a> 
        </div>

        <table class="w-100">
            <tr >
                <th>ID</th>
                <th>Nombre</th>
                <th >Imagen</th>
                <th>Precio</th>
                <th class="text-center">Acciones</th>
            </tr>
          
            <?php 
    
                foreach($productos as $i => $producto):

            ?>

            <tr>
                <td><?= $producto['idproductos'] ?></td>
                <td><?= $producto['nombre'] ?></td>
                <td>
                    <img width="100" height="100" src="./imgs/thumbs/<?= $producto['imagen'] ?>" alt="">
                </td>
                <td>$ <?= $producto['precio'] ?></td>        
                <td class="text-center d-flex justify-content-center">
                    <div class="d-flex p-4">
                        <a href="index.php?s=editar-producto&id=<?= $producto['idproductos'] ?>" class="btn-universal my-1 d-block mr-3">Editar</a> 
                        <a href="acciones/eliminar-producto.php?id=<?= $producto['idproductos'] ?>" class="btn-universal my-1 d-block" >Eliminar</a> 
                    </div>

                </td>               
            </tr>

            <?php endforeach; ?>                                         

        </table> 

		</div>
	</section>