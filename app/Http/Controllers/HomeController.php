<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResourceCollection;
use App\Http\Resources\BookResourceCollection;
use App\Models\Author;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ifAuth()
    {
        return response()->json(auth()->check());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthUser()
    {
        return response()->json(auth()->user());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getParams()
    {
        return response()->json([
            //Layout
            "books_blog" => __('books_blog'),
            "authors" => __('authors'),
            "home" => __('home'),
            "books" => __('books'),
            "contact" => __('contact'),
            "login" => __('login'),
            "register" => __('register'),
            "logout" => __('logout'),
            "hay" => __('hay'),
            "ru" => __('ru'),
            "en" => __('en'),

            //Home
            "new" => __('new'),
            "all_books" => __('all_books'),
            "all_authors" => __('all_authors'),
            "no_books" => __('no_books'),
            "no_authors" => __('no_authors'),

            //login
            "email" => __('email'),
            "password" => __('Password'),
            "Remember" => __('Remember Me'),
            "name" => __('name'),
            "Confirm" => __('Confirm Password'),
            "Password" => __('Password'),

            "search" => __('search'),

            //contact
            "Submit" => __('Submit'),
            "Message" => __('Message'),
            "Subject" => __('Subject'),
            //            "Submit" => __('Submit'),

            //author
            'back' => __('back'),
            'grox' => __('grox'),
            'kam' => __('kam'),
            'his_books' => __('his_books'),

            //book
            'girq' => __('girq'),
            'download' => __('download'),

            //comments
            'comments' => __('comments'),
            'leave_comment' => __('leave_comment'),
        ]);
    }

    /**
     * @return BookResourceCollection
     */
    public function getBookIndexData()
    {
        $books = Book::query()->with('comments')->with('author')->latest()->paginate(3);

        return new BookResourceCollection($books);
    }


    /**
     * @return AuthorResourceCollection
     */
    public function getAuthorIndexData()
    {
        $authors = Author::author()->latest()->paginate(3);

        return new AuthorResourceCollection($authors);
    }
}
