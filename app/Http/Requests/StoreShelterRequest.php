<?php

namespace App\Http\Requests;

use App\Http\Traits\FailedApiValidationTrait;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreShelterRequest extends FormRequest
{
    use FailedApiValidationTrait;
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'phone' => 'string|max:255|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'email|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'city.required' => 'City is required',
            'street.required' => 'Street is required',
            'house_number.required' => 'House number is required',
            'zip.required' => 'Zip is required',
            'phone.required' => 'Phone is required',
            'email.required' => 'Email is required',
        ];
    }
}
