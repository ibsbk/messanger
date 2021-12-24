<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [UserController::class, 'mainView'])->name('/');

Route::get('/reg', [UserController::class, 'regView'])->name('reg');
Route::post('/reg', [UserController::class, 'regPost']);

Route::get('/auth', [UserController::class, 'authView'])->name('auth');
Route::post('/auth', [UserController::class, 'authPost']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/newMessage', [MessageController::class, 'newMessageView'])->name('newMessage')->middleware(\App\Http\Middleware\GuestMiddleware::class);
Route::post('/newMessage', [MessageController::class, 'newMessagePost'])->middleware(\App\Http\Middleware\GuestMiddleware::class);

Route::get('/allDialogs', [MessageController::class, 'allDialogsView'])->name('allDialogs')->middleware(\App\Http\Middleware\GuestMiddleware::class);

Route::get('/dialog/{id}', [MessageController::class, 'dialogView'])->middleware(\App\Http\Middleware\GuestMiddleware::class);
Route::post('/dialog/{id}', [MessageController::class, 'dialogPost'])->middleware(\App\Http\Middleware\GuestMiddleware::class);
