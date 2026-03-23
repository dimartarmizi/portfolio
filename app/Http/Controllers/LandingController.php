<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Support\PortfolioData;
use Carbon\Carbon;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
		$baseUrl = rtrim((string) config('app.url', url('/')), '/');

        $experiences = Experience::orderBy('start_date', 'desc')
            ->get()
            ->map(fn (Experience $experience) => PortfolioData::experienceSummary($experience))
            ->toArray();

        $projects = Project::orderBy('created_at', 'desc')
            ->take(6)
            ->get()
            ->map(fn (Project $project) => PortfolioData::projectSummary($project))
            ->toArray();

        $showBlog = setting('show_blog', "0") === "1";
        $posts    = [];
        if ($showBlog) {
            $posts = Post::where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->take(5)
                ->get()
                ->map(fn (Post $post) => PortfolioData::postSummary($post))
                ->toArray();
        }

		$siteName = setting('owner_name', 'Portfolio');
		$headline = setting('headline', null);

        return Inertia::render('Index', [
            'owner_name'           => setting('owner_name', null),
            'headline'             => setting('headline', null),
            'profile_picture'      => PortfolioData::storageUrl(setting('profile_picture', null)),
            'resume_file'          => PortfolioData::storageUrl(setting('resume_file', null)),
            'description'          => setting('description', null),
            'social_links'         => setting('social_links', []),
            'footer'               => setting('footer', null),
            'show_blog'            => $showBlog,
            'show_profile_picture' => setting('show_profile_picture', null),
            'experiences'          => $experiences,
            'projects'             => $projects,
            'posts'                => $posts,
            'seo'                  => PortfolioData::seo([
                'title' => setting('seo_title', $siteName),
                'description' => setting('seo_description', $headline ?: setting('description', '')),
                'canonical' => $baseUrl,
                'url' => $baseUrl,
                'type' => 'website',
            ]),
        ]);
    }

    public function blogsIndex()
    {
		$baseUrl = rtrim((string) config('app.url', url('/')), '/');

        $posts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(fn (Post $post) => PortfolioData::postSummary($post))
            ->toArray();

        return Inertia::render('Blogs/Index', [
            'posts' => $posts,
            'seo' => PortfolioData::seo([
                'title' => 'Blog',
                'description' => setting('seo_blog_description', 'Notes, articles, and updates from the portfolio.'),
                'canonical' => $baseUrl . '/blogs',
                'url' => $baseUrl . '/blogs',
                'type' => 'website',
            ]),
        ]);
    }

    public function blogsShow($slug)
    {
        $baseUrl = rtrim((string) config('app.url', url('/')), '/');

        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();

        $data = [
            'id'              => $post->id,
            'title'           => $post->title,
            'slug'            => $post->slug,
            'content'         => $post->content,
            'cover_image_url' => PortfolioData::storageUrl($post->cover_image),
            'published_at'    => $post->published_at ? $post->published_at->toDateString() : null,
        ];

        return Inertia::render('Blogs/Show', [
            'post' => $data,
            'seo' => PortfolioData::seo([
                'title' => $post->title,
                'description' => PortfolioData::truncateWords(strip_tags((string) $post->content), 28),
                'image' => PortfolioData::storageUrl($post->cover_image) ?: setting('seo_image', null, true),
                'canonical' => $baseUrl . '/blogs/' . $post->slug,
                'url' => $baseUrl . '/blogs/' . $post->slug,
                'type' => 'article',
            ]),
        ]);
    }

    public function experiencesIndex()
    {
        $baseUrl = rtrim((string) config('app.url', url('/')), '/');

        $experiences = Experience::orderBy('start_date', 'desc')
            ->get()
            ->map(fn (Experience $experience) => PortfolioData::experienceSummary($experience))
            ->toArray();

        return Inertia::render('Experiences/Index', [
            'experiences' => $experiences,
            'seo' => PortfolioData::seo([
                'title' => 'Experience',
                'description' => setting('seo_experience_description', 'A timeline of roles, responsibilities, and highlights.'),
                'canonical' => $baseUrl . '/experiences',
                'url' => $baseUrl . '/experiences',
                'type' => 'website',
            ]),
        ]);
    }

    public function experiencesShow($id)
    {
		$baseUrl = rtrim((string) config('app.url', url('/')), '/');

        $data = PortfolioData::experienceSummary(Experience::findOrFail($id));

        return Inertia::render('Experiences/Show', [
            'experience' => $data,
            'seo' => PortfolioData::seo([
                'title' => $data['position'] . ($data['company'] ? ' at ' . $data['company'] : ''),
                'description' => PortfolioData::truncateWords(strip_tags((string) $data['description']), 28),
                'canonical' => $baseUrl . '/experiences/' . $data['id'],
                'url' => $baseUrl . '/experiences/' . $data['id'],
                'type' => 'profile',
            ]),
        ]);
    }

    public function projectsIndex()
    {
		$baseUrl = rtrim((string) config('app.url', url('/')), '/');

        $projects = Project::orderBy('created_at', 'desc')
            ->get()
            ->map(fn (Project $project) => PortfolioData::projectSummary($project))
            ->toArray();

        return Inertia::render('Projects/Index', [
            'projects' => $projects,
            'seo' => PortfolioData::seo([
                'title' => 'Projects',
                'description' => setting('seo_projects_description', 'Selected builds and experiments from the portfolio.'),
                'canonical' => $baseUrl . '/projects',
                'url' => $baseUrl . '/projects',
                'type' => 'website',
            ]),
        ]);
    }

    public function projectsShow($id)
    {
		$baseUrl = rtrim((string) config('app.url', url('/')), '/');

        // now using slug as route parameter
        $p = Project::where('slug', $id)->firstOrFail();

        $gallery = $p->gallery ?? [];
        if (is_string($gallery)) {
            $gallery = json_decode($gallery, true) ?: [];
        }

        $normalizedGallery = [];

        foreach ($gallery as $g) {
            $image = PortfolioData::normalizeStoredPath($g);

            if (! $image) {
                continue;
            }

            $normalizedGallery[] = [
                'image' => PortfolioData::storageUrl($image),
                'caption' => PortfolioData::normalizeTextValue(is_array($g) ? ($g['caption'] ?? null) : null),
            ];
        }

        $gallery = $normalizedGallery;

        $data = [
            'id'            => $p->id,
            'title'         => $p->title,
            'slug'          => $p->slug,
            'year'          => $p->year,
            'made_at'       => $p->made_at,
            'description'   => $p->description,
            'link'          => $p->link,
            'thumbnail_url' => PortfolioData::storageUrl($p->thumbnail),
            'gallery'       => $gallery,
            'technologies'  => $p->technologies ?? [],
            'features'      => $p->features ?? [],
            'results'       => $p->results ?? [],
            'status'        => $p->status,
        ];

        return Inertia::render('Projects/Show', [
            'project' => $data,
            'seo' => PortfolioData::seo([
                'title' => $p->title,
                'description' => PortfolioData::truncateWords(strip_tags((string) $p->description), 28),
                'image' => PortfolioData::storageUrl($p->thumbnail),
                'canonical' => $baseUrl . '/projects/' . $p->slug,
                'url' => $baseUrl . '/projects/' . $p->slug,
                'type' => 'article',
            ]),
        ]);
    }

    public function sitemap()
    {
        $baseUrl = rtrim((string) config('app.url', url('/')), '/');
        $entries = [
            ['loc' => $baseUrl . '/', 'lastmod' => now()->toAtomString()],
            ['loc' => $baseUrl . '/blogs', 'lastmod' => now()->toAtomString()],
            ['loc' => $baseUrl . '/experiences', 'lastmod' => now()->toAtomString()],
            ['loc' => $baseUrl . '/projects', 'lastmod' => now()->toAtomString()],
        ];

        foreach (Post::where('status', 'published')->orderBy('published_at', 'desc')->get() as $post) {
            $entries[] = [
                'loc' => $baseUrl . '/blogs/' . $post->slug,
                'lastmod' => $post->published_at ? Carbon::parse($post->published_at)->toAtomString() : ($post->updated_at ? $post->updated_at->toAtomString() : now()->toAtomString()),
            ];
        }

        foreach (Experience::orderBy('start_date', 'desc')->get() as $experience) {
            $entries[] = [
                'loc' => $baseUrl . '/experiences/' . $experience->id,
                'lastmod' => $experience->updated_at ? $experience->updated_at->toAtomString() : now()->toAtomString(),
            ];
        }

        foreach (Project::orderBy('created_at', 'desc')->get() as $project) {
            $entries[] = [
                'loc' => $baseUrl . '/projects/' . $project->slug,
                'lastmod' => $project->updated_at ? $project->updated_at->toAtomString() : now()->toAtomString(),
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($entries as $entry) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($entry['loc'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . '</loc>';
            $xml .= '<lastmod>' . htmlspecialchars($entry['lastmod'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . '</lastmod>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
