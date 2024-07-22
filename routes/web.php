<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('home');

Route::post('/saveItem', [TodoController::class, 'saveItem'])->name('saveItem');

Route::delete('/deleteItem/{id}', [TodoController::class, 'destroy'])->name('deleteItem');