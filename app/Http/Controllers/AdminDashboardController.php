<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use Inertia\Inertia;
use Inertia\Response;

class AdminDashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'projects' => Project::count(),
                'posts' => Post::count(),
                'experiences' => Experience::count(),
                'settings' => Setting::count(),
            ],
            'recent_projects' => Project::latest('created_at')
                ->limit(4)
                ->get()
                ->map(fn (Project $project) => [
                    'id' => $project->id,
                    'title' => $project->title,
                    'slug' => $project->slug,
                    'year' => $project->year,
                    'status' => $project->status,
                    'thumbnail_url' => $this->storageUrl($project->thumbnail),
                ]),
            'recent_posts' => Post::latest('published_at')
                ->limit(4)
                ->get()
                ->map(fn (Post $post) => [
                    'id' => $post->id,
                    'title' => $this->truncateWords($post->title, 12),
                    'slug' => $post->slug,
                    'status' => $post->status,
                    'published_at' => $post->published_at ? $post->published_at->toDateString() : null,
                ]),
            'recent_experiences' => Experience::latest('start_date')
                ->limit(4)
                ->get()
                ->map(fn (Experience $experience) => [
                    'id' => $experience->id,
                    'position' => $experience->position,
                    'company' => $experience->company,
                    'date_range' => $this->formatDateRange($experience->start_date, $experience->end_date),
                ]),
        ]);
    }

    private function storageUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        return url('/storage/' . ltrim($path, '/'));
    }

    private function truncateWords(?string $text, int $limit = 20): string
    {
        if (!$text) {
            return '';
        }

        $words = preg_split('/\s+/', trim($text)) ?: [];

        if (count($words) <= $limit) {
            return implode(' ', $words);
        }

        return implode(' ', array_slice($words, 0, $limit)) . '...';
    }

    private function formatDateRange($start, $end): string
    {
        if (!$start && !$end) {
            return '';
        }

        $startYear = $start ? $start->format('Y') : null;
        $endYear = $end ? $end->format('Y') : null;

        if ($startYear && $endYear) {
            return $startYear . ' - ' . $endYear;
        }

        if ($startYear && !$endYear) {
            return $startYear . ' - Present';
        }

        return $endYear ? (string) $endYear : '';
    }
}