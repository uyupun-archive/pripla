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
        $this->call(CreatePrefecturesSeeder::class);
        $this->call(CreateTargetsSeeder::class);
        $this->call(CreateBudgetsSeeder::class);
    }
}
