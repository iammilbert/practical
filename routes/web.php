<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

// views
Route::get('/', [AuthController::class, 'home'])->name('auths.home');
Route::get('/loginpage', [AuthController::class, 'loginpage'])->name('auths.loginpage');
Route::get('/dashboard', [ItemController::class, 'dashboard'])->name('auths.dashboard');
Route::get('/itempage', [ItemController::class, 'itempage'])->name('items.add');


// Authentication routes
Route::post('/login', [AuthController::class, 'login'])->name('auths.login');
Route::post('/register', [AuthController::class, 'store'])->name('auths.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auths.logout');


// Items
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::post('/create', [ItemController::class, 'store'])->name('items.create');
Route::delete('destroy/{id}', [ItemController::class, 'delete'])->name('items.destroy');
Route::patch('update/{id}', [ItemController::class, 'update'])->name('items.update');



// Route::as('users.')->group(function () {
//     Route::get('/', [ UserController::class, 'index']);
//     Route::post('create', [ UserController::class, 'store']);
//     Route::get('/{id}', [ UserController::class, 'show']);
//     // Route::patch('/{id}', [ UserController::class, 'update']);
//     Route::delete('/{id}', [ UserController::class, 'destroy']);
// });


// Route::as('items.')->group(function () {
//     Route::get('/', [ ItemController::class, 'index']);
//     Route::post('/', [ ItemController::class, 'store']);
//     Route::get('/{id}', [ ItemController::class, 'show']);
//     // Route::patch('/{id}', [ ItemController::class, 'update']);
//     Route::delete('/{id}', [ ItemController::class, 'destroy']);
// });
