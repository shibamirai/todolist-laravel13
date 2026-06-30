<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar bg-primary text-primary-content shadow-sm">
        <div class="flex-1">
            <a class="font-bold text-2xl px-2">TODOリスト</a>
        </div>
    </nav>
    <main class="max-w-6xl mx-auto pt-10 px-5">
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
    </main>   
</body>
</html>