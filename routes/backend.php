<?php

use App\Models\Brand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SubCategoryController;

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

Route::get('/admin/dashboards', function () {
    return view('dashboard.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard');

Route::middleware(['auth:admin', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
Route::resource('categories', CategoryController::class);
Route::resource('colors', ColorController::class);
Route::resource('products', ProductController::class);
Route::resource('sizes', SizeController::class);
Route::resource('sub_categories', SubCategoryController::class);
Route::resource('brands', BrandController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/{page}', [PageController::class, 'index']);