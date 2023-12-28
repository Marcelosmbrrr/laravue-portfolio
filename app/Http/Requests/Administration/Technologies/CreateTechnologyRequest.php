<?php

namespace App\Http\Requests\Administration\Technologies;

use Illuminate\Foundation\Http\FormRequest;

class CreateTechnologyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
