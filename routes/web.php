<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\TransactionController;

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/a-propos',[HomeController::class,'apropos'])->name('apropos');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'post'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    });

    Route::prefix('depenses')->group(function () {
        Route::get('/', [DepenseController::class, 'index'])->name('depense.index');
        Route::get('/create', [DepenseController::class, 'create'])->name('depense.create');
        Route::post('/create', [DepenseController::class, 'store'])->name('depense.store');
        Route::get('/edit/{depense}', [DepenseController::class, 'edit'])->name('depense.edit');
        Route::put('/update/{depense}', [DepenseController::class, 'update'])->name('depense.update');
        Route::get('/{depense}', [DepenseController::class, 'delete'])->name('depense.delete');
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



