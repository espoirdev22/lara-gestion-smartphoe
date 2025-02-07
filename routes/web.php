<?php
// routes/web.php
use App\Http\Controllers\SmartphoneController;
use Illuminate\Support\Facades\Route;
// Page d'accueil

// Routes pour les smartphones

Route::get('/', [SmartphoneController::class, 'home'])->name('home');
Route::get('/smartphones', [SmartphoneController::class, 'index'])->name('smartphones.index');
Route::get('/smartphones/create', [SmartphoneController::class, 'create'])->name('smartphones.create');
Route::post('/smartphones', [SmartphoneController::class, 'store'])->name('smartphones.store');
Route::get('/smartphones/{smartphone}', [SmartphoneController::class, 'show'])->name('smartphones.show');
Route::get('/smartphones/{smartphone}/edit', [SmartphoneController::class, 'edit'])->name('smartphones.edit');
Route::put('/smartphones/{smartphone}', [SmartphoneController::class, 'update'])->name('smartphones.update');
Route::delete('/smartphones/{smartphone}', [SmartphoneController::class, 'destroy'])->name('smartphones.destroy');