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
        return TodoItem::all();
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
        $data=$request->validate([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete(); //findOrFail() is a function
    
        return response()->json(['message' => 'Deleted successfully']);
    

    }
}
