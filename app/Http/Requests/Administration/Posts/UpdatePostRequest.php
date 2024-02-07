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
            "image" => "sometimes|image|dimensions:ratio_between=1.495:1,1.776:1",
            "category" => "required"
        ];
    }
}
