<div id="modal" class="modal">
    <div class="modal__content">
        <h1 class="modal__title">Weight Logを追加</h1>

        <form method="POST" action="{{ route('weight_logs.store') }}" class="modal__form">
            @csrf
            <div class="modal__group">
                <div class="modal__label-row">
                    <label for="date" class="modal__label">日付</label>
                    <span class="modal__required">必須</span>
                </div>
                <input id="date" type="date" class="modal__input" name="date" value="{{ old('date', date('Y-m-d')) }}" autocomplete="date" autofocus>
                @error('date')
                <p class="form-error-message form-error-message--full">{{ $message }}</p>
                @enderror
            </div>

            <div class="modal__group">
                <div class="modal__label-row">
                    <label for="weight" class="modal__label">体重</label>
                    <span class="modal__required">必須</span>
                </div>
                <input id="weight" type="text" class="modal__input" name="weight" placeholder="50.0" value="{{ old('weight') }}" autocomplete="weight" autofocus>
                <span>kg</span>
                @error('weight')
                <p class="form-error-message form-error-message--full">{{ $message }}</p>
                @enderror
            </div>

            <div class="modal__group">
                <div class="modal__label-row">
                    <label for="calories" class="modal__label">摂取カロリー</label>
                    <span class="modal__required">必須</span>
                </div>
                <textarea id="calories" class="modal__textarea" name="calories" placeholder="1234">{{ old('calories') }}</textarea>
                <span>kcal</span>
                @error('calories')
                <p class="form-error-message form-error-message--full">{{ $message }}</p>
                @enderror
            </div>

            <div class="modal__group">
                <div class="modal__label-row">
                    <label for="exercise_time" class="modal__label">運動時間</label>
                    <span class="modal__required">必須</span>
                </div>
                <textarea id="exercise_time" class="modal__textarea" name="exercise_time" placeholder="00：00">{{ old('exercise_time') }}</textarea>
                @error('exercise_time')
                <p class="form-error-message form-error-message--full">{{ $message }}</p>
                @enderror
            </div>

            <div class="modal__group modal__group--stacked">
                <label for="exercise_content" class="modal__label">運動内容</label>
                <textarea id="exercise_content" class="modal__textarea" name="exercise_content" placeholder="運動内容を追加">{{ old('exercise_content') }}</textarea>
                @error('exercise_content')
                <p class="form-error-message form-error-message--full">{{ $message }}</p>
                @enderror
            </div>

            <div class="modal__actions">
                <button type="button" class="modal__button modal__button--close" onclick="closeModal()">戻る</button>
                <button type="submit" class="modal__button modal__button--submit">登録</button>
            </div>
        </form>

    </div>
</div>