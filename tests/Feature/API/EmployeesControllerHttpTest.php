<?php

declare(strict_types=1);

namespace Tests\Feature\API;

use App\Models\Employee;
use App\Models\Shelter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeesControllerHttpTest extends TestCase
{
    use RefreshDatabase;

    private Shelter $shelter;

    protected function setUp(): void
    {
        parent::setUp();
        Employee::factory()->count(10)->create();
        $this->shelter = Shelter::factory()->create();
    }

    public function test_get_all_employees()
    {
        $response = $this->get('/api/employees');

        $response->assertStatus(200);
        $response->assertJson(Employee::all()->toArray());
    }

    public function test_get_single_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->get("/api/employees/{$employee->id}");

        $response->assertStatus(200);
        $response->assertJson($employee->toArray());
    }

    public function test_create_employee()
    {
        $data = [
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '123456789',
            'position' => 'Manager',
            'hire_date' => '2023-01-01',
            'shelter_id' => $this->shelter->id,
        ];

        $response = $this->post('/api/employees', $data);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Employee created successfully']);
        $this->assertDatabaseHas('employees', $data);
    }

    public function test_update_employee()
    {
        $employee = Employee::factory()->create();

        $data = [
            'name' => 'Updated Name',
            'surname' => 'Updated Surname',
            'email' => 'updated@example.com',
            'phone' => '987654321',
            'position' => 'Supervisor',
            'hire_date' => '2022-06-01',
            'shelter_id' => $this->shelter->id,
        ];

        $response = $this->patch("/api/employees/{$employee->id}", $data);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Employee updated successfully']);
        $this->assertDatabaseHas('employees', $data);
    }

    public function test_delete_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->delete("/api/employees/{$employee->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Employee deleted successfully']);
        $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
    }
}
