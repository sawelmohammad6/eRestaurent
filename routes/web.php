<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'my_home']);

Route::get('/home', [HomeController::class, 'index']);


Route::get('/add_food', [AdminController::class, 'add_food']);
Route::post('/upload_food', [AdminController::class, 'upload_food']);


Route::get('/view_food', [AdminController::class, 'view_food']);
Route::get('/delete_food/{id}', [AdminController::class, 'delete_food'])
    ->name('admin.delete_food');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
