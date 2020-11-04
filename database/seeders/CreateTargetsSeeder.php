<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
use App\Models\Target;

class CreateTargetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Target::truncate();

        $targets = File::get(__DIR__ . '/../jsons/targets.json');
        $targets = json_decode($targets);
        foreach ($targets as $target) {
            Target::create([
                'name' => $target->name,
            ]);
        }
    }
}
