<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => ['required', 'date'],
            'weight' => ['required', 'numeric', 'between:0,999.9', 'decimal:0,1',],
            'calories' => ['required', 'integer', 'min:0'],
            'exercise_time' => ['required', 'date_format:H:i'],
            'exercise_content' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください。',
            'date.date' => '日付は「YYYY-MM-DD」の形式で入力してください。',

            'weight.required' => '体重を入力してください。',
            'weight.numeric' => '数字で入力してください。',
            'weight.between' => '４桁までの数字で入力してください。',
            'weight.decimal' => '小数点は1桁で入力してください。',

            'calories.required' => '摂取カロリーを入力してください。',
            'calories.integer' => '数字で入力してください。',
            'calories.min' => '0以上の数値で入力してください。',

            'exercise_time.required' => '運動時間を入力してください。',
            'exercise_time.date_format' => '運動時間は「HH:MM」の形式で入力してください。',

            'exercise_content.required' => '運動内容を入力してください。',
            'exercise_content.string' => '文字列で入力してください。',
            'exercise_content.max' => '120文字以内で入力してください。',
        ];
    }
}
