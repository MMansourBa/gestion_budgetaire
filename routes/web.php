<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BonEngagementController;
use App\Http\Controllers\BonPdfController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\MandatController;
use App\Http\Controllers\TransactionController;

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/a-propos',[HomeController::class,'apropos'])->name('apropos');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'post'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/search/{name}', [AuthController::class, 'search'])->name('search');




// Route::middleware('auth')->group(function () {
//     Route::get('dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    });

    Route::prefix('compte')->group(function () {
        Route::get('/', [CompteController::class, 'index'])->name('compte.index');
        Route::get('/create', [CompteController::class, 'create'])->name('compte.create');
        Route::post('/create', [CompteController::class, 'store'])->name('compte.store');
        Route::get('/edit/{compte}', [CompteController::class, 'edit'])->name('compte.edit');
        Route::put('/update/{compte}', [CompteController::class, 'update'])->name('compte.update');
        Route::get('/{compte}', [CompteController::class, 'delete'])->name('compte.delete');
        // Route::get('/search', [DepenseController::class, 'search'])->name('depense.search');
    });

    Route::prefix('budget')->group(function () {
        Route::get('/', [BudgetController::class, 'index'])->name('budget.index');
        Route::get('/create', [BudgetController::class, 'create'])->name('budget.create');
        Route::post('/create', [BudgetController::class, 'store'])->name('budget.store');
        Route::get('/edit/{budget}', [BudgetController::class, 'edit'])->name('budget.edit');
        Route::put('/update/{budget}', [BudgetController::class, 'update'])->name('budget.update');
        Route::get('/{budget}', [BudgetController::class, 'delete'])->name('budget.delete');
        // Route::get('/search', [DepenseController::class, 'search'])->name('depense.search');
    });

    Route::prefix('depenses')->group(function () {
        Route::get('/', [DepenseController::class, 'index'])->name('depense.index');
        Route::get('/create', [DepenseController::class, 'create'])->name('depense.create');
        Route::post('/create', [DepenseController::class, 'store'])->name('depense.store');
        Route::get('/edit/{depense}', [DepenseController::class, 'edit'])->name('depense.edit');
        Route::put('/update/{depense}', [DepenseController::class, 'update'])->name('depense.update');
        Route::get('/{depense}', [DepenseController::class, 'delete'])->name('depense.delete');
        Route::get('/search', [DepenseController::class, 'search'])->name('depense.search');
    });

    Route::prefix('transactions')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transaction.index');
        Route::get('/create', [TransactionController::class, 'create'])->name('transaction.create');
        Route::get('/edit/{transaction}', [TransactionController::class, 'edit'])->name('transaction.edit');

        //Route d'actions
        Route::post('/store', [TransactionController::class, 'store'])->name('transaction.store');
        Route::put('/update/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
        Route::get('/delete/{transaction}', [TransactionController::class, 'delete'])->name('transaction.delete');
    });

    Route::prefix('bonEngagement')->group(function () {
        Route::get('/', [BonEngagementController::class, 'index'])->name('bonEngagement.index');
        Route::get('/create', [BonEngagementController::class, 'create'])->name('bonEngagement.create');
        Route::post('/create', [BonEngagementController::class, 'store'])->name('bonEngagement.store');
        Route::get('/edit/{bon}', [BonEngagementController::class, 'edit'])->name('bonEngagement.edit');
        Route::put('/update/{bon}', [BonEngagementController::class, 'update'])->name('bonEngagement.update');
        Route::get('/{bon}', [BonEngagementController::class, 'delete'])->name('bonEngagement.delete');
        Route::get('/bonPDF/{id}/download-pdf', [BonPdfController::class, 'bonPdf'])->name('bonEngagement.bonPDF');
    });

    Route::prefix('mandat')->group(function () {
        Route::get('/', [MandatController::class, 'index'])->name('mandat.index');
        Route::get('/create', [MandatController::class, 'create'])->name('mandat.create');
        Route::post('/create', [MandatController::class, 'store'])->name('mandat.store');
        Route::get('/edit/{mandat}', [MandatController::class, 'edit'])->name('mandat.edit');
        Route::put('/update/{mandat}', [MandatController::class, 'update'])->name('mandat.update');
        Route::get('/{mandat}', [MandatController::class, 'delete'])->name('mandat.delete');
        // Route::get('/search', [DepenseController::class, 'search'])->name('depense.search');
    });



