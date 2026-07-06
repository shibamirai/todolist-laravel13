<x-layout>
    <div class="max-w-lg card bg-base-100 card-lg shadow-sm mx-auto">
        <div class="card-body items-center">
            <h2 class="card-title">下記の項目を削除しますか？</h2>
            
            <form action="{{ route('destroy', $todoItem) }}" method="post" class="w-full flex flex-col gap-4">
                @csrf
                <div>
                    <p class="label">項目名</p>
                    <p class="input w-full">{{ $todoItem->item_name }}</p>
                </div>
                <div>
                    <p class="label">担当者</p>
                    <p class="input w-full">{{ $todoItem->user->fullName() }}</p>
                </div>
                <div>
                    <p class="label">期限</p>
                    <p class="input w-full">{{ $todoItem->expire_date }}</p>
                </div>
                <div>
                    <label class="label">
                        <input type="checkbox" class="checkbox" {{ $todoItem->finished_date ? 'checked' : '' }} disabled>
                        完了
                    </label>
                </div>
                <div class="text-center">
                    <button class="btn btn-warning">削除</button>
                    <a href="{{ route('home') }}" class="btn btn-warning btn-outline">キャンセル</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>