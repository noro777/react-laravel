<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Admin\GetData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Service\Admin\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        return $this->service->index();
    }


    public function create()
    {
        return $this->service->create();
    }


    public function store(BookRequest $request)
    {
        $data = new GetData($request->all());

        $this->service->store($data);

        return redirect()->route('admin.books.index');
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function update(Request $request, $id)
    {
        $data = new GetData($request->all());

        $this->service->update($data, $id);

        return redirect()->route('admin.books.index');
    }


    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function search(Request $request)
    {

        $data = new GetData($request->all());

        $books = $this->service->search($data);

        return view('admin.book.books', compact('books'));
    }
}
