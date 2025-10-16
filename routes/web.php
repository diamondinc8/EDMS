<?php

use App\Http\Controllers\SupportController;
use App\Http\Middleware\isAuthorized;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactorController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\isNotOwner;

// Автоматическая переадресация на регистрацию, если пользователь не вошёл в аккаунт.
Route::middleware([isAuthorized::class])->group(function () {
    // Автоматическая переадресация на 'index'-страницу (список отправленных документов)
    Route::middleware([isNotOwner::class])->group(function () {
        Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
    Route::get('/partners', [IndexController::class, 'partners'])->name('partners');
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/orders', [IndexController::class, 'orders'])->name('orders');
    Route::get('/acts', [IndexController::class, 'acts'])->name('acts');
    Route::get('/contracts', [IndexController::class, 'contracts'])->name('contracts');
    Route::get('/invoices', [IndexController::class, 'invoices'])->name('invoices');
    Route::get('/requests', [IndexController::class, 'requests'])->name('requests');
    Route::get('/reports', [IndexController::class, 'reports'])->name('reports');
    Route::get('/memos', [IndexController::class, 'memos'])->name('memos');
});

Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');

Route::get('/support', [SupportController::class, 'index'])->name('support');
Route::post('/partners', [ContactorController::class, 'add'])->name('partner.add');
Route::delete('/partners/{partner}', [ContactorController::class, 'destroy'])->name('partner.destroy');



Auth::routes();
Route::post('/', function () {
    dd('1111');
})->name('document.store');
