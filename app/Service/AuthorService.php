<?php

namespace App\Service;

use App\DTO\FilterAuthorsData;
use App\Interfaces\AuthorInterface;
use App\Models\Author;

class AuthorService implements AuthorInterface
{
    /**
     * @return mixed
     */
    public function getAuthors()
    {
        $authors = Author::latest()->get();

        return $authors;
    }


    /**
     * @param FilterAuthorsData $authorsData
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function authors_search(FilterAuthorsData $authorsData)
    {
        $query = $authorsData->query;
        $authors = Author::query()
            ->where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('text', 'LIKE', '%' . $query . '%')
            ->latest()
            ->get();
        return $authors;
    }
}
