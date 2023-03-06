<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/hola', function () {
    echo '<p>Bienvenidos</p>';
});

Route::get('/nombre/{nombre}', function ($nombre) {
    echo '<p>Hola ' . $nombre . '</p>';
});

Route::get('/contacto', function () {
    return view('contacto');
});


Route::get('/categorias','App\Http\Controllers\CategoriesController@index');


Route::get('/mostrar-fecha', function () {
    date_default_timezone_set('America/Panama');
    $date = date('m-d-Y');
    echo '<p>La fecha actual es: ' . $date . '</p>';
});
