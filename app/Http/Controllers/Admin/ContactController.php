<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Admin\GetData;
use App\Http\Controllers\Controller;
use App\Service\Admin\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        return $this->service->index();
    }

    public function destroy(int $id)
    {
        return $this->service->destroy($id);
    }

    public function search(Request $request)
    {

        $data = new GetData($request->all());

        $contacts = $this->service->search($data);

        return view('admin.contacts', compact('contacts'));
    }
}
