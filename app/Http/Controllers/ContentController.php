<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Support\PortfolioData;
use Inertia\Inertia;
use Inertia\Response;

class ContentController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Content', [
			'projects' => Project::latest('created_at')
				->limit(5)
				->get()
				->map(fn (Project $project) => PortfolioData::projectSummary($project)),
			'posts' => Post::latest('published_at')
				->limit(5)
				->get()
				->map(fn (Post $post) => PortfolioData::postSummary($post)),
			'experiences' => Experience::latest('start_date')
				->limit(5)
				->get()
				->map(fn (Experience $experience) => PortfolioData::experienceSummary($experience)),
			'counts' => [
				'projects' => Project::count(),
				'posts' => Post::count(),
				'experiences' => Experience::count(),
			],
		]);
	}
}