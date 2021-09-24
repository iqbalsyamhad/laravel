<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

// get article
Route::get('/article', [ArticleController::class, 'getArticle']);
Route::get('/article/create', function (Request $request) {
    return view('article/articlecreate');
});
Route::get('/article/edit/{id}', [ArticleController::class, 'getOneArticle']);

// create article
Route::post('/article', [ArticleController::class, 'createArticle']);

// update article
Route::patch('/article/{id}', [ArticleController::class, 'updateArticle']);

// delete article
Route::delete('/article/{id}', [ArticleController::class, 'deleteArticle']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
