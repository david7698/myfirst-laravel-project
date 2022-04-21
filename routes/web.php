<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\TestController;
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



Route::get('/nome', function(){
    return "Ciao Mi chiamo Paz";
});

Route::get('/primotest', [ BookController::class, 'test']);

Route::get('/file/download', [ BookController::class, 'downloadFile'])->name('file.download');

Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');

Route::get('/book/edit/{bookId}', [ BookController::class, 'edit'])->name('book.edit');
Route::post('/book/update/{bookId}', [BookController::class, 'update'])->name('book.update');

Route::get('/book/delete/{bookId}', [ BookController::class, 'delete_book'])->name('books.delete');
Route::get('/book/detail/{bookId}', [ BookController::class, 'detail_book'])->name('books.detail');
Route::post('/book/comment/{bookId}', [ BookController::class, 'comment_book'])->name('book.comment');
Route::get('/biblioteca', [ BookController::class ,'eloquent_allbooks'])->name('book.allbooks');













