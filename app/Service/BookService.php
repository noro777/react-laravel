<?php


namespace App\Service;


use App\DTO\FilterBooksData;
use App\Interfaces\BookInterface;
use App\Models\Book;

class BookService implements BookInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getBooks()
    {
        $books = Book::query()->latest()->get();

        return $books;
    }

    /**
     * @param FilterBooksData $booksData
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function books_search(FilterBooksData $booksData)
    {
        $query = $booksData->query;
        $books = Book::query()->where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('text', 'LIKE', '%' . $query . '%')
            ->latest()
            ->get();

        return $books;
    }
}
