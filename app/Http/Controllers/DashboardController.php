<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Support\PortfolioData;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
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
				->map(fn (Project $project) => PortfolioData::projectSummary($project)),
			'recent_posts' => Post::latest('published_at')
				->limit(4)
				->get()
				->map(fn (Post $post) => PortfolioData::postSummary($post)),
			'recent_experiences' => Experience::latest('start_date')
				->limit(4)
				->get()
				->map(fn (Experience $experience) => PortfolioData::experienceSummary($experience)),
		]);
	}
}