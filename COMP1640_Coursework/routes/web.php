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

Route::group(['prefix' => 'admin/users'], function()
{
    Route::group(['middleware' => 'isAdmin'], function(){

            Route::get('/home', [\App\Http\Controllers\UserController::class, 'index'])->name('admin.home');
            Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.create');
            Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
            Route::post('/create', [App\Http\Controllers\UserController::class, 'store'])->name('admin.store');
            Route::get('/update/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.edit');
            Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.update');
            Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.delete');

    });
});

Route::get('staff/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('staff.home')
    ->middleware('isStaff');

Route::group(['prefix'=> 'qam/categories'], function (){
   Route::group(['middleware'=>'isQAM'], function (){

       Route::get('/home', [\App\Http\Controllers\CategoryController::class, 'index'])->name('qam.home');
       Route::get('/', [App\Http\Controllers\CategoryController::class, 'index']);
       Route::post('/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('qam.store');
       Route::get('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('qam.create');
       Route::delete('/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('qam.delete');
   });
});

//Route::get('qam/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('qam.home')
//    ->middleware('isQAM');

Route::get('qac/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('qac.home')
    ->middleware('isQAC');

Route::group(['prefix' => 'ideas'], function (){
    Route::get('/home', [\App\Http\Controllers\IdeaController::class,'index'])->name('idea.index');
    Route::post('/create', [App\Http\Controllers\IdeaController::class, 'store'])->name('idea.store');
    Route::get('/create', [App\Http\Controllers\IdeaController::class, 'create'])->name('idea.create');
    Route::get('/update/{id}', [App\Http\Controllers\IdeaController::class, 'edit'])->name('idea.edit');
    Route::post('/update/{id}', [App\Http\Controllers\IdeaController::class, 'update'])->name('idea.update');
    Route::delete('/delete/{id}', [\App\Http\Controllers\IdeaController::class, 'destroy'])->name('idea.delete');

});
