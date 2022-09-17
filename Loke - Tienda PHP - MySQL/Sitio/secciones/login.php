<?php

    // Obtenemos un array con posibles errores pasados.
    $errores = sessionGetValue('errores',[]);

    // Obtenemos un array con posible información pre-cargada, para recuperarla y establecerla nuevamente.
    $datosAnteriores = sessionGetValue('old_data',[]);

?>
<section class="container space">
	<h2 class="h2"><?= $seccionData['title'];?></h2>
	<div>
		<form action="./acciones/loguearse.php" method="post" class="w-100">

		<?php if($errorEstado !== null): ?>
                        <div class="errorEstado"><?= $errorEstado;?></div>
                <?php endif; ?>
                <?php if($avisoCorrecto !== null): ?>
                        <div class="avisoCorrecto"><?= $avisoCorrecto;?></div>
                <?php endif; ?>       

			<div class="form-group">
				<label for="email">Email de usuario</label>
				<input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Ingrese su email..." autocomplete="off" value="<?= $datosAnteriores['email'] ?? ''; ?>"> 
				<small class="form-text text-muted">No compartiremos tus datos con nadie.</small> 

                <?php if(isset($errores['email'])): ?>
                    <div id="error-email" class="red"><?= $errores['email']; ?></div>
                <?php endif; ?>

            </div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Ingrese su contraseña..." value="<?= $datosAnteriores['password'] ?? ''; ?>"> 
				

                <?php if(isset($errores['password'])): ?>
                    <div id="error-password" class="red"><?= $errores['password']; ?></div>
                <?php endif; ?>

            </div>

			<div class="d-flex justify-content-end">
				<div class="mb-5">
					<input type="reset" value="Limpiar" class="btn btn-outline-warning btn-sm">
					<input type="submit" value="Enviar" class="btn btn-outline-success ml-4 btn-sm"> </div>
			</div>
		</form>
	</div>
</section>