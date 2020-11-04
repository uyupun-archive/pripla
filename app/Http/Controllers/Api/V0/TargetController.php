<?php

namespace App\Http\Controllers\Api\V0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TargetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response('{}', 200);
    }
}
