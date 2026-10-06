<?php

use App\Http\Controllers\DoaController;
use App\Http\Controllers\JadwalShalatController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\QuranController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// Menampilkan semua produk

Route::get('/', [QuoteController::class, 'index']);


Route::get('/produk', function () {

    $produk = [
        [
            "id" => 1,
            "nama" => "Keyboard Mechanical",
            "harga" => 350000,
            "stok" => 15,
            "tersedia" => true
        ],
        [
            "id" => 2,
            "nama" => "Mouse Gaming",
            "harga" => 250000,
            "stok" => 20,
            "tersedia" => true
        ],
        [
            "id" => 3,
            "nama" => "Headset Gaming",
            "harga" => 450000,
            "stok" => 0,
            "tersedia" => false
        ],
        [
            "id" => 4,
            "nama" => "Monitor 24 Inch",
            "harga" => 1800000,
            "stok" => 8,
            "tersedia" => true
        ],
        [
            "id" => 5,
            "nama" => "Webcam HD",
            "harga" => 300000,
            "stok" => 12,
            "tersedia" => true
        ],
        [
            "id" => 6,
            "nama" => "Mousepad Gaming",
            "harga" => 120000,
            "stok" => 25,
            "tersedia" => true
        ],
        [
            "id" => 7,
            "nama" => "USB Hub",
            "harga" => 150000,
            "stok" => 0,
            "tersedia" => false
        ],
        [
            "id" => 8,
            "nama" => "SSD 512GB",
            "harga" => 750000,
            "stok" => 10,
            "tersedia" => true
        ],
        [
            "id" => 9,
            "nama" => "RAM 16GB",
            "harga" => 600000,
            "stok" => 7,
            "tersedia" => true
        ],
        [
            "id" => 10,
            "nama" => "Laptop Stand",
            "harga" => 200000,
            "stok" => 18,
            "tersedia" => true
        ]
    ];

    return response()->json($produk);
});


// Menampilkan satu produk berdasarkan ID
Route::get('/produk/{id}', function ($id) {

    $produk = [
        1 => [
            "id" => 1,
            "nama" => "Keyboard Mechanical",
            "harga" => 350000,
            "stok" => 15,
            "tersedia" => true
        ],
        2 => [
            "id" => 2,
            "nama" => "Mouse Gaming",
            "harga" => 250000,
            "stok" => 20,
            "tersedia" => true
        ],
        3 => [
            "id" => 3,
            "nama" => "Headset Gaming",
            "harga" => 450000,
            "stok" => 0,
            "tersedia" => false
        ],
        4 => [
            "id" => 4,
            "nama" => "Monitor 24 Inch",
            "harga" => 1800000,
            "stok" => 8,
            "tersedia" => true
        ],
        5 => [
            "id" => 5,
            "nama" => "Webcam HD",
            "harga" => 300000,
            "stok" => 12,
            "tersedia" => true
        ],
        6 => [
            "id" => 6,
            "nama" => "Mousepad Gaming",
            "harga" => 120000,
            "stok" => 25,
            "tersedia" => true
        ],
        7 => [
            "id" => 7,
            "nama" => "USB Hub",
            "harga" => 150000,
            "stok" => 0,
            "tersedia" => false
        ],
        8 => [
            "id" => 8,
            "nama" => "SSD 512GB",
            "harga" => 750000,
            "stok" => 10,
            "tersedia" => true
        ],
        9 => [
            "id" => 9,
            "nama" => "RAM 16GB",
            "harga" => 600000,
            "stok" => 7,
            "tersedia" => true
        ],
        10 => [
            "id" => 10,
            "nama" => "Laptop Stand",
            "harga" => 200000,
            "stok" => 18,
            "tersedia" => true
        ]
    ];

    if (!isset($produk[$id])) {
        return response()->json([
            "message" => "404 Page Tidak Ditemukan"
        ], 404);
    }

    return response()->json($produk[$id]);
});
 

Route::get('/quotes', [QuoteController::class, 'index']);

Route::resource('/quran', QuranController::class);

Route::resource('/doa', DoaController::class);

Route::get('/jadwal', [JadwalShalatController::class, 'index']);
Route::get('/jadwal/kabkota', [JadwalShalatController::class, 'kabkota']);
Route::get('/jadwal/data', [JadwalShalatController::class, 'jadwal']);



