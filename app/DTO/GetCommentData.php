<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class GetCommentData extends DataTransferObject
{
    public string $name;
    public string $message;
    public string|null $book_id;
    public string|null $author_id;
}
