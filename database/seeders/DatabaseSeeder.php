<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(CreatePrefecturesSeeder::class);
        $this->call(CreateTargetsSeeder::class);
        $this->call(CreateBudgetsSeeder::class);
        $this->call(CreatePostsSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
