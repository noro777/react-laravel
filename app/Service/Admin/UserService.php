<?php

namespace App\Service\Admin;

use App\DTO\Admin\GetData;
use App\Interfaces\Admin\AdminInterface;
use App\Models\User;

class UserService implements AdminInterface
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::query()->latest()->get();

        return view('admin.users.users', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.users.user_register');
    }

    public function store(GetData $data)
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
        ]);
    }


    public function edit(int $id)
    {
        $user = User::query()->find($id);

        return view('admin.users.user_update', compact('user'));
    }


    public function update(GetData $data, int $id)
    {
        $user = User::query()->find($id);

        return $user->update([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
        ]);
    }


    public function destroy(int $id)
    {
        User::query()->find($id)->delete();

        return redirect()->route('admin.users.index');
    }

    public function search(GetData $data)
    {
        return User::query()
            ->where('name', 'LIKE', '%' . $data->search . '%')
            ->orWhere('email', 'LIKE', '%' . $data->search . '%')
            ->latest()
            ->get();
    }
}
