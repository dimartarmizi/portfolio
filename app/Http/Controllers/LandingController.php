<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Support\PortfolioData;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
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
        ]);
    }

    public function blogsIndex()
    {
        $posts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(fn (Post $post) => PortfolioData::postSummary($post))
            ->toArray();

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
            'cover_image_url' => PortfolioData::storageUrl($post->cover_image),
            'published_at'    => $post->published_at ? $post->published_at->toDateString() : null,
        ];

        return Inertia::render('Blogs/Show', ['post' => $data]);
    }

    public function experiencesIndex()
    {
        $experiences = Experience::orderBy('start_date', 'desc')
            ->get()
            ->map(fn (Experience $experience) => PortfolioData::experienceSummary($experience))
            ->toArray();

        return Inertia::render('Experiences/Index', ['experiences' => $experiences]);
    }

    public function experiencesShow($id)
    {
        $data = PortfolioData::experienceSummary(Experience::findOrFail($id));

        return Inertia::render('Experiences/Show', ['experience' => $data]);
    }

    public function projectsIndex()
    {
        $projects = Project::orderBy('created_at', 'desc')
            ->get()
            ->map(fn (Project $project) => PortfolioData::projectSummary($project))
            ->toArray();

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

        return Inertia::render('Projects/Show', ['project' => $data]);
    }
}
