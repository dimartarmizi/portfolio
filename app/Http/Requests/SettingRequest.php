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
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
            'seo_blog_description' => ['nullable', 'string'],
            'seo_projects_description' => ['nullable', 'string'],
            'seo_experience_description' => ['nullable', 'string'],
            'seo_keywords' => ['nullable', 'string'],
            'seo_author' => ['nullable', 'string', 'max:255'],
            'seo_twitter_site' => ['nullable', 'string', 'max:255'],
            'seo_twitter_creator' => ['nullable', 'string', 'max:255'],
            'seo_image' => ['nullable', 'file', 'image', 'max:4096'],
            'seo_custom_meta_json' => ['nullable', 'string'],
            'resume_file' => ['nullable', 'file', 'max:10240'],
            'favicon' => ['nullable', 'file', 'mimetypes:image/png,image/svg+xml,image/webp,image/x-icon,image/vnd.microsoft.icon', 'extensions:ico,png,svg,webp', 'max:128'],
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