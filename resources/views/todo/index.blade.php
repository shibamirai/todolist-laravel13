<x-layout>
    <x-slot:title>作業一覧</x-slot>

    <div class="justify-self-end">
        <form action="#" method="get">
            <input type="text" class="input" placeholder="検索" name="search">
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th class="w-1/4">項目名</th>
                    <th>担当者</th>
                    <th>登録日</th>
                    <th>期限日</th>
                    <th>完了日</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($todoItems as $todoItem)
                    <tr class="{{ $todoItem->isExpired() ? 'bg-red-200' : '' }}">
                        <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->item_name }}</td>
                        <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->user->fullName() }}</td>
                        <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->registration_date }}</td>
                        <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->expire_date }}</td>
                        <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->finished_date }}</td>
                        <td class="flex gap-1">
                            <form action="">
                                <button class="btn btn-primary w-20">{{ $todoItem->finished_date ? '未完了' : '完了' }}</button>
                            </form>
                            <a href="#" class="btn btn-primary">修正</a>
                            <a href="#" class="btn btn-warning">削除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
