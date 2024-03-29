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

/*Route::get('/', function () {
    return view('welcome');
});
*/
use App\Http\Controllers\PostController;
Route::get('/', [PostController::class, 'index' ]);
Route::get('post/index', [PostController::class, 'index' ])->name('post.index');
Route::get('post/create', [PostController::class, 'create' ])->name('post.create')->middleware('auth');
Route::post('post/store', [PostController::class, 'store' ])->name('post.store')->middleware('auth');
Route::get('post/show/{id}', [PostController::class, 'show' ])->name('post.show');
Route::get('post/edit/{id}', [PostController::class, 'edit' ])->name('post.edit')->middleware('auth');
Route::patch('post/update/{id}', [PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::delete('post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('auth');
Route::get('post/search', [PostController::class, 'search' ])->name('post.search');
Route::get('accounts/info', [\App\Http\Controllers\AccountController::class, 'account' ])->name('accounts.info')->middleware('auth');
Route::get('quiz/index', [\App\Http\Controllers\QuestionController::class, 'index' ])->name('quiz.index')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
