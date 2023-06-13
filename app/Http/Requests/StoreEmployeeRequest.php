<?php

namespace App\Http\Requests;

use App\Http\Traits\FailedApiValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    use FailedApiValidationTrait;
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'shelter_id' => 'required|exists:shelters,id',
        ];
    }
}
