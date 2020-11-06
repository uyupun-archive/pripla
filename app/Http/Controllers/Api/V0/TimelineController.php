<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Validator;

class TimelineController extends Controller
{
    public function __invoke()
    {
        $request = request();
        $validator = Validator::make($request->all(), [
            'prefecture_id' => ['bail', 'integer', 'min:1'],
            'budget_id'     => ['bail', 'integer', 'min:1'],
            'target_id'     => ['bail', 'integer', 'min:1'],
        ]);
        if ($validator->fails()) return response('{}', 400);

        $query = Post::select(['id', 'title', 'prefecture_id', 'budget_id', 'target_id'])
                        ->with(['prefecture', 'budget', 'target']);
        if ($request->prefecture_id) $query->where('prefecture_id', $request->prefecture_id);
        if ($request->budget_id) $query->where('budget_id', $request->budget_id);
        if ($request->target_id) $query->where('target_id', $request->target_id);
        $posts = $query->orderBy('id', 'desc')->limit(10)->get();
        return response($posts, 200);
    }
}
