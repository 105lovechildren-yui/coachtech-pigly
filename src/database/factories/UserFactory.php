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
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ];
    }
}
