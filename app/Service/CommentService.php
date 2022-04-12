<?php


namespace App\Service;


use App\DTO\GetCommentData;
use App\Interfaces\CommentInterface;
use App\Models\Comment as ModelsComment;

class CommentService implements CommentInterface
{
    /**
     * @param GetCommentData $request
     * @return mixed
     */
    public function store(GetCommentData $request)
    {
        return ModelsComment::create([
            'name' => $request->name,
            'message' => $request->message,
            'book_id' => $request->book_id ?? null,
            'author_id' => $request->author_id ?? null,
        ]);
    }
}
