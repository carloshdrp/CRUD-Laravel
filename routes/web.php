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
    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('dashboard.categories');
    Route::get('/products', [\App\Http\Controllers\ProdutosController::class, 'index'])->name('dashboard.products');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');

Route::get('/produto/{id}', [\App\Http\Controllers\ProdutosController::class, 'show'])->name('produto');


require __DIR__.'/auth.php';
