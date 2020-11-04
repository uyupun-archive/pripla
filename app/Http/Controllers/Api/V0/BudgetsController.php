<?php

namespace App\Http\Controllers\Api\V0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Budget;

class BudgetsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $budgets = Budget::all();
        return response($budgets, 200);
    }
}
