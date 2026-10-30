<?php

function dump($var)
{
    echo '<pre>' . print_r($var, 1) . '</pre>';
}

function obtenerConexion(): PDO
{
    $host     = 'localhost';
    $db       = 'biblioteca';
    $user     = 'root';
    $password = '';
    $charset  = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        return new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        exit("No se puede conectar con la base de datos" . $e);
    }
}

function contarDisponibles(PDO $pdo): int {
    $sql = "SELECT COUNT(*) FROM libros WHERE disponible = 1";
    $stmt = $pdo->query($sql);

    return $stmt->fetchColumn();
}

function obtenerLibro(PDO $pdo, int $id): array|false {
    $sql = "SELECT * FROM libros WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    return $stmt->fetch();
}

function listarLibros(PDO $pdo, ?string $genero = null):array {
    $sql = "";
    if (is_null($genero)) {
        $sql = "SELECT * FROM libros ORDER BY titulo ASC";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll();
    } else {
        $sql = "SELECT * FROM libros WHERE genero = :genero";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':genero' => $genero]);

        return $stmt->fetchAll();
    }
}
