<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightTargetRequest extends FormRequest
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
            'current_weight' => ['required', 'numeric', 'between:0,999.9', 'decimal:0,1',],
            'target_weight' => ['required', 'numeric', 'between:0,999.9', 'decimal:0,1'],
        ];
    }

    public function messages()
    {
        return [
            'current_weight.required' => '体重を入力してください。',
            'current_weight.numeric' => '数字で入力してください。',
            'current_weight.between' => '４桁までの数字で入力してください。',
            'current_weight.decimal' => '小数点は1桁で入力してください。',

            'target_weight.required' => '体重を入力してください。',
            'target_weight.numeric' => '数字で入力してください。',
            'target_weight.between' => '４桁までの数字で入力してください。',
            'target_weight.decimal' => '小数点は1桁で入力してください。',
        ];
    }
}
