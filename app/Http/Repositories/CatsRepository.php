<?php

namespace App\Http\Repositories;

use App\Models\Cat;
class CatsRepository implements CatsRepositoryInterface
{
    public function all()
    {
        return Cat::all();
    }

    public function get($id)
    {
        return Cat::find($id);
    }

    public function delete($id)
    {
        return Cat::destroy($id);
    }

    public function update($id, array $data)
    {
        $cat = Cat::find($id);

        if (!$cat) {
            return null;
        }

        $cat->update($data);
        return $cat;
    }

    public function create(array $data)
    {
        return Cat::create($data)->shelter()->associate($data['shelter_id'])->save();
    }
}
