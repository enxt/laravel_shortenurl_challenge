<?php

namespace App\ShortenUrl\Infrastructure\ApiAdapters\Model;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShortUrlRequest extends FormRequest
{

    protected $redirect = '';

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "url" => ["required", "url"]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
