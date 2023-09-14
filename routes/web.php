<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
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

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::get('/about', static function(): string {
    return "Information about the project";
});

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('category.index');

Route::prefix('news')->name('news.')
    ->group(function () {
        Route::get('/{categoryId}', [NewsController::class, 'index'])
            ->whereNumber('categoryId')
            ->name('index');
        Route::get('/{categoryId}/{postId}', [NewsController::class, 'show'])
            ->whereNumber('categoryId')
            ->whereNumber('postId')
            ->name('show');
        Route::get('/create', [NewsController::class, 'create'])
            ->name('create');
});

Route::prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/', AdminIndexController::class)
            ->name('index');
        Route::prefix('news')->name('news.')
            ->group(function () {
                Route::get('/', [AdminNewsController::class, 'index'])
                    ->name('index');
                Route::get('/create', [AdminNewsController::class, 'create'])
                    ->name('create');
                Route::post('/store', [AdminNewsController::class, 'store'])
                    ->name('store');
            });
        Route::prefix('categories')->name('categories.')
            ->group(function () {
                Route::get('/', [AdminCategoryController::class, 'index'])
                    ->name('index');
                Route::get('create', [AdminCategoryController::class, 'create'])
                    ->name('create');
                Route::post('store', [AdminCategoryController::class, 'store'])
                    ->name('store');
            });
    });

Route::get('/welcome/{username}', static function(string $username): string {
    return "Hello, {$username}";
});
