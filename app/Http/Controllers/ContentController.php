<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
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
				->map(fn (Project $project) => [
					'id' => $project->id,
					'title' => $project->title,
					'slug' => $project->slug,
					'year' => $project->year,
					'status' => $project->status,
				]),
			'posts' => Post::latest('published_at')
				->limit(5)
				->get()
				->map(fn (Post $post) => [
					'id' => $post->id,
					'title' => $post->title,
					'slug' => $post->slug,
					'status' => $post->status,
					'published_at' => $post->published_at ? $post->published_at->toDateString() : null,
				]),
			'experiences' => Experience::latest('start_date')
				->limit(5)
				->get()
				->map(fn (Experience $experience) => [
					'id' => $experience->id,
					'position' => $experience->position,
					'company' => $experience->company,
					'employment_type' => $experience->employment_type,
				]),
			'counts' => [
				'projects' => Project::count(),
				'posts' => Post::count(),
				'experiences' => Experience::count(),
			],
		]);
	}
}