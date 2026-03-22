<?php

namespace App\Support;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class PortfolioData
{
	public static function storageUrl(mixed $path): ?string
	{
		if (is_array($path) || is_object($path)) {
			$normalizedPath = self::normalizeStoredPath($path);

			return $normalizedPath ? self::storageUrl($normalizedPath) : null;
		}

		if (! $path) {
			return null;
		}

		if (preg_match('/^https?:\/\//i', $path)) {
			return $path;
		}

		if (str_starts_with($path, '/storage/')) {
			return url($path);
		}

		return url('/storage/' . ltrim($path, '/'));
	}

	public static function truncateWords(?string $text, int $limit = 20): string
	{
		if (! $text) {
			return '';
		}

		$words = preg_split('/\s+/', trim($text)) ?: [];

		if (count($words) <= $limit) {
			return implode(' ', $words);
		}

		return implode(' ', array_slice($words, 0, $limit)) . '...';
	}

	public static function formatDateRange(mixed $start, mixed $end): string
	{
		if (! $start && ! $end) {
			return '';
		}

		$startYear = self::dateYear($start);
		$endYear = self::dateYear($end);

		if ($startYear && $endYear) {
			return $startYear . ' - ' . $endYear;
		}

		if ($startYear && ! $endYear) {
			return $startYear . ' - Present';
		}

		return $endYear ? $endYear : '';
	}

	public static function normalizeTextList(array $values): array
	{
		$normalized = [];

		foreach ($values as $value) {
			$item = self::normalizeTextValue($value);

			if ($item !== null) {
				$normalized[] = $item;
			}
		}

		return array_values($normalized);
	}

	public static function normalizeTextValue(mixed $value): ?string
	{
		if (is_string($value) || is_numeric($value)) {
			$text = trim((string) $value);

			return $text !== '' ? $text : null;
		}

		if (is_array($value)) {
			foreach (['name', 'title', 'label', 'text', 'value', 'caption'] as $key) {
				if (array_key_exists($key, $value)) {
					$text = self::normalizeTextValue($value[$key]);

					if ($text !== null) {
						return $text;
					}
				}
			}

			foreach ($value as $item) {
				$text = self::normalizeTextValue($item);

				if ($text !== null) {
					return $text;
				}
			}
		}

		if (is_object($value)) {
			foreach (['name', 'title', 'label', 'text', 'value', 'caption'] as $key) {
				if (isset($value->{$key})) {
					$text = self::normalizeTextValue($value->{$key});

					if ($text !== null) {
						return $text;
					}
				}
			}

			foreach (get_object_vars($value) as $item) {
				$text = self::normalizeTextValue($item);

				if ($text !== null) {
					return $text;
				}
			}
		}

		return null;
	}

	public static function normalizeStoredPath(mixed $value): ?string
	{
		if (is_string($value) || is_numeric($value)) {
			$path = trim((string) $value);

			return $path !== '' ? $path : null;
		}

		if (is_array($value)) {
			foreach (['image', 'path', 'url', 'src', 'file', 'value'] as $key) {
				if (array_key_exists($key, $value)) {
					$path = self::normalizeStoredPath($value[$key]);

					if ($path) {
						return $path;
					}
				}
			}

			foreach ($value as $item) {
				$path = self::normalizeStoredPath($item);

				if ($path) {
					return $path;
				}
			}
		}

		return null;
	}

	public static function normalizeStoredPaths(array $values): array
	{
		$normalized = [];

		foreach ($values as $value) {
			$path = self::normalizeStoredPath($value);

			if ($path !== null) {
				$normalized[] = $path;
			}
		}

		return array_values($normalized);
	}

	public static function projectSummary(Project $project): array
	{
		return [
			'id' => $project->id,
			'title' => $project->title,
			'slug' => $project->slug,
			'year' => $project->year,
			'made_at' => $project->made_at,
			'description' => $project->description,
			'short_description' => self::truncateWords($project->description, 20),
			'link' => $project->link,
			'thumbnail_url' => self::storageUrl($project->thumbnail),
			'status' => $project->status,
		];
	}

