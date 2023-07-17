<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;

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

// Route::post('/user/list', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'index']);
// Route::post('/user/{id}', [UserController::class, 'show'])->name('user.show');
// Route::post('/user/{id}', 'UserController@show');
// Route::post('/user/update/{id}', [UserController::class, 'update']);