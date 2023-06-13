<?php

declare(strict_types=1);

namespace App\Http\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

trait FailedApiValidationTrait
{
    protected function failedValidation($validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => (new ValidationException($validator))->errors(),
        ], 422));
    }
}
