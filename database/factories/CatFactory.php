<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cat;
use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatFactory extends Factory
{
    protected $model = Cat::class;

    public function definition()
    {
        $breeds = ['Siamese', 'Persian', 'Maine Coon', 'Bengal', 'Sphynx'];
        $isVaccinated = $this->faker->boolean;
        $isAdoptionAvailable = $isVaccinated ? $this->faker->boolean : false;
        $birthDate = $this->faker->date();
        $deathDate = $isAdoptionAvailable ? null : $this->faker->date();

        return [
            'name' => $this->faker->firstName,
            'breed' => $this->faker->randomElement($breeds),
            'birth_date' => $birthDate,
            'death_date' => $deathDate,
            'is_vaccinated' => $isVaccinated,
            'is_adoption_available' => $isAdoptionAvailable,
            'shelter_id' => function () {
                return Shelter::factory()->create()->id;
            },
        ];
    }
}
