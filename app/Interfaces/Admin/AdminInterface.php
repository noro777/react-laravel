<?php


namespace App\Interfaces\Admin;

use App\DTO\Admin\GetData;
use Illuminate\Database\Eloquent\Model;

interface AdminInterface
{
    public function index();

    public function create();

    public function store(GetData $data);

    public function edit(int $id);

    public function update(GetData $data, int $id);

    public function destroy(int $id);

    public function search(GetData $data);
}
