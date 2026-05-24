@extends('layouts.app')

@section('title', '詳細画面')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@include('components.header')

@section('content')

<div class="setting">
    <div class="setting__content">
        <h1 class="setting__title">目標体重設定</h1>
        <form method="POST" action="{{ route('weight_logs.update_goal') }}" class="setting__form">
            @csrf
            <div class="setting__group">
                <label for="target_weight" class="setting__label"></label>
                <input id="target_weight" type="text" class="setting__input" name="target_weight" placeholder="50.0" value="{{ old('target_weight', $weightTarget->target_weight ?? '') }}" autocomplete="target_weight" autofocus>
                <span>kg</span>
                @error('target_weight')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="setting__actions">
                <a href="{{ route('weight_logs.index') }}" class="setting__button setting__button--back">戻る</a>
                <button type="submit" class="setting__button setting__button--update">更新</button>
            </div>

        </form>

    </div>
</div>