<?php

//Inicialización entorno
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Includes
include(__DIR__ . '/src/functions.php');

$pdo = obtenerConexion();

$librosDisponibles = contarDisponibles($pdo);

include(__DIR__ . '/src/templates/index.tpl.php');
