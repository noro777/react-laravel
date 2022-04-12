<?php

namespace App\Service\Admin;

use App\Models\Author;
use App\DTO\Admin\GetData;
use Illuminate\Support\Facades\File;
use App\Interfaces\Admin\AdminInterface;

class AuthorService implements AdminInterface
{

    public function index()
    {
        $authors = Author::query()->latest()->get();

        return view('admin.author.authors', compact('authors'));
    }

    public function create()
    {
        return view('admin.author.author_create');
    }


    public function store(GetData $data)
    {

        $imageName   = time() . '.' . $data->image->getClientOriginalExtension();
        $data->image->move('images/authors', $imageName);

        $author = new Author();

        $author->name = $data->name;
        $author->image = $imageName;
        $author->text = $data->text;

        $author->save();
    }

    public function edit(int $id)
    {
        $author = Author::query()->find($id);

        return view('admin.author.author_update', compact('author'));
    }


    public function update(GetData $data, int $id)
    {

        $author = Author::query()->find($id);

        if (File::exists(public_path('images/authors/' . $author->image))) {
            File::delete(public_path('images/authors/' . $author->image));
        }


        $imageName   = time() . '.' . $data->image->getClientOriginalExtension();
        $data->image->move('images/authors', $imageName);

        $author->name = $data->name;
        $author->image = $imageName;
        $author->text = $data->text;

        $author->save();
    }

    public function destroy(int $id)
    {
        $author = Author::query()->find($id);

        if (File::exists(public_path('images/authors/' . $author->image))) {
            File::delete(public_path('images/authors/' . $author->image));
        }

        $author->delete();

        return redirect()->route('admin.authors.index');
    }

    public function search(GetData $data)
    {
        return Author::query()
            ->where('name', 'LIKE', '%' . $data->search . '%')
            ->orWhere('text', 'LIKE', '%' . $data->search . '%')
            ->latest()
            ->get();
    }
}
