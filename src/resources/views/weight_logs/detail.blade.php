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

        <form method="POST" action="{{ route('weight_logs.update', $weightLog->id) }}" class="detail__form">
            @csrf
            @method('PATCH')
            <div class="detail__group">
                <label for="date" class="detail__label">日付</label>
                <input id="date" type="date" class="detail__input" name="date" value="{{ old('date', $weightLog->date) }}" required autocomplete="date" autofocus>
                @error('date')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="detail__group">
                <label for="weight" class="detail__label">体重</label>
                <input id="weight" type="text" class="detail__input" name="weight" value="{{ old('weight', $weightLog->weight) }}" required autocomplete="weight" autofocus>
                <span>kg</span>
                @error('weight')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="detail__group">
                <label for="calories" class="detail__label">摂取カロリー</label>
                <input id="calories" class="detail__input" name="calories" value="{{ old('calories', $weightLog->calories) }}">
                <span>kcal</span>
                @error('calories')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="detail__group">
                <label for="exercise_time" class="detail__label">運動時間</label>
                <input id="exercise_time" type="time" class="detail__input" name="exercise_time" value="{{ old('exercise_time', $weightLog->exercise_time) }}">
                @error('exercise_time')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="detail__group">
                <label for="exercise_content" class="detail__label">運動内容</label>
                <input id="exercise_content" class="detail__input" name="exercise_content" value="{{ old('exercise_content', $weightLog->exercise_content) }}">
                @error('exercise_content')
                <p class="form-error-message">{{ $message }}</p>
                @enderror
            </div>

            <a href="{{ route('weight_logs.index') }}"
                class="setting__button setting__button--back">
                戻る
            </a>
            <button type="submit" class="setting__button setting__button--update">更新</button>

            <div class="trash-can-content">
                <a href="{{ route('weight_logs.delete', $weightLog->id) }}">
                    <img src="{{ asset('/images/trash-can.png') }}"
                        alt="ゴミ箱の画像"
                        class="img-trash-can" />
                </a>
            </div>

        </form>

    </div>
</div>