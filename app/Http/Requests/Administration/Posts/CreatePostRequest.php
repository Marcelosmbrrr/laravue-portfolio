<?php

namespace App\Http\Requests\Administration\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|min:3|max:100",
            "description" => "required|min:3|max:100",
            "content" => "required|array",
            "images" => "required|array",
            "category" => "required|enum:delírios,tecnologia"
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'uuid' => Str::uuid()
        ]);
    }
}
