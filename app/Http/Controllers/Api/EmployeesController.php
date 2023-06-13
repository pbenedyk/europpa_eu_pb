<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\EmployeesRepositoryInterface;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeesController extends Controller
{
    public function __construct(
        private readonly EmployeesRepositoryInterface $employeesRepository
    ) {
    }

    public function index()
    {
        return response()->json($this->employeesRepository->all());
    }

    public function store(StoreEmployeeRequest $request)
    {
        if (!$this->employeesRepository->create($request->all())) {
            return response()->json(['message' => 'Employee not created'], 500);
        }

        return response()->json(['message' => 'Employee created successfully']);
    }

    public function show(string $id)
    {
        if (!$this->employeesRepository->get($id)) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($this->employeesRepository->get($id));
    }

    public function update(UpdateEmployeeRequest $request, string $id)
    {
        if (!$this->employeesRepository->update($id, $request->all())) {
            return response()->json(['message' => 'Employee not updated'], 500);
        }

        return response()->json(['message' => 'Employee updated successfully']);
    }

    public function destroy(string $id)
    {
        if (!$this->employeesRepository->delete($id)) {
            return response()->json(['message' => 'Employee not deleted'], 500);
        }

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
