<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProviderController;

Route::get('/', [ProviderController::class, 'index']);
Route::get('/providers', [ProviderController::class, 'index'])->name('providers.index');
Route::get('/providers/{id}', [ProviderController::class, 'show'])->name('providers.show');
