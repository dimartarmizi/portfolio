<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
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
                'favicon_url' => setting('favicon', null, true),
                'resume_file_url' => setting('resume_file', null, true),
                'social_links_json' => json_encode(setting('social_links', []), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            ],
        ]);
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        $currentValues = Setting::query()->pluck('value', 'key')->all();
        $validated = $request->validated();
        $socialLinks = $request->socialLinks();

        $this->saveSetting('owner_name', $this->keepExistingTextValue($validated['owner_name'] ?? null, $currentValues['owner_name'] ?? null));
        $this->saveSetting('headline', $this->keepExistingTextValue($validated['headline'] ?? null, $currentValues['headline'] ?? null));
        $this->saveSetting('description', $this->keepExistingTextValue($validated['description'] ?? null, $currentValues['description'] ?? null));
        $this->saveSetting('footer', $this->keepExistingTextValue($validated['footer'] ?? null, $currentValues['footer'] ?? null));
        $this->saveSetting('contact_phone', $this->keepExistingTextValue($validated['contact_phone'] ?? null, $currentValues['contact_phone'] ?? null));
        $this->saveSetting('contact_email', $this->keepExistingTextValue($validated['contact_email'] ?? null, $currentValues['contact_email'] ?? null));
        $this->saveSetting('show_blog', $request->boolean('show_blog') ? '1' : '0');
        $this->saveSetting('show_profile_picture', $request->boolean('show_profile_picture') ? '1' : '0');
        $this->saveSetting('social_links', $socialLinks ?: ($currentValues['social_links'] ?? []));

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('settings', 'public');
            $this->saveSetting('profile_picture', $path);
        }

        if ($request->hasFile('resume_file')) {
            $path = $request->file('resume_file')->store('settings', 'public');
            $this->saveSetting('resume_file', $path);
        }

        if ($request->hasFile('favicon')) {
            $this->deleteStoredFile($currentValues['favicon'] ?? null);
            $path = $request->file('favicon')->store('settings', 'public');
            $this->saveSetting('favicon', $path);
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

    private function keepExistingTextValue(mixed $incomingValue, mixed $currentValue): mixed
    {
        if (is_string($incomingValue)) {
            $incomingValue = trim($incomingValue);

            if ($incomingValue !== '') {
                return $incomingValue;
            }
        }

        return $currentValue;
    }

    private function deleteStoredFile(mixed $path): void
    {
        if (! is_string($path) || $path === '') {
            return;
        }

        Storage::disk('public')->delete($path);
    }
}