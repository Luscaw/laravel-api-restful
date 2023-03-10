<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::prefix('livros')->controller(LivroController::class)->group(
    function () {
        Route::get('/', 'index');
        Route::get('show/{livro}', 'show');
        Route::post('store/{livro}', 'store');
        Route::patch('update/{livro}', 'update');
        Route::delete('destroy/{livro}', 'destroy');
    }
);
