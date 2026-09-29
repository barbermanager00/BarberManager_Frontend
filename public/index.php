<?php

declare(strict_types=1);

// 1. CARGA DE DEPENDENCIAS Y CONFIGURACIÓN
require_once __DIR__ . '/../vendor/autoload.php';      // Autoload de Composer (Eloquent)
require_once __DIR__ . '/../config/autoload.php';      // Autoload de clases App\*
require_once __DIR__ . '/../config/database.php';      // Conexión a la DB
require_once __DIR__ . '/../models/Barberia.php';      // Modelo de la tabla barberias
require_once __DIR__ . '/../models/Barbero.php';       // Modelo de la tabla barberos
require_once __DIR__ . '/../models/Turno.php';         // Modelo de la tabla turnos

use App\Router;
use App\Controllers\TurnoController;
use App\Controllers\BarberoController;

// 2. INICIALIZAR EL ENRUTADOR DE LA API
$router = new Router();

// ============================================
// REGISTRO DE RUTAS DE LA API REST
// ============================================

// Health Check / Estado de la API (GET /)
$router->get('/', function () {
    header('Content-Type: application/json');
    echo json_encode([
        "ok" => true,
        "name" => "Barber Manager API",
        "version" => "1.0.0",
        "status" => "active"
    ], JSON_UNESCAPED_UNICODE);
});

// --- RUTAS DE TURNOS ---
$router->get('/turnos', [TurnoController::class, 'listar']);
$router->post('/turnos', [TurnoController::class, 'crear']);

// --- RUTAS DE BARBERÍAS ---
$router->get('/barber', [BarberoController::class, 'listarBarberias']);
$router->post('/barber', [BarberoController::class, 'registrarBarberia']);
$router->get('/barber/{id}', [BarberoController::class, 'obtenerBarberia']);

// --- RUTAS DE BARBEROS ---
$router->get('/barberos', [BarberoController::class, 'listar']);
$router->post('/barberos', [BarberoController::class, 'registrar']);

// 3. DESPACHAR SOLICITUD ENTRANTE
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
