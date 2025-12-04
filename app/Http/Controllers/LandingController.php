<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Post;

class LandingController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')
            ->get()
            ->map(function ($e) {
                $start = $e->start_date ? $e->start_date : null;
                $end   = $e->end_date ? $e->end_date : null;

                return [
                    'id'              => $e->id,
                    'position'        => $e->position,
                    'company'         => $e->company,
                    'company_link'    => $e->company_link,
                    'location'        => $e->location,
                    'start_date'      => $start ? ($start->toDateString()) : null,
                    'end_date'        => $end ? ($end->toDateString()) : null,
                    'date_range'      => $this->formatDateRange($start, $end),
                    'employment_type' => $e->employment_type,
                    'description'     => $e->description,
                    'highlights'      => $e->highlights ?? [],
                    'tech_stack'      => $e->tech_stack ?? [],
                ];
            })->toArray();

        $projects = Project::orderBy('created_at', 'desc')
            ->take(6)
            ->get()
            ->map(function ($p) {
                return [
                    'id'                => $p->id,
                    'year'              => $p->year,
                    'title'             => $p->title,
                    'slug'              => $p->slug,
                    'made_at'           => $p->made_at,
                    'description'       => $p->description,
                    'short_description' => $this->truncateWords($p->description, 20),
                    'link'              => $p->link,
                    'thumbnail_url'     => $this->storageUrl($p->thumbnail),
                ];
            })->toArray();

        $showBlog = setting('show_blog', "0") === "1";
        $posts    = [];
        if ($showBlog) {
            $posts = Post::where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->take(5)
                ->get()
                ->map(function ($post) {
                    return [
                        'id'              => $post->id,
                        'title'           => $post->title,
                        'short_title'     => $this->truncateWords($post->title, 20),
                        'slug'            => $post->slug,
                        'cover_image_url' => $this->storageUrl($post->cover_image),
                        'published_at'    => $post->published_at ? $post->published_at->toDateString() : null,
                    ];
                })->toArray();
        }

        return Inertia::render('Index', [
            'owner_name'           => setting('owner_name', null),
            'headline'             => setting('headline', null),
            'profile_picture'      => $this->storageUrl(setting('profile_picture', null)),
            'resume_file'          => $this->storageUrl(setting('resume_file', null)),
            'description'          => setting('description', null),
            'social_links'         => setting('social_links', []),
            'footer'               => setting('footer', null),
            'show_blog'            => $showBlog,
            'show_profile_picture' => setting('show_profile_picture', null),
            'experiences'          => $experiences,
            'projects'             => $projects,
            'posts'                => $posts,
        ]);
    }

    private function formatDateRange($start, $end)
    {
        if (!$start && !$end) return '';
        $s = $start ? $start->format('Y') : null;
        $e = $end ? $end->format('Y') : null;
        if ($s && $e) return "$s — $e";
        if ($s && !$e) return "$s — Present";
        return $e ? (string) $e: '';
    }

    private function storageUrl($path)
    {
        if (!$path) return null;
        if (preg_match('/^https?:\/\//i', $path)) return $path;
        if (strpos($path, '/storage/') === 0) {
            return url($path);
        }
        return url('/storage/' . ltrim($path, '/'));
    }

    private function truncateWords($text, $limit = 20)
    {
        if ($text === null || $text === '') return '';
        $words = preg_split('/\s+/', trim($text));
        $words = array_filter($words, function ($w) {
            return $w !== '';
        });
        if (count($words) <= $limit) return implode(' ', $words);
        return implode(' ', array_slice($words, 0, $limit)) . '...';
    }

    public function blogsIndex()
    {
        $posts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(function ($post) {
                return [
                    'id'              => $post->id,
                    'title'           => $post->title,
                    'short_title'     => $this->truncateWords($post->title, 20),
                    'slug'            => $post->slug,
                    'cover_image_url' => $this->storageUrl($post->cover_image),
                    'published_at'    => $post->published_at ? $post->published_at->toDateString() : null,
                ];
            })->toArray();

        return Inertia::render('Blogs/Index', ['posts' => $posts]);
    }

    public function blogsShow($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();

        $data = [
            'id'              => $post->id,
            'title'           => $post->title,
            'slug'            => $post->slug,
            'content'         => $post->content,
            'cover_image_url' => $this->storageUrl($post->cover_image),
            'published_at'    => $post->published_at ? $post->published_at->toDateString() : null,
        ];

        return Inertia::render('Blogs/Show', ['post' => $data]);
    }

    public function experiencesIndex()
    {
        $experiences = Experience::orderBy('start_date', 'desc')
            ->get()
            ->map(function ($e) {
                $start = $e->start_date ? $e->start_date : null;
                $end   = $e->end_date ? $e->end_date : null;

                return [
                    'id'              => $e->id,
                    'position'        => $e->position,
                    'company'         => $e->company,
                    'company_link'    => $e->company_link,
                    'location'        => $e->location,
                    'start_date'      => $start ? ($start->toDateString()) : null,
                    'end_date'        => $end ? ($end->toDateString()) : null,
                    'date_range'      => $this->formatDateRange($start, $end),
                    'employment_type' => $e->employment_type,
                    'description'     => $e->description,
                    'highlights'      => $e->highlights ?? [],
                    'tech_stack'      => $e->tech_stack ?? [],
                ];
            })->toArray();

        return Inertia::render('Experiences/Index', ['experiences' => $experiences]);
    }

    public function experiencesShow($id)
    {
        $e     = Experience::findOrFail($id);
        $start = $e->start_date ? $e->start_date : null;
        $end   = $e->end_date ? $e->end_date : null;

        $data = [
            'id'              => $e->id,
            'position'        => $e->position,
            'company'         => $e->company,
            'company_link'    => $e->company_link,
            'location'        => $e->location,
            'start_date'      => $start ? ($start->toDateString()) : null,
            'end_date'        => $end ? ($end->toDateString()) : null,
            'date_range'      => $this->formatDateRange($start, $end),
            'employment_type' => $e->employment_type,
            'description'     => $e->description,
            'highlights'      => $e->highlights ?? [],
            'tech_stack'      => $e->tech_stack ?? [],
        ];

        return Inertia::render('Experiences/Show', ['experience' => $data]);
    }

    public function projectsIndex()
    {
        $projects = Project::orderBy('created_at', 'desc')
            ->get()
            ->map(function ($p) {
                return [
                    'id'                => $p->id,
                    'year'              => $p->year,
                    'title'             => $p->title,
                    'slug'              => $p->slug,
                    'made_at'           => $p->made_at,
                    'description'       => $p->description,
                    'short_description' => $this->truncateWords($p->description, 20),
                    'link'              => $p->link,
                    'thumbnail_url'     => $this->storageUrl($p->thumbnail),
                ];
            })->toArray();

        return Inertia::render('Projects/Index', ['projects' => $projects]);
    }

    public function projectsShow($id)
    {
        // now using slug as route parameter
        $p = Project::where('slug', $id)->firstOrFail();

        $gallery = $p->gallery ?? [];
        if (is_string($gallery)) {
            $gallery = json_decode($gallery, true) ?: [];
        }

        $gallery = array_map(function ($g) {
            return [
                'image'   => isset($g['image']) ? $this->storageUrl($g['image']) : null,
                'caption' => $g['caption'] ?? null,
            ];
        }, $gallery);

        $data = [
            'id'            => $p->id,
            'title'         => $p->title,
            'slug'          => $p->slug,
            'year'          => $p->year,
            'made_at'       => $p->made_at,
            'description'   => $p->description,
            'link'          => $p->link,
            'thumbnail_url' => $this->storageUrl($p->thumbnail),
            'gallery'       => $gallery,
            'technologies'  => $p->technologies ?? [],
            'features'      => $p->features ?? [],
            'results'       => $p->results ?? [],
            'status'        => $p->status,
        ];

        return Inertia::render('Projects/Show', ['project' => $data]);
    }
}
