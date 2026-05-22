<div id="modal" class="modal">
    <div class="modal__content">
        <p class="modal__title">Weight Logを追加</p>

        <form method="POST" action="{{ route('weight_logs.store') }}" class="modal__form">
            @csrf
            {{-- TODO: バリデーション実装する --}}
            <div class="modal__group">
                <label for="date" class="modal__label">日付</label>
                <input id="date" type="date" class="modal__input" name="date" value="{{ date('Y-m-d') }}" required autocomplete="date" autofocus>
            </div>

            <div class="modal__group">
                <label for="weight" class="modal__label">体重</label>
                <input id="weight" type="text" class="modal__input" name="weight" placeholder="50.0" value="{{ old('weight') }}" required autocomplete="weight" autofocus>
                <span>kg</span>
            </div>

            <div class="modal__group">
                <label for="calories" class="modal__label">摂取カロリー</label>
                <textarea id="calories" class="modal__textarea" name="calories" placeholder="1234">{{ old('calories') }}</textarea>
                <span>kcal</span>
            </div>

            <div class="modal__group">
                <label for="exercise_time" class="modal__label">運動時間</label>
                <textarea id="exercise_time" class="modal__textarea" name="exercise_time" placeholder="00：00">{{ old('exercise_time') }}</textarea>
            </div>

            <div class="modal__group">
                <label for="exercise_content" class="modal__label">運動内容</label>
                <textarea id="exercise_content" class="modal__textarea" name="exercise_content" placeholder="運動内容を追加">{{ old('exercise_content') }}</textarea>
            </div>

            <button type="button" class="modal__button modal__button--close" onclick="closeModal()">戻る</button>
            <button type="submit" class="modal__button modal__button--submit">登録</button>
        </form>

    </div>
</div>