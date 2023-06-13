<?php

namespace App\Http\Requests;

use App\Http\Traits\FailedApiValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreCatRequest extends FormRequest
{
    use FailedApiValidationTrait;
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'death_date' => 'date',
            'is_vaccinated' => 'required|boolean',
            'is_adoption_available' => 'required|boolean',
            'shelter_id' => 'required|integer|exists:shelters,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'breed.required' => 'Breed is required',
            'birth_date.required' => 'Birth date is required',
            'is_vaccinated.required' => 'Is vaccinated is required',
            'is_adoption_available.required' => 'Is adoption available is required',
            'shelter_id.required' => 'Shelter id is required',
        ];
    }
}
