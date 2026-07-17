<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DE LIBROS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <h1 class="text-center p-3 text-secondary">CRUD DE LIBROS</h1>

    <div class="container-fluid row">
        <!-- Formulario de registro de la Izquierda -->
        <form class="col-4 p-3" method="POST" action="index.php">
            <h3 class="text-center text-secondary">Registro de Libros</h3>
            
            <?= isset($mensaje) ? $mensaje : "" ?>

            <div class="mb-3">
                <label class="form-label">Título del Libro</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Autor</label>
                <input type="text" class="form-control" name="autor" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Editorial</label>
                <input type="text" class="form-control" name="editorial" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Año de Publicación</label>
                <input type="number" class="form-control" name="anio_publicacion" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" required>
            </div>
            
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
        <!-- Tabla de libros en la derecha -->
        <div class="col-8 p-4">
            <table class="table table-hover">
                <thead class="table-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Año</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($libros as $datos): ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= htmlspecialchars($datos->titulo) ?></td>
                            <td><?= htmlspecialchars($datos->autor) ?></td>
                            <td><?= htmlspecialchars($datos->editorial) ?></td>
                            <td><?= $datos->anio_publicacion ?></td>
                            <td>$<?= number_format($datos->precio, 2) ?></td>
                            <td>
                                <!-- Botón de editar-->
                                <a href="index.php?action=editar&id=<?= $datos->id ?>" class="btn btn-sm btn-warning text-white">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Botón de eliminar-->
                                <a onclick="return confirm('¿Estás seguro de eliminar este libro?')" href="index.php?eliminar_id=<?= $datos->id ?>" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>