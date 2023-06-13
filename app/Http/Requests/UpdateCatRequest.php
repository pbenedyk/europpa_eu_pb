<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Traits\FailedApiValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCatRequest extends FormRequest
{
    use FailedApiValidationTrait;

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'breed' => 'sometimes|string|max:255',
            'birth_date' => 'sometimes|date',
            'death_date' => 'date',
            'is_vaccinated' => 'sometimes|boolean',
            'is_adoption_available' => 'sometimes|boolean',
            'shelter_id' => 'sometimes|integer|exists:shelters,id',
        ];
    }
}
