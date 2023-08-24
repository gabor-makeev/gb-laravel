<?php

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
    return view('welcome');
});

Route::get('/welcome/{username}', static function(string $username): string {
    return "Hello, {$username}";
});

Route::get('/about', static function(): string {
    return "Information about the project";
});

Route::get('/news', static function(): string {
    return "News";
});

Route::get('/news/{id}', static function(int $id): string {
    return "News #{$id}";
});
