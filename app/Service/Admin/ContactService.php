<?php

namespace App\Service\Admin;

use App\DTO\Admin\GetData;
use App\Interfaces\Admin\AdminInterface;
use App\Models\Contact;

class ContactService implements AdminInterface
{

    public function index()
    {
        $contacts = Contact::query()->latest()->get();

        return view('admin.contacts', compact('contacts'));
    }

    public function create()
    {
        //
    }


    public function store(GetData $data)
    {
        //
    }

    public function edit(int $id)
    {
        //
    }


    public function update(GetData $data, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        $contact = Contact::query()->find($id);

        $contact->delete();

        return redirect()->route('admin.contacts.index');
    }

    public function search(GetData $data)
    {
        return Contact::query()
            ->where('name', 'LIKE', '%' . $data->search . '%')
            ->orWhere('email', 'LIKE', '%' . $data->search . '%')
            ->orWhere('subject', 'LIKE', '%' . $data->search . '%')
            ->latest()
            ->get();
    }
}
