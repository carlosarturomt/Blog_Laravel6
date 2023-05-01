<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', 'UserController@index'); //Listar
// Route::post('users', 'UserController@store')->name('users.store'); //Salvar
// Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy'); //Eliminar

Route::controller(UserController::class)->group(function() {

    Route::get('/',                'index');
    Route::post('users', 'store')->name('users.store');
    Route::delete('users/{user}', 'destroy')->name('users.destroy');

});
