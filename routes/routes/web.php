<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

// Route::view('vista', 'welcome', ['app' => 'hola']);

// Route::get('prueba', function () {
//     return 'hola';
// });

Route::resource('pages', PageController::class);// 7 rutas posibles
