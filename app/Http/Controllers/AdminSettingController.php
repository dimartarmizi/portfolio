<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class AdminSettingController extends Controller
{
    public function edit(): Response
    {
        return Inertia::render('Admin/Settings', [
            'settings' => [
                'owner_name' => setting('owner_name', ''),
                'headline' => setting('headline', ''),
                'description' => setting('description', ''),
                'footer' => setting('footer', ''),
                'contact_phone' => setting('contact_phone', ''),
                'contact_email' => setting('contact_email', ''),
                'show_blog' => setting('show_blog', '0') === '1',
                'show_profile_picture' => setting('show_profile_picture', '0') === '1',
                'profile_picture_url' => setting('profile_picture', null, true),
                'resume_file_url' => setting('resume_file', null, true),
                'social_links_json' => json_encode(setting('social_links', []), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            ],
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
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
        ]);

        $socialLinks = [];
        $socialLinksInput = trim((string) ($validated['social_links_json'] ?? ''));

        if ($socialLinksInput !== '') {
            $socialLinks = json_decode($socialLinksInput, true);

            if (json_last_error() !== JSON_ERROR_NONE || ! is_array($socialLinks)) {
                throw ValidationException::withMessages([
                    'social_links_json' => 'Social links must be a valid JSON array.',
                ]);
            }
        }

        $this->saveSetting('owner_name', $validated['owner_name'] ?? null);
        $this->saveSetting('headline', $validated['headline'] ?? null);
        $this->saveSetting('description', $validated['description'] ?? null);
        $this->saveSetting('footer', $validated['footer'] ?? null);
        $this->saveSetting('contact_phone', $validated['contact_phone'] ?? null);
        $this->saveSetting('contact_email', $validated['contact_email'] ?? null);
        $this->saveSetting('show_blog', $request->boolean('show_blog') ? '1' : '0');
        $this->saveSetting('show_profile_picture', $request->boolean('show_profile_picture') ? '1' : '0');
        $this->saveSetting('social_links', $socialLinks);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('settings', 'public');
            $this->saveSetting('profile_picture', $path);
        }

        if ($request->hasFile('resume_file')) {
            $path = $request->file('resume_file')->store('settings', 'public');
            $this->saveSetting('resume_file', $path);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }

    private function saveSetting(string $key, mixed $value): void
    {
        Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        cache()->forget('setting_' . $key);
    }
}