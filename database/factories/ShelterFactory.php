<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShelterFactory extends Factory
{
    protected $model = Shelter::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'city' => $this->faker->city,
            'street' => $this->faker->streetName,
            'house_number' => $this->faker->buildingNumber,
            'zip' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ];
    }
}
