<?php

namespace App\Http\Controllers;

use App\DTO\FilterAuthorsData;
use App\Http\Requests\AuthorsSearchRequest;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorResourceCollection;
use App\Interfaces\AuthorInterface;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * @return AuthorResourceCollection
     */
    public function index()
    {
        return new AuthorResourceCollection(Author::author()->latest()->get());
    }


    /**
     * @param Author $author
     * @return AuthorResource
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }


    /**
     * @param AuthorsSearchRequest $request
     * @param AuthorInterface $interface
     * @return AuthorResourceCollection
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function authors_search(AuthorsSearchRequest $request, AuthorInterface $interface)
    {
        $data = new FilterAuthorsData($request->all());

        $authors = $interface->authors_search($data);

        return new AuthorResourceCollection($authors);
    }
}
