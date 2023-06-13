<?php

namespace App\Http\Requests;

use App\Http\Traits\FailedApiValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    use FailedApiValidationTrait;
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'surname' => 'string|max:255',
            'email' => 'email|max:255',
            'phone' => 'string|max:255',
            'position' => 'string|max:255',
            'hire_date' => 'date',
            'shelter_id' => 'exists:shelters,id',
        ];
    }
}
