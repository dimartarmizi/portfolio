<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'owner_name' => ['nullable', 'string', 'max:255'],
            'headline' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'footer' => ['nullable', 'string'],
            'contact_phone' => ['nullable', 'string', 'max:255'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'show_blog' => ['nullable', 'boolean'],
            'show_profile_picture' => ['nullable', 'boolean'],
            'profile_picture' => ['nullable', 'file', 'image', 'max:4096'],
            'resume_file' => ['nullable', 'file', 'max:10240'],
            'social_links_json' => ['nullable', 'string'],
        ];
    }

    public function socialLinks(): array
    {
        $socialLinksInput = trim((string) $this->input('social_links_json', ''));

        if ($socialLinksInput === '') {
            return [];
        }

        $socialLinks = json_decode($socialLinksInput, true);

        if (json_last_error() !== JSON_ERROR_NONE || ! is_array($socialLinks)) {
            throw ValidationException::withMessages([
                'social_links_json' => 'Social links must be a valid JSON array.',
            ]);
        }

        return $socialLinks;
    }
}