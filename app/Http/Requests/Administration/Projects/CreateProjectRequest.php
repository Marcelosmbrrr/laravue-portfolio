<?php

namespace App\Http\Requests\Administration\Projects;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string",
            "description" => "required|string",
            "technology" => "required",
            "image" => "required"
        ];
    }
}
