<?php

use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManageController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/video/{id}', [VideosController::class, 'show'])->name('videos.show');
Route::get('/videos', [VideosController::class, 'index'])->name('videos.index');


//Route::middleware(['auth'])->group(function () {
//    Route::get('/users', [UserController::class, 'index'])->name('users.index');
//    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
//});

Route::middleware(['auth', 'can:manage users'])->group(function () {
    Route::get('/users/manage', [UserManageController::class, 'index'])->name('users.manage.index');
    Route::get('/users/manage/create', [UserManageController::class, 'create'])->name('users.manage.create');
    Route::post('/users/manage', [UserManageController::class, 'store'])->name('users.manage.store');
    Route::get('/users/manage/{user}/edit', [UserManageController::class, 'edit'])->name('users.manage.edit');
    Route::put('/users/manage/{user}', [UserManageController::class, 'update'])->name('users.manage.update');
    Route::delete('/users/manage/{user}', [UserManageController::class, 'destroy'])->name('users.manage.destroy');
});

Route::middleware(['auth', 'can:manage videos'])->group(function () {
    Route::get('/videos/manage', [VideosManageController::class, 'index'])->name('videos.manage.index');
    Route::get('/videos/manage/create', [VideosManageController::class, 'create'])->name('videos.manage.create');
    Route::post('/videos/manage', [VideosManageController::class, 'store'])->name('videos.manage.store');
    Route::get('/videos/manage/{id}/edit', [VideosManageController::class, 'edit'])->name('videos.manage.edit');
    Route::put('/videos/manage/{id}', [VideosManageController::class, 'update'])->name('videos.manage.update');
    Route::delete('/videos/manage/{id}', [VideosManageController::class, 'destroy'])->name('videos.manage.destroy');
});

//Logout
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');
