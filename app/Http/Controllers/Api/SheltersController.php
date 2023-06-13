<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SheltersRepositoryInterface;
use App\Http\Requests\StoreShelterRequest;
use App\Http\Requests\UpdateShelterRequest;

class SheltersController extends Controller
{
    public function __construct(
        private readonly SheltersRepositoryInterface $sheltersRepository
    ) {
    }

    public function index()
    {
        return response()->json($this->sheltersRepository->all());
    }

    public function store(StoreShelterRequest $request)
    {
        if (!$this->sheltersRepository->create($request->all())) {
            return response()->json(['message' => 'Shelter not created'], 500);
        }
        return response()->json(['message' => 'Shelter created successfully']);
    }

    public function show(string $id)
    {
        if (!$this->sheltersRepository->get($id)) {
            return response()->json(['message' => 'Shelter not found'], 404);
        }

        return response()->json($this->sheltersRepository->get($id));
    }

    public function update(UpdateShelterRequest $request, string $id)
    {
        $this->sheltersRepository->update($id, $request->all());
        return response()->json(['message' => 'Shelter updated successfully']);
    }

    public function destroy(string $id)
    {
        $this->sheltersRepository->delete($id);
        return response()->json(['message' => 'Shelter deleted successfully']);
    }
}
