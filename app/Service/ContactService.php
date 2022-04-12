<?php


namespace App\Service;


use App\DTO\GetContactData;
use App\Interfaces\ContactInterface;
use App\Models\Contact;
use Mail;


class ContactService implements ContactInterface
{
    /**
     * @param GetContactData $data
     */
    public function send(array $data)
    {
        \Mail::send('email', $data, function ($m) use ($data) {
            $m->from('armpage66@gmail.com', env('APP_NAME'));

            $m->to($data['email'], $data['name'])->subject(__('subject'));
        });
    }
    /**
     * @param GetContactData $contactData
     * @return mixed|void
     */
    public function store(GetContactData $contactData)
    {
        Contact::create([
            "name" => $contactData->name,
            "email" => $contactData->email,
            "message" => $contactData->message,
            "subject" => $contactData->subject
        ]);
    }
}
