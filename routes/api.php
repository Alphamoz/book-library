<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{bookId}', [BookController::class, 'show'])->name('books.show');
Route::put('/books/{bookId}', [BookController::class, 'update'])->name('books.update');
Route::get('/books/{bookId}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::get('/books/{bookId}/confirmdelete', [BookController::class, 'confirmDelete'])->name('books.confirmdelete');
Route::delete('/books/{bookId}', [BookController::class, 'delete'])->name('books.delete');