<?php
// routes/web.php
use App\Http\Controllers\SmartphoneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;

// Page d'accueil

// Routes pour les smartphones

Route::get('/', [SmartphoneController::class, 'home'])->name('home');
Route::get('/smartphones', [SmartphoneController::class, 'index'])->name('smartphones.index');
Route::get('/smartphones{smartphone}', [SmartphoneController::class, 'create'])->name('smartphones.create');
Route::post('/smartphones', [SmartphoneController::class, 'store'])->name('smartphones.store');
Route::get('/smartphones/{smartphone}', [SmartphoneController::class, 'show'])->name('smartphones.show');
Route::get('/smartphones/{smartphone}/edit', [SmartphoneController::class, 'edit'])->name('smartphones.edit');
Route::put('/smartphones/{smartphone}', [SmartphoneController::class, 'update'])->name('smartphones.update');
Route::delete('/smartphones/{smartphone}', [SmartphoneController::class, 'destroy'])->name('smartphones.destroy');
Route::resource('smartphones', SmartphoneController::class);

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('auth.doLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('auth.dashboard');
    Route::get('/api/smartphones/search', [SmartphoneController::class, 'search'])->name('smartphones.search');


//Route::get('dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');


