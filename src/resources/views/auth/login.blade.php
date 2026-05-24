@extends('layouts.app')

@section('title', 'ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="login-container">
    <div class="login-container__box">
        <h2 class="login-container__title">PiGly</h2>
        <h3 class="login-container__subtitle">ログイン</h3>

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <div class="login-form__group">
                <label for="email" class="login-form__label">メールアドレス</label>
                <input id="email" type="email" class="login-form__input" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="login-form__group">
                <label for="password" class="login-form__label">パスワード</label>
                <input id="password" type="password" class="login-form__input" name="password" placeholder="パスワードを入力" required autocomplete="current-password">
                @error('password')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="login-form__group">
                <button type="submit" class="login-form__button">ログイン</button>
            </div>
        </form>

        <div class="login-container__register-link">
            <a href="{{ route('register') }}" class="login-container__register-link">
            アカウント作成はこちら
            </a>
        </div>
    </div>
</div>

@endsection