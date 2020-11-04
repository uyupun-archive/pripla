<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
use App\Models\Prefecture;

class CreatePrefecturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prefecture::truncate();

        $prefectures = File::get(__DIR__ . '/../jsons/prefectures.json');
        $prefectures = json_decode($prefectures);
        foreach ($prefectures as $prefecture) {
            Prefecture::create([
                'name' => $prefecture->name,
            ]);
        }
    }
}
