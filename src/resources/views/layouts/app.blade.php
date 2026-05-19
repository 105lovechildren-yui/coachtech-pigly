<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <div id="app">
        {{--ログインしている時のみヘッダーを表示--}}
        @if(Auth::check())
        @include('components.header')
        @endif

        <main class="main">
            @yield('content')
        </main>
    </div>

    {{--管理画面からモーダルを表示するため--}}
    @stack('modals')

</body>


</html>