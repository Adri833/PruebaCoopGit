<?php

//Inicialización entorno
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Includes
include(__DIR__ . '/src/functions.php');

$pdo = obtenerConexion();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$libro = false;

if ($id !== null && $id !== false) {
    $libro = obtenerLibro($pdo, $id);
}



include(__DIR__ . '/src/templates/ficha.tpl.php');
