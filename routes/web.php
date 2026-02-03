<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContractFileController;


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
Route::get('/contracts/create', [ContractController::class, 'startContract'])->name('contracts.startContract');
Route::post('/contracts', [ContractFileController::class, 'store'])->name('contracts.store');

Route::get('/templates', [ContractController::class, 'getTemplatesPage'])->name('contracts.templates');

Route::get('/contracts/details/{contract}', [ContractController::class, 'showDetails'])->name('contracts.showDetails');
Route::post('/contracts/upload-html', [ContractFileController::class, 'store']);

Route::post('/contracts/{contract}/generate-signature-link', [ContractController::class, 'generateSignatureLink'])
    ->name('contracts.generate-link');

Route::get('/sign-contract/{contract}', [ContractController::class, 'publicVerifyAndSign'])
    ->name('public.contract.sign')
    ->middleware('signed');

