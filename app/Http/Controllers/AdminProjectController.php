<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class AdminProjectController extends Controller
{
    public function index(Request $request): Response
    {
        $search = trim((string) $request->query('search', ''));
        $status = trim((string) $request->query('status', 'all'));
        $year = trim((string) $request->query('year', ''));

        $projectsQuery = Project::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($nestedQuery) use ($search) {
                    $nestedQuery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%')
                        ->orWhere('made_at', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('link', 'like', '%' . $search . '%');
                });
            })
            ->when(in_array($status, ['ongoing', 'completed'], true), fn ($query) => $query->where('status', $status))
            ->when($year !== '', fn ($query) => $query->where('year', (int) $year));

        $projects = $projectsQuery
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        $projects->getCollection()->transform(fn (Project $project) => $this->projectPayload($project));

        return Inertia::render('Admin/Projects/Index', [
            'projects' => $projects,
            'filters' => [
                'search' => $search,
                'status' => $status,
                'year' => $year,
            ],
            'filterOptions' => [
                'statuses' => ['all', 'ongoing', 'completed'],
                'years' => Project::query()
                    ->whereNotNull('year')
                    ->select('year')
                    ->distinct()
                    ->orderByDesc('year')
                    ->pluck('year')
                    ->map(fn ($value) => (string) $value)
                    ->values(),
            ],
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Projects/Create', [
            'project' => $this->emptyProjectPayload(),
        ]);
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $project = new Project();
        $this->fillProject($project, $request, $data);
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project): Response
    {
        return Inertia::render('Admin/Projects/Edit', [
            'project' => $this->projectPayload($project),
        ]);
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $data = $request->validated();

        $this->fillProject($project, $request, $data);
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->deleteStoredFile($project->thumbnail);
        foreach ($project->gallery ?? [] as $path) {
            $this->deleteStoredFile($path);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    private function fillProject(Project $project, Request $request, array $data): void
    {
        $project->title = $data['title'];
        $project->slug = $this->resolveSlug($data['title'], $data['slug'] ?? null, $project->id);
        $project->year = $data['year'] ?? null;
        $project->made_at = $data['made_at'] ?? null;
        $project->description = $data['description'] ?? null;
        $project->link = $data['link'] ?? null;
        $project->status = $data['status'];
        $project->technologies = $this->normalizeTextList($data['technologies'] ?? []);
        $project->features = $this->normalizeTextList($data['features'] ?? []);
        $project->results = $this->normalizeTextList($data['results'] ?? []);

        $gallery = $project->exists ? ($project->gallery ?? []) : [];
        $gallery = array_values(array_filter(is_array($gallery) ? $gallery : []));

        $galleryRemove = array_values(array_filter(array_map(
            fn ($value) => is_string($value) ? trim($value) : null,
            $request->input('gallery_remove', [])
        )));

        if ($galleryRemove) {
            foreach ($galleryRemove as $path) {
                $this->deleteStoredFile($path);
            }

            $gallery = array_values(array_diff($gallery, $galleryRemove));
        }

        foreach ($request->file('gallery_files', []) as $file) {
            $gallery[] = $this->storeFile($file);
        }

        $project->gallery = $gallery;

        if ($request->hasFile('thumbnail')) {
            $this->deleteStoredFile($project->thumbnail);
            $project->thumbnail = $this->storeFile($request->file('thumbnail'));
        } elseif ($request->boolean('thumbnail_remove')) {
            $this->deleteStoredFile($project->thumbnail);
            $project->thumbnail = null;
        }
    }

    private function projectPayload(Project $project): array
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
            'thumbnail_url' => $this->storageUrl($project->thumbnail),
            'gallery' => $project->gallery ?? [],
            'gallery_urls' => collect($project->gallery ?? [])
                ->map(fn ($path) => $this->storageUrl($path))
                ->filter()
                ->values()
                ->all(),
            'technologies' => $this->normalizeTextList($project->technologies ?? []),
            'features' => $this->normalizeTextList($project->features ?? []),
            'results' => $this->normalizeTextList($project->results ?? []),
        ];
    }

    private function emptyProjectPayload(): array
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

    private function normalizeTextList(array $values): array
    {
        $normalized = [];

        foreach ($values as $value) {
            $item = $this->normalizeTextValue($value);

            if ($item !== null) {
                $normalized[] = $item;
            }
        }

        return array_values($normalized);
    }

    private function normalizeTextValue(mixed $value): ?string
    {
        if (is_string($value) || is_numeric($value)) {
            $text = trim((string) $value);

            return $text !== '' ? $text : null;
        }

        if (is_array($value)) {
            foreach (['name', 'title', 'label', 'text', 'value'] as $key) {
                if (array_key_exists($key, $value)) {
                    $text = $this->normalizeTextValue($value[$key]);

                    if ($text !== null) {
                        return $text;
                    }
                }
            }

            foreach ($value as $item) {
                $text = $this->normalizeTextValue($item);

                if ($text !== null) {
                    return $text;
                }
            }
        }

        if (is_object($value)) {
            foreach (['name', 'title', 'label', 'text', 'value'] as $key) {
                if (isset($value->{$key})) {
                    $text = $this->normalizeTextValue($value->{$key});

                    if ($text !== null) {
                        return $text;
                    }
                }
            }

            foreach (get_object_vars($value) as $item) {
                $text = $this->normalizeTextValue($item);

                if ($text !== null) {
                    return $text;
                }
            }
        }

        return null;
    }

    private function resolveSlug(string $title, ?string $slug, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $title) ?: 'project';
        $candidate = $baseSlug;
        $index = 2;

        while (Project::query()
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->where('slug', $candidate)
            ->exists()) {
            $candidate = $baseSlug . '-' . $index;
            $index++;
        }

        return $candidate;
    }

    private function storeFile(?UploadedFile $file): ?string
    {
        return $file ? $file->store('projects', 'public') : null;
    }

    private function deleteStoredFile(mixed $path): void
    {
        $paths = $this->normalizeStoredPaths($path);

        foreach ($paths as $item) {
            if ($item === '' || preg_match('/^https?:\/\//i', $item)) {
                continue;
            }

            Storage::disk('public')->delete($item);
        }
    }

    private function storageUrl(mixed $path): ?string
    {
        $path = $this->normalizeStoredPath($path);

        if (! $path) {
            return null;
        }

        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        return url('/storage/' . ltrim($path, '/'));
    }

    private function normalizeStoredPath(mixed $value): ?string
    {
        if (is_string($value) || is_numeric($value)) {
            $path = trim((string) $value);

            return $path !== '' ? $path : null;
        }

        if (is_array($value)) {
            foreach (['path', 'url', 'src', 'file', 'image', 'value'] as $key) {
                if (array_key_exists($key, $value)) {
                    $path = $this->normalizeStoredPath($value[$key]);

                    if ($path) {
                        return $path;
                    }
                }
            }

            foreach ($value as $item) {
                $path = $this->normalizeStoredPath($item);

                if ($path) {
                    return $path;
                }
            }
        }

        return null;
    }

    private function normalizeStoredPaths(mixed $value): array
    {
        if ($value === null || $value === '') {
            return [];
        }

        if (is_array($value)) {
            $paths = [];

            foreach ($value as $item) {
                $normalized = $this->normalizeStoredPaths($item);

                foreach ($normalized as $path) {
                    $paths[] = $path;
                }
            }

            return array_values(array_filter($paths));
        }

        $path = $this->normalizeStoredPath($value);

        return $path ? [$path] : [];
    }
}