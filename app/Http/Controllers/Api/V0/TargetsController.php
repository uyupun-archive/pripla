<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use App\Models\Target;

class TargetsController extends Controller
{
    public function __invoke()
    {
        $targets = Target::all();
        return response($targets, 200);
    }
}
