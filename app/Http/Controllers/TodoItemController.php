<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoItem;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = TodoItem::all(); // or whatever query you're using
        //::all() is a method that gets all the records (or rows) from the todo_items table.
        return view('create_todo', compact('todos')); 
        //compact('todos') is a helper function in PHP that creates an array and sends the $todos variable to the view.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_todo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //The $request variable represents the incoming HTTP request from the user. 
        //It contains all the data submitted by the user through a form.
        $data=$request->validate([
            //The $data variable stores the validated data after the validation has passed.
            'info'=>'required|string|min:3|max:255' ,

        ]);
        TodoItem::create($data);
        return redirect()->route('todo.index'); //after adding the page will redirect to todo.index 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // we have to find the Todo item by id.
        $todo = TodoItem::findOrFail($id);//If the todo item is found, it stores it in the $todo variable.
        // Return the data . Also If we want the flow to return an HTML view instead, we could replace the JSON response with:
        //return view('todo.show', compact('todo'));
        return response()->json($todo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = TodoItem::findorfail($id);
        return view('edit_todo', compact('todo'));
        //The compact() function creates an array with the variable todo and its value. 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'info' => 'required|string|min:3|max:255',
        ]);
        // finding the Todo item by id and update its fields.
        $todo = TodoItem::findOrFail($id);
        $todo->update($data);
        // Redirect or respond with a success message.
        return redirect()->route('todo.index')->with('success', 'Todo item updated successfully.');
    }

    
    public function destroy(string $id)
    {
        //  Find the Todo item by ID or fail if not found
        $todo = TodoItem::findOrFail($id);

        // Step 2: Delete the Todo item
        $todo->delete();

        // Step 3: Redirect with a success message
        return redirect()->route('todo.index')->with('success', 'Todo item deleted successfully.');
    

    }
}
