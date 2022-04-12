<?php


namespace App\Interfaces;


use App\DTO\FilterAuthorsData;

interface AuthorInterface
{
    /**
     * @param FilterAuthorsData $authorsData
     * @return mixed
     */
    public  function authors_search(FilterAuthorsData $authorsData);
}
