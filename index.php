<?php
require_once "controlador/LibroControlador.php";

$controlador = new LibroControlador();

// Si se solicita una acción específica como el de editar
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'editar':
        $controlador->editar();
        break;
    case 'index':
    default:
        $controlador->index();
        break;
}