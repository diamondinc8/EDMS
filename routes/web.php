<?php

use App\Http\Controllers\SupportController;
use App\Http\Middleware\isAuthorized;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\isNotOwner;

// Автоматическая переадресация на регистрацию, если пользователь не вошёл в аккаунт.
Route::middleware([isAuthorized::class])->group(function () {
    // Автоматическая переадресация на 'index'-страницу (список отправленных документов)
    Route::middleware([isNotOwner::class])->group(function () {
        Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
    Route::get('/', [IndexController::class, 'index'])->name('index');
});

Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');

Route::get('/support', [SupportController::class, 'index'])->name('support');

Auth::routes();
