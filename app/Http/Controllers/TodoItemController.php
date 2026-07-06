<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoItemRequest;
use App\Models\TodoItem;
use App\Models\User;

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

    public function store(TodoItemRequest $request)
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

    public function edit(TodoItem $todoItem)
    {
        return view('todo.edit', [
            'todoItem' => $todoItem,
            'users' => User::all(),
        ]);
    }

    public function update(TodoItemRequest $request, TodoItem $todoItem)
    {
        // 登録対象の項目は完了状態以外
        $attributes = $request->safe()->except('is_finished');
        // 完了日：完了にチェックあり→今日、チェックなし→null
        $attributes['finished_date'] = request('is_finished') ? now()->format('Y-m-d') : null;

        $todoItem->fill($attributes)->save();
        return redirect(route('home'));
    }

    public function delete(TodoItem $todoItem)
    {
        return view('todo.delete', [
            'todoItem' => $todoItem,
        ]);
    }

    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete();
        return redirect(route('home'));
    }
}
