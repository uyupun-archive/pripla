<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Validator;

class PostController extends Controller
{
    public function __invoke()
    {
        $request = request();
        $validator = Validator::make($request->all(), [
            'title'         => ['bail', 'required', 'string', 'min:1'],
            'prefecture_id' => ['bail', 'required', 'integer', 'min:1'],
            'budget_id'     => ['bail', 'required', 'integer', 'min:1'],
            'target_id'     => ['bail', 'required', 'integer', 'min:1'],
            'flow_chart'    => ['bail', 'required', 'array'],
        ]);
        if ($validator->fails()) return response('{}', 400);

        $post = Post::create([
            'title'         => $request->title,
            'prefecture_id' => $request->prefecture_id,
            'budget_id'     => $request->budget_id,
            'target_id'     => $request->target_id,
            'flow_chart'    => $request->flow_chart,
        ]);
        if ($post) return response('{}', 200);
        return response('{}', 400);
    }
}
