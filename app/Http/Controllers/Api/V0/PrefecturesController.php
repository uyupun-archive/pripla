<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use App\Models\Prefecture;

class PrefecturesController extends Controller
{
    public function __invoke()
    {
        $prefectures = Prefecture::all();
        return response($prefectures, 200);
    }
}
