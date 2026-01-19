<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContractFileController;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
Route::get('/contracts/create', [ContractController::class, 'startContract'])->name('contracts.startContract');

Route::get('/contract/details', [ContractController::class, 'showDetails'])->name('contracts.showDetails');

Route::post('/contracts/upload-html', [ContractFileController::class, 'store']);

