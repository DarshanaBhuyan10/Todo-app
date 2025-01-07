<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoItemController;

Route::get('/', function () {
    return view('welcome');
});

//Route to display all items (index)
Route::get('/todo', [TodoItemController::class,'index'])->name('todo.index');

// Route to show the form for creating a new item (create)
Route::get('/todo_create', [TodoItemController::class,'create'])->name('todo.create');

// Route to store a new item in the database (store)
Route::post('/todo', [TodoItemController::class,'store'])->name('todo.store');

// display the edit form for a specific item
Route::get('/todo/{id}/edit', [TodoItemController::class, 'edit'])->name('todo.edit');

// handle updating a specific item
Route::put('/todo/{id}', [TodoItemController::class, 'update'])->name('todo.update');

// Route to handle deleting a specific item
Route::delete('/todo/{id}', [TodoItemController::class, 'destroy'])->name('todo.destroy');


