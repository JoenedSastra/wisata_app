<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('wisata.index');
})->name('dashboard');

Route::prefix('wisata')->group(function () {
    Route::get('/', [WisataController::class, 'index'])->name('wisata.index');
    Route::get('/create', [WisataController::class, 'create'])->name('wisata.create');
    Route::post('/store', [WisataController::class, 'store'])->name('wisata.store');
    Route::get('/edit/{id}', [WisataController::class, 'edit'])->name('wisata.edit');
    Route::put('/update/{id}', [WisataController::class, 'update'])->name('wisata.update');
    Route::delete('/delete/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');
});