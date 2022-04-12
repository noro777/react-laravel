<?php

namespace App\Http\Controllers;

use App\DTO\FilterBooksData;
use App\Http\Requests\BooksSearchRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookResourceCollection;
use App\Interfaces\BookInterface;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * @return BookResourceCollection
     */
    public function index()
    {
        return new BookResourceCollection(Book::query()->latest()->get());
    }


    /**
     * @param Book $book
     * @return BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }


    /**
     * @param BooksSearchRequest $request
     * @param BookInterface $interface
     * @return BookResourceCollection
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function books_search(BooksSearchRequest $request, BookInterface $interface)
    {
        $data = new  FilterBooksData($request->all());

        $books = $interface->books_search($data);

        return new BookResourceCollection($books);
    }
}
