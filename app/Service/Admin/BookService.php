<?php

namespace App\Service\Admin;

use App\Models\Book;
use App\Models\Author;
use App\DTO\Admin\GetData;
use Illuminate\Support\Facades\File;
use App\Interfaces\Admin\AdminInterface;

class BookService implements AdminInterface
{

    public function index()
    {
        $books = Book::query()->with('comments')->with('author')->latest()->get();

        return view('admin.book.books', compact('books'));
    }

    public function create()
    {
        $authors = Author::author()->get();

        return view('admin.book.book_create', compact('authors'));
    }


    public function store(GetData $data)
    {
        $imageName   = time() . '.' . $data->image->getClientOriginalExtension();
        $data->image->move('images/books', $imageName);

        $fileName = time() . '.' . $data->file->getClientOriginalExtension();
        $data->file->move('files/books', $fileName);

        $book = new Book();

        $book->name = $data->name;
        $book->image = $imageName;
        $book->text = $data->text;
        $book->file = $fileName;
        $book->author_id = $data->author_id;

        $book->save();
    }

    public function edit(int $id)
    {
        $book = Book::query()->find($id);
        $authors = Author::all();

        return view('admin.book.book_update', compact('book', 'authors'));
    }


    public function update(GetData $data, int $id)
    {

        $book = Book::query()->find($id);

        if (File::exists(public_path('images/books/' . $book->image))) {
            File::delete(public_path('images/books/' . $book->image));
        }

        if (File::exists(public_path('files/books/' . $book->file))) {
            File::delete(public_path('files/books/' . $book->file));
        }


        $imageName   = time() . '.' . $data->image->getClientOriginalExtension();
        $data->image->move('images/books', $imageName);

        $fileName = time() . '.' . $data->file->extension();
        $data->file->move('files/books', $fileName);

        $book->name = $data->name;
        $book->image = $imageName;
        $book->text = $data->text;
        $book->file = $fileName;
        $book->author_id = $data->author_id;

        $book->save();
    }

    public function destroy(int $id)
    {
        $book = Book::query()->find($id);

        if (File::exists(public_path('images/books/' . $book->image))) {
            File::delete(public_path('images/books/' . $book->image));
        }

        if (File::exists(public_path('files/books/' . $book->file))) {
            File::delete(public_path('files/books/' . $book->file));
        }

        $book->delete();

        return redirect()->route('admin.books.index');
    }

    public function search(GetData $data)
    {
        return Book::query()->with('comments')->with('author')
            ->where('name', 'LIKE', '%' . $data->search . '%')
            ->orWhere('text', 'LIKE', '%' . $data->search . '%')
            ->latest()
            ->get();
    }
}
