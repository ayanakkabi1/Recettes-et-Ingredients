<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;

// Accueil
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[RecipeController::class, 'conteur'])->name('home');


Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes.index');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser']);    
