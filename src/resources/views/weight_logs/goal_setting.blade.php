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
        {{-- TODO: ルート作成後あだ名編集 --}}
        <form method="POST" action="{{ route('weight_logs.update_goal') }}" class="setting__form">
            @csrf
            {{-- TODO: バリデーション実装する --}}
            <div class="setting__group">
                <label for="target_weight" class="setting__label">体重</label>
                <input id="target_weight" type="text" class="setting__input" name="target_weight" placeholder="50.0" value="{{ old('target_weight', $weightTarget->target_weight ?? '') }}" required autocomplete="target_weight" autofocus>
                <span>kg</span>
            </div>

            {{-- TODO:画面遷移実装する --}}
            <button type="button" class="setting__button setting__button--back">戻る</button>
            <button type="submit" class="setting__button setting__button--update">更新</button>

        </form>

    </div>
</div>