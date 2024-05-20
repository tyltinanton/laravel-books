<?php

use App\Http\Controllers\Core\Book\BookDeleteController;
use App\Http\Controllers\Core\Book\BookGetListController;
use App\Http\Controllers\Core\Book\BookInsertController;
use App\Http\Controllers\Core\Book\BookPublishController;
use App\Http\Controllers\Core\Book\BookUpdateController;
use Illuminate\Support\Facades\Route;

// Get list of books
Route::get('/books', [BookGetListController::class,'__invoke']);
// Insert a new book
Route::put('/books', [BookInsertController::class,'__invoke']);
// Update book
Route::post('/books', [BookUpdateController::class,'__invoke']);
// Publish book
Route::patch('/books', [BookPublishController::class,'__invoke']);
// Delete book
Route::delete('/books', [BookDeleteController::class,'__invoke']);
