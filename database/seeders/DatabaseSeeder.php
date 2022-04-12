<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //  User::factory(10)->create();
        //  Author::factory(10)->create();
        //  Book::factory(10)->create();
        //  Comment::factory(10)->create();
        Contact::factory(15)->create();
    }
}
