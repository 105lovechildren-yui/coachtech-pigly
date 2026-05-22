<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


class UserFactory extends Factory
{
    /**
     * データのレシピ定義
     *
     * @return array
     */
    public function definition()
    {
        return [
            //1.名前:Fakerでランダムな名前を生成
            'name' => $this->faker->name(),
            //2.メールアドレス:Fakerでランダムなメールアドレスを生成
            'email' => $this->faker->unique()->safeEmail(),
            //3.パスワード:ハッシュ化された文字列を指定
            'password' =>Hash::make('password123'),
        ];
    }
}
