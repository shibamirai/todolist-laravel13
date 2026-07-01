<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'TODOリスト'}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar bg-primary text-primary-content shadow-sm">
        <div class="flex-1">
            <a class="font-bold text-2xl px-2">TODOリスト</a>
            @auth
            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'menu-active' : '' }}">作業一覧</a>
                </li>
                <li>
                    <a href="{{ route('create') }}" class="{{ request()->routeIs('create') ? 'menu-active' : '' }}">作業登録</a>
                </li>
            </ul>
            @endauth
        </div>
        @auth
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <details>
                        <summary>{{ Auth::user()->fullname() }} さん</summary>
                        <ul class="bg-base-100 text-black rounded-t-none p-2">
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button>ログアウト</button>
                                </form>
                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
        @endauth
    </nav>
    <main class="max-w-6xl mx-auto pt-10 px-5">
        {{ $slot }}
    </main>   
</body>
</html>
