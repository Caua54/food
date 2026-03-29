<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ComboController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('api')->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::get('/categorias', [CategoriaController::class, 'index']);
    Route::get('/combos', [ComboController::class, 'index']);
});
