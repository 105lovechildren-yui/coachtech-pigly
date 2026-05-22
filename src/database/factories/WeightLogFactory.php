<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class WeightLogFactory extends Factory
{
    /**
     * データのレシピ定義
     *
     * @return array
     */
    public function definition()
    {
        return [
            //ユーザーid:念のためデフォルト値を指定しておく
            'user_id' => User::factory(),
            //日付:Fakerでランダムな日付を生成
            'date' => $this->faker->date(),
            //体重:Fakerでランダムな数値を生成
            'weight' => $this->faker->randomFloat(1, 10, 99.9),
            //摂取カロリー：数値型
            'calories' => $this->faker->randomNumber(3),
            //運動時間：「00:00」形式（time型）
            'exercise_time' => $this->faker->time('H:i'),
            //運動内容：１２０文字以内のテキスト
            'exercise_content' => $this->faker->text(120),
        ];
    }
}
