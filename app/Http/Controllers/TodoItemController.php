<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{
    public function index()
    {
        $todoItems = TodoItem::with('user')
            ->itemNameLike(request('search'))
            ->orWhere->userNameLike(request('search'))
            ->orderBy('expire_date', 'asc')
            ->get();
        return view('todo.index', [
            'todoItems' => $todoItems,
        ]);
    }

    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoItem $todoItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TodoItem $todoItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TodoItem $todoItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoItem $todoItem)
    {
        //
    }
}
