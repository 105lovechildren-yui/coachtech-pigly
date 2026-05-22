@extends('layouts.app')

@section('title', '管理画面')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@include('components.header')

@section('content')
<div class="weight-container">
    {{-- 上部：目標体重・目標まで・最新体重 --}}
    <div class="weight-container__top">
        <div class="weight-goal-box">
            <div class="weight-goal-title">目標体重</div>
            <input type="number" class="weight-goal-input" name="goal_weight" value="{{ old('goal_weight', $goalWeight ?? '') }}">
        </div>
        <div class="weight-goal-box">
            <div class="weight-goal-title">目標まで</div>
            <input type="text" class="weight-goal-input" name="to_goal" value="{{ $toGoal ?? '' }}" readonly>
        </div>
        <div class="weight-goal-box">
            <div class="weight-goal-title">最新体重</div>
            <input type="text" class="weight-goal-input" name="latest_weight" value="{{ $latestWeight ?? '' }}" readonly>
        </div>
    </div>

    {{-- 下部：検索・追加・テーブル・ページネーション --}}
    <div class="weight-container__bottom">
        <div class="weight-search-row">
            <form method="GET" action="{{ route('weight_logs.search') }}" class="weight-search-form">
                <label>開始
                    <input type="date" name="start_date" value="{{ request('start_date') }}">
                </label>
                <label>終了
                    <input type="date" name="end_date" value="{{ request('end_date') }}">
                </label>
                <button type="submit" class="weight-search-btn">検索</button>
            </form>
            <button type="button" class="weight-add-btn" onclick="openModal()">データ追加</button>
        </div>

        <table class="weight-data-table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                {{--@foreach($weightLogs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                <td>{{ $log->weight }} kg</td>
                <td>{{ $log->calories }}</td>
                <td>{{ $log->exercise_time }}</td>
                <td>
                    <a href="{{ route('weight_logs.edit', $log->id) }}" class="edit-btn">編集</a>
                </td>
                </tr>
                @endforeach--}}
            </tbody>
        </table>

        <div class="pagination">
            {{-- {{ $weightLogs->links() }} --}}
        </div>
    </div>
</div>
@endsection

@push('modals')
@include('components.modal')
@endpush

<script>
    function openModal() {
        document.getElementById('modal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }
</script>

@if(isset($openModal) && $openModal)
<script>
    window.onload = function() {
        openModal();
    }
</script>
@endif