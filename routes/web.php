<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CreateArticlePageController;
use App\Http\Controllers\DataRequestController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SignInPageController;
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

Route::get('/', function () {
    return view('welcomePage');
});

Route::get('/categories', [CategoriesController::class, 'index']);

Route::get('/categories/{categoryId}', [NewsController::class, 'index']);

Route::get('/news/{newsId}', [NewsController::class, 'show']);

Route::get('/create', [CreateArticlePageController::class, 'index']);

Route::get('/signin', [SignInPageController::class, 'index']);

Route::get('/about', [AboutPageController::class, 'index']);

Route::get('/request/create', [DataRequestController::class, 'create']);

Route::post('/request/store', [DataRequestController::class, 'store']);
