<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use App\Models\Budget;

class BudgetsController extends Controller
{
    public function __invoke()
    {
        $budgets = Budget::all();
        return response($budgets, 200);
    }
}
