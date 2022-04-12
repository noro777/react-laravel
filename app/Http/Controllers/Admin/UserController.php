<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Admin\GetData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Service\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
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


    public function store(UserRequest $request)
    {
        $data = new GetData($request->all());

        $this->service->store($data);

        return redirect()->route('admin.users.index');
    }



    public function edit(int $id)
    {
        return $this->service->edit($id);
    }


    public function update(UserRequest $request, int $id)
    {
        $data = new GetData($request->all());

        $this->service->update($data, $id);

        return redirect()->route('admin.users.index');
    }


    public function destroy(int $id)
    {
        return $this->service->destroy($id);
    }

    public function search(Request $request)
    {

        $data = new GetData($request->all());

        $users = $this->service->search($data);

        return view('admin.users.users', compact('users'));
    }
}
