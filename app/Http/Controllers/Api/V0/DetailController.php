<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Validator;

class DetailController extends Controller
{
    public function __invoke()
    {
        $request = request();
        $validator = Validator::make($request->all(), [
            'id' => ['bail', 'required', 'integer', 'min:1']
        ]);
        if ($validator->fails()) return response('{}', 400);

        $post = Post::with(['prefecture', 'budget', 'target'])->where('id', $request->id)->first();
        if ($post) return response($post, 200);
        return response('{}', 400);
    }
}
