<?php


namespace App\DTO\Admin;


use Spatie\DataTransferObject\DataTransferObject;

class GetData extends  DataTransferObject
{
    public string|null $name;
    public string|null $email;
    public string|null $password;
    public string|null $search;
    public string|null $text;
    public string|null $author_id;

    public \Illuminate\Http\UploadedFile|null $image;
    public \Illuminate\Http\UploadedFile|null $file;
}
