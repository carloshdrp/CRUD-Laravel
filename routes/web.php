<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

//Route::get('/dashboard', function () {
//    return view('dashboard.index');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function (){ return view('dashboard.index');})->name('dashboard');
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('dashboard.users');
    Route::get('/users/delete/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('dashboard.user.destroy');

    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('dashboard.categories');
    Route::get('/categories/add', [\App\Http\Controllers\CategoryController::class, 'create'])->name('dashboard.categories.add');
    Route::get('/categories/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('dashboard.categories.remove');
    Route::get('/categories/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::post('/categories/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::post('/categories/add', [\App\Http\Controllers\CategoryController::class, 'store'])->name('dashboard.categories.store');

    Route::get('/products', [\App\Http\Controllers\ProdutosController::class, 'index'])->name('dashboard.products');
    Route::get('/products/add', [\App\Http\Controllers\ProdutosController::class, 'create'])->name('dashboard.products.add');
    Route::post('/products/add', [\App\Http\Controllers\ProdutosController::class, 'store'])->name('dashboard.products.store');
    Route::get('/products/delete/{id}', [\App\Http\Controllers\ProdutosController::class, 'destroy'])->name('dashboard.products.destroy');
    Route::get('/products/edit/{id}', [\App\Http\Controllers\ProdutosController::class, 'edit'])->name('dashboard.products.edit');
    Route::post('/products/edit/{id}', [\App\Http\Controllers\ProdutosController::class, 'update'])->name('dashboard.products.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');

Route::get('/produto/{id}', [\App\Http\Controllers\ProdutosController::class, 'show'])->name('produto');

require __DIR__.'/auth.php';
