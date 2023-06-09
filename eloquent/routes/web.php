<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/', function () {
    // $posts = Post::all();
    $posts = Post::where('id', '>=', '10')
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();

    foreach($posts as $post){
        echo "$post->id $post->title <br>";
    }
});
