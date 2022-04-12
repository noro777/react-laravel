<?php

namespace App\Interfaces;

use App\DTO\GetCommentData;

interface CommentInterface
{
    public function store(GetCommentData $request);
}
