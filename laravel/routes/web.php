<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FichaController;


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

Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/ficha', [FichaController::class, 'mostrarFicha']);


# Rota para registar usuário. Tem uma api, usa o Controller do usuário. E també pessamos um nome
# que será utilizado na view.
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [UserController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [UserController::class, 'dashboard']);


