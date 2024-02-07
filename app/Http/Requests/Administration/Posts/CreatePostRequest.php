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
            "image" => "required|image|dimensions:ratio_between=1.495:1,1.776:1",
            "category" => "required"
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'uuid' => Str::uuid()
        ]);
    }
}
