<x-layout>
    <x-slot:title>ログイン</x-slot>

    <div class="max-w-lg card bg-base-100 card-lg shadow-sm mx-auto">
        <div class="card-body items-center">
            <h2 class="card-title">ログイン</h2>
            
            <p class="text-error">{{ $errors->first('password') }}</p>
            <form action="{{ route('login') }}" method="post" class="w-full flex flex-col gap-4">
                @csrf

                <div>
                    <label for="email" class="label">ユーザー名（メールアドレス）</label>
                    <input type="text" name="email" class="input w-full" value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password" class="label">パスワード</label>
                    <input type="password" name="password" class="input w-full">
                    
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
