<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Admin\GetData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorRequest;
use App\Service\Admin\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $service;

    public function __construct(AuthorService $service)
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

    public function store(AuthorRequest $request)
    {
        $data = new GetData($request->all());

        $this->service->store($data);

        return redirect()->route('admin.authors.index');
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function update(AuthorRequest $request, $id)
    {
        $data = new GetData($request->all());

        $this->service->update($data, $id);

        return redirect()->route('admin.authors.index');
    }


    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function search(Request $request)
    {

        $data = new GetData($request->all());

        $authors = $this->service->search($data);

        return view('admin.author.authors', compact('authors'));
    }
}
