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
Flight::route('POST /store', function() {
    Flight::get('TelephoneController')->storePhone(Flight::request(), fn() => Flight::redirect('/'));
});

// Flight::route('POST /data/mahasiswa/store', function() {
//     Flight::get('mahasiswaController')->storeMahasiswa(fn() => Flight::redirect('/'), Flight::request());
// });


Flight::start();