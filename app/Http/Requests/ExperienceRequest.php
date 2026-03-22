<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'position' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'company_link' => ['nullable', 'url', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'employment_type' => ['required', 'in:Full-time,Part-time,Contract,Internship,Freelance'],
            'description' => ['nullable', 'string'],
            'highlights' => ['nullable', 'array'],
            'highlights.*' => ['nullable', 'string', 'max:255'],
            'tech_stack' => ['nullable', 'array'],
            'tech_stack.*' => ['nullable', 'string', 'max:255'],
        ];
    }
}