<?php


namespace App\Interfaces;


use App\DTO\FilterBooksData;

interface BookInterface
{
    /**
     * @param FilterBooksData $authorsData
     * @return mixed
     */
    public  function books_search(FilterBooksData $authorsData);
}
