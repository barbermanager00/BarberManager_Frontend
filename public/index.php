<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';      
require_once __DIR__ . '/../config/autoload.php';      
require_once __DIR__ . '/../config/database.php';      
require_once __DIR__ . '/../models/Barberia.php';      
require_once __DIR__ . '/../models/Barbero.php';       
require_once __DIR__ . '/../models/Turno.php';         

use App\Controllers\TurnoController;
use App\Controllers\BarberoController;
use App\Router;

$router = new Router();

// Redirigir el index a la pantalla inicial (splash.html)
$router->get('/', function() {
    header('Location: /Barber_Manager/splash.html');
    exit;
});

// API Endpoints para Autenticación y Usuarios
$router->get('/api/auth/me', [BarberoController::class, 'me']);
$router->get('/api/google-auth', [BarberoController::class, 'googleAuth']);
$router->get('/api/google-callback', [BarberoController::class, 'googleCallback']);
$router->post('/api/login-email', [BarberoController::class, 'loginEmailRequest']);
$router->post('/api/login-email-confirm', [BarberoController::class, 'loginEmailConfirm']);
$router->post('/api/logout', [BarberoController::class, 'logout']);
$router->post('/api/perfil', [BarberoController::class, 'guardarPerfil']);

// API Endpoints para Empresa
$router->post('/api/nueva-empresa', [BarberoController::class, 'guardarEmpresa']);

// API Endpoints para Turnos
$router->post('/api/turnos', [TurnoController::class, 'crear']);
$router->get('/api/turnos', [TurnoController::class, 'listar']);

// API Endpoints para Barberos
$router->get('/api/barberos', [BarberoController::class, 'listar']);

$router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
