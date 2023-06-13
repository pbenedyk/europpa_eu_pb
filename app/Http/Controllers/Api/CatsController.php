<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CatsRepositoryInterface;
use App\Http\Requests\StoreCatRequest;
use App\Http\Requests\UpdateCatRequest;

class CatsController extends Controller
{
    public function __construct(
        private readonly CatsRepositoryInterface $catsRepository
    ) {
    }

    public function index()
    {
        return response()->json($this->catsRepository->all());
    }

    public function store(StoreCatRequest $request)
    {
        if (!$this->catsRepository->create($request->all())) {
            return response()->json(['message' => 'Cat not created'], 500);
        }

        return response()->json(['message' => 'Cat created successfully']);
    }

    public function show(string $id)
    {
        if (!$this->catsRepository->get($id)) {
            return response()->json(['message' => 'Cat not found'], 404);
        }

        return response()->json($this->catsRepository->get($id));
    }

    public function update(UpdateCatRequest $request, string $id)
    {
        if (!$this->catsRepository->update($id, $request->all())) {
            return response()->json(['message' => 'Cat not updated'], 500);
        }

        return response()->json(['message' => 'Cat updated successfully']);
    }

    public function destroy(string $id)
    {
        $this->catsRepository->delete($id);

        return response()->json(['message' => 'Cat deleted successfully']);
    }
}
