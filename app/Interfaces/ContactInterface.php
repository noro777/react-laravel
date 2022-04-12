<?php


namespace App\Interfaces;


use App\DTO\GetContactData;

interface ContactInterface
{
    public  function send(array $contactData);

    public function store(GetContactData $contactData);
}
