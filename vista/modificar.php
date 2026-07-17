<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">Modificar Libro</h3>
        
        <div class="mb-3">
            <label class="form-label">Título del Libro</label>
            <input type="text" class="form-control" name="titulo" value="<?= htmlspecialchars($libro->titulo) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" value="<?= htmlspecialchars($libro->autor) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Editorial</label>
            <input type="text" class="form-control" name="editorial" value="<?= htmlspecialchars($libro->editorial) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Año de Publicación</label>
            <input type="number" class="form-control" name="anio_publicacion" value="<?= $libro->anio_publicacion ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" value="<?= $libro->precio ?>">
        </div>
        
        <div class="d-flex justify-content-between">
            <a href="index.php" class="btn btn-secondary">Atrás</a>
            <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Guardar Cambios</button>
        </div>
    </form>
</body>
</html>