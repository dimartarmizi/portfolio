<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class SettingController extends Controller
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
				'seo_title' => setting('seo_title', ''),
				'seo_description' => setting('seo_description', setting('description', '')),
				'seo_blog_description' => setting('seo_blog_description', 'Notes, articles, and updates from the portfolio.'),
				'seo_projects_description' => setting('seo_projects_description', 'Selected builds and experiments from the portfolio.'),
				'seo_experience_description' => setting('seo_experience_description', 'A timeline of roles, responsibilities, and highlights.'),
				'seo_keywords' => setting('seo_keywords', ''),
				'seo_author' => setting('seo_author', setting('owner_name', '')),
				'seo_twitter_site' => setting('seo_twitter_site', ''),
				'seo_twitter_creator' => setting('seo_twitter_creator', ''),
				'seo_image_url' => setting('seo_image', null, true),
				'seo_custom_meta_json' => $this->formatJsonValue(setting('seo_custom_meta_json', '[]')),
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
		$this->saveSetting('seo_title', $this->keepExistingTextValue($validated['seo_title'] ?? null, $currentValues['seo_title'] ?? null));
		$this->saveSetting('seo_description', $this->keepExistingTextValue($validated['seo_description'] ?? null, $currentValues['seo_description'] ?? null));
		$this->saveSetting('seo_blog_description', $this->keepExistingTextValue($validated['seo_blog_description'] ?? null, $currentValues['seo_blog_description'] ?? null));
		$this->saveSetting('seo_projects_description', $this->keepExistingTextValue($validated['seo_projects_description'] ?? null, $currentValues['seo_projects_description'] ?? null));
		$this->saveSetting('seo_experience_description', $this->keepExistingTextValue($validated['seo_experience_description'] ?? null, $currentValues['seo_experience_description'] ?? null));
		$this->saveSetting('seo_keywords', $this->keepExistingTextValue($validated['seo_keywords'] ?? null, $currentValues['seo_keywords'] ?? null));
		$this->saveSetting('seo_author', $this->keepExistingTextValue($validated['seo_author'] ?? null, $currentValues['seo_author'] ?? null));
		$this->saveSetting('seo_twitter_site', $this->keepExistingTextValue($validated['seo_twitter_site'] ?? null, $currentValues['seo_twitter_site'] ?? null));
		$this->saveSetting('seo_twitter_creator', $this->keepExistingTextValue($validated['seo_twitter_creator'] ?? null, $currentValues['seo_twitter_creator'] ?? null));
		$this->saveSetting('seo_custom_meta_json', $this->keepExistingTextValue($validated['seo_custom_meta_json'] ?? null, $currentValues['seo_custom_meta_json'] ?? null));

		if ($request->hasFile('profile_picture')) {
			$path = $request->file('profile_picture')->store('settings', 'public');
			$this->saveSetting('profile_picture', $path);
		}

		if ($request->hasFile('seo_image')) {
			$this->deleteStoredFile($currentValues['seo_image'] ?? null);
			$path = $request->file('seo_image')->store('settings', 'public');
			$this->saveSetting('seo_image', $path);
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

	private function formatJsonValue(mixed $value): string
	{
		if (is_array($value)) {
			return json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
		}

		if (! is_string($value)) {
			return '[]';
		}

		$decoded = json_decode($value, true);

		if (json_last_error() !== JSON_ERROR_NONE || ! is_array($decoded)) {
			return $value;
		}

		return json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	}
}