<?php

namespace App\Http\Requests\Administration\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            "images" => "sometimes|array",
            "category" => "required|enum:delírios,tecnologia"
        ];
    }
}
