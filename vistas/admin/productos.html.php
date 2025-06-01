<h2>Gestión de Posts</h2>
<form action="productos.php" method="post">
	<div class="row g-3 align-items-center">
		<div class="col-1">
			<label for="inputPassword6" class="col-form-label">ID</label>
			<div class="input-group mb-3">
			<input class="form-control" type="text" name="id" value="<?php echo isset($posts) ? $posts['id'] : '' ?>" readonly>
			</div>
		</div>
		<div class="col-auto mb-3">
			<label for="inputPassword6" class="col-form-label">Titulo</label>
			<input class="form-control" type="text" name="titulo" value="<?php echo isset($posts) ? $posts['titulo'] : '' ?>" required>
		</div>
		<div class="col-auto mb-3">
			<label for="inputPassword6" class="col-form-label">Contenido</label>
			<input class="form-control" type="text" name="contenido" value="<?php echo isset($posts) ? $posts['contenido'] : '' ?>" required>
		</div>					

	</div>
	<input class="btn btn-success mb-3" type="submit" value="Guardar">
	<a class="btn btn-primary mb-3" href="productos.php">Nuevo</a>
	
	<div class="col-auto mb-3" style="float: right;">
		<?php include "paginacion.html.php" ?>
		</div>
</form>

<!-- Campo de buscar -->
<div class="col-auto mb-3">
    <div class="col-md-6">
        <form action="productos.php" method="get" class="d-flex">
			
            <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar posts..." value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : '' ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</div>

<?php if(isset($posts)): ?>
<form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
	<input type="hidden" name="id" value="<?php echo $posts['id'] ?>">
  <input class="form-control" type="file" name="foto" id="formFileMultiple" multiple>
</div>
<input class="btn btn-success mb-3" type="submit" value="subir">
</form>
<img style="width: 150px;" src="imagenes/productos/<?php echo $posts['id'] ?>.jpg">

<?php endif; ?>

<?php /*if (isset($producto)): ?>
	<img src="barcode.php?f=svg&s=ean-13-nopad&d=<?= $producto['codigo_barras'] ?>">
<?php endif;*/ ?>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover text-center shadow-lg">
	<tr>
		<th>ID</th>
		<th>Foto</th>
		<th>Titulo</th>
		<th>Contenido</th>
		<th>Fecha</th>
		<th>Usuario</th>
		<th>Usuario ID</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($post as $posts): ?>
		<tr>
			<td class="text-end"><?= $posts['id'] ?></td>
			<td><img style="width: 50px;" src="imagenes/productos/<?php echo $posts['id'] ?>.jpg"></td>
			<td><?= $posts['titulo'] ?></td>
			<td class="text-end"><?= $posts['contenido'] ?> </td>
			<td class="text-end"><?= $posts['fecha'] ?></td>
			<td class="text-end"><?= $posts['usuario'] ?></td>
			<td class="text-end"><?= $posts['usuario_id'] ?></td>
			<td class="text-center"><a class="btn btn-primary" href="productos.php?editar=<?= $posts['id'] ?>">Editar</a> <a class="btn btn-danger" href="productos.php?borrar=<?= $posts['id'] ?>">Borrar</a></td>
		</tr>
	<?php endforeach; ?>
</table>
</div>