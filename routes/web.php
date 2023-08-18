<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'checkLogin']);
Route::get('/signup', [AuthController::class, 'showSignUp']);
Route::post('/signup', [AuthController::class, 'SignUp']);
Route::get('/logout', [AuthController::class, 'showLogout']);

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/content', [ContentController::class, 'index']);
    Route::get('/content/create', [ContentController::class, 'create']);
    Route::get('/content/{id}/edit', [ContentController::class, 'edit']);

    Route::post('/content', [ContentController::class, 'store']);
    Route::put('/content/{id}', [ContentController::class, 'update']);
    Route::delete('/content/{id}/status', [ContentController::class, 'status']);
    Route::delete('/content/{id}/delete', [ContentController::class, 'destroy']);
});

Route::get('/vote', [VoteController::class, 'index']);
Route::get('/vote/{id}/create', [VoteController::class, 'create']);
Route::post('/vote/{id}', [VoteController::class, 'store']);




