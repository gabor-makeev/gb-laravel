<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
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

Route::get('/news/{category}', [NewsController::class, 'index'])
    ->whereIn('category', ['movies', 'tv series', 'music', 'video games', 'off-topic'])
    ->name('news.index');

Route::get('/news/{category}/{id}', [NewsController::class, 'show'])
    ->whereIn('category', ['movies', 'tv series', 'music', 'video games', 'off-topic'])
    ->whereNumber('id')
    ->name('news.show');

Route::get('/news/create', [NewsController::class, 'create'])
    ->name('news.create');

Route::get('/welcome/{username}', static function(string $username): string {
    return "Hello, {$username}";
});
