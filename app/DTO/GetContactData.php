<?php


namespace App\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class GetContactData extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $subject;
    public string $message;
}
