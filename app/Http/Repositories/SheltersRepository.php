<?php

namespace App\Http\Repositories;
use App\Models\Shelter;
class SheltersRepository implements SheltersRepositoryInterface
{
    public function all()
    {
        return Shelter::all();
    }

    public function get($id)
    {
        return Shelter::find($id);
    }

    public function delete($id)
    {
        return Shelter::destroy($id);
    }

    public function update($id, array $data)
    {
        return Shelter::find($id)->update($data);
    }

    public function create(array $data)
    {
        return Shelter::create($data);
    }

}
