<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WeightLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザーを１名作成
        $user = \App\Models\User::factory()->create();

        //作成したユーザーに紐づく目標体重を１件作成
        \App\Models\WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);

        //作成したユーザーに紐づく体重ログを35件作成
        \App\Models\WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
