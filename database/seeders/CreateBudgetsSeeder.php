<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
use App\Models\Budget;

class CreateBudgetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Budget::truncate();

        $budgets = File::get(__DIR__ . '/../jsons/budgets.json');
        $budgets = json_decode($budgets);
        foreach ($budgets as $budget) {
            Budget::create([
                'lower_limit' => $budget->lower_limit,
                'upper_limit' => $budget->upper_limit,
            ]);
        }
    }
}
