<?php


namespace App\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class FilterBooksData extends  DataTransferObject
{
    public  string $query;
}
