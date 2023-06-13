<?php

namespace App\Http\Repositories;

use App\Models\Employee;

class EmployeesRepository implements EmployeesRepositoryInterface
{
    public function all()
    {
        return Employee::all();
    }

    public function get($id)
    {
        return Employee::find($id);
    }

    public function delete($id)
    {
        return Employee::destroy($id);
    }

    public function update($id, array $data)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return null;
        }

        $employee->update($data);
        return $employee;
    }

    public function create(array $data)
    {
        return Employee::create($data);
    }
}
