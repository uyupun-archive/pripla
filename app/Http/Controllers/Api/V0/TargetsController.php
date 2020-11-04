<?php

namespace App\Http\Controllers\Api\V0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Target;

class TargetsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $targets = Target::all();
        return response($targets, 200);
    }
}
