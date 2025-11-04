<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanySettingsController;
use App\Http\Controllers\Contactor\ContactorController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\isEmployee;
use App\Http\Middleware\isNotOwner;
use App\Http\Middleware\isAuthorized;

// Автоматическая переадресация на регистрацию, если пользователь не вошёл в аккаунт.
Route::middleware([isAuthorized::class])->group(function () {
    // Автоматическая переадресация на 'index'-страницу (список отправленных документов)
    Route::middleware([isNotOwner::class])->group(function () {
        Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
    Route::middleware([isEmployee::class])->group(function () {
        Route::get('/', [DocumentController::class, 'index'])->name('index');
        Route::get('/partners', [ContactorController::class, 'index'])->name('contractors.index');
        Route::get('/orders', [DocumentController::class, 'orders'])->name('orders');
        Route::get('/acts', [DocumentController::class, 'acts'])->name('acts');
        Route::get('/contracts', [DocumentController::class, 'contracts'])->name('contracts');
        Route::get('/invoices', [DocumentController::class, 'invoices'])->name('invoices');
        Route::get('/requests', [DocumentController::class, 'requests'])->name('requests');
        Route::get('/reports', [DocumentController::class, 'reports'])->name('reports');
        Route::get('/memos', [DocumentController::class, 'memos'])->name('memos');
        Route::get('/submitted', [DocumentController::class, 'submitted'])->name('submitted');
        Route::get('/company/settings', [CompanySettingsController::class, 'index'])->name('company.settings.index');
        Route::get('/company/settings/users', [CompanySettingsController::class, 'users'])->name('company.settings.users');
    });
});

Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
Route::post('/company/users', [EmployeeController::class, 'store'])->name('employee.store');

Route::post('/', [DocumentController::class, 'store'])->name('document.store');

Route::get('/support', [SupportController::class, 'index'])->name('support');
Route::post('/partners', [ContactorController::class, 'add'])->name('partner.add');

Route::delete('/partners/{partner}', [ContactorController::class, 'destroy'])->name('partner.destroy');
Route::delete('/company/users/{user}', [EmployeeController::class, 'destroy'])->name('employee.destroy');



Auth::routes();



Route::get('/api/contractors', [ContactorController::class, 'get_contractors_json']);
