<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Traits\FailedApiValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShelterRequest extends FormRequest
{
    use FailedApiValidationTrait;

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'street' => 'sometimes|string|max:255',
            'house_number' => 'sometimes|string|max:255',
            'zip' => 'sometimes|string|max:255',
            'phone' => 'string|max:255|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'email' => 'email|max:255',
        ];
    }
}
