<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', function () {
    return view('user');
});

Route::get('home', function () {
    return view('home');
});

Route::get('idea', function () {
    return view('idea');
});

Route::get('page', function () {
    return view('page');
});

Auth::routes();

Route::resource('ideas', 'IdeaController');
Route::resource('categories', 'IdeaController');
Route::resource('comments', 'IdeaController');
Route::resource('tags', 'IdeaController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
