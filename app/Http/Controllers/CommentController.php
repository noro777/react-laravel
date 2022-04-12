<?php

namespace App\Http\Controllers;

use App\DTO\GetCommentData;
use App\Http\Requests\CommentRequest;
use App\Interfaces\CommentInterface;

class CommentController extends Controller
{

    /**
     * @param CommentRequest $request
     * @param CommentInterface $interface
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentRequest $request, CommentInterface $interface)
    {
        $data = new GetCommentData($request->all());

        $interface->store($data);

        return response()->json([__('comment_status')], 200);
    }
}
