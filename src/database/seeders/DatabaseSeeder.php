<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //WeightLogSeederを呼び出す
        $this->call(WeightLogSeeder::class);
    }
}
