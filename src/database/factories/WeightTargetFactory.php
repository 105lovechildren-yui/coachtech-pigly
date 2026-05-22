<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightTargetFactory extends Factory
{
    /**
     *  データのレシピ定義
     *
     * @return array
     */
    public function definition()
    {
        return [
            //1.user.idは、seedeer側で指定するため、ここでは定義しない

            //2.目標体重:Fakerでランダムな数値を生成
            'target_weight' => $this->faker->randomFloat(1, 10, 99.9),
        ];
    }
}
