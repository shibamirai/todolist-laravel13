<x-layout>
    <x-slot:title>作業一覧</x-slot>

    <div class="justify-self-end">
        <form action="#" method="get">
            <input type="text" class="input" placeholder="検索" name="search" value="{{ request('search') }}">
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
                    <livewire:todo.row :todoItem="$todoItem" />
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
