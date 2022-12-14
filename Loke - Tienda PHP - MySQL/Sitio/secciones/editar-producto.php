<?php
require_once './libraries/productos.php';
require_once './libraries/tags.php';

    accesoAdmin();
    $tags = obtenerTags($con);


    $errores = sessionGetValue('errores',[]);
    $datosAnteriores = sessionGetValue('old_data',[]);

    if(empty($datosAnteriores)) {

        $producto = productoCompletoPorId($con, $_GET['id']);
        $tagsProductos = explode(',', $producto['tags']);
    
        $tagsId = [];
        foreach($tagsProductos as $tag) {
            $dataTag = explode(' => ', $tag);
            $tagsId[] = $dataTag[0];
        }
        
        $datosAnteriores = [
            'producto' => $producto['nombre'],
            'detalle' => $producto['detalle'],
            'descripcion' => $producto['descripcion'],
            'altimagen' => $producto['imagen_alt'],
            'precio' => $producto['precio'],
            'tags' => $tagsId
        ];
    }

?>
<section class="container space">
	<h2 class="h2"><?= $seccionData['title'];?></h2>
	<div>

    
		<form action="./acciones/editar-producto.php?id=<?= $_GET['id'];?>" method="post" enctype="multipart/form-data" class="w-100">


			<div class="form-group">
				<label for="producto">Nombre de producto</label>
				<input type="text" class="form-control form-control-lg" id="producto" name="producto" placeholder="Ingrese el nombre del producto..." autocomplete="off" value="<?= $datosAnteriores['producto'] ?? ''; ?>"> 

                <?php if(isset($errores['producto'])): ?>
                    <div id="error-producto" class="red"><?= $errores['producto']; ?></div>
                <?php endif; ?>
            </div>

			<div class="form-group">
				<label for="detalle">Detalle de producto</label>
				<input type="text" class="form-control form-control-lg" id="detalle" name="detalle" placeholder="Ingrese el detalle del producto..." autocomplete="off" value="<?= $datosAnteriores['detalle'] ?? ''; ?>"> 

                <?php if(isset($errores['detalle'])): ?>
                    <div id="error-detalle" class="red"><?= $errores['detalle']; ?></div>
                <?php endif; ?>
            </div>

			<div class="form-group">
				<label for="descripcion">Descripci??n del producto</label>
				<input type="text" class="form-control form-control-lg" id="descripcion" name="descripcion" placeholder="Ingrese la descripci??n del producto..." autocomplete="off" value="<?= $datosAnteriores['descripcion'] ?? ''; ?>"> 

                <?php if(isset($errores['descripcion'])): ?>
                    <div id="error-descripcion" class="red"><?= $errores['descripcion']; ?></div>
                <?php endif; ?>
            </div>

			<div class="form-group">
				<label for="altimagen">Alt de imagen</label>
				<input type="text" class="form-control form-control-lg" id="altimagen" name="altimagen" placeholder="Ingrese el alt de la imagen..." autocomplete="off" value="<?= $datosAnteriores['altimagen'] ?? ''; ?>"> 

                <?php if(isset($errores['altimagen'])): ?>
                    <div id="error-altimagen" class="red"><?= $errores['altimagen']; ?></div>
                <?php endif; ?>
            </div>

			<div class="form-group">
				<label for="precio">Precio del producto</label>
				<input type="number" class="form-control form-control-lg" id="precio" name="precio" placeholder="Ingrese el precio del producto..." autocomplete="off" value="<?= $datosAnteriores['precio'] ?? ''; ?>"> 

                <?php if(isset($errores['precio'])): ?>
                    <div id="error-precio" class="red"><?= $errores['precio']; ?></div>
                <?php endif; ?>
            </div>

            <div class="mt-2 mb-5">    
                <fieldset class="w-100 d-flex justify-content-between ">
                    <legend class="w-100 label pb-2">Caracter??sticas del producto</legend>

                    <?php
            foreach($tags as $tag): ?>
 
                <label><input type="checkbox" name="tags[]" value="<?= $tag['idtags'];?>" <?php

                    if(isset($datosAnteriores['tags']) && in_array($tag['idtags'], $datosAnteriores['tags'])) {
                        echo "checked";
                    }
                ?>> <?= ucfirst($tag['nombre']);?></label>
            <?php endforeach; ?>                    
                </fieldset>
            </div>   


			<div class="d-flex justify-content-end">
				<div class="mb-5">
					<input type="reset" value="Limpiar" class="btn btn-outline-warning btn-sm">
					<input type="submit" value="Enviar" class="btn btn-outline-success ml-4 btn-sm"> </div>
			</div>
		</form>
	</div>
</section>