<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\DashboardController as UserDashboard;

Route::get('register',[RegisterController::class, 'index'])->name('register');
Route::post('register',[RegisterController::class, 'set'])->name('set.register');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'set'])->name('set.login');


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('post', [PostController::class, 'index'])->name('admin.post');
    Route::post('post', [PostController::class, 'create'])->name('set.post');
    Route::get('post/delete/{id}', [PostController::class, 'delete'])->name('delete.post');
});

Route::prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboard::class, 'index'])->name('user.dashboard');
    Route::get('/logout', [UserDashboard::class, 'index'])->name('user.logout');

    });


});

// Route::get('/user/logout',[LoginController::class, 'userLogOut'])->name('users.logOut');