<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getAuthUser', [HomeController::class, 'getAuthUser']);
Route::get('/ifAuth', [HomeController::class, 'ifAuth']);

Route::get('/lang/{lang}', [\App\Http\Controllers\Controller::class, 'lang']);

Route::get('download/{filename}', [DownloadController::class, 'download']);

Route::get('/getParams', [HomeController::class, 'getParams']);
Route::get('book/index/data', [HomeController::class, 'getBookIndexData']);
Route::get('/author/index/data', [HomeController::class, 'getAuthorIndexData']);

Route::post('/contact/post', [\App\Http\Controllers\ContactController::class, 'store']);

Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);


Route::apiResources([
    '/authors' => \App\Http\Controllers\AuthorController::class,
    '/books' => \App\Http\Controllers\BookController::class,
    '/comments' => \App\Http\Controllers\CommentController::class,
]);

Route::post('/authors/search', [\App\Http\Controllers\AuthorController::class, 'authors_search']);
Route::post('/books/search', [\App\Http\Controllers\BookController::class, 'books_search']);
