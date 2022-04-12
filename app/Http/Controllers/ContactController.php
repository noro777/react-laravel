<?php

namespace App\Http\Controllers;

use App\DTO\GetContactData;
use App\Http\Requests\ContactRequest;
use App\Interfaces\ContactInterface;

class ContactController extends Controller
{
    /**
     * @param ContactRequest $request
     * @param ContactInterface $interface
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function store(ContactRequest $request, ContactInterface $interface)
    {
        $data = new GetContactData($request->all());

        $interface->send($request->all());

        $interface->store($data);

        return response()->json([__('status')], 200);
    }
}
