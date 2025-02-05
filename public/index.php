<?php
require '../vendor/autoload.php';

use League\Plates\Engine as PlatesEngine;
use Apps\Controllers\TelephoneController;

// Tambahkan Plates ke Flight
Flight::set('plates', [PlatesEngine::class, __DIR__ . '/../src/views']);

// Route utama
Flight::route('/', [TelephoneController::class, 'index']);
Flight::route('/store', function() {
    $controller = new TelephoneController();
    $controller->store(fn() => Flight::redirect('/'));
});


Flight::start();