<?php

namespace App\Providers;

use App\Interfaces\AuthorInterface;
use App\Interfaces\BookInterface;
use App\Interfaces\CommentInterface;
use App\Interfaces\ContactInterface;
use App\Service\AuthorService;
use App\Service\BookService;
use App\Service\CommentService;
use App\Service\ContactService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(AuthorInterface::class, AuthorService::class);
        app()->bind(BookInterface::class, BookService::class);
        app()->bind(ContactInterface::class, ContactService::class);
        app()->bind(CommentInterface::class, CommentService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
