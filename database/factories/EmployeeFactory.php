<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        $positions = ['Manager', 'Supervisor', 'Assistant'];
        $hireDate = $this->faker->date();

        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'position' => $this->faker->randomElement($positions),
            'hire_date' => $hireDate,
            'shelter_id' => function () {
                return Shelter::factory()->create()->id;
            },
        ];
    }
}
