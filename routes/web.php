<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{bookId}', [BookController::class, 'show'])->name('books.show');
Route::put('/books/{bookId}', [BookController::class, 'update'])->name('books.update');
Route::get('/books/{bookId}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::get('/books/{bookId}/confirmdelete', [BookController::class, 'confirmDelete'])->name('books.confirmdelete');
Route::delete('/books/{bookId}', [BookController::class, 'delete'])->name('books.delete');
Route::get('/logout',function(){
    Session::flush();
    Auth::logout();
    return redirect('login');
})->name('logoutnow');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
