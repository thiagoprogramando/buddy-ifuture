<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('loginAcess', [UserController::class, 'login'])->name('loginAcess');

Route::get('/cadastro/{cupom?}', [UserController::class, 'register'])->name('cadastro');
Route::post('cadastro', [UserController::class, 'register'])->name('cadastro');

Route::get('/recupera', [UserController::class, 'forgoutPassword'])->name('recupera');
Route::post('recupera', [UserController::class, 'forgoutPassword'])->name('recupera');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Form
    Route::get('/formularios', [FormController::class, 'list'])->name('formularios');
    Route::get('/formulario/{id}', [FormController::class, 'create'])->name('formulario');
    Route::post('create_formulario', [FormController::class, 'create'])->name('create_formulario');
    Route::post('delete_formulario', [FormController::class, 'delete'])->name('delete_formulario');

    Route::get('/sair', [UserController::class, 'logout'])->name('sair');
});