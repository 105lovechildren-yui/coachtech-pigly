@extends('layouts.app')

@section('title', '詳細画面')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@include('components.header')

@section('content')

<div class="modal">
    <div class="modal__content">
        <p class="modal__title">Weight Log</p>

        <form method="POST" action="{{ route('weight_logs.store') }}" class="modal__form">
            @csrf
            {{-- TODO: バリデーション実装する --}}
            <div class="modal__group">
                <label for="date" class="modal__label">日付</label>
                <input id="date" type="date" class="modal__input" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
            </div>

            <div class="modal__group">
                <label for="weight" class="modal__label">体重</label>
                <input id="weight" type="text" class="modal__input" name="weight" placeholder="50.0" value="{{ old('weight') }}" required autocomplete="weight" autofocus>
                <span>kg</span>
            </div>

            <div class="modal__group">
                <label for="calories" class="modal__label">摂取カロリー</label>
                <textarea id="calories" class="modal__textarea" name="calories" placeholder="1200">{{ old('calories') }}</textarea>
                <span>kcal</span>
            </div>

            <div class="modal__group">
                <label for="exercise_time" class="modal__label">運動時間</label>
                <textarea id="exercise_time" class="modal__textarea" name="exercise_time" placeholder="00：00">{{ old('exercise_time') }}</textarea>
            </div>

            <div class="modal__group">
                <label for="memo" class="modal__label">運動内容</label>
                <textarea id="memo" class="modal__textarea" name="memo" placeholder="運動内容を追加">{{ old('memo') }}</textarea>
            </div>
            {{-- TODO:画面遷移実装する --}}
            <button type="button" class="modal__button">戻る</button>
            <button type="button" class="modal__button">更新</button>

            <div class="trash-can-content">
                {{-- TODO:削除のコントローラ周り実装したら編集する --}}
                <!-- <a href="/products/{{$product->id}}/delete"> -->
                <img src="{{ asset('/images/trash-can.png') }}" alt="ゴミ箱の画像" class="img-trash-can" />
                </a>
            </div>

        </form>

    </div>
</div>