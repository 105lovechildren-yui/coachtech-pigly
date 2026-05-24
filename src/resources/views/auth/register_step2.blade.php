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
        <p class="login-container__subtitle">STEP2 体重データの入力</p>

        <form method="POST" action="{{ route('register_step2_store') }}" class="login-form">
            @csrf

            <div class="login-form__group">
                <label for="current_weight" class="login-form__label">現在の体重</label>
                <div class="login-form__input-row">
                    <input id="current_weight" type="text" class="login-form__input" name="current_weight" placeholder="現在の体重を入力" value="{{ old('current_weight') }}" autocomplete="current_weight" autofocus>
                    <span class="login-form__unit">kg</span>
                </div>
                @error('current_weight')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="login-form__group">
                <label for="target_weight" class="login-form__label">目標の体重</label>
                <div class="login-form__input-row">
                    <input id="target_weight" type="text" class="login-form__input" name="target_weight" placeholder="目標の体重を入力" value="{{ old('target_weight') }}" autocomplete="target_weight" autofocus>
                    <span class="login-form__unit">kg</span>
                </div>
                @error('target_weight')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="login-form__group">
                <button type="submit" class="login-form__button">アカウント作成</button>
            </div>
        </form>

    </div>
</div>

@endsection