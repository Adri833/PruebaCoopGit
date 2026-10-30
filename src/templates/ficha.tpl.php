<?php

/** @var array|false $libro */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>

<body>
    <?php if (is_array($libro)): ?>
        <h1>Ficha del libro</h1>
        <ul>
            <li><strong>ID:</strong> <?= htmlspecialchars($libro['id']) ?></li>
            <li><strong>ISBN:</strong> <?= htmlspecialchars($libro['isbn']) ?></li>
            <li><strong>Titulo:</strong> <?= htmlspecialchars($libro['titulo']) ?></li>
            <li><strong>Autor:</strong> <?= htmlspecialchars($libro['autor']) ?></li>
            <li><strong>Año:</strong> <?= htmlspecialchars($libro['anio']) ?></li>
            <li><strong>Género:</strong> <?= htmlspecialchars($libro['genero']) ?></li>
            <li><strong>Género:</strong> <?= htmlspecialchars($libro['disponible']? 'Disponible' : 'Prestado') ?></li>
        </ul>
    <?php else: ?>
        <p>Libro no encontrado</p>
    <?php endif; ?>
</body>

</html>