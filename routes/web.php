<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('api')->group(function () {
    Route::get('/produtos', [\App\Http\Controllers\Api\ProdutoController::class, 'index']);
    Route::get('/categorias', [\App\Http\Controllers\Api\CategoriaController::class, 'index']);
});