	public static function projectFormPayload(Project $project): array
	{
		return [
			'id' => $project->id,
			'title' => $project->title,
			'slug' => $project->slug,
			'year' => $project->year,
			'made_at' => $project->made_at,
			'description' => $project->description,
			'link' => $project->link,
			'status' => $project->status,
			'thumbnail' => $project->thumbnail,
			'thumbnail_url' => self::storageUrl($project->thumbnail),
			'gallery' => $project->gallery ?? [],
			'gallery_urls' => collect($project->gallery ?? [])
				->map(fn ($path) => self::storageUrl(self::normalizeStoredPath($path)))
				->filter()
				->values()
				->all(),
			'technologies' => self::normalizeTextList($project->technologies ?? []),
			'features' => self::normalizeTextList($project->features ?? []),
			'results' => self::normalizeTextList($project->results ?? []),
		];
	}

	public static function emptyProjectPayload(): array
	{
		return [
			'id' => null,
			'title' => '',
			'slug' => '',
			'year' => null,
			'made_at' => '',
			'description' => '',
			'link' => '',
			'status' => 'completed',
			'thumbnail' => null,
			'thumbnail_url' => null,
			'gallery' => [],
			'gallery_urls' => [],
			'technologies' => [],
			'features' => [],
			'results' => [],
		];
	}

	public static function postSummary(Post $post): array
	{
		return [
			'id' => $post->id,
			'title' => $post->title,
			'short_title' => self::truncateWords($post->title, 12),
			'slug' => $post->slug,
			'cover_image_url' => self::storageUrl($post->cover_image),
			'published_at' => $post->published_at ? $post->published_at->toDateString() : null,
			'status' => $post->status,
			'type' => $post->type,
		];
	}

	public static function postFormPayload(Post $post): array
	{
		return [
			'id' => $post->id,
			'title' => $post->title,
			'slug' => $post->slug,
			'content' => $post->content,
			'type' => $post->type,
			'status' => $post->status,
			'cover_image_url' => self::storageUrl($post->cover_image),
			'published_at' => $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '',
		];
	}

	public static function emptyPostPayload(): array
	{
		return [
			'id' => null,
			'title' => '',
			'slug' => '',
			'content' => '',
			'type' => 'post',
			'status' => 'draft',
			'cover_image_url' => null,
			'published_at' => '',
		];
	}

	public static function experienceSummary(Experience $experience): array
	{
		return [
			'id' => $experience->id,
			'position' => $experience->position,
			'company' => $experience->company,
			'company_link' => $experience->company_link,
			'location' => $experience->location,
			'start_date' => $experience->start_date?->format('Y-m-d') ?? '',
			'end_date' => $experience->end_date?->format('Y-m-d') ?? '',
			'date_range' => self::formatDateRange($experience->start_date, $experience->end_date),
			'employment_type' => $experience->employment_type,
			'description' => $experience->description,
			'highlights' => array_values($experience->highlights ?? []),
			'tech_stack' => array_values($experience->tech_stack ?? []),
		];
	}

	public static function experienceFormPayload(Experience $experience): array
	{
		return self::experienceSummary($experience);
	}

	public static function emptyExperiencePayload(): array
	{
		return [
			'id' => null,
			'position' => '',
			'company' => '',
			'company_link' => '',
			'location' => '',
			'start_date' => '',
			'end_date' => '',
			'employment_type' => 'Full-time',
			'description' => '',
			'highlights' => [],
			'tech_stack' => [],
		];
	}

	public static function storeFile(?UploadedFile $file, string $folder): ?string
	{
		return $file ? $file->store($folder, 'public') : null;
	}

	public static function deleteStoredFile(?string $path): void
	{
		if (! $path || preg_match('/^https?:\/\//i', $path)) {
			return;
		}

		Storage::disk('public')->delete($path);
	}

	private static function dateYear(mixed $value): ?string
	{
		if ($value instanceof \DateTimeInterface) {
			return $value->format('Y');
		}

		return null;
	}
}