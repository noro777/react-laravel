<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function author(){
        return Author::query()
            ->with('comments')
            ->with('books',function($q){
                $q->with('comments')->with('author')->get();
            }
        );
    }
}
