<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Mini\Core\Router;

// Table des routes minimaliste
$routes = [
    ['GET', '/', [Mini\Controllers\HomeController::class, 'index']],
    ['GET', '/products', [Mini\Controllers\ProductController::class, 'index']],
    ['GET', '/products/create', [Mini\Controllers\ProductController::class, 'create']],
    ['POST', '/products/store', [Mini\Controllers\ProductController::class, 'store']],
    ['GET', '/products/show', [Mini\Controllers\ProductController::class, 'show']],
    ['GET', '/products/compatibility', [Mini\Controllers\ProductController::class, 'compatibility']],
    ['GET', '/products/edit', [Mini\Controllers\ProductController::class, 'edit']],
    ['POST', '/products/update', [Mini\Controllers\ProductController::class, 'update']],
    ['POST', '/products/delete', [Mini\Controllers\ProductController::class, 'delete']],
    ['POST', '/products/deleteAll', [Mini\Controllers\ProductController::class, 'deleteAll']],
    ['GET', '/arena', [Mini\Controllers\ArenaController::class, 'index']],
    ['POST', '/arena/battle', [Mini\Controllers\ArenaController::class, 'battle']],
    ['GET', '/arena/tournament', [Mini\Controllers\ArenaController::class, 'tournament']],
    ['POST', '/arena/tournament/run', [Mini\Controllers\ArenaController::class, 'runTournament']],
];

// Bootstrap du router
$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


