<x-layout>
    <div class="max-w-lg card bg-base-100 card-lg shadow-sm mx-auto">
        <div class="card-body items-center">
            <h2 class="card-title">作業登録</h2>
            
            <form action="{{ route('store') }}" method="post" class="w-full flex flex-col gap-4">
                @csrf

                <div>
                    <label for="item_name" class="label">項目名</label>
                    <input type="text"
                        id="item_name"
                        name="item_name"
                        class="input w-full"
                        value="{{ old('item_name') }}"
                        required
                    >
                    @error("item_name")
                        <p class="text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="user_id" class="label">担当者</label>
                    <select
                        id="user_id"
                        name="user_id"
                        class="select w-full"
                    >
                        <option disabled selected>選択してください</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ $user->id == old('user_id') ? 'selected' : '' }}
                            >{{ $user->fullName() }}</option>
                        @endforeach
                    </select>
                    @error("user_id")
                        <p class="text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="expire_date" class="label">期限</label>
                    <input type="date"
                        id="expire_date"
                        name="expire_date"
                        class="input w-full"
                        value="{{ old('expire_date') }}"
                        required
                    >
                    @error("expire_date")
                        <p class="text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="label">
                        <input type="checkbox"
                            name="is_finished"
                            class="checkbox"
                            {{ old('is_finished') ? 'checked' : '' }}
                        >
                        完了
                    </label>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">登録</button>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-outline">キャンセル</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>