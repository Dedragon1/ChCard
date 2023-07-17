<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models;
use App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TableObjectController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PassedTestController;
use App\Http\Controllers\ResultController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//User
Route::get('/user/list', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user/create', [UserController::class, 'create']);
Route::post('/user/{id}/update', [UserController::class, 'update']);
Route::post('/user/{id}/delete', [UserController::class, 'delete']);
Route::post('/user/{id}/restore', [UserController::class, 'restore']);

//Test
Route::get('/test/list', [TestController::class, 'index']);
Route::get('/test/{id}', [TestController::class, 'show']);
Route::post('/test/create', [TestController::class, 'create']);
Route::post('/test/{id}/update', [TestController::class, 'update']);
Route::post('/test/{id}/delete', [TestController::class, 'delete']);
Route::post('/test/{id}/restore', [TestController::class, 'restore']);

//Сategory
Route::get('/category/list', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::post('/category/create', [CategoryController::class, 'create']);
Route::post('/category/{id}/update', [CategoryController::class, 'update']);
Route::post('/category/{id}/delete', [CategoryController::class, 'delete']);
Route::post('/category/{id}/restore', [CategoryController::class, 'restore']);

//Table Object
Route::get('/table_object/list', [TableObjectController::class, 'index']);
Route::get('/table_object/{id}', [TableObjectController::class, 'show']);
Route::post('/table_object/create', [TableObjectController::class, 'create']);
Route::post('/table_object/{id}/update', [TableObjectController::class, 'update']);
Route::post('/table_object/{id}/delete', [TableObjectController::class, 'delete']);
Route::post('/table_object/{id}/restore', [TableObjectController::class, 'restore']);

//Notification
Route::get('/notification/list', [NotificationController::class, 'index']);
Route::get('/notification/{id}', [NotificationController::class, 'show']);

//Passed Test
Route::get('/passed_test/list', [PassedTestController::class, 'index']);
Route::get('/passed_test/{id}', [PassedTestController::class, 'show']);

//Result
Route::get('/result/list', [ResultController::class, 'index']);
Route::get('/result/{id}', [ResultController::class, 'show']);
