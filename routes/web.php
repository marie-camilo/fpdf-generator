<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ControleurFPDF;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/model', [ControleurFPDF::class, 'model'])->name('model');
Route::get('/demo', [ControleurFPDF::class, 'demoseries'])->name('demo');
Route::resource('utilisateurs', UtilisateurController::class);
Route::get('/utilisateurs/{utilisateur}/pdf', [ControleurFPDF::class, 'solo'])->name('utilisateurs.pdf.solo');
Route::get('/series', [ControleurFPDF::class, 'series'])->name('series');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
