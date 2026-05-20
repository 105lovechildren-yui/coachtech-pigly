@extends('layouts.app')

@section('title', '詳細画面')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@include('components.header')

@section('content')

<div class="detail">
    <div class="detail__content">
        <p class="detail__title">Weight Log</p>

        <form method="POST" action="{{ route('weight_logs.store') }}" class="detail__form">
            @csrf
            {{-- TODO: バリデーション実装する --}}
            <div class="detail__group">
                <label for="date" class="detail__label">日付</label>
                <input id="date" type="date" class="detail__input" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
            </div>

            <div class="detail__group">
                <label for="weight" class="detail__label">体重</label>
                <input id="weight" type="text" class="detail__input" name="weight" placeholder="50.0" value="{{ old('weight') }}" required autocomplete="weight" autofocus>
                <span>kg</span>
            </div>

            <div class="detail__group">
                <label for="calories" class="detail__label">摂取カロリー</label>
                <textarea id="calories" class="detail__textarea" name="calories" placeholder="1200">{{ old('calories') }}</textarea>
                <span>kcal</span>
            </div>

            <div class="detail__group">
                <label for="exercise_time" class="detail__label">運動時間</label>
                <textarea id="exercise_time" class="detail__textarea" name="exercise_time" placeholder="00：00">{{ old('exercise_time') }}</textarea>
            </div>

            <div class="detail__group">
                <label for="memo" class="detail__label">運動内容</label>
                <textarea id="memo" class="detail__textarea" name="memo" placeholder="運動内容を追加">{{ old('memo') }}</textarea>
            </div>
            {{-- TODO:画面遷移実装する --}}
            <button type="button" class="setting__button setting__button--back">戻る</button>
            <button type="button" class="setting__button setting__button--update">更新</button>

            <div class="trash-can-content">
                {{-- TODO:削除機能（確認画面 or DELETEフォーム）後で実装 --}}
                <a href="/weight_logs/{{ $weightLog->id }}/delete">
                    <img src="{{ asset('/images/trash-can.png') }}" alt="ゴミ箱の画像" class="img-trash-can" />
                </a>
            </div>

        </form>

    </div>
</div>