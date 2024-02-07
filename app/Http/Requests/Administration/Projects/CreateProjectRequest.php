<?php

namespace App\Http\Requests\Administration\Projects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
            "phase" => "required|string",
            "description" => "required|string",
            "technology" => "required|array",
            "image" => "sometimes|image|dimensions:ratio_between=1.495:1,1.776:1"
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'uuid' => Str::uuid()
        ]);
    }
}
