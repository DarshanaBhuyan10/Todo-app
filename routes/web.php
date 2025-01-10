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
//1.The user clicks an "Edit" button (e.g., a link to /todo/1/edit) to modify a specific "todo" item.
//2.The edit route displays a form pre-filled with the item's current data.



// handle updating a specific item
Route::put('/todo/{id}', [TodoItemController::class, 'update'])->name('todo.update');
//1.The user modifies the data and submits the form, which sends a PUT request to /todo/1.
//2.The update route processes the form data, updates the item in the database, and redirects the user.




// Route to handle deleting a specific item
Route::delete('/todo/{id}', [TodoItemController::class, 'destroy'])->name('todo.destroy');


