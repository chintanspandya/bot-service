<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\AdministratorController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdministratorController::class, 'index'])->name('admin.index');

        Route::resource('user', UserController::class);
        Route::resource('template', TemplateController::class);
        Route::resource('question', QuestionController::class);
    });

    Route::get('/my-profile', [MyProfileController::class, 'index'])->name('my-profile');
    Route::post('/my-profile', [MyProfileController::class, 'update'])->name('my-profile.update');
    Route::post('/change-password', [MyProfileController::class, 'change_password'])->name('my-profile.change-password');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
