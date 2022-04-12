<?php


namespace App\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class FilterAuthorsData extends  DataTransferObject
{
    public  string $query;
}
