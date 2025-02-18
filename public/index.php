<?php
require '../vendor/autoload.php';

use League\Plates\Engine as PlatesEngine;
use Apps\Controllers\TelephoneController;

// Tambahkan Plates ke Flight
Flight::set('plates', [PlatesEngine::class, __DIR__ . '/../src/views']);
// atur kontrol
Flight::set('TelephoneController', new TelephoneController());

// rute utama
Flight::route('GET /', [TelephoneController::class, 'index']);

// rute simpan
Flight::route('POST /data/simpan', function() {
    Flight::get('TelephoneController')->storePhone(Flight::request(), fn() => Flight::redirect('/'));
});

Flight::route('POST /data/hapus', function() {
    Flight::get('TelephoneController')->deletePhone(Flight::request(), fn() => Flight::redirect('/'));
});


Flight::start();