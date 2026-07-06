<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoItemCreateRequest;
use App\Models\TodoItem;
use App\Models\User;
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
        return view('todo.create', [
            'users' => User::all(),
        ]);
    }

    public function store(TodoItemCreateRequest $request)
    {
        // 登録対象の項目は完了状態以外
        $attributes = $request->safe()->except('is_finished');
        // 完了日：完了にチェックあり→今日、チェックなし→null
        $attributes['finished_date'] = request('is_finished') ? now()->format('Y-m-d') : null;
        // 登録日は今日
        $attributes['registration_date'] = now()->format('Y-m-d');

        $todo = new TodoItem();
        $todo->fill($attributes)->save();
        return redirect(route('home'));
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
