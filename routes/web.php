<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');
*/

Route::view('/{any}', 'home')
    ->middleware('auth')
    ->where('any', '.*');

//Limpiar cache: php artisan optimize:clear si al refrescar las rutas sale 404 not found
