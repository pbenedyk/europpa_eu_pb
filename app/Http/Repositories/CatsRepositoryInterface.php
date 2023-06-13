<?php

namespace App\Http\Repositories;

interface CatsRepositoryInterface
{
    public function all();
    public function get($id);
    public function delete($id);
    public function update($id, array $data);
    public function create(array $data);
}
