@extends('layouts.app')

@section('title', 'アカウント作成')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="login-container">
    <div class="login-container__box">
        <h2 class="login-container__title">PiGly</h2>
        <h3 class="login-container__subtitle">新規会員登録</h3>
        <p class="login-container__subtitle">STEP1 アカウント情報の登録</p>

        <form method="POST" action="{{ route('register_step1_store') }}" class="login-form">
            @csrf

            <div class="login-form__group">
                {{-- TODO: バリデーション実装する --}}
                <label for="name" class="login-form__label">お名前</label>
                <input id="name" type="text" class="login-form__input" name="name" placeholder="お名前を入力" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>

            <div class="login-form__group">
                {{-- TODO: バリデーション実装する --}}
                <label for="email" class="login-form__label">メールアドレス</label>
                <input id="email" type="email" class="login-form__input" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>

            <div class="login-form__group">
                {{-- TODO: バリデーション実装する --}}
                <label for="password" class="login-form__label">パスワード</label>
                <input id="password" type="password" class="login-form__input" name="password" placeholder="パスワードを入力" required autocomplete="new-password">
            </div>

            <div class="login-form__group">
                <button type="submit" class="login-form__button">次に進む</button>
            </div>
        </form>

        <div class="login-container__register-link">
            {{--登録画面へのリンクを入れる--}}
            {{--<a href="{{ route('register') }}">
            ログインはこちら
            </a>--}}
        </div>
    </div>
</div>

@endsection