<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

// Accueil
Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');