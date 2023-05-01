<?php

use App\Models\Pos;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('eloquent', function () {
    // $poss = Pos::all();
    $poss = Pos::where('id', '>=', '20') // Los busca por 'id' igual o mayores a 20
        ->orderBy('id', 'desc') // Se ordenan por 'id9 en orden descendente
        ->take(3) //Solo se reciben 3 elementos
        ->get();

    foreach ($poss as $pos) {
        echo "$pos->id $pos->title <br>";
    }
});

Route::get('poss', function () {
    $poss = Pos::get();

    foreach ($poss as $pos) {
        echo "
        $pos->id
        <strong>{$pos->user->get_name}</strong> <!-- En llaves porque tienen varios niveles -->
        $pos->get_title
        <br>
        ";
    }
});

Route::get('users', function () {
    // $users = User::get();
    $users = User::all();

    foreach ($users as $user) {
        echo "
        $user->id
        <strong>{$user->get_name}</strong> <!-- En llaves porque tienen varios niveles -->
        {$user->poss->count()} <!-- En llaves porque tienen varios niveles -->
        <br>
        ";
    }
});

Route::get('collections', function () {
    $users = User::all();

    //dd($users); //muestra los datos de los usuarios
    //dd($users->contains(5)); // muestra lo que contenga el elemento #X
    // dd($users->except([1, 2, 3]));  //muestra todo excepto x, x, x...
    //dd($users->only(4)); // trae solamente el elemento X
    //dd($users->find(4)); // busca el elemento X
    dd($users->load('poss')); // traeme los 'usuarios' cargando la relación con los 'post'
});

Route::get('serialization', function () {
    $users = User::all();

    // dd($users->toArray());
    $user = $users->find(1);
    // dd($user);
    dd($user->toJson());
});
