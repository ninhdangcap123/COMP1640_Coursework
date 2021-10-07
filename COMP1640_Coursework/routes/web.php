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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('user', function () {
//    return view('user');
//});
//
//Route::get('home', function () {
//    return view('home');
//});
//
//Route::get('idea', function () {
//    return view('idea');
//});
//
//Route::get('page', function () {
//    return view('page');
//});



//Route::resource('ideas', 'IdeaController');
//Route::resource('categories', 'IdeaController');
//Route::resource('comments', 'IdeaController');
//Route::resource('tags', 'IdeaController');


Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('home', function () {
    return view('home');
})->name('home');

Route::get('/login', function(){
   return view('auth.login');
})->name('login');

Route::get('admin/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('admin.home')
    ->middleware('isAdmin');

Route::get('staff/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('staff.home')
    ->middleware('isStaff');

Route::get('qam/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('qam.home')
    ->middleware('isQAM');

Route::get('qac/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('qac.home')
    ->middleware('isQAC');
