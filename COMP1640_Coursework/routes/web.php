<?php

use Illuminate\Support\Facades\Redirect;
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
    return view('auth.login');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/header', function (){
    return view('layouts.header');
});

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

Route::group(['prefix'=> 'qac/departments'], function (){
    Route::group(['middleware'=>'isQAC'], function (){
        Route::get('/home', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('qac.home');
        Route::get('/', [App\Http\Controllers\DepartmentController::class, 'index']);
        Route::post('/create', [App\Http\Controllers\DepartmentController::class, 'store'])->name('qac.store');
        Route::get('/create', [App\Http\Controllers\DepartmentController::class, 'create'])->name('qac.create');
        Route::delete('/delete/{id}', [\App\Http\Controllers\DepartmentController::class, 'destroy'])->name('qac.delete');
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


Route::group(['middleware'=>'auth'],function (){
    Route::group(['prefix' => 'ideas'], function (){
        Route::get('/home', [\App\Http\Controllers\IdeaController::class,'index'])->name('idea.index');
        Route::post('/create', [App\Http\Controllers\IdeaController::class, 'store'])->name('idea.store');
        Route::get('/create', [App\Http\Controllers\IdeaController::class, 'create'])->name('idea.create');
        Route::get('/update/{id}', [App\Http\Controllers\IdeaController::class, 'edit'])->name('idea.edit');
        Route::post('/update/{id}', [App\Http\Controllers\IdeaController::class, 'update'])->name('idea.update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\IdeaController::class, 'destroy'])->name('idea.delete');
        Route::get('/show/{id}',[\App\Http\Controllers\IdeaController::class, 'show'])->name('idea.show');
        Route::get('/show/',[\App\Http\Controllers\IdeaController::class, 'myIdea'])->name('idea.myIdea');
        Route::get('/{uuid}/download',[\App\Http\Controllers\IdeaController::class,'fileDownload'])->name('idea.download');
        Route::post('/like-idea/{id}',[\App\Http\Controllers\IdeaController::class,'likeIdea'])->name('idea.like');
        Route::get('download-zip', [\App\Http\Controllers\IdeaController::class,'downloadAllAsZip'])->name('idea.downloadAsZip');
        Route::get('/download-csv', [\App\Http\Controllers\IdeaController::class, 'writeArrayToCsvFile'])->name('idea.downloadAsCsv');
        Route::get('/search', [\App\Http\Controllers\IdeaController::class,'search'])->name('idea.search');
        Route::post('/unlike-idea/{id}',[\App\Http\Controllers\IdeaController::class,'unlikeIdea'])->name('idea.unlike');
        Route::get('/getAll/{id}', [\App\Http\Controllers\IdeaController::class, 'getIdeas'])->name('idea.getIdeas');
    });

    Route::group(['prefix' => 'comments'],function (){
        Route::post('/create',[\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
        Route::post('/reply/store', [\App\Http\Controllers\CommentController::class, 'replyStore'])->name('comment.reply.store');
    });
});

